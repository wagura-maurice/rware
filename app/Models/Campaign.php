<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campaign extends Model
{
    use HasFactory, LogsActivity;

    const ACTIVE = 1;
    const INACTIVE = 0;

    protected $fillable = [
        'platform_id',
        'title',
        'description',
        'cover',
        'payload',
        '_status'
    ];

    protected $dates = ['created_at'];

    protected static $logName = 'Campaign';
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This Campaign has been {$eventName}";
    }

    public static $createRules = [
        'platform_id' => 'required|integer',
        'title' => 'required|string|unique:campaigns',
        'description' => 'required|string',
        'cover' => 'required|string',
        'payload' => 'required|string'
    ];

    public static $updateRules = [
        'platform_id' => 'nullable|integer',
        'title' => 'nullable|string',
        'description' => 'nullable|string',
        'cover' => 'nullable|string',
        'payload' => 'nullable|string'
    ];

    public static function monthCount($data)
    {
        return Self::whereBetween('created_at', $data)->count();
    }

    public function hits()
    {
        return $this->belongsTo(Hit::class, 'id', 'campaign_id')->withDefault();
    }
}
