<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industrytype extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    protected $table = 'industry_type';

    public $timestamps = false;
}
