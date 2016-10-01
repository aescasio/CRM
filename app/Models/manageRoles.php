<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class manageRoles
 * @package App\Models
 */
class manageRoles extends Model
{
    //    use SoftDeletes;

    public $table = 'roles';


    protected $dates = [ 'deleted_at' ];


    public $fillable = [
        'name' ,
        'display_name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     * @var array
     */
    protected $casts = [
        'name'         => 'string' ,
        'display_name' => 'string' ,
        'description'  => 'string',
    ];

    /**
     * Validation rules
     * @var array
     */
    public static $rules_create = [
        'name'         => 'required|unique:roles' ,
        'display_name' => 'required',
    ];

    public static $rules_update = [
        'name'         => 'required' ,
        'display_name' => 'required',
    ];
}
