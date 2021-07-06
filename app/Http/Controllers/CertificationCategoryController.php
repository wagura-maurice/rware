<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CertificationType;
use App\Models\CertificationCategory;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\CertificationCategoryRequest;
use App\Repositories\CertificationCategoryRepository;

class CertificationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = new \stdClass;
        $categories->data = CertificationCategory::with('type')->paginate(15);
        $categories->template = (object) [
            'title' => 'Certification categories',
            'url' => (object) ['Create New', route('categories.create')]
        ];

        return view('dashboard.certification.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = new \stdClass;

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
    public function store(CertificationCategoryRequest $request, CertificationCategoryRepository $repository)
    {
        try {
            // create certificate category
            $repository->create($request->all()) ? Alert::toast(strtoupper($request->name) . ', certificate category successfully created.' ,'success') : Alert::toast(strtoupper($request->name) . ', certificate category failed to create. please try again!', 'info');
        } catch (\Throwable $th) {
            Alert::toast($th->getMessage(), 'error');
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
    public function destroy(CertificationCategory $category)
    {
        try {
            $title = $category->name;
            // only site administrators can delete this certificate category
            auth()->user()->isAdmin ? ($category->delete() ? Alert::toast(strtoupper($title) . ', certificate category successfully deleted.' ,'success') : Alert::toast(strtoupper($title) . ', certificate category failed to delete. please try again!', 'info')) : Alert::toast('only site administrators can delete this certificate category' ,'warning');
        } catch (\Throwable $th) {
            Alert::toast($th->getMessage(), 'error');
        }

        return redirect(route('categories.index'));
    }
}
