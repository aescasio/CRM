<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contact
 * @package App\Models
 */
class Contact extends Model
{
    use SoftDeletes;

    public $table = 'contacts';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $fillable = [
        'salutation',
        'first_name' ,
        'mi',
        'last_name',
        'full_name',
        'office_phone',
        'position',
        'mobile',
        'department',
        'fax',
        'account_id',
        'website',
        'description',
        'primary_street',
        'primary_city',
        'primary_state',
        'primary_postal',
        'primary_country',
        'same_address',
        'secondary_street',
        'secondary_city',
        'secondary_state',
        'secondary_postal' ,
        'secondary_country' ,
        'email_address' ,
        'lead_source',
        'campaign_id' ,
        'assigned_to' ,
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'salutation' => 'string',
        'first_name' => 'string',
        'mi' => 'string',
        'last_name' => 'string',
        'full_name' => 'string',
        'office_phone' => 'string',
        'position' => 'string',
        'mobile' => 'string',
        'department' => 'string',
        'fax' => 'string',
        'account_id' => 'string',
        'website' => 'url',
        'description' => 'string',
        'primary_street' => 'string',
        'primary_city' => 'string',
        'primary_state' => 'string',
        'primary_postal' => 'integer',
        'primary_country' => 'string',
        'same_address' => 'boolean',
        'secondary_street' => 'string',
        'secondary_city' => 'string',
        'secondary_state' => 'string',
        'secondary_postal' => 'string' ,
        'secondary_country' => 'string',
        'email_address' => 'string',
        'lead_source' => 'string',
        'campaign_id' => 'string',
        'assigned_to' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules_create = [
        'salutation'=>'required',
        'first_name'=>'required',
        'mi'=>'max:2',
        'last_name'=>'required',
        'office_phone'=>'required',
        'email_address' => 'email',
        'website' => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
    ];

    public static $rules_update = [
        'salutation'=>'required',
        'first_name'=>'required',
        'mi'=>'max:2',
        'last_name'=>'required',
        'office_phone'=>'required',
        'email_address' => 'email',
        'website' => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
    ];

    /*public function account()
    {
        return $this->belongsTo('App\Models\Account', 'account_id', 'id');
    }*/

    public  function Users()
    {
        return $this->belongsTo('App\User', 'assigned_to', 'id');
    }

    public function Campaigns()
    {
        return $this->belongsTo('App\Models\Campaign', 'campaign_id', 'id' );
    }

    public function Accounts(){
        return $this->belongsTo('App\Models\Account', 'account_id', 'id');
    }
}
