<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\PenggunaEntity;
use App\Models\PenggunaModel;
use CodeIgniter\RESTful\ResourceController;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;

class Pengguna extends ResourceController
{
    protected $PenggunaModel;
    protected $PenggunaEntity;

    public function __construct()
    {
        $this->PenggunaModel = new PenggunaModel();
        $this->PenggunaEntity = new PenggunaEntity();
    }

    public function index()
    {
        $data = [
            'title' => 'MANAJEMEN PENGGUNA',
        ];
        return view('Admin/index', $data);
    }

    public function show($id = null)
    {
        $data = [
            'title' => 'PROFIL PENGGUNA',
            'dataUser' => $this->PenggunaModel->user($id)
        ];
        // dd($id);
        return view('Pengguna/detil_pengguna', $data);
    }

    /*
    * --------------------------------------------------------------------
    * API Routes for Pengguna
    * --------------------------------------------------------------------
    */

    public function dataPengguna()
    {
        $data = [
            'data' => $this->PenggunaModel->findAll()
        ];
        // dd($data);

        if ($data) {
            return $this->respond($data, 200);
        } else {
            return $this->fail($this->PenggunaModel->errors(), 400);
        }
    }

    public function dataProfil()
    {
        $data = [
            'data' => $this->PenggunaModel->get_role()
        ];

        if ($data) {
            return $this->respond($data, 200);
        } else {
            return $this->fail($this->PenggunaModel->errors(), 400);
        }
    }
}
