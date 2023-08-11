<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\DokumenEntity;
use App\Entities\JenisDokumenEntity;
use App\Models\DokumenModel;
use App\Models\JenisDokumenModel;
use CodeIgniter\RESTful\ResourceController;
use PhpParser\Node\Stmt\Echo_;

class Dokumen extends ResourceController
{
    protected $DokumenModel;
    protected $DokumenEntity;
    protected $JenisDokumenModel;
    protected $JenisDokumenEntity;

    protected $format = 'json';

    public function __construct()
    {
        $this->DokumenModel = new DokumenModel();
        $this->JenisDokumenModel = new JenisDokumenModel();
        $this->DokumenEntity = new DokumenEntity();
        $this->JenisDokumenEntity = new JenisDokumenEntity();
    }

    public function index()
    {
        $data = [
            'title' => 'MANAJEMEN DOKUMEN',
        ];
        return view('Dokumen/index', $data);
    }

    public function add_dokumen()
    {
        // MENGAMBIL NILAI INPUT DARI FORM
        $this->DokumenEntity->fk_jenis_dokumen = $this->request->getPost('fk_jenis_dokumen');
        $this->DokumenEntity->nama_dokumen = $this->request->getPost('nama_dokumen');
        $this->DokumenEntity->keterangan = $this->request->getPost('keterangan');
        $file = $this->request->getFile('file_dokumen');

        // CEK APAKAH ADA FILE YANG DIUPLOAD ATAU TIDAK
        if ($file->getError() == 4) {
            return $this->failValidationError($messages = 'Tidak ada file yang diupload');
        }

        // NAMA FILE DOKUMEN
        $this->DokumenEntity->file_dokumen = $this->request->getPost('nama_dokumen');
        $extention = $file->getExtension();
        $_fileName_ = $this->DokumenEntity->file_dokumen  . '.' . $extention;

        $data = [
            'fk_jenis_dokumen' => $this->DokumenEntity->fk_jenis_dokumen,
            'nama_dokumen' => $this->DokumenEntity->nama_dokumen,
            'keterangan' =>  $this->DokumenEntity->keterangan,
            'file_dokumen' => $_fileName_
        ];

        $save = $this->DokumenModel->save($data);

        if (!$save) {
            return $this->fail($this->DokumenModel->errors(), 400);
        } else {
            // MEMINDAHKAN FILE KE STORAGE/DOKUMEN
            $file->move(WRITEPATH . 'storage/dokumen/', $_fileName_);
            return $this->respond([
                'statusCode' => 200,
                'message'    => 'OK',
                'data'       => $data
            ]);
        }
    }

    public function show($id = null)
    {
        $id_dokumen = $this->DokumenModel->get_dokumen($id);
        $fileName = $id_dokumen->file_dokumen;
        $path = WRITEPATH . 'storage/dokumen/' . $fileName;
        $data = [
            'title' => 'DOKUMEN',
            'filepath' => $fileName,
            'data' => $this->DokumenModel->get_dokumen($id)
        ];

        return view('Dokumen/detil_dokumen', $data);
    }

    public function delete($id = null)
    {
        // mengambil data nama file dari database
        $data = $this->DokumenModel->get_dokumen($id);
        $fileName = $data->file_dokumen;

        // MENGHAPUS FILE
        unlink(WRITEPATH . 'storage/dokumen/' . $fileName);

        $delete = $this->DokumenModel->delete($id);

        if (!$delete) {
            return $this->fail($this->DokumenModel->errors(), 400);
        } else {
            // MENGHAPUS DATA DI DATABASE
            return $this->respond([
                'statusCode' => 200,
                'message'    => 'Data Berhasil Dihaapus.',
                // 'data'       => $this->DokumenModel->get_peta($id),
            ]);
        }
    }

    public function update($id = null)
    {
        // MENGAMBIL NILAI INPUT DARI FORM
        $this->DokumenEntity->fk_jenis_dokumen = $this->request->getPost('fk_jenis_dokumen');
        $this->DokumenEntity->nama_dokumen = $this->request->getPost('nama_dokumen');
        $this->DokumenEntity->keterangan = $this->request->getPost('keterangan');
        $file = $this->request->getFile('file_dokumen');

        $FileNameLama = $this->request->getPost('nama_file_lama');

        // CEK APAKAH USER ADA MENGUPLOAD FILE BARU
        if ($file->getError() == 4) {
            $FileName = $this->request->getPost('nama_file_lama');

            // JIKA ADA FILE BARU YANG DI UPLOAD
        } else {
            // NAMA FILE DOKUMEN
            $this->DokumenEntity->file_dokumen = $this->request->getPost('nama_dokumen');
            $extention = $file->getExtension();
            $FileName = $this->DokumenEntity->file_dokumen  . '.' . $extention;

            unlink(WRITEPATH . 'storage/dokumen/' . $FileNameLama);
            // MEMINDAHKAN FILE KE STORAGE/DOKUMEN
            $file->move(WRITEPATH . 'storage/dokumen/', $FileName);
        }
        $data = [
            'id_dokumen' => $id,
            'fk_jenis_dokumen' => $this->DokumenEntity->fk_jenis_dokumen,
            'nama_dokumen' => $this->DokumenEntity->nama_dokumen,
            'keterangan' =>  $this->DokumenEntity->keterangan,
            'file_dokumen' => $FileName
        ];

        $save = $this->DokumenModel->save($data);

        if (!$save) {
            return $this->fail($this->DokumenModel->errors(), 400);
        } else {
            return $this->respond([

                'statusCode' => 200,
                'message'    => 'OK',
                'data'       => $data
            ]);
        }
    }

    /*
 * --------------------------------------------------------------------
 * API Routes for Dokumen
 * --------------------------------------------------------------------
 */

    public function render_pdf($filename)
    {
        $filepath = WRITEPATH . 'storage/dokumen/' . $filename;

        $mime = mime_content_type($filepath);
        header('Content-Length: ' . filesize($filepath));
        header("Content-Type: $mime");
        header('Content-Disposition: inline; filename="' . $filepath . '";');
        readfile($filepath);
        exit();
    }

    public function dataDokumen()
    {
        $data = [
            'data' => $this->DokumenModel->get_all_dokumen()
        ];

        if ($data) {
            return $this->respond($data, 200);
        } else {
            return $this->fail($this->DokumenModel->errors(), 400);
        }
    }

    public function get_dokumen($id = null)
    {
        $data = [
            'data' => $this->DokumenModel->get_dokumen($id)
        ];

        if ($data) {
            return $this->respond($data, 200);
        } else {
            return $this->fail($this->DokumenModel->errors(), 400);
        }
    }

    public function jenis_dokumen()
    {
        $data = [
            'data' => $this->JenisDokumenModel->get_all_jenis_dokumen()
        ];

        if ($data) {
            return $this->respond($data, 200);
        } else {
            return $this->fail($this->JenisDokumenModel->errors(), 400);
        }
    }

    public function add_jenis_dokumen()
    {
        // mengambil nilai dari form
        $this->JenisDokumenEntity->jenis_dokumen = $this->request->getPost('jenis_dokumen');
        $this->JenisDokumenEntity->keterangan = $this->request->getPost('keterangan');

        $save = $this->JenisDokumenModel->save($this->JenisDokumenEntity);

        if (!$save) {
            return $this->fail($this->JenisDokumenModel->errors(), 400);
        } else {
            return $this->respond([
                'statusCode' => 200,
                'message'    => 'OK',
                'data'       => $this->JenisDokumenModel->findAll()
            ]);
        }
    }
}
