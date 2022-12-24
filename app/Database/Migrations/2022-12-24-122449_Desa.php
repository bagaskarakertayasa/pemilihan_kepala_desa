<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Desa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_desa' => [
                'type'           => 'INT',
                'constraint'     => 11,                
                'auto_increment' => true,
            ],
            'nama_desa' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'kecamatan' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'calon_1' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'calon_2' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'calon_3' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'calon_4' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'calon_5' => [
                'type' => 'VARCHAR',
                'constraint' => 50,                
            ],
            'gambar_calon_1' => [
                'type' => 'VARCHAR',
                'constraint' => 200,                
            ],
            'gambar_calon_2' => [
                'type' => 'VARCHAR',
                'constraint' => 200,                
            ],
            'gambar_calon_3' => [
                'type' => 'VARCHAR',
                'constraint' => 200,                
            ],
            'gambar_calon_4' => [
                'type' => 'VARCHAR',
                'constraint' => 200,                
            ],
            'gambar_calon_5' => [
                'type' => 'VARCHAR',
                'constraint' => 200,                
            ],
        ]);
        $this->forge->addKey('id_desa', true);        
        $this->forge->createTable('desa');
    }

    public function down()
    {
        $this->forge->dropTable('desa');
    }
}
