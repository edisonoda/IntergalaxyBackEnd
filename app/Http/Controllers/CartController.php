<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class CartController extends Controller
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
        $user = User::find(auth()->user()->id);
        $products = [];
        $totalPrice = 0;

        foreach($user->products as $product){
            array_push($products, $product);
            $totalPrice += $product->price * $product->pivot->product_quantity;
        }

        //echo implode('+', $products);

        return view('cart', ['products' => $products, 'total_price' => $totalPrice]);
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
        $product = Product::find($request->input('product_id'));

        $this->validate($request, [
            'product_id' => 'required',
            'quantity' => 'required|min:1',
        ]);

        $user->products()->attach($request->input('product_id'),[
            'product_quantity' => $request->input('quantity'),
        ]);

        return redirect('/')->with('success', 'Adicionado ao carrinho');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $permission = false;

        if(auth()->user()->is_admin){
            $permission = true;
        } else {
            foreach($user->products as $product){
                if($request->id == $product->id){
                    $permission = true;
                    break;
                }
            }
        }        

        if(!$permission)
            return redirect('/')->with('error', 'Você não possui permissão para fazer isso!');

        $user->products()->detach($request->id);

        return redirect('/{{$user}}/cart')->with('success', 'Produto removido com sucesso!');
    }
}
