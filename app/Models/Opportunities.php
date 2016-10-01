<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Opportunities
 * @package App\Models
 */
class Opportunities extends Model
{
    use SoftDeletes;

    public $table = 'opportunities';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'account_id',
        'currency',
        'closed_date',
        'amount',
        'type',
        'sales_stage',
        'lead_source',
        'probability',
        'campaign_id',
        'next_step',
        'description',
        'assigned_to'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'account_id' => 'integer',
        'currency' => 'string',
        'closed_date' => 'date',
        'type' => 'string',
        'sales_stage' => 'string',
        'lead_source' => 'string',
        'campaign_id' => 'integer',
        'next_step' => 'string',
        'description' => 'string',
        'assigned_to' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules_create = [
        'name' => 'required|unique:opportunities',
        'account_name' => 'required',
        'closed_date' => 'required',
        'amount' => 'required',
        'sales_stage' => 'required'
    ];

    public static $rules_update = [
        'name' => 'required',
        'account_name' => 'required',
        'closed_date' => 'required',
        'amount' => 'required',
        'sales_stage' => 'required'
    ];

    public  function User()
    {
        return $this->belongsTo('App\User', 'assigned_to', 'id');
    }

    public function Campaign()
    {
        return $this->belongsTo('App\Models\Campaign','campaign_id','id');
    }

    public function Account()
    {
        return $this->belongsTo('App\Models\Account','account_id','id');
    }
}
