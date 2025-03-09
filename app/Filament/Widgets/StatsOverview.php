<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Category;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $date = Carbon::now()->subDays(7);
        $contactLast7Days = Contact::where('created_at', '>=', $date)->count();
        $companyLast7Days = Company::where('created_at', '>=', $date)->count();
        $categoryLast7Days = Category::where('created_at', '>=', $date)->count();
        return [
            Stat::make('Contacts', Contact::count())
                ->icon('heroicon-o-users')
                ->description("$contactLast7Days Increase")
                ->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before),
            Stat::make('Companies', Company::count())
                ->icon('heroicon-o-building-office-2')
                ->description("$companyLast7Days Increase")
                ->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before),
            Stat::make('Categories', Category::count())
                ->icon('heroicon-o-rectangle-stack')
                ->description("$categoryLast7Days Increase")
                ->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before),
        ];
    }
}
