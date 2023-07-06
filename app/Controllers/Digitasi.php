<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FileDigitasiModel;
use CodeIgniter\RESTful\ResourceController;

class Digitasi extends ResourceController
{
    protected $FileDigitasiModel;

    public function __construct()
    {
        $this->FileDigitasiModel = new FileDigitasiModel();
    }

    public function index()
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

    public function show($id = null)
    {
        # code...
    }
}
