<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PermissionGroupRequest;
use App\Repositories\Admin\PermissionGroup\PermissionGroupRepositoryInterface as PermissionGroupRepository;

class PermissionGroupController extends Controller
{
    protected $permissionGroupRepository;

    public function __construct(PermissionGroupRepository $permissionGroupRepository)
    {
        $this->permissionGroupRepository = $permissionGroupRepository;
    }

    public function index()
    {
        return view('admin.permission-group.index', [
            'permissionGroups' => $this->permissionGroupRepository->paginate(),
        ]);
    }

    public function show($id)
    {
        if (! $permissionGroup = $this->permissionGroupRepository->findById($id)) {
            abort(404);
        }

        return view('admin.permission-group.form', [
            'permissionGroup' => $permissionGroup,
        ]);
    }

    public function edit($id)
    {
        if (! $permissionGroup = $this->permissionGroupRepository->findById($id)) {
            abort(404);
        }

        return view('admin.permission-group.form', [
            'permissionGroup' => $permissionGroup,
        ]);
    }

    public function update(PermissionGroupRequest $request, $id)
    {
        $this->permissionGroupRepository->save($request->validated(), ['id' => $id]);

        return redirect()->route('admin.permission-group.index');
    }

    public function destroy($id)
    {
        $this->permissionGroupRepository->deleteById($id);

        return redirect()->route('admin.permission-group.index');
    }

    public function create()
    {
        return view('admin.permission-group.form');
    }

    public function store(PermissionGroupRequest $request)
    {
        $this->permissionGroupRepository->save($request->validated());

        return redirect()->route('admin.permission-group.index');
    }
}
