<?php

namespace App\Models;

use CodeIgniter\Model;

class FileScanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_image_scan';
    protected $primaryKey       = 'id_scan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_file',
        'fk_peta',
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

    public function get_all_file_scan()
    {
        return $this->db->table('tb_digitasi')
            ->join('tb_peta_scan', 'tb_digitasi.fk_peta=tb_peta_scan.id_peta', 'left')
            ->get()->getResult();
    }
}
