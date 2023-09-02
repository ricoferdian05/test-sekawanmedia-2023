<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $builderTransaksi = new \App\Models\TransaksiModels();
        $builderUser = new \App\Models\UserModels();

        $user = $builderUser->find(session()->get('user_id'));
        $transaksi = $builderTransaksi->findAll();

        $data = [
            'title' => 'Dashboard Admin',
            'user' => $user,
            'transaksi' => $transaksi,
        ];

        return view('admin/dashboard', $data);
    }
}
