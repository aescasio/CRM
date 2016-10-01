<?php

namespace App\Repositories;

use App\Models\ClientType;
use InfyOm\Generator\Common\BaseRepository;

class ClientTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ClientType::class;
    }
}
