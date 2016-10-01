<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Call
 * @package App\Models
 */
class Call extends Model
{
    use SoftDeletes;

    public $table = 'calls';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'subject',
        'status',
        'status2',
        'date_time',
        'related_to',
        'related_results',
        'description',
        'assigned_to',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'subject' => 'string',
        'status' => 'string',
        'status2' => 'string',
        'date_time' => 'datetime',
        'related_to' => 'string',
        'related_results' => 'string',
        'assigned_to' => 'integer'
    ];


    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules_create = [
        'subject' => 'required',
        'status' => 'required',
        'status2' => 'required',
        'date_time' => 'required',

        'assigned_to' => 'required'
    ];

    public static $rules_update = [
        'subject' => 'required',
        'status' => 'required',
        'status2' => 'required',
        'date_time' => 'required',
//        'related_results' => 'required',
        'assigned_to' => 'required'
    ];

    public function User()
    {
        return $this->belongsTo('App\User','assigned_to','id');
    }

    public function Account(){
        return $this->belongsTo('App\Models\Account','related_results','id');
    }

    public  function Contact(){
        return $this->belongsTo('App\Models\Contact','related_results','id');
    }

    public  function Lead(){
        return $this->belongsTo('App\Models\Lead','related_results','id');
    }

    public function Opportunities(){
        return $this->belongsTo('App\Models\Opportunities','related_results','id');
    }

    public function Project(){
        return $this->belongsTo('App\Models\Project','related_results','id');
    }

    public function Target(){
        return $this->belongsTo('App\Models\Target','related_results','id');
    }

    public function Task(){
        return $this->belongsTo('App\Models\Task','related_results','id');
    }
}
