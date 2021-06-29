<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PlatformsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('platforms')->delete();
        
        \DB::table('platforms')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'youtube',
                'endpoint' => 'https://www.youtube.com/watch?v=[]',
                'description' => 'youtube playlist links',
                '_status' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'skiza',
                'endpoint' => 'tel:*811*[]#',
                'description' => 'safaricom skiza code',
                '_status' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}