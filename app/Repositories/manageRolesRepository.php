<?php

namespace App\Repositories;

use App\Models\manageRoles;
use InfyOm\Generator\Common\BaseRepository;

class manageRolesRepository extends BaseRepository
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
        return manageRoles::class;
    }
}
