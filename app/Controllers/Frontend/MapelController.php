<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class MapelController extends BaseController
{
    public function index()
    {
        return view('backend/pages/mapel/index');
    }
}
