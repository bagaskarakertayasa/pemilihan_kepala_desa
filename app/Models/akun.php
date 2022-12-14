<?php namespace App\Models;

use CodeIgniter\Database\SQLite3\Table;
use CodeIgniter\Model;

class akun extends Model 
{
    protected $table = 'akun';
    protected $primaryKey = 'id_akun';
    protected $allowedFields = [        
        'nama_depan',
        'nama_belakang',
        'username',
        'email',
        'password',        
        'desa',        
        'status'        
    ];

    public function tambah_akun($data)
    {
        return $this->db->table('akun')->insert($data);
    }

    public function getAkun()
    {
        // $hasil = $this->db->query("SELECT * FROM akun
        //     RIGHT JOIN desa ON desa.id_desa = akun.desa
        //     WHERE desa.nama_desa <> 'Admin'");
        // return $hasil->getResultArray();

        return $this->db->table('akun')
         ->join('desa', 'desa.id_desa = akun.desa')             
         ->get()->getResultArray();

        // return $this->db->table('akun')
        //  ->join('desa', 'desa.id_desa = akun.desa', 'right')           
        //  ->get()->getResultArray();
    }
}

?>