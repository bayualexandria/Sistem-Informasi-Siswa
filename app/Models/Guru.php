<?php

namespace App\Models;

use CodeIgniter\Model;

class Guru extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'guru';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nip', 'nama', 'jenis_kelamin', 'user_id', 'no_hp', 'image_profile', 'alamat'];

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
        return $this->table('guru')
            ->select('guru.*')
            ->like('nama', $keyword)
            ->orLike('jenis_kelamin', $keyword)
            ->orLike('nip', $keyword)
            ->orLike('no_hp', $keyword)
            ->orLike('alamat', $keyword);
    }

    public function getAll()
    {
        return $this->table('guru')->select('guru.*')->orderBy('nama', 'ASC');
    }
}
