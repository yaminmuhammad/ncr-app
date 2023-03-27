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
        $report = $this->reportModel->findAll();

        $data = [
            'title' => 'Report | NCR App',
            'report' => $report
        ];
        return view('form', $data);
    }
}
