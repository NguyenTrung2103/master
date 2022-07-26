<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    public function permissionGroup()
    {
        return $this->belongsTo(PermissionGroup::class);
    }

    public function rolesPermissions()
    {
        return $this->belongsToMany(RolesPermission::class);
    }
}
