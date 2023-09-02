<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $builderTransaksi = new \App\Models\TransaksiModels();
        $builderUser = new \App\Models\UserModels();
        $builderKendaraan = new \App\Models\KendaraanModels();

        $user = $builderUser->find(session()->get('user_id'));
        $transaksi = $builderTransaksi->getByKendaraan();
        $kendaraan = $builderKendaraan->findAll();
        // dd($transaksi);

        $data = [
            'title' => 'Dashboard Admin',
            'user' => $user,
            'transaksi' => $transaksi,
            'kendaraan' => $kendaraan,
        ];

        return view('admin/dashboard', $data);
    }
}
