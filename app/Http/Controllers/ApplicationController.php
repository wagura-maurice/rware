<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Business;
use App\Models\CertificationCategory;
use Illuminate\Http\Request;
use stdClass;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $applications = Application::paginate(15);

        foreach ($campaigns as $campaign) {
            $campaign->hits = Hit::hitCount($campaign->id);
        }

        return view('dashboard.applications.index', compact('applications')); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function applyCreate(CertificationCategory $category)
    {
        $application = new stdClass;
        $application->category = $category;
        $application->businesses = Business::all();
        $application->template = (object) [
            'title' => 'Enter New ' . strtoupper($category->name) . ' Certification Application Details',
            'url' => (object) ['Back', url()->previous()]
        ];

        return view('dashboard.application.applyCreate', compact('application'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function applyStore(Request $request)
    {
        dd($request->all());
    }
}
