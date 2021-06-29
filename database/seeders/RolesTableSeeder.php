<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'description' => 'administrator',
                'id' => 1,
                'name' => 'admin',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'description' => 'tenant client',
                'id' => 2,
                'name' => 'tenant',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}