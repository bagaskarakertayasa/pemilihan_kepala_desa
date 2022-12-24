<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nama_desa'    => 'Bantiran',
            'nama_desa'    => 'Jelijih Punggang',
            'nama_desa'    => 'Angkah',
            'nama_desa'    => 'Mundeh Kauh',
            'nama_desa'    => 'Megati',
            'nama_desa'    => 'Abiantuwung',
            'nama_desa'    => 'Perean Kangin',
            'nama_desa'    => 'Kukuh',
            'nama_desa'    => 'Baru',
            'nama_desa'    => 'Marga Dauh Puri',
            'nama_desa'    => 'Marga Dajan Puri',
            'nama_desa'    => 'Biaung',
            'nama_desa'    => 'Sangketan',
            'nama_desa'    => 'Mengesta',
            'kecamatan'    => 'Pupuan',
            'kecamatan'    => 'Pupuan',
            'kecamatan'    => 'Selemadeg Barat',
            'kecamatan'    => 'Selemadeg Barat',
            'kecamatan'    => 'Selemadeg Timur',
            'kecamatan'    => 'Kediri',
            'kecamatan'    => 'Baturiti',
            'kecamatan'    => 'Marga',
            'kecamatan'    => 'Marga',
            'kecamatan'    => 'Marga',
            'kecamatan'    => 'Marga',
            'kecamatan'    => 'Penebel',
            'kecamatan'    => 'Penebel',
            'kecamatan'    => 'Penebel',
        ];

        // Simple Queries
        $this->db->query('INSERT INTO desa (nama_desa, kecamatan) VALUES(:nama_desa:, :kecamatan:)', $data);

        // Using Query Builder
        $this->db->table('desa')->insert($data);
    }
}