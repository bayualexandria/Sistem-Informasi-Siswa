<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class AuthenticationController extends BaseController
{
    public $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function admin()
    {
        if (session()->get('username') && session()->get('status_id') == 3) {
            return redirect()->to('/auth-admin');
        }
        if (session()->get('username')) {
            return redirect()->to('/dashboard');
        }
        return view('backend/auth/login', [
            'title' => 'Halaman Login Admin',
            'validation' => $this->validation,
        ]);
    }

    public function logout()
    {
        $this->session->remove('username');
        $this->session->remove('status_id');
        return redirect()->route('/')->with('success', 'Selamat anda berhasil keluar dari sistem');
    }

    public function attemptAdmin()
    {
        $rules = [
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIP atau Username harus diisi'
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
            return redirect()->to('/auth-admin')->withInput();
        }

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $this->user->where('username', $username)->first();
        if ($user) {
            if ($user['status_id'] != 3) {
                if ($user['is_active'] == 1) {
                    if (password_verify($password, $user['password'])) {
                        $this->session->set([
                            'username' => $user['username'],
                            'status_id' => $user['status_id']
                        ]);
                        return redirect()->to('/dashboard');
                    } else {
                        return redirect()->route('auth-admin')->with('error', 'Password yang anda masukan salah!');
                    }
                } else {
                    return redirect()->route('auth-admin')->with('error', 'Akun anda belum diaktifkan!');
                }
            } else {
                return redirect()->route('auth-admin')->with('error', 'NIP atau Username yang anda masukan belum terdaftar!');
            }
        } else {
            return redirect()->route('auth-admin')->with('error', 'NIP atau Username yang anda masukan belum terdaftar!');
        }
    }
    public function logoutAdmin()
    {
        $this->session->remove(['username']);
        return redirect()->route('auth-admin')->with('success', 'Selamat anda berhasil keluar dari sistem');
    }
}
