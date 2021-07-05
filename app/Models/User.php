<?php

namespace App\Models;

use App\Models\Role;
use App\Traits\HasGravatar;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasGravatar, LogsActivity;

    const PENDING = 'pending';
    const ACTIVE = 'active';
    const INACTIVE = 'inactive';

    // Model Events Logging configurations
    protected static $logName = 'Users';
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This User has been {$eventName}";
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'phone_number',
        'password',
        '_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes to be appended on each retrieval.
     *
     * @var array
     */
    protected $appends = [
        'isAdmin',
        'isTenant'
    ];

    public static $createRules = [
        'name' => 'nullable|string',
        'email' => 'nullable|email|unique:users',
        'email_verified_at' => 'nullable|string',
        'phone_number' => 'required|string|unique:users',
        'password' => 'nullable|string|confirmed',
        'role' => 'required|string'
    ];

    public static $updateRules = [
        'name' => 'nullable|string',
        'email' => 'nullable|email',
        'email_verified_at' => 'nullable|string',
        'phone_number' => 'nullable|string',
        'password' => 'nullable|string|confirmed',
        'role' => 'nullable|string'
    ];

    public function getIsAdminAttribute() {
        return auth()->user()->roles->contains('name', 'admin');
    }

    public function getIsTenantAttribute() {
        return auth()->user()->roles->contains('name', 'tenant');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role')->withTimestamps();
    }

    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::whereName($role)->firstOrFail();
            // $role = Role::whereName($role)->firstOrCreate(['name' => $role]);
        }

        return $this->roles()->sync($role, false);
        // return $this->roles()->syncWithoutDetaching($role);
    }

    public function unassignRole($role)
    {
        return $this->roles()->detach($role);
    }

    public function permissions()
    {
        return $this->roles->map->permissions->flatten()->pluck('description')->unique();
    }
}
