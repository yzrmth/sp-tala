<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FileDigitasiModel;
use App\Models\PetaModel;
use CodeIgniter\RESTful\ResourceController;

use function PHPUnit\Framework\returnSelf;

class Digitasi extends ResourceController
{
    protected $FileDigitasiModel;
    protected $PetaModel;

    public function __construct()
    {
        $this->FileDigitasiModel = new FileDigitasiModel();
        $this->PetaModel = new PetaModel();
    }

    public function index()
    {
        $data = [
            'data' => $this->FileDigitasiModel->get_all_digitasi()
        ];

        if ($data) {
            return $this->respond($data, 200);
        } else {
            return $this->fail($this->FileDigitasiModel->errors(), 400);
        }
    }

    public function show($id = null)
    {
        $data = [
            'title' => 'DIGITASI PETA'
        ];
        return view('Digitasi/index', $data);
    }

    public function DaftarTerdudukan()
    {
        $data = [
            'title' => 'DAFTAR PETA YANG SUDAH TERDUDUKAN'
        ];

        return view('Dashboard/daftar_peta_terdudukan.php', $data);
    }
}
