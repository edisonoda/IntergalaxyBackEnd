<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            $orders = Order::all();
            return view('orders.admin')->with('orders', $orders);
        }else{
            //$orders = Order::all();
            return view('orders.home')->with('orders', $orders);
        }
    }

    public function indexByUser($user)
    {
        if (auth()->user()->is_admin) {
            $orders = Order::where('user_id', $user);
            return view('orders.admin')->with('orders', $orders);
        }else{
            return redirect()->route('products.home')->with('error','Você não possui permissão para isso.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'required',
            'user_id' => 'required',
        ]);

        $order = new Order;
        $order->status = $request->input('status');
        $order->user_id = auth()->user()->id;
        $order->save();
        
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('orders.edit')->with('order', $order);
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
            'status' => 'required',
        ]);

        $order = Order::find($id);
        $order->status = $request->input('status');
        $order->save();
        
        return redirect('/')->with('success', 'Pedido atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect('/')->with('success', 'Pedido cancelado com sucesso!');
    }
}
