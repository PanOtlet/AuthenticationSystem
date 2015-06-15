<?php
/**
 * Author: PanOtlet
 */

namespace Authsys\User;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent{

    protected $table = 'users';
    protected $fillable = [
        'email',
        'username',
        'password',
        'first_name',
        'last_name',
        'active',
        'active_hash',
        'recover_hash',
        'remember_identifier',
        'remember_token',
    ];

    public function getFullName(){
        if (!$this->first_name || !$this->last_name){
            return "{$this->username}";
        }

        return "{$this->first_name} {$this->last_name}";
    }

    public function activateAccount(){
        $this->update([
            'active'        =>  true,
            'active_hash'   =>  null
        ]);
    }

    public function getAvatarUrl($option = []){
        $size = isset($option['size'])? $option['size']: 45;
        return "http://www.gravatar.com/avatar/".md5($this->email).'?s='.$size.'&d=retro';
    }

    public function updateRememberCredentials($identifier,$token){
        $this->update([
            'remember_identifier'   =>  $identifier,
            'remember_token'        =>  $token
        ]);
    }

    public function removeRememberCredentials(){
        $this->updateRememberCredentials(null,null);
    }

    public function hasPermissions($permission){
        return (bool)$this->permissions->{$permission};
    }

    public function isAdmin(){
        return $this->hasPermissions('is_admin');
    }

    public function permissions(){
        return $this->hasOne('authsys\user\UserPermission', 'user_id');
    }
}