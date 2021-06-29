<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hit extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'campaign_id',
        'ip_address',
        'user_agent'
    ];

    protected static $logName = 'Hit';
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This Hit has been {$eventName}";
    }

    public static $createRules = [
        'campaign_id' => 'required|integer',
        'ip_address' => 'required|string',
        'user_agent' => 'required|string'
    ];

    public static $updateRules = [
        'campaign_id' => 'nullable|integer',
        'ip_address' => 'nullable|string',
        'user_agent' => 'nullable|string'
    ];

    public static function hitCount(Int $id)
    {
        return Self::where(['campaign_id' => $id])->count();
    }

    public static function monthCount($data)
    {
        return Self::whereBetween('created_at', $data)->count();
    }
}
