<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
                'email_verified_at' => '2021-07-05 10:19:46',
                'password' => Hash::make('Qwerty123!'),
                'remember_token' => 'hoOAiqTTkxfB3XprR7pQu7o1ZKMugRJ0Z6TWQKcnLSAMqqF1q84h47sztqZQ',
                'created_at' => '2021-01-01 06:36:26',
                'updated_at' => '2021-07-05 10:19:46',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Dennis Kingori',
                'email' => 'dennisvat30@gmail.com',
                'email_verified_at' => NULL,
                'password' => Hash::make('Qwerty123!'),
                'remember_token' => NULL,
                'created_at' => '2021-01-01 06:36:26',
                'updated_at' => '2021-01-01 06:36:26',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Demo Client',
                'email' => 'demo@example.com',
                'email_verified_at' => '2021-07-05 10:19:46',
                'password' => Hash::make('Qwerty123!'),
                'remember_token' => '5TBSPp558iet3Umy7iT3RGHXaOtvwVkxjK5uWtWzTZhnOCK9C02pQGXOTTSx',
                'created_at' => '2021-01-01 06:36:26',
                'updated_at' => '2021-01-01 06:36:26',
            ),
        ));
        
        
    }
}