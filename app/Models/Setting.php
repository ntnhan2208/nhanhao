<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key', 'value'
    ];

    public $timestamps = true;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at'    =>  'date:d-m-Y',
        'updated_at'    =>  'date:d-m-Y',
        'deleted_at'    =>  'date:d-m-Y',
    ];
}
