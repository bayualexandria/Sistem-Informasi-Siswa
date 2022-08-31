<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\{Siswa, User};

class SiswaController extends BaseController
{

    public function __construct()
    {
        $this->siswa = new Siswa();
        $this->user = new User();
    }

    public function index()
    {
        // $currentPage = $this->request->getVar('page_pagination') ? $this->request->getVar('page_pagination') : 1;
        $keyword = $this->request->getVar('search');
        if ($keyword) {
            $siswa = $this->siswa->search($keyword)->asObject();
        } else {
            $siswa = $this->siswa->getAll()->asObject();
        }
        return view('backend/pages/siswa/index', [
            'title' => 'Halaman Daftar Siswa',
            'siswa' => $siswa->paginate(5, 'pagination'),
            'pager' => $this->siswa->pager,
            'validation' => $this->validation,
            // 'currentPage' => $currentPage,
            'keyword' => $keyword,
        ]);
    }

    public function insert()
    {
        $rules = [
            'no_induk' => [
                'rules' => 'required|numeric|min_length[10]|max_length[10]|is_unique[siswa.no_induk]',
                'errors' => [
                    'required' => 'No. Induk harus diisi',
                    'numeric' => 'Yang anda masukan bukan No. Induk',
                    'max_length' => 'No. Induk yang anda masukan melebihi 10 karakter',
                    'min_length' => 'No. Induk yang anda masukan kurang dari 10 karakter',
                    'is_unique' => 'No. Induk yang anda masukan sudah terdaftar'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi',
                ]
            ],
            'no_hp' => [
                'rules' => 'required|numeric|max_length[15]|is_unique[siswa.no_hp]',
                'errors' => [
                    'required' => 'No. Handphone harus diisi',
                    'numeric' => 'Yang anda masukan bukan No. Handphone',
                    'max_length' => 'No. Handphone yang anda masukan melebihi 15 karakter',
                    'is_unique' => 'No. Handphone yang anda masukan sudah terdaftar'
                ]
            ],
            'image_profile' => [
                'rules' => 'is_image[image_profile]|max_size[image_profile,2048]|uploaded[image_profile]',
                'errors' => [
                    'is_image' => 'Yang anda masukan bukan gambar',
                    'max_size' => 'File yang anda masukan melebihi 2MB',
                    'uploaded' => 'Gambar profile harus dimasukan'
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
            return redirect()->to('/siswa')->withInput();
        }

        if ($this->request->getFile('image_profile')) {
            $namaImage = $this->request->getFile('image_profile')->getRandomName();
            $this->request->getFile('image_profile')->move('assets/img/profile/siswa/' . $this->request->getVar('no_induk'), $namaImage);
            $cover =  $this->request->getVar('no_induk') . '/' . $namaImage;
        }
        $data = [
            'no_induk' => $this->request->getVar('no_induk'),
            'nama' => htmlspecialchars($this->request->getVar('nama')),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'no_hp' => $this->request->getVar('no_hp'),
            'image_profile' => $cover,
            'alamat' => htmlspecialchars($this->request->getVar('alamat'))
        ];
        $this->siswa->save($data);

        return redirect()->to('/siswa')->with('success', 'Data siswa dengan nama ' . $this->request->getVar('nama') . ' telah ditambahkan');
    }

    public function delete($ni)
    {
        $siswa = $this->siswa->where('no_induk', $ni)->first();
        // if (unlink($siswa['image_profile'])) {
        //     unlink('assets/img/profile/siswa/'.$siswa['image_profile']);
        // }
        $user = $this->user->where('username', $ni)->first();
        delete_files('assets/img/profile/siswa/' . $siswa['no_induk']);
        rmdir('assets/img/profile/siswa/' . $siswa['no_induk']);
        $this->siswa->delete($siswa);
        if ($user)
            $this->user->delete($user);

        return redirect()->to('/siswa')->with('success', 'Data siswa berhasil dihapus');
    }

    public function update($ni)
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
                    'max_size' => 'File yang anda masukan melebihi 2MB',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi',
                ]
            ]
        ];

        if (!$this->validate($rules))
            return redirect()->to('/siswa')->withInput();


        $siswa = $this->siswa->where('no_induk', $ni)->first();

        $fileImage = $this->request->getFile('image_profile');

        // cek gambar,apakah tetap gambar lama
        if ($fileImage->getError() == 4) {
            $image = $siswa['image_profile'];
        } else {
            if (!base_url('assets/img/profile/siswa/' . $siswa['image_profile'])) {
                $namaImage = $this->request->getFile('image_profile')->getRandomName();
                $this->request->getFile('image_profile')->move('assets/img/profile/siswa/' . $this->request->getVar('no_induk'), $namaImage);
                $image = $this->request->getVar('no_induk') . '/' . $namaImage;
            }
            // generate nama file random
            $namaImage = $fileImage->getRandomName();
            // pindahkan gambar
            delete_files('assets/img/profile/siswa/' . $siswa['no_induk']);
            $fileImage->move('assets/img/profile/siswa/', $ni . '/' . $namaImage);
            $image = $ni . '/' . $namaImage;
            // hapus file yang lama
            // if ($siswa['image_profile'] != 'default.png') {
            //     unlink('assets/img/profile/siswa/' . $siswa['image_profile']);
            // }
        }
        $data = [
            'no_induk' => $this->request->getVar('no_induk'),
            'nama' => htmlspecialchars($this->request->getVar('nama')),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'no_hp' => $this->request->getVar('no_hp'),
            'image_profile' => $image,
            'alamat' => htmlspecialchars($this->request->getVar('alamat'))
        ];
        $this->siswa->update($siswa['id'], $data);
        return redirect()->to('/siswa')->with('success', 'Data siswa berhasil di update');
    }

    public function addUser($ni)
    {
        $rules = [
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password minimal 8 karakter'
                ]
            ],
            'cpassword' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi password harus diisi',
                    'matches' => 'Konfirmasi password tidak sama'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/siswa')->withInput();
        }


        $data = [
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'status_id' => 3,
            'is_active' => $this->request->getVar('is_active') ? 1 : 0
        ];

        $this->user->save($data);

        $siswa = $this->siswa->where('no_induk', $ni)->first();
        $user = $this->user->where('username', $ni)->first();

        $this->siswa->update($siswa['id'], [
            'user_id' => $user['id']
        ]);

        return redirect()->to('/siswa')->with('success', 'Data user pada siswa ' . $siswa['nama'] . ' sudah ditambahkan');
    }

    public function updateUser($ni)
    {
        $rules = [
            'password' => [],
            'cpassword' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi password tidak sama'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/siswa')->withInput();
        }



        $user = $this->user->where('username', $ni)->first();

        $this->user->update($user['id'], [
            'password' => $this->request->getVar('password') ? password_hash($this->request->getVar('password'), PASSWORD_DEFAULT) : $user['password'],
            'is_active' => $this->request->getVar('is_active') ? 1 : 0
        ]);

        return redirect()->to('/siswa')->with('success', 'Data user telah diubah');
    }
}
