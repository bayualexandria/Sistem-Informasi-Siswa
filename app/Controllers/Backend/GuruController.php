<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\{User, Guru};

class GuruController extends BaseController
{

    public function __construct()
    {
        $this->guru = new Guru();
        $this->user = new User();
    }

    public function index()
    {
        $keyword = $this->request->getVar('search');
        if ($keyword) {
            $guru = $this->guru->search($keyword)->asObject();
        } else {
            $guru = $this->guru->getAll()->asObject();
        }
        return view('backend/pages/guru/index', [
            'title' => 'Halaman Daftar Guru',
            'guru' => $guru->paginate(5, 'pagination'),
            'pager' => $this->guru->pager,
            'validation' => $this->validation,
            'keyword' => $keyword,

        ]);
    }

    public function insert()
    {
        $rules = [
            'nip' => [
                'rules' => 'required|numeric|min_length[18]|max_length[18]|is_unique[guru.nip]',
                'errors' => [
                    'required' => 'NIP harus diisi',
                    'numeric' => 'Yang anda masukan bukan NIP',
                    'max_length' => 'NIP yang anda masukan melebihi 18 karakter',
                    'min_length' => 'NIP yang anda masukan kurang dari 18 karakter',
                    'is_unique' => 'NIP yang anda masukan sudah terdaftar'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi',
                ]
            ],
            'no_hp' => [
                'rules' => 'required|numeric|max_length[15]|is_unique[guru.no_hp]',
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
                    'uploaded' => 'Photo profile wajib di upload'
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
            return redirect()->to('/guru')->withInput();
        }
        if ($this->request->getFile('image_profile')) {
            $namaImage = $this->request->getFile('image_profile')->getRandomName();
            $this->request->getFile('image_profile')->move('assets/img/profile/guru/' . $this->request->getVar('nip'), $namaImage);
            $cover =  $this->request->getVar('nip') . '/' . $namaImage;
        }
        $data = [
            'nip' => $this->request->getVar('nip'),
            'nama' => htmlspecialchars($this->request->getVar('nama')),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'no_hp' => $this->request->getVar('no_hp'),
            'image_profile' => $cover,
            'alamat' => htmlspecialchars($this->request->getVar('alamat'))
        ];
        $this->guru->save($data);

        return redirect()->to('/guru')->with('success', 'Data guru dengan nama ' . $this->request->getVar('nama') . ' telah ditambahkan');
    }

    public function delete($nip)
    {
        $guru = $this->guru->where('nip', $nip)->first();
        // if (unlink($guru['image_profile'])) {
        //     unlink('assets/img/profile/guru/'.$guru['image_profile']);
        // }
        delete_files('assets/img/profile/guru/' . $guru['nip']);
        $user = $this->user->where('username', $nip)->first();
        rmdir('assets/img/profile/guru/' . $guru['nip']);

        $this->guru->delete($guru);
        if ($user) {
            $this->user->delete($user);
        }

        return redirect()->to('/guru')->with('success', 'Data guru berhasil dihapus');
    }

    public function update($nip)
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
            return redirect()->to('/guru')->withInput();
        }

        $guru = $this->guru->where('nip', $nip)->first();

        $fileImage = $this->request->getFile('image_profile');

        // cek gambar,apakah tetap gambar lama
        if ($fileImage->getError() == 4) {
            $image = $guru['image_profile'];
        } else {
            // generate nama file random
            $namaImage = $fileImage->getRandomName();
            // pindahkan gambar
            delete_files('assets/img/profile/guru/' . $guru['nip']);
            $fileImage->move('assets/img/profile/guru/', $nip . '/' . $namaImage);
            $image = $nip . '/' . $namaImage;
            // hapus file yang lama
            // if ($guru['image_profile'] != 'default.png') {
            //     unlink('assets/img/profile/guru/' . $guru['image_profile']);
            // }
        }
        $data = [
            'nip' => $this->request->getVar('nip'),
            'nama' => htmlspecialchars($this->request->getVar('nama')),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'no_hp' => $this->request->getVar('no_hp'),
            'image_profile' => $image,
            'alamat' => htmlspecialchars($this->request->getVar('alamat'))
        ];
        $this->guru->update($guru['id'], $data);
        return redirect()->to('/guru')->with('success', 'Data guru berhasil di update');
    }

    public function addUser($nip)
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
            return redirect()->to('/guru')->withInput();
        }


        $data = [
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'status_id' => 2,
            'is_active' => $this->request->getVar('is_active') ? 1 : 0
        ];

        $this->user->save($data);

        $guru = $this->guru->where('nip', $nip)->first();
        $user = $this->user->where('username', $nip)->first();

        $this->guru->update($guru['id'], [
            'user_id' => $user['id']
        ]);

        return redirect()->to('/guru')->with('success', 'Data user pada guru ' . $guru['nama'] . ' sudah ditambahkan');
    }

    public function updateUser($nip)
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
            return redirect()->to('/guru')->withInput();
        }



        $user = $this->user->where('username', $nip)->first();

        $this->user->update($user['id'], [
            'password' => $this->request->getVar('password') ? password_hash($this->request->getVar('password'), PASSWORD_DEFAULT) : $user['password'],
            'is_active' => $this->request->getVar('is_active') ? 1 : 0
        ]);

        return redirect()->to('/guru')->with('success', 'Data user telah diubah');
    }
}
