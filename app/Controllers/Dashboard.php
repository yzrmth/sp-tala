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

    public function scan_peta_dashboard()
    {
        $data = [
            'title' => 'UPLOAD SCAN PETA'
        ];
        return view('ScanPeta/index', $data);
    }

    public function dataDigitasi()
    {
        $data = [
            'data' => $this->FileDigitasiModel->findAll()
        ];

        if ($data) {
            return $this->respond($data, 200);
        } else {
            return $this->fail($this->FileDigitasiModel->errors(), 400);
        }
    }

    public function dataScanPeta()
    {
        $data = [
            'data' => $this->FileScanModel->get_all_uploaded()
        ];

        if ($data) {
            return $this->respond($data, 200);
        } else {
            return $this->fail($this->FileScanModel->errors(), 400);
        }
    }
}
