<?php

namespace App\Controllers\Api;

use App\Models\ProfileSekolah;
use CodeIgniter\RESTful\ResourceController;

class DashboardController extends ResourceController
{
    public $sekolah;

    public function __construct()
    {
        $this->sekolah = new ProfileSekolah();
    }

    public function sekolah($id = null)
    {
        $sekolah = $this->sekolah->where('id', $id)->first();
        if (!$sekolah) {
            return $this->respond(['message' => 'data profile sekolah tidak diketahui', 'status' => 404], 404);
        }
        return $this->respond(['data' => $sekolah, 'message' => 'data profile sekolah ada', 'status' => 200], 200);
    }
};
