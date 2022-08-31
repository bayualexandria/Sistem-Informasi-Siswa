<?php

namespace App\Models;

use CodeIgniter\Model;

class Siswa extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'siswa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['no_induk', 'nama', 'jenis_kelamin', 'user_id', 'no_hp', 'image_profile', 'alamat', 'kelas_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function search($keyword)
    {
        return $this->table('siswa')
            ->select('siswa.*')
            ->where('deleted_at', null)
            ->like('nama', $keyword)
            ->orLike('jenis_kelamin', $keyword)
            ->orLike('no_induk', $keyword)
            ->orLike('no_hp', $keyword)
            ->orLike('alamat', $keyword)
            ->orderBy('nama', 'ASC');
    }

    public function getAll()
    {
        return $this->table('siswa')->select('siswa.*')->orderBy('nama', 'ASC');
    }

    public function getSiswaByKelas($kelas)
    {
        return $this->table('siswa')->select('siswa.*')->where('kelas_id', $kelas)->orderBy('nama', 'ASC');
    }

    public function searchSiswaByKelas($kelas, $keyowrd)
    {
        return $this->table('siswa')
            ->select('siswa.*')
            ->where('kelas_id', $kelas)
            ->like('nama', $keyowrd)
            ->orLike('no_induk', $keyowrd)
            ->orderBy('nama', 'ASC');
    }
}
