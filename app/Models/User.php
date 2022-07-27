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

    public function messages()
    {
        return $this->hasMany(Messages::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
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
}
