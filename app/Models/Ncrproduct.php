<?php

namespace App\Models;

use CodeIgniter\Model;

class Ncrproduct extends Model
{
    protected $table            = 'ncr_product';
    protected $allowedFields    = ['problem', 'area', 'qty', 'departemen', 'foto',];

    // Dates
    protected $useTimestamps = true;
}
