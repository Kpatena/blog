<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Custom\CustomListRecords;
use App\Filament\Resources\UserResource;
use Filament\Pages\Actions;

class ListUsers extends CustomListRecords
{
    protected static string $resource = UserResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
