<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Livro;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $clientesCount = User::count();
        $livrosCount = Livro::count();
        $livrosRecentes = Livro::latest()->limit(5)->get();

        // Dados para gráfico - distribuição por idioma
        $idiomas = Livro::select('idioma')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('idioma')
            ->get();

        $labels = $idiomas->pluck('idioma');
        $data = $idiomas->pluck('count');

        return view('dashboard', compact(
            'clientesCount',
            'livrosCount',
            'livrosRecentes',
            'labels',
            'data'
        ));
    }
}