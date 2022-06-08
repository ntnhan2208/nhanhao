<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class Admin extends Authenticatable
{
    use Notifiable;
    use LogsActivity;

    protected $guard = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','secret_code','google2fa_enable','phone','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'secret_code'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static $logAttributes = ['name','email'];

    public function setPasswordAttribute($password)
    {
        if ( $password !== null && $password !== '' )
            $this->attributes['password'] = bcrypt($password);
    }

    public function roles(){
        return $this->belongsToMany(Role::class,'admin_role');
	}

	public function groups(){
        return $this->belongsToMany(Group::class,'admin_group');
    }

    /**
     * Get the post for the admin
     */
    public function posts(){
        return $this->hasMany(BlogPost::class);
    }

    public function scopeWithRoles($query){
        return $query->leftJoin('admin_role', 'admins.id', '=', 'admin_role.admin_id')
                     ->leftJoin('roles','roles.id','=','admin_role.role_id');
    }

    /**
     * Ecrypt the user's google_2fa secret.
     *
     * @param  string  $value
     * @return string
     */
    public function setSecretCodeAttribute($value)
    {
        $this->attributes['secret_code'] = encrypt($value);
    }

    /**
     * Decrypt the user's google_2fa secret.
     *
     * @param  string  $value
     * @return string
     */
    public function getSecretCodeAttribute($value)
    {
        return decrypt($value);
    }

    public function scopeDisableGoogle2Fa($query){
        return $query->update(['google2fa_enable' => false]);
    }

    public function scopeEnableGoogle2Fa($query){
        return $query->update(['google2fa_enable' => true]);
    }
}
