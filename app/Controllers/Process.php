<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Ncrprocess;

class Process extends BaseController
{
    protected $ncrProcess;
    public function __construct()
    {
        $this->ncrProcess = new Ncrprocess();
    }

    public function save()
    {
        // insert data
        $this->ncrProcess->save([
            'problem' => $this->request->getVar('problem'),
            'area' => $this->request->getVar('area'),
            'qty' => $this->request->getVar('qty'),
            'departemen' => $this->request->getVar('departemen'),
            'foto' => $this->request->getFile('foto')
        ]);
    }
    public function index()
    {
        //
    }
}
