<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use AuthenticableTrait;
    use Notifiable;

    const TYPES = [
        'admin' => 1,
        'student' => 2,
    ];

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'address',
        'phone',
        'school_id',
        'type',
        'parent_id',
        'verified_at',
        'closed',
        'code',
        'social_type',
        'social_id',
        'social_name',
        'social_nickname',
        'social_avatar',
        'description',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function tags()
    {
        return $this->morphedByMany(Tag::class);
    }

    public function hasPermission(Permission $permission)
    {
        return $this->hasRoles($permission->roles);
    }

    public function hasRoles($roles)
    {
        if (is_array($roles) || is_object($roles)) {
            return $roles->intersect($this->roles)->count();
        }

        return $this->roles->contains('name', $roles);
    }

    public function messages()
    {
        return $this->hasMany(Messages::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    public function hasVerifiedEmail()
    {
        return ! is_null($this->verified_at);
    }

    public function markEmailAsVerified()
    {
        return $this->forceFill([
            'verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    public function isAdmin()
    {
        return $this->type == self::TYPES['admin'];
    }

    public function isStudent()
    {
        return $this->type == self::TYPES['student'];
    }

    public function customer()
    {
        return $this->belongsToMany(Customer::class, 'user_id');
    }
}
