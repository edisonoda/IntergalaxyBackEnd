<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->is_admin) {
            $orders = Order::orderBy('id', 'asc')->paginate(20);
            return view('orders.index')->with('orders', $orders);
        }else{
            return redirect()->route('products.home')->with('error','Você não possui permissão para isso.');
        }
    }

    public function indexByUser($id)
    {
        if (auth()->user()->is_admin) {
            $orders = Order::where('user_id', $id)->get();
            return view('orders.index')->with('orders', $orders);
        }else{
            $orders = Order::where('user_id', auth()->user()->id)->paginate(20);
            return view('orders.index')->with('orders', $orders);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/')->with('products', $products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $order = new Order;
        $order->total_price = $request->input('total_price');
        $order->user_id = $user->id;
        $order->save();

        foreach($user->products as $product){
            $order->products()->attach($product->id, [
                'product_quantity' => $product->pivot->product_quantity,
            ]);

            $user->products()->detach($product->id);
        }

        return redirect('/')->with('success', 'Requisição realizada com sucesso! Aguarde a aprovação do pedido.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        return view('orders.show')->with('order', $order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required|in:Cancelado,Em espera,Aprovado',
        ]);

        $order = Order::find($id);
        $order->status = $request->input('status');
        $order->save();
        
        return redirect('orders')->with('success', 'Pedido atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $order = Order::find($request->id);
        $order->delete();

        return redirect('/'.auth()->user()->id.'/orders')->with('success', 'Pedido cancelado com sucesso!');
    }
}
