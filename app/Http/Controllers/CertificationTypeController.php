<?php

namespace App\Http\Controllers;

use stdClass;
use Illuminate\Http\Request;
use App\Models\CertificationType;
use Illuminate\Support\Facades\Validator;

class CertificationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = new stdClass;
        $types->data = CertificationType::paginate(15);
        $types->template = (object) [
            'title' => 'Certification Types',
            'url' => (object) ['Create New', route('types.create')]
        ];

        foreach ($types->data as $data) {
            $data->total = 0;
        }

        return view('dashboard.certification.type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = new stdClass;

        $types->template = (object) [
            'title' => 'Enter New Certification Type Details',
            'url' => (object) ['Back', url()->previous()]
        ];

        return view('dashboard.certification.type.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), CertificationType::$createRules);

        try {
            if (!$validation->fails()) { // i.e if validation passes
                // create type
                CertificationType::create($request->only('name', 'description')) ? connectify('success', 'Certification Type ⚡️', ucwords($request->title) . ', Successfully Created') : connectify('error', 'Certification Type ⚡️', ucwords($request->title) . ', Not Created. Please Try Again.');
            } else {
                connectify('error', 'Certification Type ⚡️', 'Validation Not Passed!!, Please Try Again!');
                return back()->withErrors($validation)->withInput();
            }
        } catch (\Exception $e) {
            connectify('error', 'Certification Type ⚡️', $e->getMessage());
        }

        return redirect(route('types.index'));
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
        $name = $certificationType->name;

        try {
            $certificationType->delete() ? connectify('success', 'Certification Types ⚡️', ucwords($name) . ', Successfully Deleted') : connectify('error', 'Certification Types ⚡️', ucwords($name) . ', Not Deleted. Please Try Again.');
        } catch (\Exception $e) {
            connectify('error', 'Certification Types ⚡️', $e->getMessage());
        }

        return redirect(route('types.index'));
    }
}
