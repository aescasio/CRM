<?php

namespace App\Repositories;

use App\Models\Call;
use InfyOm\Generator\Common\BaseRepository;

class CallRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'subject',
        'status',
        'status2',
        'date_time',
        'related_to',
        'related_results',
        'assigned_to'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Call::class;
    }
}
