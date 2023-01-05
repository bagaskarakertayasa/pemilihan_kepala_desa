<?php namespace App\Models;

use CodeIgniter\Database\SQLite3\Table;
use CodeIgniter\Model;

class tps extends Model 
{
    protected $table = 'tps';
    protected $primaryKey = 'id_tps';
    protected $allowedFields = [                
        'no_tps',
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
        'created_at'
    ];

    public function getTPS($id)
    {
        $hasil = $this->db->query("SELECT tps.id_tps, tps.no_tps, tps.desa, desa.nama_desa, 
            tps.banjar_tps, tps.jml_pml_tetap, tps.mgn_hak_suara, 
            tps.tdk_mgn_hak_suara, tps.suara_tdk_sah, desa.calon_1, 
            desa.calon_2, desa.calon_3, desa.calon_4, desa.calon_5, 
            tps.calon1, tps.calon2, tps.calon3, tps.calon4, tps.calon5,
            desa.gambar_calon_1, desa.gambar_calon_2, desa.gambar_calon_3,
            desa.gambar_calon_4, desa.gambar_calon_5
            FROM desa LEFT JOIN tps ON id_desa = desa
            WHERE desa.id_desa = $id
            ORDER BY tps.no_tps");
        return $hasil->getResultArray();
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

    public function getFilter($desa)
    {
        return $this->db->table('akun')        
         ->join('desa', 'desa.id_desa = akun.desa')    
         ->orderBy('nama_desa', 'DESC')     
         ->get()->getResultArray();
    }

    public function filterTPS($id)
    {
        $hasil = $this->db->query("SELECT SUM(tps.calon1) as sum1, SUM(tps.calon2) as sum2,
            SUM(tps.calon3) as sum3, SUM(tps.calon4) as sum4, SUM(tps.calon5) as sum5
            FROM desa LEFT JOIN tps ON id_desa = desa
            WHERE desa.id_desa = $id
            ORDER BY tps.banjar_tps");
        return $hasil->getResultArray();
    }

    public function tes()
    {
        $hasil = $this->db->query("SELECT tps.id_tps, tps.desa, desa.nama_desa, 
            tps.banjar_tps, tps.jml_pml_tetap, tps.mgn_hak_suara, 
            tps.tdk_mgn_hak_suara, tps.suara_tdk_sah, desa.calon_1, 
            desa.calon_2, desa.calon_3, desa.calon_4, desa.calon_5, 
            tps.calon1, tps.calon2, tps.calon3, tps.calon4, tps.calon5,
            desa.gambar_calon_1, desa.gambar_calon_2, desa.gambar_calon_3,
            desa.gambar_calon_4, desa.gambar_calon_5
            FROM desa LEFT JOIN tps ON id_desa = desa
            ORDER BY tps.banjar_tps");
        return $hasil->getResultArray();
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