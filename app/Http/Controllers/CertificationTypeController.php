<?php

namespace App\Http\Controllers;

use App\Models\CertificationType;
use Illuminate\Http\Request;

class CertificationTypeController extends Controller
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
     * @param  \App\Models\CertificationType  $certificationType
     * @return \Illuminate\Http\Response
     */
    public function show(CertificationType $certificationType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CertificationType  $certificationType
     * @return \Illuminate\Http\Response
     */
    public function edit(CertificationType $certificationType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CertificationType  $certificationType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CertificationType $certificationType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CertificationType  $certificationType
     * @return \Illuminate\Http\Response
     */
    public function destroy(CertificationType $certificationType)
    {
        //
    }
}
