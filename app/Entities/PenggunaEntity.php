<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class PenggunaEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    public function setNama($nama)
    {
        $this->attributes['nama'] = ucwords($nama);
        return $this;
    }

    public function setJabatan($jabatan)
    {
        $this->attributes['jabatan'] = ucwords($jabatan);
        return $this;
    }
}
