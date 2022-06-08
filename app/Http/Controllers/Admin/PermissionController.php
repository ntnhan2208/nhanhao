<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\PermissionRequest;
use App\Models\Admin;
use DB;

class PermissionController extends BaseAdminController
{
    protected $permission;
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
        parent::__construct();
    }

    public function index()
    {
        $app = app();
        $routes = $app->routes->getRoutes();
        $permissions = $this->permission->pluck('name', 'slug');
        return view('admin.permission.index',compact('permissions','routes'));
    }

    public function store(PermissionRequest $request)
    {
        DB::beginTransaction();
        try{
            $this->permission->create($request->all());
            DB::commit();
            toastr()->success(trans('site.message.add_success'));
            return redirect()->route('permission.index');
        }catch(\Exception $e){
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }

    public function update(PermissionRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $permission = $this->permission->where('slug', $request->slug)->first();
            $permission->update($request->all());
            DB::commit();
            toastr()->success(trans('site.message.update_success'));
            return redirect()->route('permission.index');
        }catch(\Exception $e){
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }
}
