<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory, LogsActivity;

    const ACTIVE = 1;
    const INACTIVE = 0;

    protected $fillable = [
        'name',
        'description',
        '_status'
    ];

    protected static $logName = 'Roles';
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This Role has been {$eventName}";
    }

    public static $createRules = [
        'name' => 'required|string|unique:roles',
        'description' => 'nullable|string'
    ];

    public static $updateRules = [
        'name' => 'nullable|string',
        'description' => 'nullable|string'
    ];

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission')->withTimestamps();
    }

    public function allowTo($permission)
    {
        if (is_string($permission)) {
            $permission = Permission::whereName($permission)->firstOrFail();
        }

        return $this->permissions()->sync($permission, false);
    }

    public function disallowTo($permission)
    {
        return $this->permissions()->detach($permission);
    }
}
