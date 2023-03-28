<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReportModel;

class Report extends BaseController
{
    protected $reportModel;
    public function __construct()
    {
        $this->reportModel = new ReportModel();
    }
    public function index()
    {
        return view('login');
    }

    public function home()
    {
        return view('home');
    }

    public function detail($slug)
    {
        $report = $this->reportModel->where(['slug' => $slug])->first();
        dd($report);
    }

    public function create_product()
    {
        // $data = [
        //     'title' => 'Form Tambah Data Report',
        //     'validation' => \Config\Services::validation()
        // ];
        return view('form_product_view');
    }

    public function create_process()
    {
        // $data = [
        //     'title' => 'Form Tambah Data Report',
        //     'validation' => \Config\Services::validation()
        // ];
        return view('form_process_view');
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'problem' => [
                'rules' => 'required[report.problem]',
                'errors' => [
                    'required' => 'Problem harus diisi.'
                ]
            ],
            'area' => [
                'rules' => 'required[report.area]',
                'errors' => [
                    'required' => 'Area harus diisi.'
                ]
            ],
            'qty' => [
                'rules' => 'required[report.qty]',
                'errors' => [
                    'required' => 'Qty harus diisi.'
                ]
            ],
            'departemen' => [
                'rules' => 'required[report.departemen]',
                'errors' => [
                    'required' => 'Departemen harus diisi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/form')->withInput()->with('validation', $validation);
        }


        $this->reportModel->save([
            'problem' => $this->request->getVar('problem'),
            'area' => $this->request->getVar('area'),
            'qty' => $this->request->getVar('qty'),
            'departemen' => $this->request->getVar('departemen')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/form');
    }
}
