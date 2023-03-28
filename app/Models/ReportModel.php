<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
    protected $table            = 'report';
    protected $allowedFields    = ['foto', 'slug', 'problem', 'area', 'qty', 'departemen'];
    protected $useTimestamps    = true;

    public function getReport($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
