<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pemesanan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Pemesanan Kendaraan',
        ];

        return view('admin/pemesanan', $data);
    }
}
