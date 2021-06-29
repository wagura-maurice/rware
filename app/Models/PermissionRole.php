<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PermissionRole extends Model
{
    use HasFactory, LogsActivity;

    const ACTIVE   = 1;
    const INACTIVE = 0;

    protected $table = 'permission_role';

    protected $primaryKey = 'permission_id';

    protected $fillable = [
        'role_id',
        'permission_id',
        '_status'
    ];

    protected static $logName = 'Permission Roles';
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This Permission Role has been {$eventName}";
    }

    public static $createRules = [
        'role_id' => 'required|integer',
        'permission_id' => 'required|integer'
    ];

    public static $updateRules = [
        'role_id' => 'nullable|integer',
        'permission_id' => 'nullable|integer'
    ];
}
