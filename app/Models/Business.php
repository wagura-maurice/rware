<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    const ACTIVE   = 'active';
    const INACTIVE = 'inactive';

    protected $fillable = [
        'user_id',
        'name',
        'description',
        '_status'
    ];

    public function categories()
    {
        return $this->belongsToMany(CertificationCategory::class)->withDefault();
    }
}
