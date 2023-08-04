<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PasienModel;

class Pasien extends BaseController
{
    protected $pm;
    private $menu;
    private $rules;
    public function __construct()
    {
        $this->pm = new PasienModel();

        $this->menu = [
            'beranda' => [
                'title' => 'Beranda',
                'link' => base_url(),
                'icon' => 'fa-solid fa-house',
                'aktif' => '',
            ],
            'pasien' => [
                'title' => 'Pasien',
                'link' => base_url() . '/pasien',
                'icon' => 'fa-solid fa-users',
                'aktif' => 'active',
            ],
            'dokter' => [
                'title' => 'Dokter',
                'link' => base_url() . '/dokter',
                'icon' => 'fa-solid fa-user-doctor',
                'aktif' => '',
            ],
            'obat' => [
                'title' => 'Obat',
                'link' => base_url() . '/obat',
                'icon' => 'fa-solid fa-pills',
                'aktif' => '',
            ],
        ];

        $this->rules = [
            'id_pasien' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Id pasien tidak boleh kosong',
                ]
            ],
            'nama_pasien' =>
            [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama pasien tidak boleh kosong',
                ]
            ],
            'id_dokter' =>
            [
                'rules' => 'required',
                'errors' => [
                    'required' => 'id Dokter tidak boleh kosong',
                ]
            ],
            'id_obat' =>
            [
                'rules' => 'required',
                'errors' => [
                    'required' => 'id Obat tidak boleh kosong',
                ]
            ],
            'jenis_kelamin' =>
            [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin tidak boleh kosong',
                ]
            ],
            'umur' =>
            [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Umur tidak boleh kosong',
                ]
            ],
            'keluhan_penyakit' =>
            [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keluhan Penyakit tidak boleh kosong',
                ]
            ],
            'tgl_periksa' =>
            [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tgl Periksa tidak boleh kosong',
                ]
            ],
            'alamat' =>
            [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat tidak boleh kosong',
                ]
            ],
        ];
    }
    public function index()
    {

        $breadcrumb = ' <div class="col-sm-6">
                   <h1 class="m-0">Pasien</h1>
               </div>
               <div class="col-sm-6">
                   <ol class="breadcrumb float-sm-right">
                       <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                       <li class="breadcrumb-item active">Pasien</li>
                   </ol>
               </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "Data Pasien";

        $query = $this->pm->find();
        $data['data_pasien'] = $query;
        return view('pasien/content', $data);
    }

    public function tambah()
    {
        $breadcrumb = ' <div class="col-sm-6">
                   <h1 class="m-0">Pasien</h1>
               </div>
               <div class="col-sm-6">
                   <ol class="breadcrumb float-sm-right">
                       <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                       <li class="breadcrumb-item"><a href="' . base_url() . '/pasien">pasien</a></li>
                       <li class="breadcrumb-item active">Tambah Pasien</li>
                   </ol>
               </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Tambah Pasien';
        $data['action'] = base_url() . '/pasien/simpan';
        return view('pasien/input', $data);
    }

    public function simpan()
    {

        if (!$this->request->is('post')) {

            return redirect()->back()->withInput();
        }
        if (!$this->validate($this->rules)) {

            return redirect()->back()->withInput();
        }
        $dt = $this->request->getPost();
        try {
            $simpan = $this->pm->insert($dt);
            return redirect()->to('pasien')->with('success', 'Data berhasil disimpan');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {

            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
    public function hapus($id)
    {
        if (empty($id)) {
            return redirect()->back()->with('error', 'Hapus data gagal dilakukan');
        }

        try {
            $this->pm->delete($id);
            return redirect()->to('pasien')->with('success', 'Data pasien dengan kode' . $id . 'berhasil dihapus');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return redirect()->to('pasien')->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $breadcrumb = ' <div class="col-sm-6">
                   <h1 class="m-0">Pasien</h1>
               </div>
               <div class="col-sm-6">
                   <ol class="breadcrumb float-sm-right">
                       <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                       <li class="breadcrumb-item"><a href="' . base_url() . '/pasien">pasien</a></li>
                       <li class="breadcrumb-item active">Edit Pasien</li>
                   </ol>
               </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Edit Pasien';
        $data['action'] = base_url() . '/pasien/update';

        $data['edit_data'] = $this->pm->find($id);
        return view('pasien/input', $data);
    }

    public function update()
    {
        $dtEdit = $this->request->getPost();
        $param = $dtEdit['param'];
        unset($dtEdit['param']);

        if (!$this->validate($this->rules)) {

            return redirect()->back()->withInput();
        }

        try {
            $this->pm->update($param, $dtEdit);
            return redirect()->to('pasien')->with('success', 'Data berhasil diupdate');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
