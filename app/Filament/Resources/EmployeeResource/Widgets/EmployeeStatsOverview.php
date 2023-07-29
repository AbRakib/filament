<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Country;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $bd = Country::where('country_code', 'BD')->withCount('employees')->first();
        $uk = Country::where('country_code', 'Uk')->withCount('employees')->first();
        $usa = Country::where('country_code', 'USA')->withCount('employees')->first();
        return [
            Card::make('All Employees', Employee::all()->count()),
            Card::make($bd->name . ' Employees', $bd->employees_count),
            Card::make($uk->name . ' Employees', $uk->employees_count),
            Card::make($usa->name . ' Employees', $usa->employees_count),
        ];
    }
}
