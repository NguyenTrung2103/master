<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PermissionGroupRequests;
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
        
        $permissionGroup = $this->permissionGroupRepository->findById($id);
        return view('admin.permission-group.show', [
            'permissionGroup' => $permissionGroup,
        ]);
    }

    public function edit($id)
    {
        $permissionGroup = $this->permissionGroupRepository->findById($id);
        return view('admin.permission-group.edit', [
            'permissionGroup' => $permissionGroup,
        ]);
    }

    public function update(PermissionGroupRequests $request, $id)
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
        return view('admin.permission-group.create');
    }
    public function store(PermissionGroupRequests $request)
    {
        $this->permissionGroupRepository->save($request->validated());

        return redirect()->route('admin.permission-group.index');
    }
}
