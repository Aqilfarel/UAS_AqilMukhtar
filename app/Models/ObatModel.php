<?php

namespace App\Models;

use CodeIgniter\Model;

class ObatModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'obat';
    protected $primaryKey       = 'id_obat';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['id_obat', 'nama_obat', 'ket_obat', 'satuan_obat', 'stok_obat', 'harga_beli', 'harga_jual'];
}
