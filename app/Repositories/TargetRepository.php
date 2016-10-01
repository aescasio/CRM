<?php

namespace App\Repositories;

use App\Models\Target;
use InfyOm\Generator\Common\BaseRepository;

class TargetRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'department',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Target::class;
    }
}
