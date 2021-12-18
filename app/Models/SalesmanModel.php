<?php

namespace App\Models;

use CodeIgniter\Model;

class SalesmanModel extends Model
{
    protected $table = 'salesman';
    protected $useTimestamps = 'true';
    // protected $allowedFields = ['kode_salesman', 'nama_salesman'];

    public function saveSalesman($data)
    {
        $query = $this->db->table('salesman')->insert($data);
        return $query;
    }
}
