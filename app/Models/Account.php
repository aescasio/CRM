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

        'billing_street',
        'billing_city',
        'billing_state',
        'billing_postal',
        'billing_country',

        'shipping_street',
        'shipping_city',
        'shipping_state',
        'shipping_postal',
        'shipping_country',

        'same_as_billing',

        'description',
        'assigned_to',
        'annual_revenue',
        'member_of',
        'campaign_id',
        'employees',
        'account_type',
        'industry_type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'website' => 'url',
        'office_phone' => 'string',
        'office_fax' => 'string',

        'billing_street' => 'string',
        'billing_city' => 'string',
        'billing_state' => 'string',
        'billing_postal' => 'string',
        'billing_country' => 'string',

        'shipping_street' => 'string',
        'shipping_city' => 'string',
        'shipping_state' => 'string',
        'shipping_postal' => 'string',
        'shipping_country' => 'string',

        'same_as_billing' => 'boolean',

        'assigned_to' => 'integer',
        'annual_revenue' => 'decimal',
        'member_of' => 'string',
        'campaign_id' => 'integer',
        'employees' => 'string',
        'account_type' => 'integer',
        'industry_type' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $create_rules = [
        'name' => 'required|unique:accounts',
        'website' => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
        'assigned_to' => 'required'
    ];

    public  static $update_rules = [
        'name' => 'required',
        'website' => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
        'assigned_to' => 'required'
    ];

    public function User()
    {
        return $this->belongsTo('App\User','assigned_to','id');
    }

    public function Campaign()
    {
        return $this->belongsTo('App\Models\Campaign','campaign_id','id');
    }

}
