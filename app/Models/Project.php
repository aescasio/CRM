<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Project
 * @package App\Models
 */
class Project extends Model
{
    use SoftDeletes;

    public $table = 'projects';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'status',
        'priority',
        'start_date',
        'end_date',
        'notes',
        'project_manager'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'status' => 'string',
        'priority' => 'string',
        'start_date' => 'date',
        'end_date' => 'date',
        'project_manager' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules_create = [
        'name' => 'required',
        'start_date' => 'required',
        'end_date' => 'required'
    ];
    public static $rules_update = [
        'name' => 'required',
        'start_date' => 'required',
        'end_date' => 'required'
    ];
    public function User(){
        return $this->belongsTo('App\User','project_manager','id');
    }

}
