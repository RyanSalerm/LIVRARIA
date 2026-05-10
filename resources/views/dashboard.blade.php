@extends('modelo.paginaInicio')

@section('conteudo')
    <div class="row">
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{ $clientesCount }}</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success">
                                <span class="mdi mdi-account-multiple icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Clientes</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{ $livrosCount }}</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-info">
                                <span class="mdi mdi-book-open-page-variant"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Livros</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{ $livrosRecentes->sum('numero_paginas') }}</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <span class="icon icon-box-warning">
                                <i class="mdi mdi-file-document"></i>
                            </span>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Páginas Totais (Recentes)</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{ $livrosRecentes->avg('numero_paginas') ? round($livrosRecentes->avg('numero_paginas')) : 0 }}</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-danger">
                                <span class="mdi mdi-chart-line"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Média de Páginas</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Gráfico -->
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Distribuição por Idioma</h4>
                    <div class="chart-container">
                        <canvas id="idiomas-chart" class="transaction-chart"></canvas>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const ctx = document.getElementById('idiomas-chart');

                            if (!ctx) {
                                console.error("Elemento canvas com ID 'idiomas-chart' não encontrado.");
                                return;
                            }

                            const chartLabels = @json($labels);
                            const chartData = @json($data);

                            if (chartLabels && chartData && chartLabels.length > 0) {
                                new Chart(ctx, {
                                    type: 'pie',
                                    data: {
                                        labels: chartLabels,
                                        datasets: [{
                                            data: chartData,
                                            backgroundColor: [
                                                'rgba(255, 66, 74, 0.7)',
                                                'rgba(255, 171, 0, 0.7)',
                                                'rgba(143, 95, 232, 0.7)',
                                                'rgba(0, 210, 91, 0.7)',
                                                'rgba(54, 162, 235, 0.7)',
                                                'rgba(255, 205, 86, 0.7)'
                                            ],
                                            borderColor: [
                                                'rgba(255, 66, 74, 1)',
                                                'rgba(255, 171, 0, 1)',
                                                'rgba(143, 95, 232, 1)',
                                                'rgba(0, 210, 91, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 205, 86, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        plugins: {
                                            legend: {
                                                position: 'top',
                                            },
                                            title: {
                                                display: true,
                                                text: 'Livros por Idioma'
                                            }
                                        }
                                    },
                                });
                            } else {
                                console.warn("Dados inválidos ou vazios para o gráfico.");
                            }
                        });
                    </script>
                </div>
            </div>
        </div>

        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Livros Recentes</h4>
                    <div class="table-responsive" style="overflow-x: hidden;">
                        <table class="table" style="table-layout: fixed; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="width: 25%;">Título</th>
                                    <th style="width: 20%;">Autor</th>
                                    <th style="width: 15%;">Editora</th>
                                    <th style="width: 10%;">Idioma</th>
                                    <th style="width: 10%;">Páginas</th>
                                    <th style="width: 10%;">Edição</th>
                                    <th style="width: 10%;">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($livrosRecentes as $livro)
                                    <tr>
                                        <td>{{ Str::limit($livro->nome, 30) }}</td>
                                        <td>{{ Str::limit($livro->autor, 20) }}</td>
                                        <td>{{ Str::limit($livro->editora, 15) }}</td>
                                        <td>{{ $livro->idioma }}</td>
                                        <td>{{ $livro->numero_paginas }}</td>
                                        <td>{{ $livro->edicao }}</td>
                                        <td>
                                            <a href="{{ route('livros.edit', $livro) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Nenhum livro cadastrado ainda.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('modelo.paginaFim')