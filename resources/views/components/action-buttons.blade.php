@props([
    'id',
    'editRoute' => null,
    'deleteRoute' => null,
    'showNew' => false,
    'newRoute' => null
])

<div class="btn-group" role="group">
    @if ($showNew && $newRoute)
        <a href="{{ route($newRoute) }}" class="btn btn-success btn-sm" style="margin-right: 5px;">Novo</a>
    @endif

    @if ($editRoute)
        <a href="{{ route($editRoute, $id) }}" class="btn btn-primary btn-sm" style="margin-right: 5px;">Editar</a>
    @endif

    @if ($deleteRoute)
        <form action="{{ route($deleteRoute, $id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
        </form>
    @endif
</div>
