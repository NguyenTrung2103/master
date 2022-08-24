<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'mkh',
        'age',
        'address',
        'note',
        'phone',
        'cmnd',
        'bank',
        'role_id',
        'sex',
        'birthday',
        'user_id',
    ];

    public function roles()
    {
        return $this->hasMany(Role::class, 'id', 'role_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public function phonezalo()
    {
        return $this->hasMany(Phonezalo::class, 'customer_id');
    }
}
