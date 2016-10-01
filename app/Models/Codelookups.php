<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Codelookups
 * @package App\Models
 */
class Codelookups extends Model
{
    use SoftDeletes;

    public $table = 'codelookups';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'typename',
        'description',
        'code',
        'value',
        'bool',
        'value2',
        'string',
        'memo',
        'string2'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'typename' => 'string',
        'description' => 'string',
        'code' => 'integer',
        'value' => 'double',
        'bool' => 'boolean',
        'Value2' => 'double',
        'string' => 'string',
        'string2' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'typename' => 'required',
    ];
}
