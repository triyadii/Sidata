<?php

namespace App\Controllers;

use App\Models\Model_data;
use App\Models\Model_dpt;

class Pemilih extends BaseController
{
    public function konfirmasiKehadiran($idDPT = null, $status = null)
    {
        $session    = session();
        $modelDPT   = new Model_dpt;
        $data = [
            'kehadiran' => $status
        ];
        $modelDPT->update($idDPT, $data);
        $ses_data = [
            'status'    => "Berhasil",
            'keterangan' => "Konfirmasi Kehadiran Berhasil"
        ];
        $session->set($ses_data);
        return redirect()->back();
    }
    public function tambahPemilih()
    {
        $session        = session();
        $modelDPT       = new Model_dpt;
        $nama           = $this->request->getPost('nama');
        $alamat         = $this->request->getPost('alamat');
        $jenisKelamin   = $this->request->getPost('jenisKelamin');
        $status         = $this->request->getPost('status');
        $data = [
            'namaPemilih' => $nama,
            'alamat' => $alamat,
            'jenisKelamin' => $jenisKelamin,
            'status' => $status,
            'kehadiran' => 1
        ];
        $modelDPT->insert($data);
        $ses_data = [
            'status'    => "Berhasil",
            'keterangan' => "Penambahan Pemilih Berhasil"
        ];
        $session->set($ses_data);
        return redirect()->back();
    }
}
