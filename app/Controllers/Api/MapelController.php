<?php

namespace App\Controllers\Api;

use App\Models\Mapel;
use CodeIgniter\RESTful\ResourceController;

class MapelController extends ResourceController
{
    public $mapel;

    public function __construct()
    {
        $this->mapel = new Mapel();
    }


    public function index($kelas = null)
    {
        return $this->respond(['data' => $this->mapel->getDataMapelApi($kelas), 'message' => 'Data berhasil ditampilkan', 'status' => 200], 200);
    }
}
