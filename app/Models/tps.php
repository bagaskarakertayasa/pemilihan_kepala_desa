<?php namespace App\Models;

use CodeIgniter\Database\SQLite3\Table;
use CodeIgniter\Model;

class tps extends Model 
{
    protected $table = 'tps';
    protected $primaryKey = 'id_tps';
    protected $allowedFields = [        
        'nomer_tps',
        'banjar_tps',
        'jml_pml_tetap',
        'mgn_hak_suara',
        'tdk_mgn_hak_suara',
        'suara_tdk_sah',
        'calon1',
        'calon2',
        'calon3',
        'calon4',
        'calon5',
        'desa',
    ];

    public function getTPS($id)
    {
        return $this->db->table('tps')   
         ->join('desa', 'desa.id_desa = tps.desa')      
         ->where('desa', $id)
         ->get()->getResultArray();

        // $hasil = $this->db->query("SELECT tps.id_tps, desa.nama_desa, 
        //     tps.banjar_tps, tps.jml_pml_tetap, tps.mgn_hak_suara, 
        //     tps.tdk_mgn_hak_suara, tps.suara_tdk_sah, desa.calon_1, 
        //     desa.calon_2, desa.calon_3, desa.calon_4, desa.calon_5, 
        //     tps.calon1, tps.calon2, tps.calon3, tps.calon4, tps.calon5 
        //     FROM tps
        //     INNER JOIN desa ON desa.id_desa = tps.desa
        //     WHERE tps.desa = $id");
        // return $hasil->getResultArray();
    }

    // public function getNamaDesa($id)
    // {
    //     $hasil = $this->db->query("SELECT desa.nama_desa
    //         FROM tps
    //         INNER JOIN desa ON desa.id_desa = tps.desa
    //         WHERE desa.id_desa = $id");
    //     return $hasil->getResultArray();
    // }
    
    public function tambah_tps($data)
    {
        return $this->db->table('tps')->insert($data);
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