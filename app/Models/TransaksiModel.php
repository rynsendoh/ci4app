<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $useTimestamps = 'true';

    public function saveTransaksi($data)
    {
        $query = $this->db->table('transaksi')->insert($data);
        return $query;
    }
}
