<?php

namespace App\Repositories;

use App\Models\Account;
use InfyOm\Generator\Common\BaseRepository;

class AccountRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'website',
        'billing_city',
        'billing_postal',
        'billing_country',
        'assigned_to',
        'annual_revenue'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Account::class;
    }
}
