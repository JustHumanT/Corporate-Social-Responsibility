<?php

namespace App\Controllers;

use App\Models\Pengajuan_Pendanaan;
class PengajuanAdmin extends BaseController
{
    protected $Pengajuan_Pendanaan;
    public function __construct()
    {
        $this->Pengajuan_Pendanaan = new Pengajuan_Pendanaan();
    }
    public function index()
    {
        $Pengajuan_Pendanaan = $this->Pengajuan_Pendanaan->findAll();
        $data = [
            'title' => 'Pengajuan',
            'pengajuan_pendanaan' => $Pengajuan_Pendanaan
            
        ];
        
        return view('admin/pendanaan', $data);
    }
}
