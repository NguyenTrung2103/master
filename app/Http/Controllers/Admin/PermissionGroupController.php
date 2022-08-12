<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PermissionGroupRequest;
use App\Repositories\Admin\PermissionGroup\PermissionGroupRepositoryInterface as PermissionGroupRepository;
use Illuminate\Support\Facades\Gate;

class PermissionGroupController extends Controller
{
    protected $permissionGroupRepository;

    public function __construct(PermissionGroupRepository $permissionGroupRepository)
    {
        $this->permissionGroupRepository = $permissionGroupRepository;
    }

    public function index()
    {
        Gate::authorize('view-any-permission-group');

        return view('admin.permission-group.index', [
            'permissionGroups' => $this->permissionGroupRepository->paginate(),
        ]);
    }

    public function show($id)
    {
        Gate::authorize('view-PermissionGroup');

        if (! $permissionGroup = $this->permissionGroupRepository->findById($id)) {
            abort(404);
        }

        return view('admin.permission-group.form', [
            'permissionGroup' => $permissionGroup,
        ]);
    }

    public function edit($id)
    {
        Gate::authorize('update-PermissionGroup');
        if (! $permissionGroup = $this->permissionGroupRepository->findById($id)) {
            abort(404);
        }

        return view('admin.permission-group.form', [
            'permissionGroup' => $permissionGroup,
        ]);
    }

    public function update(PermissionGroupRequest $request, $id)
    {
        Gate::authorize('update-PermissionGroup');
        $this->permissionGroupRepository->save($request->validated(), ['id' => $id]);

        return redirect()->route('admin.permission-group.index');
    }

    public function destroy($id)
    {
        Gate::authorize('delete-PermissionGroup');

        return redirect()->route('admin.permission-group.index');
    }

    public function create()
    {
        Gate::authorize('create-PermissionGroup');

        return view('admin.permission-group.form');
    }

    public function store(PermissionGroupRequest $request)
    {
        Gate::authorize('create-PermissionGroup');
        $this->permissionGroupRepository->save($request->validated());

        return redirect()->route('admin.permission-group.index');
    }
}
