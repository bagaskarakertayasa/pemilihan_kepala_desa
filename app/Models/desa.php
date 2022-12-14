<?php namespace App\Models;

use CodeIgniter\Database\SQLite3\Table;
use CodeIgniter\Model;

class desa extends Model 
{
    protected $table = 'desa';
    protected $primaryKey = 'id_desa';
    protected $allowedFields = [        
        'nama_desa',
        'kecamatan',
        'calon_1',
        'calon_2',
        'calon_3',
        'calon_4',
        'calon_5'
    ];

    // public function tambah_akun($data)
    // {
    //     return $this->db->table('akun')->insert($data);
    // }

    public function getDesa($id)
    {
        return $this->db->table('desa')
         ->where('id_desa', $id)        
         ->get()->getResultArray();
    }

    // public function getAkun()
    // {
    //     return $this->db->table('akun')
    //      ->join('desa', 'desa.id_desa = akun.desa')    
    //      ->orderBy('nama_desa', 'DESC')     
    //      ->get()->getResultArray();
    // }
}

?>