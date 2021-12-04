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

    public function show($id){
        
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
}
