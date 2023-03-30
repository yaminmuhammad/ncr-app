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

    public function detail()
    {
        $data = [
            'title' => 'Detail Report',
            'report' => $this->reportModel->getReport()
        ];

        return view('report/index', $data);
    }
}
