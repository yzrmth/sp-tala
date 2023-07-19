<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisDokumenModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_jenis_dokumen';
    protected $primaryKey       = 'id_jenis_dokumen';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\JenisDokumenEntity';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'jenis_dokumen',
        'keterangan'
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

    public function get_all_jenis_dokumen()
    {
        return $this->db->table('tb_jenis_dokumen')
            ->get()->getResult();
    }
}
