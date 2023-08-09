<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Models\PetaModel;
use CodeIgniter\RESTful\ResourceController;

class Digitasi extends ResourceController
{
    protected $PetaModel;

    public function __construct()
    {
        $this->PetaModel = new PetaModel();
    }

    public function index()
    {
        //
    }

    public function DigitasiTerdudukan()
    {
        $data = [
            'data' => $this->PetaModel->get_peta_terdudukan()
        ];

        if ($data) {
            return $this->respond($data, 200);
        } else {
            return $this->fail($this->PetaModel->errors(), 400);
        }
    }
}
