<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Business;
use App\Models\Application;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\CertificationCategory;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ApplicationRequest;
use Illuminate\Support\Facades\Validator;
use App\Repositories\ApplicationRepository;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = new \stdClass;
        $applications->data = auth()->user()->isAdmin ? Application::with(['category.type', 'business', 'user'])->paginate(15) : Application::where('user_id', auth()->user()->id)->with(['category.type', 'business', 'user'])->paginate(15);
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
        try {
            $serial = $application->uniqueID;

            $application->delete() ? Alert::toast(strtoupper($serial) . ', successfully deleted.' ,'success') : Alert::toast(strtoupper($serial) . ', failed to delete. please try again!', 'info');
        } catch (\Throwable $th) {
            Alert::toast($th->getMessage(), 'error');
        }

        return redirect(route('applications.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function applyCreate(CertificationCategory $category)
    {
        $application = new \stdClass;
        $application->category = $category;
        $application->businesses = auth()->user()->isAdmin ? Business::all() : Business::where('user_id', auth()->user()->id)->get();
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
    public function applyStore(Request $request, ApplicationRepository $repository)
    {
        $request['category']     = CertificationCategory::findOrFail($request->category_id)->toArray();
        $request['uniqueID']     = Str::uuid();
        $request['user_id']      = auth()->user()->id;
        $request['total_amount'] = $request['category']['price'] * ceil($request->footage);

        try {

            $data = (new ApplicationRequest($request->all()))->query->all(); // Fetch Validated data only

            if ($data) { // i.e if validation passes
                // create application
                $repository->create($data) ? Alert::toast(strtoupper($request->uniqueID) . ', was successfully created.' ,'success') : Alert::toast(strtoupper($request->uniqueID) . ', failed to create. please try again!', 'info');
            } else {
                Alert::toast('input data validation failed, please try again!', 'warning');
            }
        } catch (\Throwable $th) {
            Alert::toast($th->getMessage(), 'error');
        }

        return redirect(route('applications.index'));
    }

    public function applyPayment(Application $application)
    {
        $application->template = (object) [
            'title' => 'Enter Certification ' . strtoupper($application->uniqueID) . ' Payment Details',
            'url' => (object) ['Back', url()->previous()]
        ];

        return view('dashboard.application.applyPayment', compact('application'));
    }

    public function applyProcessPayment(Request $request)
    {
        $validation = Validator::make($request->all(), Application::$paymentRules);

        try {
            if (!$validation->fails()) { // i.e if validation passes
                // get application
                $application = Application::where('uniqueID', $request->account_number)->with('category')->first();
                // scope application updates
                $application->paid_amount     = (int) preg_replace("/[^0-9\.]/", "", $request->amount);
                $application->expiration_date = Carbon::now()->addMonths($application->category->period)->toDateString();
                $application->_status         = Application::APPROVED;
                // update application
                $application->save() ? Alert::toast(strtoupper($application->uniqueID) . ', payment successfully.' ,'success') : Alert::toast(strtoupper($application->uniqueID) . ', payment failed. please try again!', 'info');
            } else {
                Alert::toast('input data validation failed, please try again!', 'warning');
            }
        } catch (\Throwable $th) {
            Alert::toast($th->getMessage(), 'error');
        }

        return redirect(route('applications.index'));
    }

    public function applyPrint(Application $application)
    {
        $application->user     = User::find($application->user_id);
        $application->business = Business::find($application->business_id);
        $application->category = CertificationCategory::find($application->category_id);

        try {
            $fileName = strtoupper(config('app.name') . ' Certificate ' . $application->uniqueID);
            $pdf      = PDF::loadView('dashboard.application.applyPrint', compact('application'));
            
            return $pdf->download($fileName . '.pdf');
        } catch (\Throwable $th) {
            Alert::toast($th->getMessage(), 'error');
        }
    }
}
