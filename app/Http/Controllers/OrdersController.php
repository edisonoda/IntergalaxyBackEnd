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

        $permission = false;

        if(auth()->user()->is_admin){
            $permission = true;
        } else {
            foreach($order->users as $user){
                if(auth()->user()->id == $user->id){
                    $permission = true;
                    break;
                }
            }
        }        

        if(!$permission)
            return redirect('/')->with('error', 'Você não possui permissão para fazer isso!');

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

        if(auth()->user()->id !== $order->user_id && !auth()->user()->is_admin)
            return redirect('/')->with('error', 'Você não possui permissão para fazer isso!');

        $order->delete();

        return redirect('/orders/'.auth()->user()->id)->with('success', 'Pedido cancelado com sucesso!');
    }

    public function updateTotalPrice($id){
        $order = Order::find($id);
        $totalPrice = 0;

        foreach($order->products as $product){
            $totalPrice += $product->price * $product->pivot->product_quantity;
        }

        $order->total_price = $totalPrice;
        $order->save();
    }
}
