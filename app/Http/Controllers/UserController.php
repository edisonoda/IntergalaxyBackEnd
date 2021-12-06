<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function index(){
        $users = User::where('is_admin', 0)->paginate(20);
        
        return view('users.index')->with('users', $users);
    }

    public function edit($id){
        $user = User::find($id);

        if (auth()->user()->is_admin || auth()->user()->id == $id) {
            return view('users.profile')->with('user', $user);
        }else{
            return view('products.home')->with('error', 'Você não possui permissão para acessar esse link!');
        }
    }

    public function update(Request $request, $id){
        $user = User::find($id);

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255',
            Rule::unique('users')->ignore($user->id)],
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        
        return redirect('/')->with('success', 'Dados atualizados com sucesso!');
    }

    public function destroy($id)
    {
        $product = User::find($id);
        $orders = $product->orders;
        $product->delete();

        foreach($orders as $order){
            \App\Http\Controllers\OrdersController::updateTotalPrice($order->id);
        }

        return redirect('/users')->with('success', 'Conta excluída com sucesso!');
    }
}
