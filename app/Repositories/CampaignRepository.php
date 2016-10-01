<?php

namespace App\Repositories;

use App\Models\Campaign;
use InfyOm\Generator\Common\BaseRepository;

class CampaignRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'status',
        'type',
        'start_date',
        'end_date',
        'assigned_to',
        'budget'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Campaign::class;
    }
}
