<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\{Guru, Jurusan, Kelas, Mapel, Siswa};

class KelasController extends BaseController
{

    public function __construct()
    {
        $this->kelas = new Kelas();
        $this->jurusan = new Jurusan();
        $this->guru = new Guru();
        $this->siswa = new Siswa();
        $this->mapel = new Mapel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_pagination') ? $this->request->getVar('page_pagination') : 1;
        $keyword = $this->request->getVar('search');
        if ($keyword) {
            $kelas = $this->kelas->search($keyword)->asObject();
        } else {
            $kelas = $this->kelas->getAll()->asObject();
        }
        return view('backend/pages/kelas/index', [
            'title' => 'Halaman Daftar Kelas',
            'kelas' => $kelas->paginate(5, 'pagination'),
            'pager' => $this->kelas->pager,
            'validation' => $this->validation,
            'currentPage' => $currentPage,
            'keyword' => $keyword,
            'jurusan' => $this->jurusan->asObject()->findAll(),
            'guru' => $this->guru->asObject()->findAll()
        ]);
    }

    public function insert()
    {
        $rules = [
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kelas harus diisi',
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/kelas')->withInput();
        }
        $kelas = $this->kelas->where('kelas', $this->request->getVar('kelas'))->where('id_jurusan', $this->request->getVar('id_jurusan'))->first();

        if ($kelas) {
            return redirect()->to('/kelas')->with('error', 'Data yang anda masukan sudah ada');
        }

        $data = [
            'kelas' => htmlspecialchars($this->request->getVar('kelas')),
            'id_jurusan' => $this->request->getVar('id_jurusan'),
            'id_guru' => $this->request->getVar('id_guru')
        ];

        $this->kelas->save($data);

        return redirect()->to('/kelas')->with('success', 'Data kelas berhasil ditambahkan');
    }

    public function update($id)
    {
        $rules = [
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kelas harus diisi'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/kelas')->withInput();
        }

        $kelas = $this->kelas->where('id', $id)->first();

        $this->kelas->update($kelas['id'], [
            'kelas' => htmlspecialchars($this->request->getVar('kelas')),
            'id_jurusan' => $this->request->getVar('id_jurusan'),
            'id_guru' => $this->request->getVar('id_guru')
        ]);

        return redirect()->to('/kelas')->with('success', 'Data kelas telah diubah');
    }

    public function delete($id)
    {
        $kelas = $this->kelas->where('id', $id)->first();
        $this->kelas->delete($kelas);
        return redirect()->to('/kelas')->with('success', 'Data kelas telah dihapus');
    }

    public function kelasSiswa($id)
    {
        $keyword = $this->request->getVar('search');
        if ($keyword)
            $siswa = $this->siswa->searchSiswaByKelas($id, $keyword)->asObject();
        else
            $siswa = $this->siswa->getSiswaByKelas($id)->asObject();
        $kelas = $this->kelas->where('id', $id)->asObject()->first();
        return view('backend/pages/kelas/siswa', [
            'kelas' => $kelas,
            'siswa' => $siswa->paginate(5, 'pagination'),
            'pager' => $this->siswa
                ->where('kelas_id', $id)->pager,
            'keyword' => $keyword,
            'validation' => $this->validation,
            'getKelas' => $this->kelas->joinJurusan(),
            'guru' => $this->guru->where('id', $kelas->id_guru)->asObject()->first(),
            'jurusan' => $this->jurusan->where('id', $kelas->id_jurusan)->asObject()->first(),
            'mapel' => $this->mapel->getDayMapel($id),
            

        ]);
    }

    public function updateKelasSiswa($id)
    {
        $kelas = $this->request->getVar('kelas_id');
        $idKelas = $this->request->getVar('kelas');

        $this->siswa->update($id, [
            'kelas_id' => $kelas
        ]);

        return redirect()->to('/kelas/siswa/' . $idKelas)->with('message', 'Data berhasil diupdate');
    }

    public function deleteKelasSiswa($id)
    {
        $idKelas = $this->request->getVar('kelas');
        $this->siswa->update($id, [
            'kelas_id' => null
        ]);

        return redirect()->to('/kelas/siswa/' . $idKelas)->with('message', 'Data berhasil dihapus dari kelas ini');
    }
}
