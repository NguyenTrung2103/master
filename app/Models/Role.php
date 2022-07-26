<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function rolesPermissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function usersRoles()
    {
        return $this->belongsToMany(User::class)->using(UsersRole::class);
    }
}
