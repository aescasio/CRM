<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ManageUser
 * @package App\Models
 */
class ManageUser extends Model
{
    //use SoftDeletes;

    public $table = 'users';
    
    protected $dates = ['deleted_at'];

    public $fillable = [
        'email',
        'password',
        'first_name',
        'middle_initial',
        'last_name',
        'photo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'email' => 'string',
        'password' => 'string',
        'password_confirmation' => 'string',
        'first_name' => 'string',
        'middle_initial' => 'string',
        'last_name' => 'string',
        'photo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules_create = [
        'email' => 'required',
        'password' => 'required|confirmed|min:5',
        'password_confirmation' => 'required',
        'first_name' => 'required',
        'middle_initial' => 'max:1',
        'last_name' => 'required',
        'photo' => 'mimes:jpg,jpeg,gif,png,bmp'
    ];

    public static $rules_update = [
        'email' => 'required',
        'password' => 'confirmed|min:5',
        'first_name' => 'required',
        'middle_initial' => 'max:1',
        'last_name' => 'required',
        'photo' => 'mimes:jpg,jpeg,gif,png,bmp'
    ];

}
