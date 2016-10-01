<?php

namespace App\Repositories;

use App\Models\Meeting;
use InfyOm\Generator\Common\BaseRepository;

class MeetingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'subject',
        'status',
        'start_date',
        'end_date',
        'related_to',
        'related_result',
        'assigned_to'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Meeting::class;
    }
}
