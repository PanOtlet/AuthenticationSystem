<?php
/**
 * Author: PanOtlet
 */

namespace authsys\user;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent{

    protected $table = 'users';
    protected $fillable = [
        'email',
        'username',
        'password',
        'active',
        'active_hash',
        'remember_identifier',
        'remember_token',
    ];
}