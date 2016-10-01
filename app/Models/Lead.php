<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Lead
 * @package App\Models
 */
class Lead extends Model
{
    use SoftDeletes;

    public $table = 'leads';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'salutation',
        'first_name',
        'last_name',
        'office_phone',
        'position',
        'mobile',
        'department',
        'fax',
        'company_name',
        'website',
        'description',

        'primary_street',
        'primary_city',
        'primary_state',
        'primary_postal',
        'primary_country',
        'primary_description',

        'secondary_street',
        'secondary_city',
        'secondary_state',
        'secondary_postal',
        'secondary_country',
        'secondary_description',

        'assigned_to',
        'same_address',
        'email_address',
        'description',

        'status',
        'status_remarks',

        'lead_source',
        'lead_source_remarks',

        'opportunity_amount',
        'referred_by',
        'campaign_id',
        'campaign_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'salutation' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'office_phone' => 'string',
        'position' => 'string',
        'mobile' => 'string',
        'department' => 'string',
        'fax' => 'string',
        'company_name' => 'string',
        'website' => 'string',

        'primary_street' => 'string',
        'primary_city' => 'string',
        'primary_state' => 'string',
        'primary_postal' => 'string',
        'primary_country' => 'string',

        'secondary_street' => 'string',
        'secondary_city' => 'string',
        'secondary_state' => 'string',
        'secondary_postal' => 'string',
        'secondary_country' => 'string',

        'assigned_to' => 'integer',
        'same_address' => 'boolean',
        'email_address' => 'string',
        'description' => 'string',

        'status' => 'string',
        'status_remarks' => 'string',

        'lead_source' => 'string',

        'opportunity_amount' => 'float',
        'referred_by' => 'string',
        'campaign_id' => 'integer',
        'campaign_name'=> 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules_create = [
        'first_name' => 'required',
        'last_name' => 'required',
        'website' => 'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
        'email_address' => 'email',
        'primary_street' => 'required',
        'primary_city' => 'required',
        'primary_state' => 'required',
        'primary_country' => 'required',
        'assigned_to' => 'required',
    ];

    public static $rules_update = [
        'first_name' => 'required',
        'last_name' => 'required',
        'website' => 'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
        'email_address' => 'email',
        'primary_street' => 'required',
        'primary_city' => 'required',
        'primary_state' => 'required',
        'primary_country' => 'required',
        'assigned_to' => 'required',
    ];

    public function CampaignName(){
        return $this->belongsTo('App\Models\Campaign','campaign_id','id');

    }

    public function AssignedTo()
    {
        return $this->belongsTo('App\User','assigned_to','id');
    }
}
