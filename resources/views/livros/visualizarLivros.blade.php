@extends('modelo.paginaInicio')

@section('conteudo')
    <x-dynamic-table 
    :tableName="'livros'" 
    :columns="[
        'id' => 'ID', 
        'nome' => 'Nome',
        'autor' => 'Autor',
        'editora' => 'Editora',
        'idioma' => 'Idioma',
        'numero_paginas' => 'Número de Páginas',
        'edicao' => 'Edição',
        'isbn' => 'ISBN',
        'resumo' => 'Resumo',
    ]" 
    :records="$livros"
    editRoute="livros.edit" 
    deleteRoute="livros.destroy" 
    createRoute="livros.create" 
    />

@endsection

@extends('modelo.paginaFim')