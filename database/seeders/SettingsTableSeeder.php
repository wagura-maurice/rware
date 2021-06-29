<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'TWITTER_USERNAME',
                'value' => '@montanabay39',
                '_status' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'TWITTER_DOMAIN',
                'value' => 'bebing.co.ke',
                '_status' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'GOOGLE_SITE_VERIFICATION',
                'value' => NULL,
                '_status' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}