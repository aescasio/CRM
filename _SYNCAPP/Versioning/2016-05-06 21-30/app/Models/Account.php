<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Account
 * @package App\Models
 */
class Account extends Model
{
    use SoftDeletes;

    public $table = 'accounts';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'website',
        'office_phone',
        'office_fax',
        'billing_address',
        'billing_street',
        'billing_city',
        'billing_state',
        'billing_postal',
        'billing_country',
        'description',
        'assigned_to',
        'same_as_billing',
        'annual_revenue',
        'member_of',
        'campaign_name',
        'employee_id',
        'client_id',
        'industry_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'office_phone' => 'string',
        'office_fax' => 'string',
        'billing_street' => 'string',
        'billing_city' => 'string',
        'billing_state' => 'string',
        'billing_postal' => 'string',
        'billing_country' => 'string',
        'assigned_to' => 'integer',
        'same_as_billing' => 'boolean',
        'annual_revenue' => 'float',
        'member_of' => 'string',
        'campaign_name' => 'string',
        'employee_id' => 'integer',
        'client_id' => 'integer',
        'industry_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'assigned_to' => 'required'
    ];

    public function frmUser()
    {
        return $this->belongsTo('App\User','assigned_to','id');
    }
}
