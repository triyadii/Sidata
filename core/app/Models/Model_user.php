<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_user extends Model
{
    protected $table                = 'tbl_user';
    protected $primaryKey           = 'idUser';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['username', 'password'];
}
