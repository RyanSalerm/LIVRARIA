<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::paginate(10);
        return view('livros.visualizarLivros', compact('livros'));
    }

    public function create()
    {
        return view('livros.create');
    }

    public function store(Request $request)
    {
        Livro::create([
            'nome' => $request->nome,
            'autor' => $request->autor,
            'editora' => $request->editora,
            'idioma' => $request->idioma,
            'numero_paginas' => $request->numero_paginas ?? 0,
            'edicao' => $request->edicao ?? 0,
            'isbn' => $request->isbn,
            'resumo' => $request->resumo,
        ]);

        return redirect()->route('livros.visualizarLivros')->with('mensagem', 'Livro criado com sucesso!');
    }

    public function show(string $id)
    {
        $livro = Livro::findOrFail($id);
        return view('livros.show', compact('livro'));
    }

    public function edit(Livro $livro)
    {
        return view('livros.edit', compact('livro'));
    }

    public function update(Request $request, string $id)
    {
        $livro = Livro::findOrFail($id);

        $dados = [
            'nome' => $request->nome,
            'autor' => $request->autor,
            'editora' => $request->editora,
            'idioma' => $request->idioma,
            'numero_paginas' => $request->numero_paginas ?? 0,
            'edicao' => $request->edicao ?? 0,
            'isbn' => $request->isbn,
            'resumo' => $request->resumo,
        ];

        $livro->update($dados);

        return redirect()->route('livros.visualizarLivros')->with('mensagem', 'Livro atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $livro = Livro::findOrFail($id);
        $livro->delete();

        return redirect()->route('livros.visualizarLivros')->with('mensagem', 'Livro excluído com sucesso!');
    }
}
