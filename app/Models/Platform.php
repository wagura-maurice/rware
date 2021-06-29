<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Platform extends Model
{
    use HasFactory, LogsActivity;

    const ACTIVE = 1;
    const INACTIVE = 0;

    protected $fillable = [
        'name',
        'endpoint',
        'description',
        '_status'
    ];

    protected static $logName = 'Platform';
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This Platform has been {$eventName}";
    }

    public static $createRules = [
        'name' => 'required|string',
        'endpoint' => 'nullable|string',
        'description' => 'nullable|string'
    ];

    public static $updateRules = [
        'name' => 'nullable|string',
        'endpoint' => 'nullable|string',
        'description' => 'nullable|string'
    ];
}
