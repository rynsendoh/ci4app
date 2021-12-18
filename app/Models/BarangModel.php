<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $useTimestamps = 'true';
    // protected $allowedFields = ['kode_salesman', 'nama_salesman'];

    public function saveBarang($data)
    {
        $query = $this->db->table('barang')->insert($data);
        return $query;
    }
}
