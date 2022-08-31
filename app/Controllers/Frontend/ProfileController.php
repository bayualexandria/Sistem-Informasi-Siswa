<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Siswa;
use App\Models\User;

class ProfileController extends BaseController
{
    public function __construct()
    {
        $this->siswa = new Siswa();
        $this->user = new User();
    }
    public function index()
    {
        return view('frontend/pages/profile/ubah-profile', [
            'siswa' => $this->siswa->asObject()->where('no_induk', session()->get('username'))->first(),
            'validation' => $this->validation
        ]);
    }

    public function update()
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
            return redirect()->to('/edit-profile')->withInput();
        }

        $siswa = $this->siswa->where('no_induk', session()->get('username'))->first();

        $upload = $this->request->getFile('image_profile');

        if ($upload->getError() == 4) {
            $image = $siswa['image_profile'];
        } else {
            $namaImage = $upload->getRandomName();

            delete_files('assets/img/profile/siswa/' . $siswa['no_induk']);
            $upload->move('assets/img/profile/siswa/', $siswa['no_induk'] . '/' . $namaImage);
            $image = $siswa['no_induk'] . '/' . $namaImage;
        }

        $this->siswa->update($siswa['id'], [
            'nama' => htmlspecialchars($this->request->getVar('nama')),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'no_hp' => htmlspecialchars($this->request->getVar('no_hp')),
            'image_profile' => $image,
            'alamat' => htmlspecialchars($this->request->getVar('alamat'))
        ]);

        return redirect()->to('/home')->with('succes', 'Data berhasil diubah');
    }

    public function password()
    {
        return view('frontend/pages/profile/ubah-password', [
            'siswa' => $this->siswa->asObject()->where('no_induk', session()->get('username'))->first(),
            'validation' => $this->validation
        ]);
    }

    public function ubahPassword()
    {
        $rules = [
            'password_baru' => [
                'rules' => 'required|min_length[8]|matches[password_baru_confirm]',
                'errors' => [
                    'required' => 'Password baru harus diisi',
                    'min_length' => 'Password baru minimal 8 karakter',
                    'matches' => 'Password baru tidak sama dengan konfirmasi password baru'
                ]
            ],
            'password_baru_confirm' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Konfirmasi password baru harus diisi',
                ]
            ]
        ];
        if (!$this->validate($rules)) {
            return redirect()->to('/ubah-password')->withInput();
        }
        $user = $this->user->where('username', session()->get('username'))->first();

        $this->user->update($user['id'], [
            'password' => password_hash($this->request->getVar('password_baru'), PASSWORD_DEFAULT)
        ]);
        return redirect()->to('/home')->with('succes', 'Password berhasil diubah');
    }
}
