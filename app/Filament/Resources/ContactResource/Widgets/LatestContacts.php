<?php

namespace App\Filament\Resources\ContactResource\Widgets;

use App\Models\Contact;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestContacts extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table->query(Contact::query()->latest()->limit(5))
        ->columns([
            TextColumn::make('name'),
            TextColumn::make('email'),
        ]);
    }
}
