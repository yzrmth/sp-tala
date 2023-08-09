<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama', 'nip', 'jabatan',
        'email', 'username', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at',
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

    public function get_all_users()
    {
        return $this->select('nama, jabatan, username, email, active, gs.group_id, gs.user_id, g.name')
            ->join('auth_groups_users gs', 'users.id=gs.user_id')
            ->join('auth_groups g', 'g.id = gs.group_id')
            ->findAll();
    }

    public function get_user($id = null)
    {
        return $this->select('nama,nip, jabatan, username, email,  active,description, gs.group_id, gs.user_id, g.name')
            ->join('auth_groups_users gs', 'users.id=gs.user_id')
            ->join('auth_groups g', 'g.id = gs.group_id')
            ->find($id);
    }

    public function user($id = null)
    {
        return $this->select('nama,nip, jabatan, username, email,  active')
            ->find($id);
    }

    public function get_role()
    {
        return $this->db->table('auth_groups')
            ->get()->getResult();
    }

    public function get_users()
    {
        return $this->select('nama, jabatan, username, email, active, gs.group_id, gs.user_id, g.name')
            ->findAll();
    }

    public function edit_pengguna($user_id, $role_id)
    {
        # code...
    }
}
