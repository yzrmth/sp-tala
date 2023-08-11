<?php

namespace App\Models;

use CodeIgniter\Model;

class DokumenModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_dokumen';
    protected $primaryKey       = 'id_dokumen';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\DokumenEntity';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'fk_jenis_dokumen',
        'nama_dokumen',
        'keterangan',
        'file_dokumen'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'fk_jenis_dokumen'          => 'required',
        'nama_dokumen'          => 'required',
        'keterangan'          => 'required',
        'file_dokumen'          => 'required|mime_in[file_dokumen,application/pdf,csv,ppt,doc,xls]',
    ];
    protected $validationMessages   = [
        'fk_jenis_dokumen' => [
            'required' => 'Harus diisi.',
        ],
        'nama_dokumen' => [
            'required' => 'Harus diisi.',
        ],
        'keterangan' => [
            'required' => 'Harus diisi.',
        ],
        'file_dokumen' => [
            'required' => 'Harus diisi.',
            'mime_in[application/pdf]' => 'File yang diunggah harus pdf.',
        ],
    ];
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

    public function get_all_dokumen()
    {
        return $this->db->table('tb_dokumen')
            ->where('tb_dokumen.deleted_at',)
            ->join('tb_jenis_dokumen', 'tb_dokumen.fk_jenis_dokumen=tb_jenis_dokumen.id_jenis_dokumen', 'left')
            ->get()->getResult();
    }

    public function get_dokumen($id = null)
    {
        return $this->db->table('tb_dokumen')
            ->where('id_dokumen', $id)
            ->join('tb_jenis_dokumen', 'tb_dokumen.fk_jenis_dokumen=tb_jenis_dokumen.id_jenis_dokumen')
            ->get()->getRow();
    }
}
