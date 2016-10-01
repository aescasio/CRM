<?php
/**
 * Created by PhpStorm.
 * User: ITS-Gelo
 * Date: 5/23/2016
 * Time: 3:41 PM
 */
namespace App\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    public $table = 'roles';

    protected $fillable = ['name', 'display_name', 'description'];
}