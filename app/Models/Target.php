<?php

namespace App\Models;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Target
 * @package App\Models
 */
class Target extends Model
{
    use SoftDeletes;

    public $table = 'targets';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'salutation',
        'first_name',
        'last_name',
        'title',
        'department',
        'account_id',
        'company_name',
        'contact_office',
        'contact_mobile',
        'contact_fax',
        'primary_address',
        'primary_city',
        'primary_state',
        'primary_postal',
        'primary_country',
        'same_address',
        'secondary_address',
        'secondary_city',
        'secondary_state',
        'secondary_postal',
        'secondary_country',
        'email',
        'description',
        'assigned_to'
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
        'title' => 'string',
        'department' => 'string',
        'account_id' => 'integer',
        'company_name' => 'string',
        'contact_office' => 'string',
        'contact_mobile' => 'string',
        'contact_fax' => 'string',
        'primary_address' => 'string',
        'primary_city' => 'string',
        'primary_state' => 'string',
        'primary_postal' => 'string',
        'primary_country' => 'string',
        'same_address' => 'boolean',
        'secondary_address' => 'string',
        'secondary_city' => 'string',
        'secondary_state' => 'string',
        'secondary_postal' => 'string',
        'secondary_country' => 'string',
        'email' => 'string',
        'assigned_to' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules_create = [
        'first_name' => 'required',
        'last_name' => 'required',
        'same_address' => 'boolean',
        'email' => 'email',
        'assigned_to' => 'integer'
    ];

    public static $rules_update = [
        'first_name' => 'required',
        'last_name' => 'required',
        'same_address' => 'boolean',
        'email' => 'email',
        'assigned_to' => 'integer'
    ];

    public function User()
    {
        return $this->belongsTo('App\User','assigned_to','id');

    }

    public function Account()
    {
        return $this->belongsTo('App\Models\Account','account_id','id');
    }
}
