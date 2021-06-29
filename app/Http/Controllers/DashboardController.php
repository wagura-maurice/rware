<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Business;
use App\Models\CertificationCategory;
use App\Models\CertificationType;
use stdClass;

class DashboardController extends Controller
{
    /**
     * Display a dashboard resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = new stdClass;

        $data->total = (Object) [
            'certification_types' => CertificationType::count(),
            'certification_categories' => CertificationCategory::count(),
            'certified_applications' => Application::count(),
            'businesses' => Business::count()
        ];

        return view('dashboard.index', compact('data'));
    }
}
