<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Ncrproduct;

class Product extends BaseController
{
    protected $ncrProduct;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->ncrProduct = new Ncrproduct();
    }

    public function create_product()
    {
        session();
        $data = [
            'title' => 'Form Tambah Data Report',
        ];
        return view('form_product_view', $data);
    }

    public function index_product()
    {
        $product = $this->ncrProduct->findAll();
        $data = [
            'product' => $product
        ];
        return view('report/index_product_view', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'problem' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi'
                ]
            ],
            'area' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi'
                ]
            ],
            'qty' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi'
                ]
            ],
            'departemen' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi'
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
            // $validation = \Config\Services::validation();

            return redirect()->to('/form_product')->withInput();
        }

        // ambil foto 
        $fileFoto = $this->request->getFile('foto');
        // apakah tidak ada foto yang diupload
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default.jpg';
        } else {
            // generate nama file random
            $namaFoto = $fileFoto->getRandomName();
            // pindahkan file ke folder img
            $fileFoto->move('img', $namaFoto);
        }

        // insert data
        $this->ncrProduct->save([
            'problem' => $this->request->getVar('problem'),
            'area' => $this->request->getVar('area'),
            'qty' => $this->request->getVar('qty'),
            'departemen' => $this->request->getVar('departemen'),
            'foto' => $namaFoto
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/form_product');
    }
}
