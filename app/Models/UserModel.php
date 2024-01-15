<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'tbl_users';
    protected $allowedFields    = [
        "name",
        "email",
        "phone_no",
        "password"
    ];  
}


