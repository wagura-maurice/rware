<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CertificationCategory;

class CertificationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns = Campaign::paginate(15); // Campaign::with('hits')->paginate(15);

        foreach ($campaigns as $campaign) {
            $campaign->hits = Hit::hitCount($campaign->id);
        }

        return view('campaign.index', compact('campaigns'));
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
     * @param  \App\Models\CertificationCategory  $certificationCategory
     * @return \Illuminate\Http\Response
     */
    public function show(CertificationCategory $certificationCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CertificationCategory  $certificationCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(CertificationCategory $certificationCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CertificationCategory  $certificationCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CertificationCategory $certificationCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CertificationCategory  $certificationCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CertificationCategory $certificationCategory)
    {
        //
    }
}
