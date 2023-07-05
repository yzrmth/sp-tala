<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FileDigitasiModel;
use App\Models\FileScanModel;
use App\Models\PetaModel;
use CodeIgniter\RESTful\ResourceController;

class Dashboard extends ResourceController
{
    protected $format = 'json';
    protected $PetaModel;
    protected $PetaEntity;
    protected $FileScanModel;
    protected $FileDigitasiModel;

    public function __construct()
    {
        $this->PetaModel = new PetaModel();
        $this->FileScanModel = new FileScanModel();
        $this->FileDigitasiModel = new FileDigitasiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'j_peta' => $this->PetaModel->countAllResults(),
            'j_peta_upload' => $this->FileScanModel->countAllResults(),
            'j_digitasi' => $this->FileDigitasiModel->countAllResults(),
        ];
        return view('Dashboard/index', $data);
    }
}
