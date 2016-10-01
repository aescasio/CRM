<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Calendar
 * @package App\Models
 */
class Calendar extends Model
{
    use SoftDeletes;

    public $table = 'calendars';
    
    protected $dates = ['deleted_at'];

    public $fillable = [
        'title',
        'description',
        'start',
        'end',
        'backgroundColor',
        'borderColor',
        'allDay',
        'url',
        'assigned_to'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'start' => 'datetime',
        'end' => 'datetime',
        'backgroundColor' => 'string',
        'borderColor' => 'string',
        'allDay' => 'boolean',
        'url' => 'string',
        'assigned_to' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules_create = [
        'title' => 'required',
        'start' => 'required',
        'end' => 'required'
    ];

    public static $rules_update = [
        'title' => 'required'
    ];
}
