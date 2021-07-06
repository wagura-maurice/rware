<?php

namespace App\Repositories;

use App\Models\Business;

class BusinessRepository 
{
    /**
     * create resource in the databases.
     *
     * @param  Object  $request
     * @return App\Models\Business
     */
    public function create($request)
    {
        // scope the entry
        $business              = new Business();
        $business->user_id     = $request['user_id'];
        $business->name        = $request['name'];
        $business->description = $request['description'];
        // make entry insertion
        $business->save();
        // return entry
        return $business;
    }
}