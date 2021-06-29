<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Hit;
use App\Models\Campaign;
use App\Models\Platform;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a dashboard resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $start = Carbon::now()->subMonth(6)->format('m/Y'); // should be 6 months ago
        $end =  Carbon::now()->addMonth(6)->format('m/Y'); // should be 6 months from now

        foreach (Self::listMonthsAndYears($start, $end) as $key => $month) {
            $chartData[] = [
                'month' => $month['name'],
                'count' => number_format(Campaign::monthCount([$month['start_date'], $month['end_date']])),
                'hits' => number_format(Hit::monthCount([$month['start_date'], $month['end_date']]))
            ];
        }
        
        $data = (object) [
            'total_campaigns' => Campaign::count(),
            'total_youtube_campaigns' => Campaign::where(['platform_id' => Platform::whereName('youtube')->first()->id])->count(),
            'total_skiza_campaigns' => Campaign::where(['platform_id' => Platform::whereName('skiza')->first()->id])->count(),
            'total_hits' => Hit::count(),
            'campaignsChart' => (object) [
                'chartData' => json_encode(array_column($chartData, 'count')),
                'labels' => json_encode(array_column($chartData, 'month'))
            ],
            'hitsChart' => (object) [
                'chartData' => json_encode(array_column($chartData, 'hits')),
                'labels' => json_encode(array_column($chartData, 'month'))
            ]
        ];

        return view('dashboard', compact('data'));
    }

    /**
     * Takes start and end date string in format 'mm/yyyy' along with a $months and $years
     * arrays; modifies the arrays in place to add all months and years between the dates
     */
    public function listMonthsAndYears($startDate, $endDate) {
        $d1 = strtotime(explode('/', $startDate)[1] . '-' . explode('/', $startDate)[0] . '-01');
        $d2 = strtotime(explode('/', $endDate)[1] . '-' . explode('/', $endDate)[0] . '-01');
        $min_date = min($d1, $d2);
        $max_date = max($d1, $d2);

        $months = [];
        // $years = [];
        while (($min_date = strtotime("+1 MONTH", $min_date)) <= $max_date) {
            // $months[] = date('M Y', $min_date);
            // $years[] = date('Y', $min_date);
            $months[] = [
                'name' => date('M', $min_date),
                'start_date' => date('Y-m-01 H:i:s', strtotime(date('M Y', $min_date))),
                'end_date' => date('Y-m-t H:i:s', strtotime(date('M Y', $min_date)))
            ];
        }

        // array_splice arguments: array to modify, offset (where to insert), 
        // number of elements to remove, array of elements to add
        // array_splice($months, 0, 0, [date("M Y", $d1)] );
        return $months;
        // print_r($years);
    }
}
