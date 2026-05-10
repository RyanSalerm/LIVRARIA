<?php
// app/Http/Controllers/ClienteController.php


namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\ClienteRequest;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    
    public function index()
    {
        $usuarios = User::where('id', '!=', 1)->paginate(10);
        return view('clientes.visualizarClientes', compact('usuarios'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(ClienteRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'comum',
        ]);

        return redirect()->route('clientes.visualizarClientes')->with('mensagem', 'Cliente criado com sucesso!');
    }

    public function show(string $id)
    {
        // Implementar se necessário
    }

    public function edit(User $usuario)
    {
        return view('clientes.edit', compact('usuario'));
    }
    //Use of unknown class: 'App\Http\Controllers\ClienteRequest'
    public function update(ClienteRequest $request, string $id)
    {
        $usuario = User::findOrFail($id);

        $dados = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role ?? 'comum',
        ];

        if ($request->filled('password')) {
            $dados['password'] = Hash::make($request->password);
        }

        $usuario->update($dados);

        return redirect()->route('clientes.visualizarClientes')->with('mensagem', 'Cliente atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect()->route('clientes.visualizarClientes')->with('mensagem', 'Cliente excluído com sucesso!');
    }
}
