<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
    protected $table            = 'report';
    protected $allowedFields    = ['foto', 'slug', 'problem', 'area', 'qty', 'departemen'];
    protected $useTimestamps    = true;
}
