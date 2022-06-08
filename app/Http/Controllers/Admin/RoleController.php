<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Models\Admin;
use DB;

class RoleController extends BaseAdminController
{
    protected $role;
    protected $permission;

    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
        parent::__construct();
    }

    public function index()
    {
        $roles = $this->role->all();
        return view('admin.role.index',compact('roles'));
    }

    public function create()
    {
        return view('admin.role.add');
    }

    public function store(RoleRequest $request)
    {
        DB::beginTransaction();
        try{
            $this->role->create($request->all());
            DB::commit();
            toastr()->success(trans('site.message.add_success'));
            return redirect()->route('role.index');
        }catch(\Exception $e){
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }

    public function edit($id)
    {
        $role = $this->role->find($id);
        $rolePermissions = $role->permissions->pluck('id')->toArray();
        $permissions = $this->permission->all();
        if($role){
            return view('admin.role.edit',compact('role','permissions','rolePermissions'));
        }
        else{
            toastr()->error(trans('site.message.error'));
            return redirect()->route('role.index');
        }

    }

    public function update(RoleRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $role = $this->role->find($id);
            $role->permissions()->sync($request->permissions);
            $role->update($request->all());
            DB::commit();
            toastr()->success(trans('site.message.update_success'));
            return redirect()->route('role.index');
        }catch(\Exception $e){
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }

    public function destroy($id)
    {
        $role = $this->role->find($id);
        if($role->admins()){
            toastr()->error(trans('site.role.warning_delete_exists_user'));
            return redirect()->route('role.index');
        }
        $role->permissions()->detach();
        $role->delete();
        toastr()->success(trans('site.message.delete_success'));
        return redirect()->route('role.index');
    }
}