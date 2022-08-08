<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\RoleRequests;
use App\Http\Requests\Admin\PermissionGroupRequest;
use App\Repositories\Admin\Role\RoleRepositoryInterface as RoleRepository;
use App\Repositories\Admin\PermissionGroup\PermissionGroupRepositoryInterface as PermissionGroupRepository;

class RoleController extends Controller
{
    protected $roleRepository;
    protected $permissionGroupRepository;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(RoleRepository $roleRepository,PermissionGroupRepository $permissionGroupRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionGroupRepository = $permissionGroupRepository;
    }

    public function index()
    {
        return view('admin.role.index', [
            'roles' => $this->roleRepository->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.form',[
            'permissionGroups' => $this->permissionGroupRepository->getAll(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequests $request)
    {
        DB::beginTransaction();
        try{
        $role = $this->roleRepository->save($request->validated());
        $role->rolesPermissions()->sync($request->input('permision'));
        DB::commit();
        }
        catch(Exception){
            DB::rollback();

            return redirect()->back()->with('Please try again later');
        }

        return redirect()->route('admin.role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! $role = $this->roleRepository->findById($id)) {
            abort(404);
        }

        return view('admin.role.form', [
            'roles' => $role,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! $role = $this->roleRepository->findById($id)) {
            abort(404);
        }

        return view('admin.role.form', [
            'roles' => $role,
            'permissionGroups' => $this->permissionGroupRepository->getAll(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequests $request, $id)
    {
        DB::beginTransaction();

        try {
            $role = $this->roleRepository->save($request->validated(), ['id' => $id]);
            $role->rolesPermissions()->sync($request->input('permission'));
            DB::commit();
        } catch (Exception) {
            DB::rollback();

            return redirect()->back()->with(
                'Please try again later'
            );
        }

        return redirect()->route('admin.role.index')->with(
            'success',
            'success.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        DB::beginTransaction();
        
        try {
            $this->roleRepository->findById($id)->rolesPermissions()->detach();
            $this->roleRepository->deleteById($id);
            DB::commit();
        } catch (Exception) {
            DB::rollback();

            return redirect()->back()->with(
                'error',
                'Exception occured. Please try again later.'
            );
        }
        return redirect()->route('admin.role.index');
    }
}
