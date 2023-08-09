<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_riwayat';
    protected $primaryKey       = 'id_riwayat';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'fk_user', 'fk_peta', 'jenis_file', 'nama_file', 'aksi', 'tanggal', 'keterangan'

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

    public function getRiwayat($id)
    {
        return $this->db->table('tb_riwayat')
            ->join('tb_peta_scan', 'tb_riwayat.fk_peta=tb_peta_scan.id_peta')
            ->join('users', 'tb_riwayat.fk_user=users.id')
            ->where('fk_peta', $id)
            ->get()->getResultObject();
    }
}
