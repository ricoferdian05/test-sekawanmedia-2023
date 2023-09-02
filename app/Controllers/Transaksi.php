<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Transaksi extends BaseController
{
    public function index()
    {
        $builderUser = new \App\Models\UserModels();
        $builderTransaksi = new \App\Models\TransaksiModels();

        $user = $builderUser->find(session('user_id'));

        $transaksi = $builderTransaksi->getByStatus()->paginate(10, 'transaksi');
        $pager = $builderTransaksi->pager;
        $urutan = $this->request->getVar('page_transaksi') ? $this->request->getVar('page_transaksi') : 1;

        $data = [
            'title' => 'Transaksi',
            'user' => $user,
            'transaksi' => $transaksi,
            'pager' => $pager,
            'urutan' => $urutan,
        ];

        if ($user['role'] === '1') {
            return view('admin/transaksi', $data);
        } elseif ($user['role'] === '2' || $user['role'] === '3') {
            return view('agreement/transaksi', $data);
        }
    }
}
