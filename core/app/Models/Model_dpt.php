<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_dpt extends Model
{
    protected $table                = 'tbl_dpt';
    protected $primaryKey           = 'idDPT';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['namaPemilih', 'jenisKelamin', 'alamat', 'kehadiran', 'status'];
}
