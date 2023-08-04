<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $menu = [
            'beranda' => [
                'title' => 'Beranda',
                'link' => base_url(),
                'icon' => 'fa-solid fa-house',
                'aktif' => 'active',
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
                'aktif' => '',
            ],
            'obat' => [
                'title' => 'Obat',
                'link' => base_url() . '/obat',
                'icon' => 'fa-solid fa-pills',
                'aktif' => '',
            ],
        ];
        $breadcrumb = ' <div class="col-sm-6">
                   <h1 class="m-0">Beranda</h1>
               </div>
               <div class="col-sm-6">
                   <ol class="breadcrumb float-sm-right">
                       <li class="breadcrumb-item active">Beranda</li>
                   </ol>
               </div>';
        $data['menu'] = $menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "Welcome to my Clinic Hospital As'adiyah";
        $data['selamat_datang'] = "Selamat datang di Rs. Clinik As'adiyah";
        return view('template/content', $data);
    }
}
