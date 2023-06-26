<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\{Guru, Kelas, Mapel, ProfileSekolah, Semester, Siswa, User};

class DashboardController extends BaseController
{
    public $guru, $admin, $siswa, $semester, $kelas, $mapel, $sekolah;

    public function __construct()
    {
        $this->guru = new Guru();
        $this->admin = new User();
        $this->siswa = new Siswa();
        $this->semester = new Semester();
        $this->kelas = new Kelas();
        $this->mapel = new Mapel();
        $this->sekolah = new ProfileSekolah();
    }

    public function index()
    {
        return view('backend/pages/dashboard', [
            'title' => 'Halaman Dashboard',
            'guru' => $this->guru->countAll(),
            'siswa' => $this->siswa->countAll(),
            'kelas' => $this->kelas->countAll(),
            'mapel' => $this->mapel->countAll(),
            'semester' => $this->semester->orderBy('tahun_pelajaran', 'DESC')->asObject()->findAll(),
            'validation' => $this->validation
        ]);
    }

    public function profile()
    {
        return view('backend/pages/profile/index', [
            'title' => 'Halaman Profile',
            'guru' => $this->guru->where('nip', session()->get('username'))->asObject()->first(),
            'validation' => $this->validation,
            'admin' => $this->admin->where('username', session()->get('username'))->asObject()->first(),
            'user' => $this->admin->where('status_id', 1)->asObject()->findAll(),

        ]);
    }

    public function updateProfile()
    {
        $rules = [
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi',
                ]
            ],
            'no_hp' => [
                'rules' => 'required|numeric|max_length[15]|',
                'errors' => [
                    'required' => 'No. Handphone harus diisi',
                    'numeric' => 'Yang anda masukan bukan No. Handphone',
                    'max_length' => 'No. Handphone yang anda masukan melebihi 15 karakter',
                ]
            ],
            'image_profile' => [
                'rules' => 'is_image[image_profile]|max_size[image_profile,2048]',
                'errors' => [
                    'is_image' => 'Yang anda masukan bukan gambar',
                    'max_size' => 'File yang anda masukan melebihi 2MB'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi',
                ]
            ]
        ];
        if (!$this->validate($rules)) {
            return redirect()->to('/profile')->withInput();
        }

        $guru = $this->guru->where('nip', session()->get('username'))->first();

        $fileImage = $this->request->getFile('image_profile');

        // cek gambar,apakah tetap gambar lama
        if ($fileImage->getError() == 4) {
            $image = $guru['image_profile'];
        } else {
            // generate nama file random
            $namaImage = $fileImage->getRandomName();
            // pindahkan gambar
            delete_files('assets/img/profile/guru/' . $guru['nip']);
            $fileImage->move('assets/img/profile/guru/', $guru['nip'] . '/' . $namaImage);
            $image = $guru['nip'] . '/' . $namaImage;
            // hapus file yang lama
            // if ($guru['image_profile'] != 'default.png') {
            //     unlink('assets/img/profile/guru/' . $guru['image_profile']);
            // }
        }

        $this->guru->update($guru['id'], [
            'nama' => htmlspecialchars($this->request->getVar('nama')),
            'no_hp' => htmlspecialchars($this->request->getVar('no_hp')),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'image_profile' => $image,
            'alamat' => htmlspecialchars($this->request->getVar('alamat')),

        ]);

        return redirect()->to('/profile')->with('success', 'Data profile sudah diupdate');
    }

    public function profileAdmin()
    {
        $admin = $this->admin->where('username', session()->get('username'))->first();

        $this->admin->update($admin['id'], [
            'username' => $this->request->getVar('username') ? $this->request->getVar('username') : $admin['username'],
            'password' => $this->request->getVar('password') ? password_hash($this->request->getVar('password'), PASSWORD_DEFAULT) : $admin['password'],
        ]);

        if ($this->request->getVar('username')) {
            session()->remove('username');
            session()->set([
                'username' => $this->request->getVar('username')
            ]);
        }

        return redirect()->to('/profile')->with('success', 'User telah diubah!');
    }

    public function profileSekolah()
    {
        return view('backend/pages/profile/sekolah/index', [
            'sekolah' => $this->sekolah->where('id', 1)->first()
        ]);
    }

    public function updateProfileSekolah($id)
    {
        
    }
}
