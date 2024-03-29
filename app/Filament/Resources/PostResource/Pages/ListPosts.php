<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Custom\CustomListRecords;
use App\Filament\Resources\PostResource;
use Filament\Pages\Actions;

class ListPosts extends CustomListRecords
{
    protected static string $resource = PostResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
