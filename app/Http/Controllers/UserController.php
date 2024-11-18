<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }
    public function update(Request $request)
{
    $user = Auth::user();
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|min:6|confirmed', //SENHA NAO OBRIGATORIA, MAS SE PREENCHER PRECISA CONFIRMAR
    ]);
    //ATUALIZA DADOS
    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    $user->save();
    return redirect()->route('user.index')->with('status', 'Informações atualizadas com sucesso!');
}

}
