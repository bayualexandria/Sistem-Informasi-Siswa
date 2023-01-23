<?php

namespace App\Controllers\Api;

use App\Models\Siswa;
use CodeIgniter\RESTful\ResourceController;

class SiswaController extends ResourceController
{
    public $siswa;

    public function __construct()
    {
        $this->siswa = new Siswa();
    }

    public function searchSiswa()
    {
        return $this->respond(['data' => $this->siswa->where('kelas_id', null)->findAll(), 'message' => 'Data berhasil ditampilkan', 'status' => 200], 200);
    }

    public function getDataSiswaByKelasId($kelas)
    {
        return $this->respond(['data' => $this->siswa->where('kelas_id', $kelas)->orderBy('nama','ASC')->findAll(), 'message' => 'Data berhasil ditampilkan', 'status' => 200], 200);
    }

    public function updateSiswa($siswa)
    {
        $siswa = $this->siswa->where('id', $siswa)->first();

        $this->siswa->update($siswa, [
            'kelas_id' => $this->request->getVar('kelas_id')
        ]);

        return $this->respond(['message' => 'Data berhasil diupdate', 'status' => 200], 200);
    }
}
