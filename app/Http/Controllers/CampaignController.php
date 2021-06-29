<?php

namespace App\Http\Controllers;

use App\Models\Hit;
use App\Models\Campaign;
use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CampaignController extends Controller
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
        $platforms = Platform::all();

        return view('campaign.create', compact('platforms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'campaign_cover_image_file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $request['cover'] = time() . '.' . $request->campaign_cover_image_file->extension();

        $request->campaign_cover_image_file->storeAs('public/uploads/images/campaigns', $request['cover']);

        $validation = Validator::make($request->all(), Campaign::$createRules);

        try {
            if (!$validation->fails()) { // i.e if validation passes
                // create campaign
                Campaign::create($request->only('platform_id', 'title', 'description', 'cover', 'payload')) ? connectify('success', 'Campaign ⚡️', ucwords($request->title) . ', Successfully Created') : connectify('error', 'Campaign ⚡️', ucwords($request->title) . ', Not Created. Please Try Again.');
            } else {
                connectify('error', 'Campaign ⚡️', 'Validation Not Passed!!, Please Try Again!');
                return back()->withErrors($validation)->withInput();
            }
        } catch (\Exception $e) {
            connectify('error', 'Campaign ⚡️', $e->getMessage());
        }

        return redirect(route('campaign.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campaign $campaign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        $title = $campaign->title;

        // remove campaign hits from db
        foreach (Hit::where(['campaign_id' => $campaign->id])->get() as $hit) {
            $hit->delete();
        }

        // remove campaign cover file from server
        if (Storage::exists('public/uploads/images/campaigns/' . $campaign->cover)) {
            Storage::delete('public/uploads/images/campaigns/' . $campaign->cover);
        /*
            Delete Multiple File like this way
            Storage::delete(['upload/test.png', 'upload/test2.png']);
        */
        } /* else {
            dd('File does not exists.');
        } */

        try {
            $campaign->delete() ? connectify('success', 'Campaign ⚡️', ucwords($title) . ', Successfully Deleted') : connectify('error', 'Campaign ⚡️', ucwords($title) . ', Not Deleted. Please Try Again.');
        } catch (\Exception $e) {
            connectify('error', 'Campaign ⚡️', $e->getMessage());
        }

        return redirect(route('campaign.index'));
    }

    /**
     * preview the specified campaign resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function preview($id)
    {
        $campaign = Campaign::findOrFail(trim($id));

        Hit::create([
            'campaign_id' => $campaign->id,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent()
        ]);

        return view('campaign.preview', compact('campaign'));
    }
}
