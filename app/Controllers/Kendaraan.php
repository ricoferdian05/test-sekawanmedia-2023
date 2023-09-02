<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kendaraan extends BaseController
{
    public function index()
    {
        $builderUser = new \App\Models\UserModels();
        $builderKendaraan = new \App\Models\KendaraanModels();

        $urutan = $this->request->getVar('page_kendaraan') ? $this->request->getVar('page_kendaraan') : 1;
        $kendaraan = $builderKendaraan->paginate(10, 'kendaraan');
        $pager = $builderKendaraan->pager;
        $user = $builderUser->find(session()->get('user_id'));

        $data = [
            'title' => 'Kendaraan',
            'user' => $user,
            'kendaraan' => $kendaraan,
            'pager' => $pager,
            'urutan' => $urutan,
        ];

        if ($user['role'] === '1') {
            return view('admin/kendaraan', $data);
        } elseif ($user['role'] === '2' || $user['role'] === '3') {
            return view('agreement/kendaraan', $data);
        }
    }
}
