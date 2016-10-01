<?php

namespace App\Repositories;

use App\Models\ManageUser;
use InfyOm\Generator\Common\BaseRepository;

class ManageUserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'email',
        'first_name',
        'last_name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ManageUser::class;
    }
}
