<?php

namespace App\Controllers\Api;

use App\Models\User;
use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;



class Authentication extends ResourceController
{
    public function __construct()
    {
        $this->user = new User();
    }
    public function login()
    {
        $rules = [
            'username' => [
                'rules' => 'required|numeric|max_length[10]',
                'errors' => [
                    'required' => 'No. Induk Siswa harus diisi',
                    'numeric' => 'Yang anda masukan bukan No. Induk',
                    'max_length' => 'No. Induk yang anda masukan melebihi 10 karakter'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi'
                ]
            ]
        ];
        if (!$this->validate($rules)) {
            return $this->respond(
                [
                    'message' => $this->validator->getErrors(),
                    'status' => 400
                ],
                400,

            )->getJSON();
        }
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $this->user->where('username', $username)->first();

        if (!$user) return $this->respond(['message' => 'User yang anda masukan belum terdaftar', 'status' => 401], 401);
        if (!password_verify($password, $user['password'])) return $this->respond(['message' => 'Password yang anda masukan salah!', 'status' => 401], 401);

        $key = env('JWT_SECRET');
        $iat = time();
        $payload = [
            'iss' => 'http://example.org',
            'aud' => 'http://example.com',
            'iat' => $iat,
            "email" => $user['username'],
        ];
        $token = JWT::encode($payload, $key, 'HS256');

        $response = ['user' => $user['username'], 'token' => $token, 'message' => 'Login berhasil'];
        return $this->respondCreated($response);
    }
}
