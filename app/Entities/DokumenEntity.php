<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class DokumenEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    public function setNamaDokumen($nama_dokumen)
    {
        $cleanInput = trim($nama_dokumen);
        $this->attributes['nama_dokumen'] = ucwords($cleanInput);
        return $this;
    }

    public function setKeterangan($keterangan)
    {
        // $cleanInput = trim($keterangan);
        $this->attributes['keterangan'] = ucwords($keterangan);
        return $this;
    }

    public function setFileDokumen($file_dokumen)
    {
        $str = ucwords($file_dokumen);
        $cleanInput = trim($str);
        $this->attributes['file_dokumen'] = str_replace(" ", "_", $cleanInput);
        return $this;
    }
}
