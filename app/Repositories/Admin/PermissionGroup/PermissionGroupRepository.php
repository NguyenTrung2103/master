<?php

namespace App\Repositories\Admin\PermissionGroup;

use App\Models\PermissionGroup;
use App\Repositories\BaseRepository;

class PermissionGroupRepository extends BaseRepository implements PermissionGroupRepositoryInterface
{
    public function __construct(PermissionGroup $model)
    {
        $this->model = $model;
    }
    // public function getPermissionGrop()
    // {
    //     return $this->model->take(5)->get();
    // }
}