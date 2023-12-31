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
        $dataUser = null;

        if ($user['role'] === '2') {
            $dataUser = $builderUser->getUserAgreement(session('user_id'));
            $transaksi = $builderTransaksi->getByAgreement1()->paginate(10, 'transaksi');
        } elseif ($user['role'] === '3') {
            $dataUser = $builderUser->getUserAgreement(session('user_id'));
            $transaksi = $builderTransaksi->getByAgreement2()->paginate(10, 'transaksi');
        } else {
            $transaksi = $builderTransaksi->getByStatus()->paginate(10, 'transaksi');
        }

        $pager = $builderTransaksi->pager;
        $urutan = $this->request->getVar('page_transaksi') ? $this->request->getVar('page_transaksi') : 1;

        $data = [
            'title' => 'Transaksi',
            'user' => $user,
            'transaksi' => $transaksi,
            'pager' => $pager,
            'urutan' => $urutan,
            'dataUser' => $dataUser,
        ];

        if ($user['role'] === '1') {
            return view('admin/transaksi', $data);
        } elseif ($user['role'] === '2' || $user['role'] === '3') {
            return view('agreement/transaksi', $data);
        }
    }

    public function cetak()
    {
        $builderTransaksi = new \App\Models\TransaksiModels();

        $transaksi = $builderTransaksi->getAllData();

        $data = [
            'transaksi' => $transaksi,
        ];
        log_message('info', "User with ID " . session()->get('user_id') . " print all data transaksi");
        return view('admin/transaksi/cetak', $data);
    }

    public function setuju($id)
    {
        $builderTransaksi = new \App\Models\TransaksiModels();
        $builderUser = new \App\Models\UserModels();

        $user = $builderUser->find(session()->get('user_id'));

        if ($user['role'] === '2') {
            $builderTransaksi->set('status', '2');
            $builderTransaksi->where('transaksi_id', $id);
            if ($builderTransaksi->update()) {
                log_message('info', "User with ID " . session()->get('user_id') . " update status of transaksi with transaksi_id" . $id);
                session()->setFlashData('success_setuju', 'Pemesanan ' . $id . ' Disetujui');
            }
        } elseif ($user['role'] === '3') {
            $builderTransaksi->set('status', '3');
            $builderTransaksi->where('transaksi_id', $id);
            if ($builderTransaksi->update()) {
                log_message('info', "User with ID " . session()->get('user_id') . " update status of transaksi with transaksi_id" . $id);
                session()->setFlashData('success_setuju', 'Pemesanan ' . $id . ' Disetujui');
            }
        }
        return redirect()->back();
    }

    public function tolak($id)
    {
        $builderTransaksi = new \App\Models\TransaksiModels();

        $builderTransaksi->where('transaksi_id', $id);
        if ($builderTransaksi->delete()) {
            log_message('info', "User with ID " . session()->get('user_id') . " delete data of transaksi with transaksi_id" . $id);
            session()->setFlashData('success_tolak', 'Pemesanan ' . $id . ' Ditolak');
        }
        return redirect()->back();
    }
}
