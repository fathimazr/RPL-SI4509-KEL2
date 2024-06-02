<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Maintenance;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Blade;


class StatisticController extends Controller
{
    public function index(Request $request)
    {
        $alertingCount = $this->getAlertingCount();
        $maintenanceCount = $this->getMaintenanceCount();
        $maintenancePunctuality = $this->calculateMaintenancePunctuality();
        $weeklyDataAlerting = $this->fetchWeeklyDataAlerting();
        $monthlyDataAlerting = $this->fetchMonthlyDataAlerting();
        
        return view('statistics.index', compact('alertingCount', 'maintenanceCount', 'maintenancePunctuality', 'weeklyDataAlerting', 'monthlyDataAlerting'));
    }

    public function maintenance(Request $request)
    {
        $alertingCount = $this->getAlertingCount();
        $maintenanceCount = $this->getMaintenanceCount();
        $maintenancePunctuality = $this->calculateMaintenancePunctuality();
        $weeklyDataMaintenance = $this->fetchWeeklyDataMaintenance();
        $monthlyDataMaintenance = $this->fetchMonthlyDataMaintenance();
        
        return view('statistics.maintanance', compact('alertingCount', 'maintenanceCount', 'maintenancePunctuality', 'weeklyDataMaintenance', 'monthlyDataMaintenance'));
    }

    public function mainpunc(Request $request)
    {
        $alertingCount = $this->getAlertingCount();
        $maintenanceCount = $this->getMaintenanceCount();
        $maintenancePunctuality = $this->calculateMaintenancePunctuality();
        $weeklyDataMainPunc = $this->fetchWeeklyDataMainPunc();
        $monthlyDataMainPunc = $this->fetchMonthlyDataMainPunc();
        
        return view('statistics.mainpunc', compact('alertingCount', 'maintenanceCount', 'maintenancePunctuality', 'weeklyDataMainPunc', 'monthlyDataMainPunc'));
    }

    protected function getAlertingCount()
    {
        return DB::table('notifications')
            ->distinct('notifications.data->trafo_id')
            ->count();
    }

    protected function getMaintenanceCount()
    {
        return Maintenance::count();
    }

    protected function calculateMaintenancePunctuality()
    {
        $resolvedInAWeek = DB::table('notifications')
            ->distinct('notifications.data->trafo_id')
            ->join('maintenances', 'notifications.data->trafo_id', '=', 'maintenances.trafo_id')
            ->whereRaw('DATE(maintenances.maintenance_date) BETWEEN DATE(notifications.created_at) AND DATE_ADD(DATE(notifications.created_at), INTERVAL 7 DAY)')
            ->count();

        $totalResolved = DB::table('notifications')
            ->distinct('notifications.data->trafo_id')
            ->join('maintenances', 'notifications.data->trafo_id', '=', 'maintenances.trafo_id')
            ->whereNotNull('maintenances.maintenance_date')
            ->count();

        return $totalResolved > 0 ? ($resolvedInAWeek / $totalResolved) * 100 : 0;
    }

    protected function fetchWeeklyDataAlerting()
    {
    // Get the current month and year
    $currentMonth = now()->month;
    $currentYear = now()->year;

    // Calculate the number of weeks in the current month
    $weeksInMonth = $this->getWeeksInMonth($currentMonth, $currentYear);

    $daysInMonth = now()->endOfMonth()->day;

    // Initialize an array to store weekly data
    $weeklyDataAlerting = [];

    // Loop through each week in the month
    for ($week = 1; $week <= $weeksInMonth; $week++) {
        // Calculate the start and end dates of the current week
        $startDate = now()->setDate($currentYear, $currentMonth, ($week - 1) * 7 + 1)->startOfDay();
        $endDate = now()->setDate($currentYear, $currentMonth, min($week * 7, $daysInMonth))->endOfDay();
    
        // Query to fetch notifications count for the current week
        $weeklyCount = DB::table('notifications')
        ->selectRaw('COUNT(DISTINCT JSON_UNQUOTE(JSON_EXTRACT(data, "$.trafo_id"))) AS count')
        ->whereBetween('created_at', [$startDate, $endDate])
        ->first()->count;

        // Add data for the current week to the result array
        $weeklyDataAlerting[] = [
            'x' => 'Week ' . $week,
            'y' => $weeklyCount,
        ];

        // dd($startDate, $endDate, $weeklyCount);

    }

    return $weeklyDataAlerting;
        }
    
    protected function fetchMonthlyDataAlerting()
    {
        // Get the current year
        $currentYear = now()->year;
        $monthsInYear = 12;


        // Query to fetch monthly data for the current year
        $monthlyData = DB::table('notifications')
        ->selectRaw('MONTH(created_at) AS month, COUNT(DISTINCT JSON_UNQUOTE(JSON_EXTRACT(data, "$.trafo_id"))) AS count')
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->get()
            ->keyBy('month')
            ->map(function ($item) {
                return $item->count;
            });


            $monthlyDataAlerting = [];
            for ($month = 1; $month <= $monthsInYear; $month++) {
                $monthlyDataAlerting[] = [
                    'x' => date('M', mktime(0, 0, 0, $month, 1)),
                    'y' => $monthlyData->has($month) ? $monthlyData[$month] : 0,
                ];
            }
    
            return $monthlyDataAlerting;
        }

        protected function getWeeksInMonth($month, $year)
        {
            $firstDayOfMonth = strtotime("$year-$month-01");
            $lastDayOfMonth = strtotime(date('Y-m-t', strtotime("$year-$month-01")));
            $weeksInMonth = ceil((date('t', $firstDayOfMonth) + date('N', $firstDayOfMonth) - 1) / 7);
        
            return $weeksInMonth;
        }




    protected function fetchWeeklyDataMaintenance()
        {
            // Get the current month and year
            $currentMonth = now()->month;
            $currentYear = now()->year;

            // Calculate the number of weeks in the current month
            $weeksInMonth = $this->getWeeksInMonth($currentMonth, $currentYear);

            $daysInMonth = now()->endOfMonth()->day;

            // Initialize an array to store weekly data
            $weeklyDataMaintenance = [];

            // Loop through each week in the month
            for ($week = 1; $week <= $weeksInMonth; $week++) {
                // Calculate the start and end dates of the current week
                $startDate = now()->setDate($currentYear, $currentMonth, ($week - 1) * 7 + 1)->startOfDay();
                $endDate = now()->setDate($currentYear, $currentMonth, min($week * 7, $daysInMonth))->endOfDay();
            
                // Query to fetch maintenance count for the current week
                $weeklyCount = DB::table('maintenances')
                ->whereBetween('maintenance_date', [$startDate, $endDate])
                ->count();

                // Add data for the current week to the result array
                $weeklyDataMaintenance[] = [
                    'x' => 'Week ' . $week,
                    'y' => $weeklyCount,
                ];
            }

            return $weeklyDataMaintenance;
        }

        protected function fetchWeeklyDataMainPunc()
        {
            // Get the current month and year
            $currentMonth = now()->month;
            $currentYear = now()->year;

            // Calculate the number of weeks in the current month
            $weeksInMonth = $this->getWeeksInMonth($currentMonth, $currentYear);

            $daysInMonth = now()->endOfMonth()->day;

            // Initialize an array to store weekly data
            $weeklyDataMainPunc = [];

            // Loop through each week in the month
            for ($week = 1; $week <= $weeksInMonth; $week++) {
                // Calculate the start and end dates of the current week
                $startDate = now()->setDate($currentYear, $currentMonth, ($week - 1) * 7 + 1)->startOfDay();
                $endDate = now()->setDate($currentYear, $currentMonth, min($week * 7, $daysInMonth))->endOfDay();
            
                // Query to fetch maintenance punctuality count for the current week
                $resolvedInAWeek = DB::table('notifications')
                    ->distinct('notifications.data->trafo_id') // Ensure distinct notifications
                    ->join('maintenances', 'notifications.data->trafo_id', '=', 'maintenances.trafo_id')
                    ->whereRaw('DATE(maintenances.maintenance_date) BETWEEN DATE(notifications.created_at) AND DATE_ADD(DATE(notifications.created_at), INTERVAL 7 DAY)')
                    ->whereBetween('maintenances.maintenance_date', [$startDate, $endDate])
                    ->count();

                $totalResolved = DB::table('notifications')
                    ->distinct('notifications.data->trafo_id') // Ensure distinct notifications
                    ->join('maintenances', 'notifications.data->trafo_id', '=', 'maintenances.trafo_id')
                    ->whereNotNull('maintenances.maintenance_date')
                    ->count();

                $weeklyCount = $totalResolved > 0 ? ($resolvedInAWeek / $totalResolved) * 100 : 0;

                // Add data for the current week to the result array
                $weeklyDataMainPunc[] = [
                    'x' => 'Week ' . $week,
                    'y' => $weeklyCount,
                ];
            }

            return $weeklyDataMainPunc;
        }

        protected function fetchMonthlyDataMaintenance()
        {
            // Get the current year
            $currentYear = now()->year;
            $monthsInYear = 12;

            // Initialize an array to store monthly data
            $monthlyDataMaintenance = [];

            // Loop through each month in the year
            for ($month = 1; $month <= $monthsInYear; $month++) {
                // Query to fetch maintenance count for the current month
                $monthlyCount = Maintenance::whereYear('maintenance_date', $currentYear)
                    ->whereMonth('maintenance_date', $month)
                    ->count();

                // Add data for the current month to the result array
                $monthlyDataMaintenance[] = [
                    'x' => date('M', mktime(0, 0, 0, $month, 1)),
                    'y' => $monthlyCount,
                ];
            }

            return $monthlyDataMaintenance;
        }

        protected function fetchMonthlyDataMainPunc()
        {
            // Get the current year
            $currentYear = now()->year;
            $monthsInYear = 12;

            // Initialize an array to store monthly data
            $monthlyDataMainPunch = [];

            // Loop through each month in the year
            for ($month = 1; $month <= $monthsInYear; $month++) {
                // Query to fetch maintenance punctuality count for the current month
                $resolvedInMonth = DB::table('notifications')
                    ->distinct('notifications.data->trafo_id') // Ensure distinct notifications
                    ->join('maintenances', 'notifications.data->trafo_id', '=', 'maintenances.trafo_id')
                    ->whereYear('maintenances.maintenance_date', $currentYear)
                    ->whereMonth('maintenances.maintenance_date', $month)
                    ->whereRaw('DATE(maintenances.maintenance_date) BETWEEN DATE(notifications.created_at) AND DATE_ADD(DATE(notifications.created_at), INTERVAL 7 DAY)')
                    ->count();

                $totalResolved = DB::table('notifications')
                    ->distinct('notifications.data->trafo_id') // Ensure distinct notifications
                    ->join('maintenances', 'notifications.data->trafo_id', '=', 'maintenances.trafo_id')
                    ->whereYear('maintenances.maintenance_date', $currentYear)
                    ->whereMonth('maintenances.maintenance_date', $month)
                    ->whereNotNull('maintenances.maintenance_date')
                    ->count();

                $monthlyCount = $totalResolved > 0 ? ($resolvedInMonth / $totalResolved) * 100 : 0;

                // Add data for the current month to the result array
                $monthlyDataMainPunc[] = [
                    'x' => date('M', mktime(0, 0, 0, $month, 1)),
                    'y' => $monthlyCount,
                ];
            }

            return $monthlyDataMainPunc;
        }

            
    }