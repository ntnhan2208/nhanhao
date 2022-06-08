<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Utility\Google2Fa;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\Admin;
use App\Models\Role;
use DB;
use App\Helpers\Utility\Sanitize;
use Illuminate\Support\Facades\Hash;

class AdminController extends BaseAdminController
{
    protected $admins;
    protected $roles;

    public function __construct(Admin $admin, Role $role)
    {
        $this->admins = $admin;
        $this->roles = $role;
        parent::__construct();
    }

    public function index()
    {
        $admins = $this->admins->select('admins.*','roles.name as role_name')->withRoles()->get();
        return view('admin.admins.index',compact('admins'));
    }

    public function create()
    {
        $roles = $this->roles->all();
        return view('admin.admins.add', compact('roles'));
    }

    public function store(AdminRequest $request)
    {
        DB::beginTransaction();
        try{
            $request['secret_code'] = Google2Fa::makeSecretCode();
            if($request->images){
                $request['image'] = Sanitize::moveImage('avatar', $request->images);
            }
            $admin = $this->admins->create($request->all());
            $admin->roles()->sync($request->role);
            DB::commit();
            toastr()->success(trans('site.message.add_success'));
            return redirect()->route('admins.index');
        }catch(\Exception $e){
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }

    public function edit($id)
    {
        $admin = $this->admins->find($id);
        if($admin){
            $roles = $this->roles->all();
            $adminRoles = $admin->roles()->pluck("role_id")->toArray();
            $QRImage = Google2Fa::makeQRImage($admin);
            return view('admin.admins.edit',compact('admin','QRImage','roles','adminRoles'));
        }
        toastr()->error(trans('site.message.error'));
        return redirect()->route('admins.index');
    }

    public function update(AdminRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $admin = $this->admins->findOrFail($id);
            $admin->roles()->sync($request->role);
            if($request->images){
                $request['image'] = Sanitize::moveImage('avatar', $request->images);
            }
            $admin->update($request->all());
            DB::commit();
            toastr()->success(trans('site.message.update_success'));
            return redirect()->route('admins.index');
        }catch(\Exception $e){
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }

    public function destroy($id)
    {
        if($this->admins->count() == 1){
            toastr()->error(trans('site.admin.not_delete'));
            return redirect()->route('admins.index');
        }else{
            $this->admins->destroy($id);
            toastr()->success(trans('site.message.delete_success'));
            return redirect()->route('admins.index');
        };
    }

    public function enable2fa(Request $request)
    {
        DB::beginTransaction();
        try {
            $admin = $this->admins->findOrFail($request->id);
            $admin->update([
                'google2fa_enable' => true
            ]);
            DB::commit();
            toastr()->success(trans('site.message.update_success'));
            return back();
        }catch(\Exception $e){
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }

    public function complete2fa(Request $request)
    {
        DB::beginTransaction();
        try {
            $admin = $this->admins->findOrFail($request->id);
            $admin->update($request->all());
            DB::commit();
            toastr()->success(trans('site.message.update_success'));
            return redirect()->route('admins.index');
        }catch(\Exception $e){
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }

    public function disable2fa($adminId)
    {
        DB::beginTransaction();
        try {
            $admin = $this->admins->findOrFail($adminId);
            $admin->update([
                'google2fa_enable' => false
            ]);
            DB::commit();
            toastr()->success(trans('site.message.update_success'));
            return redirect()->back();
        }catch(\Exception $e){
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }

    public function reset2fa($adminId)
    {
        DB::beginTransaction();
        try {
            $admin = $this->admins->find($adminId);
            $google2Fa = Google2Fa::makeBoth($admin);
            DB::commit();
            return view('admin.admins.reset2fa',['admin' => $admin, 'QRImage' => $google2Fa['QRImage'], 'secret' => $google2Fa['secretCode']]);
        }catch(\Exception $e){
            DB::rollback();
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }

    public function changeProfile()
    {
        $admin = \Auth::User();
        $QRImage = Google2Fa::makeQRImage($admin);
        return view('admin.admins.profile',compact('admin','QRImage'));
    }

    public function changePassword()
    {
        return view('admin.admins.change-password');
    }

    public function updatePassword(PasswordRequest $request)
    {
        try{
            $currentPassword = \Auth::User()->password;  
            if (\Hash::check($request->old_password, $currentPassword)) {
                \Auth::User()->update([
                    'password' => \Hash::make($request->new_password)
                ]);
                toastr()->success(trans('site.message.update_success'));
                return redirect()->back();
            }
            toastr()->error(trans('site.message.wrong_password'));
            return back();
        }catch (\Exception $e){
            toastr()->error(trans('site.message.error'));
            return back();
        }
    }
}
