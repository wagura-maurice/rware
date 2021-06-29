<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Maurice Wagura',
                'email' => 'wagura465@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$MEloJ/um4vTJrdhG/y1FO.Vpn0MkGLW4MLpqLKZEFPVOLSo.TVZUm',
                'remember_token' => NULL,
                'created_at' => '2021-01-01 06:36:26',
                'updated_at' => '2021-01-01 06:36:26',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Derrick Kiragu',
                'email' => 'dmkiragu@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$o2tK82g5fOfkuv45WRUYdegOkDL44H0uGgubLxnJU5CwuWff7hr2u',
                'remember_token' => 'CiBIr9ObUDeYnCd6uyLkUqXptGvPVKpNvnTPf3jDwZLw78du5QbJQFE4O1gx',
                'created_at' => '2021-01-01 06:36:26',
                'updated_at' => '2021-01-01 06:36:26',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Sospeter Muiruri',
                'email' => 'sospeter@bebing.co.ke',
                'email_verified_at' => NULL,
                'password' => '$2y$10$YdT.3ovnESwklHJjrTRSTO/ag52x9ho.rkAf0iXLG21iZ4e4jA.YS',
                'remember_token' => NULL,
                'created_at' => '2021-01-01 06:36:26',
                'updated_at' => '2021-01-01 06:36:26',
            ),
        ));
        
        
    }
}