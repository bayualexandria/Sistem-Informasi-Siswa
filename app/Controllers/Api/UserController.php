<?php

namespace App\Controllers\Api;

use App\Models\Siswa;
use App\Models\User;
use CodeIgniter\RESTful\ResourceController;

use function PHPUnit\Framework\isEmpty;

class UserController extends ResourceController
{
    public $siswa, $user;

    public function __construct()
    {
        $this->user = new User();
        $this->siswa = new Siswa();
    }

    public function index($username = null)
    {

        return $this->respond(['data' => $this->siswa->where('no_induk', $username)->first(), 'message' => 'Data berhasil ditampilkan', 'status' => 200], 200);
    }

    public function updateUser($username)
    {
        $file = $this->request->getFile('image_profile');

        $siswa = $this->siswa->where('no_induk', $username)->first();


        if (!$file) {
            $image = $siswa['image_profile'];
        } else {
            if (!base_url('assets/img/profile/siswa/' . $siswa['image_profile'])) {
                $namaImage = $this->request->getFile('image_profile')->getRandomName();
                $this->request->getFile('image_profile')->move('assets/img/profile/siswa/' . $this->request->getVar('no_induk'), $namaImage);
                $image = $this->request->getVar('no_induk') . '/' . $namaImage;
            }
            // generate nama file random
            $namaImage = $file->getRandomName();
            // pindahkan gambar
            unlink('assets/img/profile/siswa/' . $siswa['image_profile']);
            $file->move('assets/img/profile/siswa/', $username . '/' . $namaImage);
            $image = $username . '/' . $namaImage;
        }
        $data = [
            'no_induk' => $siswa['no_induk'],
            'nama' => $this->request->getVar('nama') ? $this->request->getVar('nama') : $siswa['nama'],
            'no_hp' => $this->request->getVar('no_hp') ? $this->request->getVar('no_hp') : $siswa['no_hp'],
            'image_profile' => $image,
            'jenis_kelamin' => $siswa['jenis_kelamin'],
            'user_id' => $siswa['user_id'],
            'kelas_id' => $siswa['kelas_id'],
            'alamat' => $this->request->getVar('alamat') ? $this->request->getVar('alamat') : $siswa['alamat']
        ];
        $this->siswa->update(
            $siswa['id'],
            $data
        );


        return $this->respond(['data' => $data, 'message' => 'Data siswa berhasil di perbaharui'], 200);
    }
}
