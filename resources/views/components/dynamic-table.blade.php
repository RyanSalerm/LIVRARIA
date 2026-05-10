@props(['tableName', 'columns', 'records', 'editRoute', 'deleteRoute', 'createRoute'])

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>{{ $tableName }}</h3>
        @if(isset($createRoute))
            <a href="{{ route($createRoute) }}" class="btn btn-primary btn-sm">Novo</a>
        @endif
    </div>

    <div class="card-body table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    @foreach ($columns as $key => $value)
                        <th>{{ is_string($key) ? $value : ucfirst(__($value)) }}</th>
                    @endforeach
                    <th style="width: 120px;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($records as $record)
                    <tr>
                        @foreach ($columns as $key => $value)
                            <td>{{ $record->{ is_string($key) ? $key : $value } }}</td>
                        @endforeach
                        <td>
                            <div class="d-flex flex-column">
                            @if(isset($editRoute))
                                <a href="{{ route($editRoute, $record->id) }}" class="btn btn-warning btn-sm w-100 mb-1">Editar</a>
                            @endif
                            @if(isset($deleteRoute) && auth()->check() && auth()->user()->email === 'admin@exemplo.com')
                                <form action="{{ route($deleteRoute, $record->id) }}" method="POST" style="display:inline-block"
                                    onsubmit="return confirm('Confirma exclusão?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm w-100">Excluir</button>
                                </form>
                            @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($columns) + 1 }}" class="text-center">Nenhum dado encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
