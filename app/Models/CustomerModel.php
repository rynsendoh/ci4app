<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customer';
    protected $useTimestamps = 'true';
    // protected $allowedFields = ['kode_salesman', 'nama_salesman'];

    public function saveCustomer($data)
    {
        $query = $this->db->table('customer')->insert($data);
        return $query;
    }
}
