<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class PetaEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    public function setProyek($proyek)
    {
        $this->attributes['proyek'] = ucwords($proyek);
        return $this;
    }

    public function setKecamatan($kecamatan)
    {
        $this->attributes['kecamatan'] = ucwords($kecamatan);
        return $this;
    }

    public function setDesa($desa)
    {
        $this->attributes['desa'] = ucwords($desa);
        return $this;
    }

    public function setFileName($file_scan)
    {
        $this->attributes['file_scan'] = $file_scan;
        return $this;
    }
}
