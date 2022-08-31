<?php

namespace App\Models;

use CodeIgniter\Model;

class Kelas extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kelas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kelas', 'id_jurusan', 'id_guru'];

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
        return $this->table('kelas')
            ->select('kelas.kelas,jurusan.jurusan,guru.nama,kelas.id,kelas.id_jurusan,kelas.id_guru')
            ->join('jurusan', 'jurusan.id=kelas.id_jurusan')
            ->join('guru', 'guru.id=kelas.id_guru')
            ->like('kelas', $keyword)
            ->orLike('nama', $keyword)
            ->orLike('jurusan', $keyword)
            ->orderBy('kelas', 'ASC');
    }

    public function getAll()
    {
        $query = $this->table('kelas')
            ->select('kelas.kelas,jurusan.jurusan,guru.nama,kelas.id,kelas.id_jurusan,kelas.id_guru')
            ->join('jurusan', 'jurusan.id=kelas.id_jurusan')
            ->join('guru', 'guru.id=kelas.id_guru')->orderBy('kelas', 'ASC');
        return $query;
    }

    public function joinJurusan()
    {
        return $this->table('kelas')
            ->select('kelas.id,kelas.kelas,jurusan.jurusan')
            ->join('jurusan', 'jurusan.id=kelas.id_jurusan')
            ->orderBy('kelas', 'ASC')
            ->get()
            ->getResultObject();
    }

    public function searchSiswa($keyword)
    {
        return $this->table('siswa')->select('siswa.nama')->like('nama', $keyword)->orderBy('nama', 'ASC');
    }

}
