<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory, LogsActivity;

    const ACTIVE = 1;
    const INACTIVE = 0;

    protected $fillable = [
        'name',
        'description',
        '_status'
    ];

    protected static $logName = 'Permissions';
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This Permission has been {$eventName}";
    }

    public static $createRules = [
        'name' => 'required|string|unique:permissions',
        'description' => 'nullable|string'
    ];

    public static $updateRules = [
        'name' => 'nullable|string',
        'description' => 'nullable|string'
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role')->withTimestamps();
    }
}
