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
                'password' => '$2y$10$.UQ4MIHHUGRVoeJAi.iEYOc0EOoS9ldTfj3UjPBeL4TpSccHe.dyW',
                'remember_token' => '5umPu4E2DN8PsYsb8TaXotGwx6lsiHqxiViQFYdefxD3vrWBOnAS0i5ZmMZI',
                'created_at' => '2021-01-01 06:36:26',
                'updated_at' => '2021-01-01 06:36:26',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Dennis Kingori',
                'email' => 'dennisvat30@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$.UQ4MIHHUGRVoeJAi.iEYOc0EOoS9ldTfj3UjPBeL4TpSccHe.dyW',
                'remember_token' => NULL,
                'created_at' => '2021-01-01 06:36:26',
                'updated_at' => '2021-01-01 06:36:26',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Demo Tenant',
                'email' => 'demo@example.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$.UQ4MIHHUGRVoeJAi.iEYOc0EOoS9ldTfj3UjPBeL4TpSccHe.dyW',
                'remember_token' => 'XOVy1rOS8gtUAq2ElUTyDnYPG5KFa4xJjotG3VBy2fxi8sLcNRks0uBGJ72z',
                'created_at' => '2021-01-01 06:36:26',
                'updated_at' => '2021-01-01 06:36:26',
            ),
        ));
        
        
    }
}