<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Ncrproduct;

class Product extends BaseController
{
    protected $ncrProduct;
    public function __construct()
    {
        $this->ncrProduct = new Ncrproduct();
    }

    public function create_product()
    {
        // $data = [
        //     'title' => 'Form Tambah Data Report',
        //     'validation' => \Config\Services::validation()
        // ];
        return view('form_product_view');
    }

    public function index()
    {
        //
    }

    public function save()
    {
        if (!$this->validate([
            'problem' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Problem harus diisi'
                ]
            ],
            'area' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Area harus diisi'
                ]
            ],
            'qty' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'QTY harus diisi'
                ]
            ],
            'departemen' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Departemen harus diisi'
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to('/form_product')->withInput('validation', $validation);
        }

        // insert data
        $this->ncrProduct->save([
            'problem' => $this->request->getVar('problem'),
            'area' => $this->request->getVar('area'),
            'qty' => $this->request->getVar('qty'),
            'departemen' => $this->request->getVar('departemen'),
            'foto' => $this->request->getFile('foto')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/form_product');
    }
}
