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
        $user = Auth::user();  // Obtém o usuário autenticado
        return view('user.edit', compact('user'));  // Passa o usuário para a view
    }
    public function update(Request $request)
{
    $user = Auth::user();  // Obtém o usuário autenticado

    // Validação dos dados do formulário
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|min:6|confirmed',  // Senha é opcional, mas se for preenchida, precisa ser confirmada
    ]);

    // Atualiza os dados do usuário
    $user->name = $request->name;
    $user->email = $request->email;

    // Se o usuário inseriu uma nova senha, ela será atualizada
    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    $user->save();  // Salva as alterações no banco de dados

    return redirect()->route('user.index')->with('status', 'Informações atualizadas com sucesso!');  // Redireciona para a página de perfil
}

}
