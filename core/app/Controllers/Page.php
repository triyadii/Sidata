<?php

namespace App\Controllers;

use App\Models\Model_data;

class Page extends BaseController
{
    public function dashboard()
    {
        $modelData                   = new Model_data;
        $jumlahPemilih               = $modelData->jumlahPemilih();
        $jumlahPemilihDPT            = $modelData->jumlahPemilihDPT();
        $jumlahPemilihDPTB           = $modelData->jumlahPemilihDPTB();
        $jumlahPemilihDPK            = $modelData->jumlahPemilihDPK();
        $jumlahPemilihHadir          = $modelData->jumlahPemilihHadir();
        $jumlahPemilihLaki           = $modelData->jumlahPemilihLaki();
        $jumlahPemilihLakiHadir      = $modelData->jumlahPemilihLakiHadir();
        $jumlahPemilihPerempuan      = $modelData->jumlahPemilihPerempuan();
        $jumlahPemilihPerempuanHadir = $modelData->jumlahPemilihPerempuanHadir();
        $data = [
            "pemilih" => $jumlahPemilih,
            "pemilihDPT" => $jumlahPemilihDPT,
            "pemilihDPTB" => $jumlahPemilihDPTB,
            "pemilihDPK" => $jumlahPemilihDPK,
            "pemilihHadir" => $jumlahPemilihHadir,
            "laki" => $jumlahPemilihLaki,
            "lakiHadir" => $jumlahPemilihLakiHadir,
            "perempuan" => $jumlahPemilihPerempuan,
            "perempuanHadir" => $jumlahPemilihPerempuanHadir
        ];
        return view('dashboard', compact('data'));
    }
    public function peserta()
    {
        $modelData = new Model_data();
        $data = $modelData->tampilDataDPT();
        return view('peserta', compact('data'));
    }
}
