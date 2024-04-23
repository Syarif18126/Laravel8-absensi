<?php

namespace Database\Seeders;

use App\Models\User;
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
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        // User::create([
        //     'name' => 'Syarif Hidayat',
        //     'email' => 'syarif hidayat@example.com',
        //     'password' => bcrypt('12345678'),
        //     'foto' => 'favicon.ico',
        //     'role_id' => 2,
        // ]);
    }
}
