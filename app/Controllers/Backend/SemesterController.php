<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\Semester;

class SemesterController extends BaseController
{
    public $semester;
    public function __construct()
    {
        $this->semester = new Semester();
    }

    public function insert()
    {
        $start = $this->request->getVar('tahun-start');
        $end = $this->request->getVar('tahun-end');
        $this->semester->save([
            'semester' => $this->request->getVar('semester'),
            'tahun_pelajaran' => $start . '/' . $end
        ]);

        return redirect()->to('/dashboard')->with('success', 'Data semester berhasil ditambahkan');
    }

    public function update($id)
    {
        $start = $this->request->getVar('tahun-start');
        $end = $this->request->getVar('tahun-end');
        $this->semester->update($id, [
            'semester' => $this->request->getVar('semester'),
            'tahun_pelajaran' => $start . '/' . $end
        ]);

        return redirect()->to('/dashboard')->with('success', 'Data semester berhasil ditambahkan');
    }
}
