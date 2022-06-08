<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Carbon\Carbon;

class AdminProfile extends Model
{
    use LogsActivity;

    protected $table = 'admin_profiles';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name', 'phone', 'address', 'gender', 'dob', 'avatar', 'admin_id'
    ];

    protected static $logAttributes = [
        'full_name', 'phone', 'address', 'gender', 'dob', 'avatar', 'admin_id'
    ];

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = (new Carbon($value))->format('Y-m-d');
    }

    public function admin() {
        return $this->belongsTo(Admin::class);
    }
}
