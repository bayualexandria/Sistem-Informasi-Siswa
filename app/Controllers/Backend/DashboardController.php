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
            'sekolah' => $this->sekolah->where('id', 1)->asObject()->first(),
            'validation' => $this->validation
        ]);
    }

    public function updateProfileSekolah($id)
    {
        $rules = [
            'nama_sekolah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Sekolah harus diisi',
                ]
            ],
            'no_telp' => [
                'rules' => 'required|max_length[15]|',
                'errors' => [
                    'required' => 'No. Handphone harus diisi',
                    'max_length' => 'No. Handphone yang anda masukan melebihi 15 karakter',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi',
                ]
            ],
            'logo' => [
                'rules' => 'is_image[logo]|max_size[logo,2048]',
                'errors' => [
                    'is_image' => 'Yang anda masukan bukan gambar',
                    'max_size' => 'File yang anda masukan melebihi 2MB'
                ]
            ],
            'kepala_sekolah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kepala Sekolah harus diisi',
                ]
            ]
        ];
        if (!$this->validate($rules)) {
            return redirect()->to('/profile-sekolah')->withInput();
        }
        $sekolah = $this->sekolah->where('id', $id)->first();
        $fileImage = $this->request->getFile('logo');

        // cek gambar,apakah tetap gambar lama
        if ($fileImage->getError() == 4) {
            $image = $sekolah['logo'];
        } else {
            // generate nama file random
            $namaImage = $fileImage->getRandomName();
            // pindahkan gambar
            delete_files('assets/img/profile/sekolah/');
            $fileImage->move('assets/img/profile/sekolah/' . $namaImage);
            $image = $namaImage;
            // hapus file yang lama
            if ($sekolah['logo'] != 'logo_pendidikan.png') {
                unlink('assets/img/profile/sekolah/' . $sekolah['logo']);
            }
        }
        $data = [
            'nama_sekolah' => htmlspecialchars(
                $this->request->getVar('nama_sekolah')
            ),
            'no_telp' => htmlspecialchars($this->request->getVar('no_telp')),
            'kepala_sekolah' => htmlspecialchars(
                $this->request->getVar('kepala_sekolah')
            ),
            'image_profile' => $image,
            'alamat' => htmlspecialchars($this->request->getVar('alamat'))
        ];
        $this->sekolah->update($sekolah['id'], $data);
        return redirect()->to('/profile-sekolah')->with('success', 'Data sekolah berhasil di update');
    }
}
