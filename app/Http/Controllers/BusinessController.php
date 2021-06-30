<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->is_admin) {
            echo 'true';
        }

        /* $businesses = new stdClass;
        // $businesses->data = ? Business::paginate(15) : Business::where('user_id', auth()->user()->id)->paginate(15);
        $businesses->template = (object) [
            'title' => 'Businesses',
            'url' => (object) ['Create New', route('businesses.create')]
        ];

        foreach ($businesses->data as $data) {
            $data->total = 0;
        }

        return view('dashboard.business.index', compact('businesses')); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $business = new stdClass;

        $business->template = (object) [
            'title' => 'Enter New Business Details',
            'url' => (object) ['Back', url()->previous()]
        ];

        return view('dashboard.business.create', compact('business'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['user_id'] = auth()->user()->id;
        $validation = Validator::make($request->all(), Business::$createRules);

        try {
            if (!$validation->fails()) { // i.e if validation passes
                // create business
                Business::create($request->only('user_id', 'name', 'description')) ? connectify('success', 'Business ⚡️', ucwords($request->name) . ', Successfully Created') : connectify('error', 'Business ⚡️', ucwords($request->name) . ', Not Created. Please Try Again.');
            } else {
                connectify('error', 'Business ⚡️', 'Validation Not Passed!!, Please Try Again!');
                return back()->withErrors($validation)->withInput();
            }
        } catch (\Exception $e) {
            connectify('error', 'Business ⚡️', $e->getMessage());
        }

        return redirect(route('businesses.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        try {
            $name = $business->name;
            $business->user_id === auth()->user()->id ? ($business->delete() ? connectify('success', 'Business ⚡️', ucwords($name) . ', Successfully Deleted') : connectify('error', 'Business ⚡️', ucwords($name) . ', Not Deleted. Please Try Again.')) : abort(403);
        } catch (\Exception $e) {
            connectify('error', 'Business ⚡️', $e->getMessage());
        }

        return redirect(route('businesses.index'));
    }
}
