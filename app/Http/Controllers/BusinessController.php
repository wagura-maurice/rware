<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use App\Http\Requests\BusinessRequest;
use App\Repositories\BusinessRepository;
use RealRashid\SweetAlert\Facades\Alert;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businesses = new \stdClass;
        $businesses->data = auth()->user()->isAdmin ? Business::with('user')->paginate(15) : Business::where('user_id', auth()->user()->id)->with('user')->paginate(15);
        $businesses->template = (object) [
            'title' => 'Businesses',
            'url' => (object) ['Create New', route('businesses.create')]
        ];

        return view('dashboard.business.index', compact('businesses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $business = new \stdClass;

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
    public function store(BusinessRequest $request, BusinessRepository $repository)
    {
        try {
            // create business
            $repository->create($request->all()) ? Alert::toast(strtoupper($request->name) . ', was successfully created.' ,'success') : Alert::toast(strtoupper($request->name) . ', failed to create. please try again!', 'info');
        } catch (\Throwable $th) {
            Alert::toast($th->getMessage(), 'error');
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
            $title = $business->name;
            // only owner can delete their business
            $business->user_id === auth()->user()->id ? ($business->delete() ? Alert::toast(strtoupper($title) . ', successfully deleted.' ,'success') : Alert::toast(strtoupper($title) . ', failed to delete. please try again!', 'info')) : Alert::toast('only owner can delete their business' ,'warning');
        } catch (\Throwable $th) {
            Alert::toast($th->getMessage(), 'error');
        }

        return redirect(route('businesses.index'));
    }
}
