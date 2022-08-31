<?php

namespace App\Models;

use CodeIgniter\Model;

class Mapel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'mapel';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_mapel', 'kelas_id', 'guru_id', 'hari', 'waktu'];

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

    public function getAll()
    {
        return $this->table('mapel')
            ->select('mapel.*,kelas.kelas,guru.nama,jurusan.jurusan')
            ->join('kelas', 'kelas.id=mapel.kelas_id')
            ->join('guru', 'guru.id=mapel.guru_id')
            ->join('jurusan', 'jurusan.id=kelas.id_jurusan')
            ->orderBy('nama_mapel', 'ASC');
    }

    public function search($keyword)
    {
        return $this->table('mapel')
            ->select('mapel.*,guru.nama,kelas.kelas,mapel.guru_id,mapel.kelas_id,jurusan.jurusan')
            ->join('guru', 'guru.id=mapel.guru_id')
            ->join('kelas', 'kelas.id=mapel.kelas_id')
            ->join('jurusan', 'jurusan.id=kelas.id_jurusan')
            ->like('nama_mapel', $keyword)
            ->orLike('nama', $keyword)
            ->orLike('jurusan', $keyword)
            ->orLike('kelas', $keyword)
            ->orLike('hari', $keyword)
            ->orLike('waktu', $keyword)
            ->orderBy('nama_mapel', 'ASC');
    }

    public function getDayMapel($id)
    {
        return $this->db->table('mapel')
            ->select('DISTINCT(mapel.hari),mapel.kelas_id')
            ->where('kelas_id', $id)
            ->orderBy('hari', 'ASC')->get()->getResultObject();
    }
}
