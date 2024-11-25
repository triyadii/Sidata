<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_data extends Model
{
    public function tampilDataDPT()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_dpt');
        $builder->select('*');
        $builder->orderBy('idDPT', 'ASC');
        return $builder->get()->getResultArray();
    }
    public function jumlahPemilih()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_dpt');
        return $builder->countAllResults();
    }
    public function jumlahPemilihDPT()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_dpt');
        $builder->where('status', "1");
        return $builder->countAllResults();
    }
    public function jumlahPemilihDPTB()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_dpt');
        $builder->where('status', "2");
        return $builder->countAllResults();
    }
    public function jumlahPemilihDPK()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_dpt');
        $builder->where('status', "3");
        return $builder->countAllResults();
    }
    public function jumlahPemilihHadir()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_dpt');
        $builder->where('kehadiran', "1");
        return $builder->countAllResults();
    }
    public function jumlahPemilihLaki()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_dpt');
        $builder->where('jenisKelamin', "L");
        $builder->select('*');
        return $builder->countAllResults();
    }
    public function jumlahPemilihPerempuan()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_dpt');
        $builder->where('jenisKelamin', "P");
        $builder->select('*');
        return $builder->countAllResults();
    }
    public function jumlahPemilihLakiHadir()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_dpt');
        $builder->where('jenisKelamin', "L");
        $builder->where('kehadiran', "1");
        $builder->select('*');
        return $builder->countAllResults();
    }
    public function jumlahPemilihPerempuanHadir()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_dpt');
        $builder->where('jenisKelamin', "P");
        $builder->where('kehadiran', "1");
        $builder->select('*');
        return $builder->countAllResults();
    }
}
