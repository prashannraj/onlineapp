<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Vacancy;
use App\Models\Candidate;
use App\Models\Application;

class VacancyOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $TotalVacancies = Vacancy::count();
        //$TotalCandidates = Candidate::count();
        //$TotalApplications = Application::count();
        //$PendingApplication = Application::where('status','pending')->count();
        return [
            Stat::make('Total Vacancies', $TotalVacancies)
            ->description('32k increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success')
            ->extraAttributes([
                'class' => 'cursor-pointer',
                'wire:click' => "\$dispatch('setStatusFilter', { filter: 'processed' })",
            ]),
            Stat::make('Total Candidates', '200.1k')
            ->description('32k increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Total Application', '2000.1k')
            ->description('32k increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Pending Application', '2000.1k')
            ->extraAttributes([
                'class' => 'cursor-pointer',
                'wire:click' => "\$dispatch('setStatusFilter', { filter: 'processed' })",
            ])


        ];
    }
}
