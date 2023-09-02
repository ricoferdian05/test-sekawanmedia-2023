<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Agreement extends BaseController
{
    public function index()
    {
        $builderTransaksi = new \App\Models\TransaksiModels();
        $builderUser = new \App\Models\UserModels();
        $builderKendaraan = new \App\Models\KendaraanModels();

        $user = $builderUser->getUserAgreement(session()->get('user_id'));
        $transaksi = $builderTransaksi->getByKendaraan();
        $kendaraan = $builderKendaraan->findAll();

        $data = [
            'title' => 'Dashboard Agreement',
            'user' => $user,
            'transaksi' => $transaksi,
            'kendaraan' => $kendaraan,
        ];

        return view('agreement/dashboard', $data);
    }
}
