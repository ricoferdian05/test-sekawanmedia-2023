<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModels extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'transaksi';
    protected $primaryKey       = 'transaksi_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'transaksi_id',
        'kendaraan_id',
        'driver_id',
        'nama_pemesan',
        'hp_pemesan',
        'tanggal_pemesanan',
        'tanggal_kembali',
        'status',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getByStatus()
    {
        return $this
            ->select('kendaraan.nama_kendaraan AS kendaraan,
        driver.nama_driver AS driver,
        nama_pemesan,
        hp_pemesan,
        tanggal_pemesanan,
        tanggal_kembali,
        status')
            ->join('kendaraan', 'kendaraan.kendaraan_id = transaksi.kendaraan_id')
            ->join('driver', 'driver.driver_id = transaksi.driver_id')
            ->orderBy('status', 'ASC');
    }

    public function getByAgreement1()
    {
        return $this
            ->select('
            transaksi.transaksi_id AS transaksi_id,
            kendaraan.nama_kendaraan AS kendaraan,
            driver.nama_driver AS driver,
            nama_pemesan,
            hp_pemesan,
            tanggal_pemesanan,
            tanggal_kembali,
            status')
            ->join('kendaraan', 'kendaraan.kendaraan_id = transaksi.kendaraan_id')
            ->join('driver', 'driver.driver_id = transaksi.driver_id')
            ->orderBy('status', 'ASC')
            ->where('status', '1');
    }

    public function getAllData()
    {
        return $this
            ->select(
                '
        transaksi_id,
        transaksi.kendaraan_id AS kendaraan_id,
        kendaraan.nama_kendaraan AS kendaraan,
        transaksi.driver_id AS driver_id,
        driver.nama_driver AS driver,
        nama_pemesan,
        hp_pemesan,
        tanggal_pemesanan,
        tanggal_kembali,
        status_pemesanan.status AS status'
            )
            ->join('kendaraan', 'kendaraan.kendaraan_id = transaksi.kendaraan_id')
            ->join('driver', 'driver.driver_id = transaksi.driver_id')
            ->join('status_pemesanan', 'status_pemesanan.status_id = transaksi.status')
            ->orderBy('tanggal_pemesanan', 'ASC')
            ->findAll();
    }

    public function getByKendaraan()
    {
        return $this
            ->select('transaksi.kendaraan_id AS kendaraan_id,
            COUNT(transaksi.kendaraan_id) AS jumlah')
            ->groupBy('kendaraan_id')
            ->where('status', '3')
            ->findAll();
    }
}
