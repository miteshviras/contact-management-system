<?php

namespace App\Filament\Resources\CompanyResource\Widgets;

use Filament\Tables;
use App\Models\Company;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestCompanies extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table->query(Company::query()->latest()->limit(5))
        ->columns([
            TextColumn::make('name'),
            TextColumn::make('email'),
        ]);
    }
}
