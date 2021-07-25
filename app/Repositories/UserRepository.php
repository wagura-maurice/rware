<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class UserRepository 
{
    /**
     * create resource in the databases.
     *
     * @param  Object  $request
     * @return App\Models\User
     */
    public function create($request)
    {        
        // scope the entry.
        $user             = new User();
        $user->name       = $request['name'];
        $user->email      = $request['email'];
        $user->password   = Hash::make('password');

        // make entry insertion.
        $user->save();

        // assign user to role.
        $user->assignRole($request['role']);

        // send email verification.
        event(new Registered($user));

        // return entry.
        return $user;
    }
}