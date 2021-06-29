<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'description' => 'permission_create',
                'id' => 1,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'description' => 'permission_edit',
                'id' => 2,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'description' => 'permission_show',
                'id' => 3,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'description' => 'permission_delete',
                'id' => 4,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'description' => 'permission_access',
                'id' => 5,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'description' => 'role_create',
                'id' => 6,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'description' => 'role_edit',
                'id' => 7,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'description' => 'role_show',
                'id' => 8,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'description' => 'role_delete',
                'id' => 9,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'description' => 'role_access',
                'id' => 10,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'description' => 'user_management_access',
                'id' => 11,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'description' => 'user_create',
                'id' => 12,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'description' => 'user_edit',
                'id' => 13,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'description' => 'user_show',
                'id' => 14,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'description' => 'user_delete',
                'id' => 15,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'description' => 'user_access',
                'id' => 16,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'description' => 'certification_types_management_access',
                'id' => 17,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                '_status' => '1',
                'created_at' => NULL,
                'description' => 'certification_categories_management_access',
                'id' => 18,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}