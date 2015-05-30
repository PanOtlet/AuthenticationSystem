<?php
/**
 * Author: PanOtlet
 */

namespace authsys\validation;

use Violin\Violin;
use authsys\user\user;

class Validator extends Violin {

    protected $user;

    public function __construct(User $user){
        $this->user = $user;

        $this->addFieldMessages([
            'email' =>  [
                'uniqueEmail'   =>  'Email już istnieje w bazie'
            ],
            'username'  =>  [
                'uniqueUsername'=>  'Nick już istnieje w bazie'
            ]
        ]);
    }

    public function validate_uniqueEmail($value, $input, $args){
        return ! (bool) $this->user->where('email', $value)->count();
    }

    public function validate_uniqueUsername($value, $input, $args){
        return ! (bool) $this->user->where('username', $value)->count();
    }
}