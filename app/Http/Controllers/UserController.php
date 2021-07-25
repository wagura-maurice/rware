<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Repositories\UserRepository;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = new \stdClass;
        $users->data = User::with('roles')->paginate(15);
        $users->template = (object) [
            'title' => 'System Users',
            'url' => (object) ['Create New', route('users.create')]
        ];

        return view('dashboard.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = new \stdClass;

        $users->template = (object) [
            'title' => 'Enter New System Users',
            'url' => (object) ['Back', url()->previous()]
        ];

        $users->roles = Role::all();

        return view('dashboard.user.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request, UserRepository $repository)
    {
        try {
            // create user
            $repository->create($request->all()) ? Alert::toast(strtoupper($request->name) . ', user successfully created.' ,'success') : Alert::toast(strtoupper($request->name) . ', user failed to create. please try again!', 'info');
        } catch (\Throwable $th) {
            Alert::toast($th->getMessage(), 'error');
        }

        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $title = $user->name;
            // only site administrators can delete this user
            auth()->user()->isAdmin ? ($user->delete() ? Alert::toast(strtoupper($title) . ', user successfully deleted.' ,'success') : Alert::toast(strtoupper($title) . ', user failed to delete. please try again!', 'info')) : Alert::toast('only site administrators can delete this user' ,'warning');
        } catch (\Throwable $th) {
            Alert::toast($th->getMessage(), 'error');
        }

        return redirect(route('users.index'));
    }
}
