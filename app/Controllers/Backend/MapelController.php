<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\{Guru, Mapel, Jurusan, Kelas, NilaiMapelSiswa, NilaiRataRata, Semester, Siswa};

class MapelController extends BaseController
{
    public $mapel, $guru, $kelas, $jurusan, $siswa, $semester, $nilaiRataRata, $nilaiMapelSiswa;

    public function __construct()
    {
        $this->mapel = new Mapel();
        $this->guru = new Guru();
        $this->kelas = new Kelas();
        $this->jurusan = new Jurusan();
        $this->siswa = new Siswa();
        $this->semester = new Semester();
        $this->nilaiRataRata = new NilaiRataRata();
        $this->nilaiMapelSiswa = new NilaiMapelSiswa();
    }

    public function index()
    {
        // $currentPage = $this->request->getVar('page_pagination') ? $this->request->getVar('page_pagination') : 1;
        $keyword = $this->request->getVar('search');
        // $keywordByGuru = $this->request->getVar('search-by-guru');

        if ($keyword)
            $mapel = $this->mapel->search($keyword)->asObject();
        else
            $mapel = $this->mapel->getAll()->asObject();

        // if ($keywordByGuru)
        //     $mapelByGuru = $this->mapel->searchByGuru($keywordByGuru)->asObject();
        // else
        //     $mapelByGuru = $this->mapel->getAllByGuru()->asObject();



        return view('backend/pages/mapel/index', [
            'title' => 'Halaman Daftar Mata Pelajaran',
            'keyword' => $keyword,
            // 'currentPage' => $currentPage,
            'mapel' => $mapel->paginate(6, 'pagination'),
            'pager' => $this->mapel->pager,
            'validation' => $this->validation,
            'guru' => $this->guru->asObject()->findAll(),
            'kelas' => $this->kelas->joinJurusan(),
            'tahun' => $this->semester->like('tahun_pelajaran', date('Y'))->findAll(),

        ]);
    }

    public function mapelByGuru($nip)
    {
        // $currentPage = $this->request->getVar('page_pagination') ? $this->request->getVar('page_pagination') : 1;
        $keyword = $this->request->getVar('search');


        if ($keyword)
            $mapel = $this->mapel->searchByGuru($keyword)->asObject();
        else
            $mapel = $this->mapel->getAllByGuru()->asObject();



        return view('backend/pages/mapel/mapelByGuru', [
            'title' => 'Halaman Daftar Mata Pelajaran',
            'keyword' => $keyword,
            // 'currentPage' => $currentPage,
            'mapel' => $mapel->paginate(6, 'pagination'),
            'pager' => $this->mapel->pager,
            'validation' => $this->validation,
            'guru' => $this->guru->asObject()->findAll(),
            'kelas' => $this->kelas->joinJurusan(),
            'tahun' => $this->semester->like('tahun_pelajaran', date('Y'))->findAll(),

        ]);
    }

    public function insert()
    {

        $rules = [
            'nama_mapel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Mata Pelajaran harus diisi'
                ]
            ]
        ];

        if (!$this->validate($rules))
            return redirect()->to('/mata-pelajaran')->withInput();

        $start_hours = $this->request->getVar('start_hours');
        $start_minutes = $this->request->getVar('start_minutes');
        $end_hours = $this->request->getVar('end_hours');
        $end_minutes = $this->request->getVar('end_minutes');

        $mapel = $this->mapel->where('kelas_id', $this->request->getVar('kelas_id'))->where('hari', $this->request->getVar('hari'))->where('waktu', $start_hours . ':' . $start_minutes . '-' . $end_hours . ':' . $end_minutes)->first();

        if ($mapel)
            return redirect()->to('/mata-pelajaran')->with('error', 'Data yang anda masukan sudah ada');



        $data = [
            'nama_mapel' => htmlspecialchars($this->request->getVar('nama_mapel')),
            'kelas_id' => $this->request->getVar('kelas_id'),
            'guru_id' => $this->request->getVar('guru_id'),
            'hari' => $this->request->getVar('hari'),
            'waktu' => $start_hours . ':' . $start_minutes . '-' . $end_hours . ':' . $end_minutes
        ];


        $this->mapel->save($data);

        return redirect()->to('/mata-pelajaran')->with('success', 'Data mata pelajaran telah ditambahkan');
    }

    public function update($id)
    {
        $rules = [
            'nama_mapel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama mata pelajaran harus diisi'
                ]
            ]
        ];

        if (!$this->validate($rules))
            return redirect()->to('/mata-pelajaran')->withInput();

        $mapel = $this->mapel->where('id', $id)->first();

        $start_hours = $this->request->getVar('start_hours');
        $start_minutes = $this->request->getVar('start_minutes');
        $end_hours = $this->request->getVar('end_hours');
        $end_minutes = $this->request->getVar('end_minutes');

        $this->mapel->update($mapel['id'], [
            'nama_mapel' => htmlspecialchars($this->request->getVar('nama_mapel')),
            'kelas_id' => $this->request->getVar('kelas_id'),
            'guru_id' => $this->request->getVar('guru_id'),
            'hari' => $this->request->getVar('hari'),
            'waktu' => $start_hours . ':' . $start_minutes . '-' . $end_hours . ':' . $end_minutes
        ]);

        return redirect()->to('/mata-pelajaran')->with('success', 'Data berhasil di update');
    }

    public function delete($id)
    {
        $this->mapel->delete($id);
        return redirect()->to('/mata-pelajaran')->with('success', 'Data telah berhasil dihapus');
    }

    public function detail($id)
    {
        $mapel = $this->mapel->where('id', $id)->asObject()->first();
        $kelas = $this->kelas->where('id', $mapel->kelas_id)->asObject()->first();
        $guru = $this->guru->where('id', $mapel->guru_id)->asObject()->first();
        $jurusan = $this->jurusan->where('id', $kelas->id_jurusan)->asObject()->first();
        $keyword = $this->request->getVar('search');
        $nilaiRataRata = $this->nilaiRataRata->where('id_mapel', $id)->first();

        if ($keyword)
            $siswa = $this->siswa->searchSiswaByKelas($mapel->kelas_id, $keyword)->asObject();
        else
            $siswa = $this->siswa->getSiswaByKelas($mapel->kelas_id)->asObject();

        $data = $this->semester->like('tahun_pelajaran', date('Y'))->findAll();

        $tahun = explode('/', $data[0]['tahun_pelajaran']);
        // $nilai=$this->nilaiMapelSiswa->where('id_nilai', $nilaiRataRata['id'])->asObject()->findAll();



        return view('backend/pages/mapel/detail', [
            'mapel' => $mapel,
            'kelas' => $kelas,
            'jurusan' => $jurusan,
            'guru' => $guru,
            'siswa' => $siswa->paginate(5, 'pagination'),
            'pager' => $this->siswa->where('kelas_id', $id)->pager,
            'tahun' => $tahun,
            'validation' => $this->validation,
            'nilaiRataRata' => $nilaiRataRata,
            // 'nilai' => $nilai?$nilai:'',
            'keyword' => $keyword

        ]);
    }

    public function insertNilaiRataRata($id)
    {
        $rules = [
            'nilai_rata_rata' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai rata rata harus diisi'
                ]
            ]
        ];

        if (!$this->validate($rules))
            return redirect()->to('/mata-pelajaran/detail/' . $id)->withInput();

        $this->nilaiRataRata->save([
            'nilai_rata_rata' => htmlspecialchars($this->request->getVar('nilai_rata_rata')),
            'id_mapel' => $id
        ]);
        return redirect()->to('/mata-pelajaran/detail/' . $id)->with('success', 'Nilai rata rata berhasil ditambahkan');
    }

    public function updateNilaiRataRata($id)
    {
        $rules = [
            'nilai_rata_rata' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai rata rata harus diisi'
                ]
            ]
        ];

        $nilaiRataRata = $this->nilaiRataRata->where('id', $id)->first();

        if (!$this->validate($rules))
            return redirect()->to('/mata-pelajaran/detail/' . $id)->withInput();

        $this->nilaiRataRata->update($id, [
            'nilai_rata_rata' => htmlspecialchars($this->request->getVar('nilai_rata_rata'))
        ]);
        return redirect()->to('/mata-pelajaran/detail/' . $nilaiRataRata['id_mapel'])->with('success', 'Nilai rata rata berhasil ditambahkan');
    }

    public function insertNilaiMapelSiswa($id)
    {
        $rules = [
            'nilai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai harus diisi'
                ]
            ]
        ];

        $mapel = $this->request->getVar('id_mapel');

        if (!$this->validate($rules))
            return redirect()->to('/mata-pelajaran/detail/' . $mapel)->withInput();

        $data = $this->semester->like('tahun_pelajaran', date('Y'))->findAll();

        $tahun = explode('/', $data[0]['tahun_pelajaran']);
        if ($tahun[0] === date('Y'))
            $semester = $data[0];
        else
            $semester = $data[1];

        if (!$this->request->getVar('id_nilai'))
            return redirect()->to('/mata-pelajaran/detail/' . $mapel)->with('error', 'Nilai rata rata belum dimasukan');
        $simpan = [
            'nilai' => htmlspecialchars($this->request->getVar('nilai')),
            'id_siswa' => $id,
            'id_nilai' => $this->request->getVar('id_nilai'),
            'id_semester' => $semester['id']
        ];

        dd($simpan);
        $this->nilaiMapelSiswa->save($simpan);
        // return redirect()->to('/mata-pelajaran/detail/' . $mapel)->with('success', 'Nilai berhasil ditambahkan');
    }

    public function updateNilaiMapelSiswa($id)
    {
        $rules = [
            'nilai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nilai harus diisi'
                ]
            ]
        ];

        $mapel = $this->request->getVar('id_mapel');

        if (!$this->validate($rules))
            return redirect()->to('/mata-pelajaran/detail/' . $mapel)->withInput();

        $this->nilaiMapelSiswa->update($id, [
            'nilai' => $this->request->getVar('nilai')
        ]);

        return redirect()->to('/mata-pelajaran/detail/' . $mapel)->with('success', 'Nilai berhasil diubah');
    }
}
