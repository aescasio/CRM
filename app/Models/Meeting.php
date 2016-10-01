<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Meeting
 * @package App\Models
 */
class Meeting extends Model
{
    use SoftDeletes;

    public $table = 'meetings';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'subject',
        'status',
        'start_date',
        'end_date',
        'related_to',
        'related_result_id',
        'related_result',
        'location',
        'description',
        'assigned_to'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'subject' => 'string',
        'status' => 'string',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'related_to' => 'string',
        'related_result_id'=> 'integer',
        'related_result' => 'string',
        'location' => 'string',
        'assigned_to' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules_create = [
        'subject' => 'required:unique,meetings',
        'start_date' => 'required',
        'end_date' => 'required',
        'assigned_to' => 'required'
    ];

    public static $rules_update = [
        'subject' => 'required:unique,meetings',
        'start_date' => 'required',
        'end_date' => 'required',
        'assigned_to' => 'required'
    ];

    public function User(){
        return $this->belongsTo('App\User','assigned_to','id');
    }

    public function Account(){
        return $this->belongsTo('App\Models\Account','related_result','id');
    }

    public  function Contact(){
        return $this->belongsTo('App\Models\Contact','related_result','id');
    }

    public  function Lead(){
        return $this->belongsTo('App\Models\Lead','related_result','id');
    }

    public function Opportunities(){
        return $this->belongsTo('App\Models\Opportunities','related_result','id');
    }

    public function Project(){
        return $this->belongsTo('App\Models\Project','related_result','id');
    }

    public function Target(){
        return $this->belongsTo('App\Models\Target','related_result','id');
    }

    public function Task(){
        return $this->belongsTo('App\Models\Task','related_result','id');
    }
}
