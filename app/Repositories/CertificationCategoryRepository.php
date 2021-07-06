<?php

namespace App\Repositories;

use App\Models\CertificationCategory;

class CertificationCategoryRepository 
{
    /**
     * create resource in the databases.
     *
     * @param  Object  $request
     * @return App\Models\CertificationCategory
     */
    public function create($request)
    {
        // scope the entry
        $category                        = new CertificationCategory();
        $category->certification_type_id = $request['certification_type_id'];
        $category->name                  = $request['name'];
        $category->price                 = $request['price'];
        $category->period                = $request['period'];
        $category->description           = $request['description'];
        // make entry insertion
        $category->save();
        // return entry
        return $category;
    }
}