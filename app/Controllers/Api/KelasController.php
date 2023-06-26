<?php

namespace App\Controllers\Api;

use App\Models\{Kelas, Siswa};
use CodeIgniter\RESTful\ResourceController;

class KelasController extends ResourceController
{
    public $siswa, $kelas;

    public function __construct()
    {
        $this->siswa = new Siswa();
        $this->kelas = new Kelas();
    }


    public function index($id = null)
    {
        $kelas = $this->kelas->apiKelas($id);
        if (!$kelas) {
            return $this->respond(['message' => 'id kelas tidak diketahui', 'status' => 404], 404);
        }
        return $this->respond(['data' => $kelas, 'message' => 'data kelas ada', 'status' => 200], 200);
    }
}
