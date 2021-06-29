<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_user')->delete();
        
        \DB::table('role_user')->insert(array (
            0 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'role_id' => 1,
                'updated_at' => NULL,
                'user_id' => 1,
            ),
            1 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'role_id' => 1,
                'updated_at' => NULL,
                'user_id' => 2,
            ),
            2 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'role_id' => 2,
                'updated_at' => NULL,
                'user_id' => 3,
            ),
        ));
        
        
    }
}