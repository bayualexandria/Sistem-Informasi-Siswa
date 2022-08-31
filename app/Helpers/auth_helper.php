<?php

use App\Models\{Guru, Siswa, User};

function auth()
{
    $username = session()->get('username');
    $user = new User();

    return $user->asObject()->where('username', $username)->first();
}

function guru()
{
    $username = session()->get('username');
    $user = new Guru();

    return $user->asObject()->where('nip', $username)->first();
}

function siswa()
{
    $username = session()->get('username');
    $user = new Siswa();

    return $user->asObject()->where('no_induk', $username)->first();
}
