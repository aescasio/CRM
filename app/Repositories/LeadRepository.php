<?php

namespace App\Repositories;

use App\Models\Lead;
use InfyOm\Generator\Common\BaseRepository;

class LeadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'full_name',
        'office_phone',
        'position',
        'department',
        'account_id',
        'website',
        'description',

        'primary_street',
        'primary_city',
        'primary_state',
        'primary_postal',
        'primary_country',

        'secondary_street',
        'secondary_city',
        'secondary_state',
        'secondary_postal',
        'secondary_country',

        'assigned_to',
        'lead_source_id',
        'opportunity_amount',
        'referred_by',
        'campaign_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Lead::class;
    }
}
