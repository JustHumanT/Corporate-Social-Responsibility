<?php

namespace App\Controllers;

use App\Models\Pengajuan_Pendanaan;

class Pengajuan extends BaseController
{
    protected $Pengajuan_Pendanaan;
    protected $helper = ['form', 'url'];

    public function __construct()
    {
        $this->Pengajuan_Pendanaan = new Pengajuan_Pendanaan();
    }
    public function index()
    {


        $data = [
            'title' => 'Pengajuan User',
            'validation' => \Config\Services::validation()
        ];
        return view('user/pengajuan', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'usulan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Usulan harus diisi'
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori harus diisi'
                ]
            ],
            'volume' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Volume harus diisi'
                ]
            ],
            'satuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Satuan harus diisi'
                ]
            ],
            'pagu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pagu harus diisi'
                ]
            ],
            'lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lokasi harus diisi'
                ]
            ],
            'filez' => [
                'rules' => 'uploaded[filez]|max_size[filez,10240]|ext_in[filez,pdf,doc,docx]',
                'errors' => [
                    'uploaded' => 'File harus ditambahkan',
                    'max_size' => 'Ukuran file harus kurang dari 10MB',
                    'ext_in' => 'File harus berformat pdf, doc, atau docx'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('vall', $validation->listErrors());

            return redirect()->back()->withInput();
        }

        // ambil gambar
        $fileDokumen = $this->request->getFile('filez');
        // pindahkan file ke folder img
        $fileDokumen->move('img');
        // ambil nama file sampul
        $namaFile = $fileDokumen->getName();

        $this->Pengajuan_Pendanaan->save([
            "usulan" => $this->request->getVar('usulan'),
            "kategori" => $this->request->getVar('kategori'),
            "volume" => $this->request->getVar('volume'),
            "satuan" => $this->request->getVar('satuan'),
            "pagu" => $this->request->getVar('pagu'),
            "lokasi" => $this->request->getVar('lokasi'),
            "filez" => $namaFile

        ]);
        return redirect()->to('/pengajuan');
    }

    public function download($id)
    {
        $filez = new Pengajuan_Pendanaan();
        $dataFile = $filez->find($id);
        return $this->response->download('img/' .$dataFile['filez'], null );
    }
}
