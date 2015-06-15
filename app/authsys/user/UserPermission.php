<?php
/**
 * Author: PanOtlet
 */

namespace Authsys\User;

use Illuminate\Database\Eloquent\Model as Eloquent;

class UserPermission extends Eloquent{

    protected $table = 'users_permissions';

    protected $fillable =   [
        'id_admin'
    ];

    public static $defaults  =   [
        'is_admin'  =>  false
    ];
}