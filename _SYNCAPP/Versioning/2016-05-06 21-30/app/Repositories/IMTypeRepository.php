<?php

namespace App\Repositories;

use App\Models\IMType;
use InfyOm\Generator\Common\BaseRepository;

class IMTypeRepository extends BaseRepository
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
        return IMType::class;
    }
}
