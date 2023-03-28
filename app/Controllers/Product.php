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

    public function index()
    {
        //
    }

    public function save()
    {
        // insert data
        $this->ncrProduct->save([
            'problem' => $this->request->getVar('problem'),
            'area' => $this->request->getVar('area'),
            'qty' => $this->request->getVar('qty'),
            'departemen' => $this->request->getVar('departemen'),
            'foto' => $this->request->getFile('foto')
        ]);
    }
}
