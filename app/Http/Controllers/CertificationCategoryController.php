<?php

namespace App\Http\Controllers;

use stdClass;
use Illuminate\Http\Request;
use App\Models\CertificationCategory;
use App\Models\CertificationType;
use Illuminate\Support\Facades\Validator;

class CertificationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = new stdClass;
        $categories->data = CertificationCategory::paginate(15);
        $categories->template = (object) [
            'title' => 'Certification categories',
            'url' => (object) ['Create New', route('categories.create')]
        ];

        foreach ($categories->data as $data) {
            $data->total = 0;
        }

        return view('dashboard.certification.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = new stdClass;

        $categories->template = (object) [
            'title' => 'Enter New Certification Category Details',
            'url' => (object) ['Back', url()->previous()]
        ];

        $categories->types = CertificationType::where(['_status' => CertificationType::ACTIVE])->get();

        return view('dashboard.certification.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), CertificationCategory::$createRules);

        try {
            if (!$validation->fails()) { // i.e if validation passes
                // create category
                CertificationCategory::create($request->only('certification_type_id', 'name', 'price', 'period', 'description')) ? connectify('success', 'Certification Category ⚡️', ucwords($request->title) . ', Successfully Created') : connectify('error', 'Certification Category ⚡️', ucwords($request->title) . ', Not Created. Please Try Again.');
            } else {
                connectify('error', 'Certification Category ⚡️', 'Validation Not Passed!!, Please Try Again!');
                return back()->withErrors($validation)->withInput();
            }
        } catch (\Exception $e) {
            connectify('error', 'Certification Category ⚡️', $e->getMessage());
        }

        return redirect(route('categories.index'));
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
        $name = $certificationCategory->name;

        try {
            $certificationCategory->delete() ? connectify('success', 'Certification Category ⚡️', ucwords($name) . ', Successfully Deleted') : connectify('error', 'Certification Category ⚡️', ucwords($name) . ', Not Deleted. Please Try Again.');
        } catch (\Exception $e) {
            connectify('error', 'Certification Category ⚡️', $e->getMessage());
        }

        return redirect(route('categories.index'));
    }
}
