<?php

namespace App\Models;

use CodeIgniter\Model;

class DokterModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'dokter';
    protected $primaryKey       = 'id_dokter';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['id_dokter', 'nama_dokter', 'jenis_kelamin', 'umur', 'spesialis', 'no_hp', 'alamat'];
}
