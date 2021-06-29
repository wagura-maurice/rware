<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory, LogsActivity;

    const ACTIVE   = 1;
    const INACTIVE = 0;

    protected $fillable = [
        'name',
        'value',
        '_status'
    ];

    protected static $logName = 'Settings';
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This Setting has been {$eventName}";
    }

    public static $createRules = [
        'name' => 'required|string',
        'value' => 'nullable|string'
    ];

    public static $updateRules = [
        'name' => 'nullable|string',
        'value' => 'nullable|string'
    ];

    public static function getSetting($name)
    {
        return Self::whereName($name)->first()->value;
    }
}
