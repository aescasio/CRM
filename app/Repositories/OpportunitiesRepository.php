<?php

namespace App\Repositories;

use App\Models\Opportunities;
use InfyOm\Generator\Common\BaseRepository;

class OpportunitiesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'account_name',
        'currency',
        'closed_date',
        'amount',
        'sales_stage',
        'lead_source',
        'campaign',
        'assigned_to'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Opportunities::class;
    }
}
