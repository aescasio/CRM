<?php

namespace App\Repositories;

use App\Models\managePermissions;
use InfyOm\Generator\Common\BaseRepository;

class managePermissionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'display_name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return managePermissions::class;
    }
}
