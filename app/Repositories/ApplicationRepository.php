<?php

namespace App\Repositories;

use App\Models\Application;

class ApplicationRepository 
{
    /**
     * create resource in the databases.
     *
     * @param  Object  $request
     * @return App\Models\Application
     */
    public function create($request)
    {
        // scope the entry
        $application                  = new Application();
        $application->uniqueID        = $request['uniqueID'];
        $application->user_id         = $request['user_id'];
        $application->business_id     = $request['business_id'];
        $application->category_id     = $request['category']['id'];
        $application->total_amount    = $request['total_amount'];
        $application->description     = $request['description'];
        // make entry insertion
        $application->save();
        // return entry
        return $application;
    }
}