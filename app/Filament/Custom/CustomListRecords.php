<?php

namespace App\Filament\Custom;

use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;

class CustomListRecords extends ListRecords
{
    protected int $defaultTableRecordsPerPageSelectOption = 50;

    protected function paginateTableQuery(Builder $query): Paginator
    {
        return $query->fastPaginate($this->getTableRecordsPerPage());
    }

    protected function getTableRecordsPerPageSelectOptions(): array
    {
        return [10, 25, 50, 100, 250, 500];
    }
}
