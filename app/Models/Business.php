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

    public static $createRules = [
        'user_id'     => 'required|integer',
        'name'        => 'required|string',
        'description' => 'nullable|string'
    ];

    public static $updateRules = [
        'user_id'     => 'nullable|integer',
        'name'        => 'nullable|string',
        'description' => 'nullable|string'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }
}
