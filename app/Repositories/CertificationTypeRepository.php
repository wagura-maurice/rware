<?php

namespace App\Repositories;

use App\Models\CertificationType;

class CertificationTypeRepository 
{
    /**
     * create resource in the databases.
     *
     * @param  Object  $request
     * @return App\Models\CertificationType
     */
    public function create($request)
    {
        // scope the entry
        $type              = new CertificationType();
        $type->name        = $request['name'];
        $type->description = $request['description'];
        // make entry insertion
        $type->save();
        // return entry
        return $type;
    }
}