<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'key',
        'permission_group_id',
    ];

    public function permissionGroup()
    {
        return $this->belongsTo(PermissionGroup::class, 'id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
