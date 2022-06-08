<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends Model
{
    use LogsActivity;

    protected $table = 'roles';

    protected $fillable = [
        'name'
    ];

    protected static $logAttributes = ['name'];

    public function admins(){
        return $this->belongsToMany(Admin::class,'admin_role');
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class,'role_permission');
    }

    public function groups(){
        return $this->hasMany(Group::class);
    }
}
