<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DokterModel;

class Dokter extends BaseController
{
    protected $pm;
    private $menu;
    private $rules;
    public function __construct()
    {
        $this->pm = new DokterModel();

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
                'aktif' => '',
            ],
            'dokter' => [
                'title' => 'Dokter',
                'link' => base_url() . '/dokter',
                'icon' => 'fa-solid fa-user-doctor',
                'aktif' => 'active',
            ],
            'obat' => [
                'title' => 'Obat',
                'link' => base_url() . '/obat',
                'icon' => 'fa-solid fa-pills',
                'aktif' => '',
            ],
        ];

        $this->rules = [
            'id_dokter' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Id dokter tidak boleh kosong',
                ]
            ],
            'nama_dokter' =>
            [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama dokter tidak boleh kosong',
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
            'spesialis' =>
            [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Spesialis tidak boleh kosong',
                ]
            ],
            'no_hp' =>
            [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No Hp tidak boleh kosong',
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
                   <h1 class="m-0">Dokter</h1>
               </div>
               <div class="col-sm-6">
                   <ol class="breadcrumb float-sm-right">
                       <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                       <li class="breadcrumb-item active">Dokter</li>
                   </ol>
               </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "Data Dokter";

        $query = $this->pm->find();
        $data['data_dokter'] = $query;
        return view('dokter/content', $data);
    }

    public function tambah()
    {
        $breadcrumb = ' <div class="col-sm-6">
                   <h1 class="m-0">Dokter</h1>
               </div>
               <div class="col-sm-6">
                   <ol class="breadcrumb float-sm-right">
                       <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                       <li class="breadcrumb-item"><a href="' . base_url() . '/dokter">dokter</a></li>
                       <li class="breadcrumb-item active">Tambah Dokter</li>
                   </ol>
               </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Tambah Dokter';
        $data['action'] = base_url() . '/dokter/simpan';
        return view('dokter/input', $data);
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
            return redirect()->to('dokter')->with('success', 'Data berhasil disimpan');
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
            return redirect()->to('dokter')->with('success', 'Data dokter dengan kode' . $id . 'berhasil dihapus');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return redirect()->to('dokter')->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $breadcrumb = ' <div class="col-sm-6">
                   <h1 class="m-0">dokter</h1>
               </div>
               <div class="col-sm-6">
                   <ol class="breadcrumb float-sm-right">
                       <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                       <li class="breadcrumb-item"><a href="' . base_url() . '/dokter">dokter</a></li>
                       <li class="breadcrumb-item active">Edit Dokter</li>
                   </ol>
               </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Edit Dokter';
        $data['action'] = base_url() . '/dokter/update';

        $data['edit_data'] = $this->pm->find($id);
        return view('dokter/input', $data);
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
            return redirect()->to('dokter')->with('success', 'Data berhasil diupdate');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
