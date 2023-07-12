<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;

class Dokumen extends ResourceController
{
    public function index()
    {
        $data = [
            'title' => 'Manajemen Dokumen'
        ];
        return view('Dokemen/index', $data);
    }
}
