<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Tps extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tps' => [
                'type'           => 'INT',
                'constraint'     => 11,                
                'auto_increment' => true,
            ],            
            'banjar_tps' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'jml_pml_tetap' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'mgn_hak_suara' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'tdk_mgn_hak_suara' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'suara_tdk_sah' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'calon1' => [
                'type' => 'INT',
                'constraint' => 30,                
            ],
            'calon2' => [
                'type' => 'INT',
                'constraint' => 30,                
            ],
            'calon3' => [
                'type' => 'INT',
                'constraint' => 30,
                'null' => true,
            ],
            'calon4' => [
                'type' => 'INT',
                'constraint' => 30,
                'null' => true,
            ],
            'calon5' => [
                'type' => 'INT',
                'constraint' => 30,
                'null' => true,
            ],
            'desa' => [
                'type' => 'INT',
                'constraint' => 11,                
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);
        $this->forge->addKey('id_tps', true);
        $this->forge->addForeignKey('desa', 'desa', 'id_desa');
        $this->forge->createTable('tps');
    }

    public function down()
    {
        $this->forge->dropTable('tps');
    }
}
