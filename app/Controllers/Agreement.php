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

        $dataUser = $builderUser->getUserAgreement(session()->get('user_id'));
        $transaksi = $builderTransaksi->getByKendaraan();
        $kendaraan = $builderKendaraan->findAll();

        $pemesanan = $builderTransaksi->getByStatus()->paginate(10, 'pemesanan');

        $pager = $builderTransaksi->pager;
        $urutan = $this->request->getVar('page_pemesanan') ? $this->request->getVar('page_pemesanan') : 1;


        $data = [
            'title' => 'Dashboard Agreement',
            'dataUser' => $dataUser,
            'transaksi' => $transaksi,
            'kendaraan' => $kendaraan,
            'pemesanan' => $pemesanan,
            'urutan' => $urutan,
            'pager' => $pager,
        ];

        return view('agreement/dashboard', $data);
    }
}
