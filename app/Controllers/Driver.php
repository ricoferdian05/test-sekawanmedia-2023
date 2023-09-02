<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Driver extends BaseController
{
    public function index()
    {
        $builderUser = new \App\Models\UserModels();
        $builderDriver = new \App\Models\DriverModels();

        $urutan = $this->request->getVar('page_driver') ? $this->request->getVar('page_driver') : 1;
        $driver = $builderDriver->paginate(10, 'driver');
        $pager = $builderDriver->pager;
        $user = $builderUser->find(session()->get('user_id'));

        $data = [
            'title' => 'Driver',
            'user' => $user,
            'driver' => $driver,
            'pager' => $pager,
            'urutan' => $urutan,
        ];

        if ($user['role'] === '1') {
            return view('admin/driver', $data);
        }
    }
}
