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


    public function updateKelasSiswa($no_induk)
    {
    }
}
