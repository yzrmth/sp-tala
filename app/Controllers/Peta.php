<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\PetaEntity;
use App\Models\FileDigitasiModel;
use App\Models\FileScanModel;
use App\Models\PetaModel;
use CodeIgniter\RESTful\ResourceController;

class Peta extends ResourceController
{
    protected $format = 'json';
    protected $helpers = [
        'html',
        'filesystem'
    ];



    protected $PetaModel;
    protected $PetaEntity;
    protected $FileScanModel;
    protected $FileDigitasiModel;

    public function __construct()
    {
        $this->PetaModel = new PetaModel();
        $this->PetaEntity = new PetaEntity();
        $this->FileScanModel = new FileScanModel();
        $this->FileDigitasiModel = new FileDigitasiModel();
    }
    public function index()
    {
        $data = [
            'title' => 'MANAJEMEN DIGITALISASI PETA'
        ];
        return view('Peta/index', $data);
    }

    public function show($id = null)
    {
        $id_peta = $this->PetaModel->get_peta($id);
        $fileName = $id_peta->nama_file;

        if (file_exists(WRITEPATH . 'storage/file_scan/' . $fileName) && $fileName != null) {
            // if (file_exists($fileName !== null)) {
            $data = [
                'title' => 'Rincian Peta',
                'peta' => $this->PetaModel->get_peta($id),
                'image_path' => img_data(WRITEPATH . 'storage/file_scan/' . $fileName),
                'file_name' => $fileName,
                'message' => 200,
            ];
        } else {
            $data = [
                'title' => 'Rincian Peta',
                'peta' => $this->PetaModel->get_peta($id),
                'image_path' => img_data(WRITEPATH . 'storage/file_scan/no_image.png'),
                'file_name' => $fileName,
                'message' => 500,
            ];
        }
        return view('Peta/detil_peta', $data);
    }

    public function update($id = null)
    {
        $this->PetaEntity->id_peta = $this->request->getPost('id_peta');
        $this->PetaEntity->proyek = $this->request->getPost('proyek');
        $this->PetaEntity->nomor_peta = $this->request->getPost('nomor_peta');
        $this->PetaEntity->tahun = $this->request->getPost('tahun');
        $this->PetaEntity->kecamatan = $this->request->getPost('kecamatan');
        $this->PetaEntity->desa = $this->request->getPost('desa');

        $save = $this->PetaModel->save($this->PetaEntity);

        if (!$save) {
            return $this->fail($this->PetaModel->errors(), 400);
        } else {
            return $this->respond([
                'statusCode' => 200,
                'message'    => 'OK',
                'data'       => $this->PetaModel->get_peta($id)
            ]);
        }
    }

    public function delete($id = null)
    {
        $delete = $this->PetaModel->delete($id);

        if (!$delete) {
            return $this->fail($this->PetaModel->errors(), 400);
        } else {
            return $this->respond([
                'statusCode' => 200,
                'message'    => 'OK',
                'data'       => $this->PetaModel->get_peta($id)
            ]);
        }
    }

    public function delete_image($id = null)
    {
        // mengambil semua data yang dijoin
        $data = $this->PetaModel->get_peta($id);
        // mengambil data id_scan dari hasil join 
        $id_scan = $data->id_scan;
        $fileName = $data->nama_file;

        unlink(WRITEPATH . 'storage/file_scan/' . $fileName);
        unlink(WRITEPATH . 'storage/original_file/' . $fileName);
        $delete = $this->FileScanModel->delete($id_scan);
        if (!$delete) {
            return $this->fail($this->FileScanModel->errors(), 400);
        } else {
            return $this->respond([
                'statusCode' => 200,
                'message'    => 'OK',
                'data'       => $this->PetaModel->get_peta($id),
            ]);
        }
    }

    public function dataPeta()
    {
        $data = [
            'data' => $this->PetaModel->get_all_peta()
        ];

        if ($data) {
            return $this->respond($data, 200);
        } else {
            return $this->fail($this->PetaModel->errors(), 400);
        }
    }

    public function detilPeta($id = null)
    {
        $id_peta = $this->PetaModel->get_peta($id);

        $fileName = $id_peta->nama_file;

        if (file_exists(WRITEPATH . 'storage/file_scan/' . $fileName)) {
            $data = [
                'data' => $this->PetaModel->get_peta($id),
                'status' => 200
            ];
        } else {
            $data = [
                'data' => $this->PetaModel->get_peta($id),
                'status' => 500
            ];
        }

        if ($data) {
            return $this->respond($data, 200);
        } else {
            return $this->fail($this->PetaModel->errors(), 400);
        }
    }

    public function do_download($id = null)
    {
        $file = $this->PetaModel->get_peta($id);

        $fileName = $file->nama_file;
        return $this->response->download(WRITEPATH . 'storage/original_file/' . $fileName, null);
    }

    public function do_download_digitasi($id = null)
    {
        $file = $this->PetaModel->get_peta($id);

        $fileName = $file->nama_file_digitasi;
        return $this->response->download(WRITEPATH . 'storage/file_digitasi/' . $fileName, null);
    }

    public function image_preview($id)
    {
        $id_peta = $this->PetaModel->get_peta($id);
        $fileName = $id_peta->file_scan;

        $file = base_url('storage/file_scan/' . $fileName);

        if (file_exists($file)) {
            return $file;
        } else {
            return $file;
        }
    }

    /*
    public function upload_image($id = null)
    {
        $file = $this->request->getFile('file_scan');
        $fileName = $this->request->getPost('nama_file');
        $extention = $file->getExtension();

        $_fileName_ = $fileName . '.' . $extention;

        // resize gambar
        $image = \Config\Services::image()
            ->withFile($file)
            ->resize(1500, 1500, true, 'height')
            ->save(WRITEPATH . 'storage/file_scan/' . $_fileName_);

        // memindahkan file original ke folder original
        $file->move(WRITEPATH . 'storage/original_file/', $_fileName_);

        $save = $this->FileScanModel->save([
            'fk_peta' => $this->request->getPost('id_peta'),
            'nama_file' => $_fileName_
        ]);

        if (!$save) {
            return $this->fail($this->FileScanModel->errors(), 400);
        } else {
            return $this->respond([
                'statusCode' => 200,
                'message'    => 'OK',
                'data'       => $this->PetaModel->get_peta($id)
            ]);
        }
    }
    */

    public function upload_image($id = null)
    {
        $file = $this->request->getFile('file_scan');
        $fileName = $this->request->getPost('nama_file');
        $extention = $file->getExtension();

        $_fileName_ = $fileName . '.' . $extention;

        $this->PetaEntity->id_peta = $this->request->getPost('id_peta');
        $this->PetaEntity->proyek = $this->request->getPost('proyek');
        $this->PetaEntity->nomor_peta = $this->request->getPost('nomor_peta');
        $this->PetaEntity->tahun = $this->request->getPost('tahun');
        $this->PetaEntity->kecamatan = $this->request->getPost('kecamatan');
        $this->PetaEntity->desa = $this->request->getPost('desa');

        // data untuk insert ke tabel tb_image_scan
        $data_scan = [
            'fk_peta' => $this->request->getPost('id_peta'),
            'nama_file' => $_fileName_
        ];

        $result = $this->PetaModel->upload_peta($data_scan, $this->PetaEntity);

        if ($result === false) {
            return $this->fail($this->FileScanModel->errors(), 400);
        } else {
            // resize gambar
            $image = \Config\Services::image()
                ->withFile($file)
                ->resize(1500, 1500, true, 'height')
                ->save(WRITEPATH . 'storage/file_scan/' . $_fileName_);

            // memindahkan file original ke folder original
            $file->move(WRITEPATH . 'storage/original_file/', $_fileName_);
            return $this->respond([
                'statusCode' => 200,
                'message'    => 'OK',
                'data'       => $result
            ]);
        }
    }

    public function upload_digitasi($id = null)
    {
        $file = $this->request->getFile('file_digitasi');
        $fileName = $this->request->getPost('nama_file');
        $extention = $file->getExtension();

        $save = $this->FileDigitasiModel->save([
            'fk_peta' => $this->request->getPost('id_peta'),
            'nama_file_digitasi' => $fileName . '.' . $extention,
            'status' => $this->request->getPost('status')
        ]);

        if (!$save) {
            return $this->fail($this->FileDigitasiModel->errors(), 400);
        } else {
            $file->move(WRITEPATH . 'storage\file_digitasi', $fileName . '.' . $extention);
            return $this->respond([
                'statusCode' => 200,
                'message'    => 'OK',
                'data'       => $this->PetaModel->get_peta($id)
            ]);
        }
    }

    public function renderImage($filename)
    {
        $filepath = WRITEPATH . 'storage/file_scan/' . $filename;

        $mime = mime_content_type($filepath);
        header('Content-Length: ' . filesize($filepath));
        header("Content-Type: $mime");
        header('Content-Disposition: inline; filename="' . $filepath . '";');
        readfile($filepath);
        exit();
    }
}
