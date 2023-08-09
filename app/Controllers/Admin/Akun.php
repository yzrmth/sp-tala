<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\PenggunaEntity;
use App\Models\PenggunaModel;
use CodeIgniter\RESTful\ResourceController;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;

class Akun extends ResourceController
{
    protected $PenggunaModel;
    protected $PenggunaEntity;
    protected $GroupModel;
    protected $UserModel;


    public function __construct()
    {
        $this->PenggunaModel = new PenggunaModel();
        $this->PenggunaEntity = new PenggunaEntity();
        $this->GroupModel = new GroupModel();
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'MANAJEMEN PENGGUNA',
        ];
        return view('Admin/Pengguna/index', $data);
    }

    public function show($id = null)
    {
        $group_model_auth = new GroupModel();

        $data = [
            'title' => 'PENGATURAN PENGGUNA',
            'dataUser' => $this->PenggunaModel->get_user($id),
            'groups_user' => $group_model_auth->getGroupsForUser($id),
            'role' => $this->PenggunaModel->get_role()
        ];
        // dd($data);
        return view('Admin/Pengguna/pengaturan_pengguna', $data);
    }

    public function create()
    {
        // MEMBERSIHKAN DATA INPUTAN
        $this->PenggunaEntity->nama = $this->request->getPost('nama');
        $this->PenggunaEntity->nip = $this->request->getPost('nip');
        $this->PenggunaEntity->jabatan = $this->request->getPost('jabatan');

        $data = [
            'nama' => $this->PenggunaEntity->nama,
            'nip' => $this->PenggunaEntity->nip,
            'jabatan' => $this->PenggunaEntity->jabatan,
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password_hash' =>  Password::hash('123456'),
            'active' => 0
        ];

        $result = $this->UserModel->withGroup('Mitra')->insert($data);
        // dd($this->request->getVar('role'));
        if (!$result) {
            return $this->fail($this->UserModel->errors(), 400);
        } else {
            return $this->respond([
                'statusCode' => 200,
                'message'    => 'OK',
                'data'       => $this->PenggunaModel->get_all_users()
            ]);
        }
    }

    public function edit_profil_pengguna($id = null)
    {
        // INISIALISASI MODEL USERS DI MYTH AUTH
        $user_model_auth = new UserModel();
        $group_model_auth = new GroupModel();

        // MEMBERSIHKAN DATA INPUTAN
        $this->PenggunaEntity->nama = $this->request->getPost('nama');
        $this->PenggunaEntity->nip = $this->request->getPost('nip');
        $this->PenggunaEntity->jabatan = $this->request->getPost('jabatan');

        $data = [
            'id' => $id,
            'nama' => $this->PenggunaEntity->nama,
            'nip' => $this->PenggunaEntity->nip,
            'jabatan' => $this->PenggunaEntity->jabatan,
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
        ];

        // $result = $this->UserModel->withGroup($this->request->getVar('role'))->save($data);
        $result = $this->PenggunaModel->save($data);

        if (!$result) {
            return $this->fail($user_model_auth->errors(), 400);
        } else {
            return $this->respond([
                'statusCode' => 200,
                'message'    => 'OK',
                'data'       => $this->PenggunaModel->get_user($id)
            ]);
        }
    }

    public function hapus_akses($user_id, $group_id)
    {
        $result = $this->GroupModel->removeUserFromGroup($user_id, $group_id);

        if (!$result) {
            return $this->fail($this->GroupModel->errors(), 400);
        } else {
            return $this->respond([
                'statusCode' => 200,
                'message'    => 'OK',
                'data'       => $this->GroupModel->getGroupsForUser($user_id)
            ]);
        }
    }

    public function tambah_akses()
    {
        $group_id = $this->request->getVar('group_id');
        $user_id = $this->request->getVar('user_id');

        $result = $this->GroupModel->addUserToGroup($user_id, $group_id);

        if (!$result) {
            return $this->fail($this->GroupModel->errors(), 400);
        } else {
            return $this->respond([
                'statusCode' => 200,
                'message'    => 'OK',
                'data'       => $this->GroupModel->getGroupsForUser($user_id)
            ]);
        }
    }

    public function nonaktif_akun($id = null)
    {
        // INISIALISASI MODEL USERS DI MYTH AUTH
        $user_model_auth = new UserModel();

        $data = [
            'id' => $id,
            'active' => 0
        ];

        $result = $this->PenggunaModel->save($data);

        if (!$result) {
            return $this->fail($user_model_auth->errors(), 400);
        } else {
            return $this->respond([
                'statusCode' => 200,
                'message'    => 'OK',
                'data'       => $this->PenggunaModel->get_user($id)
            ]);
        }
    }

    public function aktif_akun($id = null)
    {
        // INISIALISASI MODEL USERS DI MYTH AUTH
        $user_model_auth = new UserModel();

        $data = [
            'id' => $id,
            'active' => 1
        ];

        $result = $this->PenggunaModel->save($data);

        if (!$result) {
            return $this->fail($user_model_auth->errors(), 400);
        } else {
            return $this->respond([
                'statusCode' => 200,
                'message'    => 'OK',
                'data'       => $this->PenggunaModel->get_user($id)
            ]);
        }
    }
}
