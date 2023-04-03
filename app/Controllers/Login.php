<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Login;

class Login extends BaseController
{
    protected $M_Login;
    protected $session;
    public function __construct()
    {
        $this->M_Login = new M_Login();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('login', $data);
    }

    public function auth()
    {
        $nama = $this->request->getPost('nama');
        $npk = $this->request->getPost('npk');
        $cek = $this->M_Login->cek_login($nama, $npk);
        if (!empty($cek)) {
            $session_data = [
                'nama' => $cek['nama'],
                'npk' => $cek['npk'],
                'is_login' => true
            ];
            $this->session->set($session_data);
            return redirect()->to(base_url('home'));
        } else {
            $this->session->setFlashdata('msg', 'Nama atau NPK salah');
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('login'));
    }
}
