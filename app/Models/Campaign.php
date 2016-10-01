<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Campaign
 * @package App\Models
 */
class Campaign extends Model
{
    use SoftDeletes;

    public $table = 'campaigns';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'status',
        'type',
        'start_date',
        'end_date',
        'description',
        'assigned_to',
        'budget',
        'currency',
        'impressions',
        'actual_cost',
        'expected_cost',
        'expected_revenue',
        'objective'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'status' => 'string',
        'type' => 'string',
        'start_date' => 'date',
        'end_date' => 'date',
        'description' => 'string',
        'assigned_to' => 'integer',
        'budget' => 'decimal',
        'currency' => 'string',
        'impressions' => 'string',
        'actual_cost' => 'decimal',
        'expected_cost' => 'decimal',
        'expected_revenue' => 'decimal',
        'objective' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

        'name' => 'required',
        'status' => 'required',
        'type' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'assigned_to' => 'required',

    ];

    public function frmUser()
    {
        return $this->belongsTo('App\User','assigned_to','id');
    }
}
