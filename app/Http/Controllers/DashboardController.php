<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * Display a dashboard resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('rtyryt');

        return view('dashboard.index');
    }
}
