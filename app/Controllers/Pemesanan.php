<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pemesanan extends BaseController
{
    public function index()
    {
        $builderUser = new \App\Models\UserModels();
        $builderKendaraan = new \App\Models\KendaraanModels();
        $builderDriver = new \App\Models\DriverModels();

        $user = $builderUser->find(session()->get('user_id'));
        $kendaraan = $builderKendaraan->findAll();
        $driver = $builderDriver->findAll();

        $data = [
            'title' => 'Pemesanan Kendaraan',
            'user' => $user,
            'kendaraan' => $kendaraan,
            'driver' => $driver,
        ];

        return view('admin/pemesanan', $data);
    }

    public function tambah()
    {
        $id_pemesanan = uniqid('transaksi-', true);
        $kendaraan_id = $this->request->getVar('kendaraan');
        $driver_id = $this->request->getVar('driver');
        $nama_pemesan = $this->request->getVar('nama_pemesan');
        $hp_pemesan = $this->request->getVar('hp_pemesan');
        $tanggal_pemesanan = $this->request->getVar('tanggal_pemesanan');
        $tanggal_kembali = $this->request->getVar('tanggal_kembali');

        $data = [
            'transaksi_id' => $id_pemesanan,
            'kendaraan_id' => $kendaraan_id,
            'driver_id' => $driver_id,
            'nama_pemesan' => $nama_pemesan,
            'hp_pemesan' => $hp_pemesan,
            'tanggal_pemesanan' => $tanggal_pemesanan,
            'tanggal_kembali' => $tanggal_kembali,
            'status' => 0,
        ];

        $builderTransaksi = new \App\Models\TransaksiModels();

        if ($builderTransaksi->insert($data) === 0) {
            session()->setFlashdata('success', 'Data Pemesanan Berhasil Dikirim!!!');
            return redirect()->back();
        } else {
            session()->setFlashdata('error', 'Data Pemesanan Gagal Dikirim!!!');
            return redirect()->back();
        }
    }
}
