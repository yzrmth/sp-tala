<?php

namespace App\Models;

use CodeIgniter\Model;

class PetaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_peta_scan';
    protected $primaryKey       = 'id_peta';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\PetaEntity';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'proyek',
        'nomor_peta',
        'tahun',
        'kecamatan',
        'desa',
        'file_scan'
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

    public function get_peta($id = null)
    {
        return $this->db->table('tb_peta_scan')
            ->where('id_peta', $id)
            ->join('tb_image_scan', 'tb_peta_scan.id_peta=tb_image_scan.fk_peta', 'left')
            ->join('tb_digitasi', 'tb_peta_scan.id_peta=tb_digitasi.fk_peta', 'left')
            ->get()->getRow();
    }

    public function get_all_peta()
    {
        return $this->db->table('tb_peta_scan')
            ->join('tb_image_scan', 'tb_peta_scan.id_peta=tb_image_scan.fk_peta', 'left')
            ->join('tb_digitasi', 'tb_peta_scan.id_peta=tb_digitasi.fk_peta', 'left')
            ->get()->getResult();
    }

    public function get_peta_terdudukan()
    {
        return $this->db->table('tb_peta_scan')
            ->join('tb_image_scan', 'tb_peta_scan.id_peta=tb_image_scan.fk_peta', 'left')
            ->join('tb_digitasi', 'tb_peta_scan.id_peta=tb_digitasi.fk_peta', 'left')
            ->where('status', 'Sudah Terdudukan')
            ->get()->getResult();
    }

    public function upload_peta($data_scan, $data_peta, $data_riwayat)
    {
        $ScanModel = $this->db->table('tb_image_scan');
        $RiwayatModel = $this->db->table('tb_riwayat');

        $this->db->transBegin();
        // insert data te tabel tb_peta_scan
        $this->save($data_peta);

        // insert data ke table scan peta
        $ScanModel->insert($data_scan);

        // insert data ke table scan peta
        $RiwayatModel->insert($data_riwayat);




        $this->db->transCommit();
        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
            return false;
        } else {
            $this->db->transCommit();
            return true;
        }
    }
}
