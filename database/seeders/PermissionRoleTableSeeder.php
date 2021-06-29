<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permission_role')->delete();
        
        \DB::table('permission_role')->insert(array (
            0 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'permission_id' => 1,
                'role_id' => 1,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'permission_id' => 2,
                'role_id' => 1,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'permission_id' => 3,
                'role_id' => 1,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'permission_id' => 4,
                'role_id' => 1,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'permission_id' => 5,
                'role_id' => 1,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'permission_id' => 6,
                'role_id' => 1,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'permission_id' => 7,
                'role_id' => 1,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'permission_id' => 8,
                'role_id' => 1,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'permission_id' => 9,
                'role_id' => 1,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'permission_id' => 10,
                'role_id' => 1,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'permission_id' => 11,
                'role_id' => 1,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'permission_id' => 12,
                'role_id' => 1,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'permission_id' => 13,
                'role_id' => 1,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'permission_id' => 14,
                'role_id' => 1,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'permission_id' => 15,
                'role_id' => 1,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'permission_id' => 16,
                'role_id' => 1,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'permission_id' => 17,
                'role_id' => 1,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'permission_id' => 18,
                'role_id' => 1,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}