<?php

namespace App\Validation;

class Userrules
{
    public function validateUser(string $str, string $fields, array $data){
        $model = new UserModel();
        $user = $model->where('email', $data['email'])->first();

        if(!$user)
        return true;
    return password_verify($data['us_pass'], $user['us_pass']);
    
    }
}
