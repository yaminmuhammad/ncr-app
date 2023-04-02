<?php

namespace App\Models;

use CodeIgniter\Model;

class Ncrprocess extends Model
{
    protected $table            = 'ncr_process';
    protected $allowedFields    = ['problem', 'area', 'qty', 'departemen', 'foto'];

    // Dates
    protected $useTimestamps = true;

    public function getProcess()
    {
        return $this->findAll();
    }
}
