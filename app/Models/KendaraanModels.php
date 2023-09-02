<?php

namespace App\Models;

use CodeIgniter\Model;

class KendaraanModels extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kendaraan';
    protected $primaryKey       = 'kendaraan_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kendaraan_id',
        'plat_nomor',
        'jenis_kendaraan',
        'nama_kendaraan',
        'bbm',
        'jadwal_service',
        'pemilik',
        'gambar_kendaraan',
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
}
