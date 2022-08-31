<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Siswa;

class HomeController extends BaseController
{

    public function __construct()
    {
        $this->siswa = new Siswa();
    }
    
    public function index()
    {
        return view('frontend/home', [
            'siswa' => $this->siswa->asObject()->where('no_induk', session()->get('username'))->first()
        ]);
    }

    public function profile()
    {
        return view('frontend/pages/profile/index', [
            'siswa' => $this->siswa->asObject()->where('no_induk', session()->get('username'))->first()
        ]);
    }
}
