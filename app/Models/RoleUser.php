<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoleUser extends Model
{
    use HasFactory, LogsActivity;

    const ACTIVE   = 1;
    const INACTIVE = 0;

    protected $table = 'role_user';

    protected $primaryKey = 'role_id';

    protected $fillable = [
        'user_id',
        'role_id',
        '_status'
    ];

    protected static $logName = 'Role Users';
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This Role User has been {$eventName}";
    }

    public static $createRules = [
        'user_id' => 'required|integer',
        'role_id' => 'required|integer'
    ];

    public static $updateRules = [
        'user_id' => 'nullable|integer',
        'role_id' => 'nullable|integer'
    ];
}
