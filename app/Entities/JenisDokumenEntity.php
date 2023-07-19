<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class JenisDokumenEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    public function setJenisDokumen($jenis_dokumen)
    {
        $this->attributes['jenis_dokumen'] = ucwords($jenis_dokumen);
        return $this;
    }

    public function setKeterangan($keterangan)
    {
        $this->attributes['keterangan'] = ucwords($keterangan);
        return $this;
    }
}
