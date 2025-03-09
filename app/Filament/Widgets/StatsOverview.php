<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected ?string $heading = 'Analytics';
    protected function getStats(): array
    {
        $date = Carbon::now()->subDays(7)->startOfDay();
        $contactLast7Days = Contact::where('created_at', '>=', $date)
            ->selectRaw('count(id) as count, date(created_at) as created_at')
            ->groupByRaw('date(created_at)')
            ->orderByRaw('date(created_at) asc')
            ->get();
        $companyLast7Days = Company::where('created_at', '>=', $date)
            ->selectRaw('count(id) as count, date(created_at) as created_at')
            ->groupByRaw('date(created_at)')
            ->orderByRaw('date(created_at) asc')
            ->get();
        $categoryLast7Days = Category::where('created_at', '>=', $date)
            ->selectRaw('count(id) as count, date(created_at) as created_at')
            ->groupByRaw('date(created_at)')
            ->orderByRaw('date(created_at) asc')
            ->get();

        return [
            Stat::make('Contacts', Contact::count())
                ->icon('heroicon-o-users')
                ->chart($contactLast7Days->pluck('count')->toArray())
                ->description($contactLast7Days->sum('count') . " Increase in the last 7 days")
                ->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before),
            Stat::make('Companies', Company::count())
                ->icon('heroicon-o-building-office-2')
                ->chart($contactLast7Days->pluck('count')->toArray())
                ->description($companyLast7Days->sum('count') . " Increase in the last 7 days")
                ->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before),
            Stat::make('Categories', Category::count())
                ->icon('heroicon-o-rectangle-stack')
                ->chart($categoryLast7Days->pluck('count')->toArray())
                ->description($categoryLast7Days->sum('count') . " Increase in the last 7 days")
                ->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before),
        ];
    }
}
