<?php
/**
 * Author: PanOtlet
 */

namespace authsys\validation;

use Violin\Violin;
use authsys\user\user;
use authsys\helpers\hash;

class Validator extends Violin {

    protected $user;
    protected $hash;
    protected $auth;

    public function __construct(User $user, Hash $hash, $auth = null){
        $this->user = $user;
        $this->hash = $hash;
        $this->auth = $auth;

        $this->addFieldMessages([
            'email' =>  [
                'uniqueEmail'   =>  'Email już istnieje w bazie'
            ],
            'username'  =>  [
                'uniqueUsername'=>  'Nick już istnieje w bazie'
            ]
        ]);

        $this->addRuleMessages([
            'matchesCurrentPassword'    =>  'That does not match your current password'
        ]);
    }

    public function validate_uniqueEmail($value, $input, $args){
        return ! (bool) $this->user->where('email', $value)->count();
    }

    public function validate_uniqueUsername($value, $input, $args){
        return ! (bool) $this->user->where('username', $value)->count();
    }

    public function validate_matchesCurrentPassword($value, $input, $args){
        if($this->auth && $this->hash->passwordCheck($value, $this->auth->password)){
            return true;
        }
        return false;
    }
}