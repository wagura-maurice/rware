<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CertificationType;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\CertificationTypeRequest;
use App\Repositories\CertificationTypeRepository;

class CertificationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = new \stdClass;
        $types->data = CertificationType::paginate(15);
        $types->template = (object) [
            'title' => 'Certification Types',
            'url' => (object) ['Create New', route('types.create')]
        ];

        return view('dashboard.certification.type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = new \stdClass;

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
    public function store(CertificationTypeRequest $request, CertificationTypeRepository $repository)
    {
        try {
            // create certificate type
            $repository->create($request->all()) ? Alert::toast(strtoupper($request->name) . ', certificate type successfully created.' ,'success') : Alert::toast(strtoupper($request->name) . ', certificate type failed to create. please try again!', 'info');
        } catch (\Throwable $th) {
            Alert::toast($th->getMessage(), 'error');
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
    public function destroy(CertificationType $type)
    {
        try {
            $title = $type->name;
            // only site administrators can delete this certificate type
            auth()->user()->isAdmin ? ($type->delete() ? Alert::toast(strtoupper($title) . ', certificate type successfully deleted.' ,'success') : Alert::toast(strtoupper($title) . ', certificate type failed to delete. please try again!', 'info')) : Alert::toast('only site administrators can delete this certificate type' ,'warning');
        } catch (\Throwable $th) {
            Alert::toast($th->getMessage(), 'error');
        }

        return redirect(route('types.index'));
    }
}
