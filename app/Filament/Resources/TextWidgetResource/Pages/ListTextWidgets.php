<?php

namespace App\Filament\Resources\TextWidgetResource\Pages;

use App\Filament\Custom\CustomListRecords;
use App\Filament\Resources\TextWidgetResource;
use Filament\Pages\Actions;

class ListTextWidgets extends CustomListRecords
{
    protected static string $resource = TextWidgetResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
