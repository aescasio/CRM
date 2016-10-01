<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Profile
 * @package App\Models
 */
class Profile extends Model
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
        'email' => 'required|unique:users',
        'password_confirmation' => 'confirmed',
        'first_name' => 'required',
        'middle_initial' => 'max:1',
        'last_name' => 'required',
        'photo' => 'mimes:jpg,jpeg,gif,png,bmp'
    ];

    public static $rules_update = [
        'email' => 'required',
        'first_name' => 'required',
        'middle_initial' => 'max:1',
        'last_name' => 'required',
        'photo' => 'mimes:jpg,jpeg,gif,png,bmp'
    ];
}
