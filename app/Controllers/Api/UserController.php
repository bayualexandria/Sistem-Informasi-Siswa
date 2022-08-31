<?php

namespace App\Controllers\Api;

use App\Models\User;
use CodeIgniter\RESTful\ResourceController;


class UserController extends ResourceController
{
    public function __construct()
    {
        $this->user = new User();
    }
    public function index()
    {
       
        return $this->respond(['data' => $this->user->findAll(), 'message' => 'Data berhasil ditampilkan', 'status' => 200], 200);
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
            // 'image_profile' => [
            //     'rules' => 'uploaded[image_profile]|max_size[image_profile,1024]|is_image[image_profile]|mime_in[image_profile,image/jpg,image/jpeg,image/png]',
            //     'errors' => [
            //         'uploaded' => 'File gambar tidak boleh kosong',
            //         'max_size' => 'File gambar tidak boleh lebih dari 1MB',
            //         'is_image' => 'File gambar harus berupa gambar',
            //         'mime_in' => 'File gambar harus berupa gambar'
            //     ]
            // ],

        ];
        if (!$this->validate($rules)) return $this->respond(
            [
                'message' => $this->validator->getErrors()
            ],
            400,

        )->getJSON();
        return $this->respond(['message' => 'Ok'], 200);
    }
}
