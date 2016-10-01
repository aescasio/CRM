<?php
/**
 * Created by PhpStorm.
 * User: ITS-Gelo
 * Date: 5/23/2016
 * Time: 3:42 PM
 */

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    public $table = 'permissions';
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['name', 'display_name', 'description'];

}