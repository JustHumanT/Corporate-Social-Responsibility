<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengajuan_Pendanaan extends Model
{
    protected $allowedFields = ['id', 'usulan', 'kategori', 'volume', 'satuan', 'pagu', 'lokasi', 'filez'];
    protected $table = 'pengajuan_pendanaan';
}