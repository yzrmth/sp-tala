<?php

namespace App\Models;

use CodeIgniter\Model;

class FileDigitasiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_digitasi';
    protected $primaryKey       = 'id_digitasi';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'fk_peta',
        'nama_file_digitasi',
        'status',
        'created_at', 'deleted_at', 'updated_at'
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

    public function countDigitasi()
    {
        return $this->db->table('tb_digitasi')
            ->countAllResults();
    }

    public function get_all_digitasi()
    {
        return $this->db->table('tb_digitasi')
            ->join('tb_peta_scan', 'tb_digitasi.fk_peta=tb_peta_scan.id_peta', 'left')
            ->get()->getResult();
    }

    public function get_digitasi($id = null)
    {
        return $this->db->table('tb_digitasi')
            ->where('id_digitasi', $id)
            ->get()->getRow();
    }

    public function countTerdudukan()
    {
        return $this->db->table('tb_digitasi')
            ->where('status', 'Sudah Terdudukan')
            ->countAllResults();
    }

    public function countBelumTerdudukan()
    {
        return $this->db->table('tb_digitasi')
            ->where('status', 'Belum Terdudukan')
            ->countAllResults();
    }

    // Hapus Digitasi Peta Menggunakan transaction
    public function Hapus($data_riwayat, $id_digitasi)
    {
        $RiwayatModel = $this->db->table('tb_riwayat');

        $this->db->transBegin();
        // hapus data di table digitasi
        $this->delete($id_digitasi);

        // insert data ke table scan riwayat
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

    public function Upload($data_riwayat, $data)
    {
        $RiwayatModel = $this->db->table('tb_riwayat');

        $this->db->transBegin();
        // hapus data di table digitasi
        $this->save($data);

        // insert data ke table scan riwayat
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
