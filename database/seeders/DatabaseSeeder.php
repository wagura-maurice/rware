<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(SettingsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        \App\Models\CertificationType::factory(3)->create();
        \App\Models\CertificationCategory::factory(rand(12, 18))->create();
        \App\Models\Business::factory(rand(7, 12))->create();
        \App\Models\Application::factory(rand(23, 30))->create();
    }
}
