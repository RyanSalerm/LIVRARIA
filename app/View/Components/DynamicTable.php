<?php
namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;

class DynamicTable extends Component
{
    public string $tableName;
    public array $columns;
    public LengthAwarePaginator $records;
    public string $editRoute;
    public string $deleteRoute;
    public string $createRoute;
    public array $actions;

    public function __construct(
        string $tableName,
        array $columns,
        LengthAwarePaginator $records,
        string $editRoute = '',
        string $deleteRoute = '',
        string $createRoute = '',
        array $actions = []
    ) {
        $this->tableName = $tableName;
        $this->columns = $columns;
        $this->records = $records;
        $this->editRoute = $editRoute;
        $this->deleteRoute = $deleteRoute;
        $this->createRoute = $createRoute;
        $this->actions = $actions;
    }

    public function render(): View
    {
        return view('components.dynamic-table');
    }
}

