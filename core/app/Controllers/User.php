<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_user;
use App\Models\Model_data;

class User extends BaseController
{
    use ResponseTrait;
    public function login()
    {
        $session        = session();
        $modelUser      = new Model_user;
        $modelData      = new Model_data;
        $username       = $this->request->getPost('username');
        $password       = $this->request->getPost('password');
        $cekUsername    = $modelData->cekUsername($username);
        if ($cekUsername == null) {
            $ses_data = [
                'status'    => "Gagal",
                'keterangan' => "Akun anda tidak ditemukan"
            ];
            $session->set($ses_data);
            return redirect()->back();
        }
        $cekPassword    = password_verify($password, $cekUsername[0]['password']);
        if ($cekPassword == true) {
            $ses_data = [
                'login'         => "1",
                'status'        => "Berhasil",
                'keterangan'    => "Anda berhasil login"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url() . 'Dashboard');
        } else {
            $ses_data = [
                'status'    => "Gagal",
                'keterangan' => "Mohon Maaf Password anda salah"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url());
        }
    }
    public function create()
    {
        $session         = session();
        $modelUser       = new Model_user;
        $modelData       = new Model_data;
        $username        = $this->request->getPost('username');
        $password        = $this->request->getPost('password');
        $hashPassword   = [
            'cost' => 10,
        ];
        $cekUsername = $modelData->cekUsername($username);
        if ($cekUsername != null) {
            $ses_data = [
                'status'    => "Gagal",
                'keterangan' => "Mohon Maaf, username yang anda daftarkan sudah ada",
            ];
            $session->set($ses_data);
            return redirect()->back();
        }
        $data = [
            'username'   => $username,
            'password'   => password_hash($password, PASSWORD_DEFAULT, $hashPassword)
        ];
        $modelUser->insert($data);
        $ses_data = [
            'status'    => "Berhasil",
            'keterangan' => "Penambahan User Telah Berhasil",
        ];
        $session->set($ses_data);
        return redirect()->back();
    }
    public function hapus($idUser)
    {
        $session         = session();
        $modelUser       = new Model_user;
        $modelUser->delete($idUser);
        $ses_data = [
            'status'    => "Berhasil",
            'keterangan' => "Penghapusan User Telah Berhasil",
        ];
        $session->set($ses_data);
        return redirect()->back();
    }
    public function keluar()
    {
        $session     = session();
        $session->destroy();
        return redirect()->to(base_url());
    }
}
