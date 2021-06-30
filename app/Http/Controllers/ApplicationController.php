<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\Business;
use App\Models\Application;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\CertificationCategory;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = new stdClass;
        $applications->data = Application::with(['category.type', 'business'])->paginate(15);
        $applications->template = (object) [
            'title' => 'Certification Applications',
            'url' => (object) ['Categories', route('categories.index')]
        ];

        return view('dashboard.application.index', compact('applications'));
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
        $category = CertificationCategory::findOrFail($request->category_id);

        $request['uniqueID']        = explode('-', Str::uuid())[0];
        $request['user_id']         = auth()->user()->id;
        $request['total_amount']    = $category->price * ceil($request->footage);
        $request['expiration_date'] = Carbon::now()->addMonths($category->period)->toDateString();

        $validation = Validator::make($request->all(), Application::$createRules);

        try {
            if (!$validation->fails()) { // i.e if validation passes
                // create application
                Application::create($request->only('uniqueID', 'user_id', 'business_id', 'category_id', 'total_amount', 'expiration_date', 'description',)) ? connectify('success', 'Application ⚡️', ucwords($request->name) . ', Successfully Created') : connectify('error', 'Application ⚡️', ucwords($request->name) . ', Not Created. Please Try Again.');
            } else {
                connectify('error', 'Application ⚡️', 'Validation Not Passed!!, Please Try Again!');
                return back()->withErrors($validation)->withInput();
            }
        } catch (\Exception $e) {
            connectify('error', 'Application ⚡️', $e->getMessage());
        }

        return redirect(route('applications.index'));
    }
}
