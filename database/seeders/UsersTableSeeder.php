<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('adminadmin'),
            'foto' => '',
            'role_id' => 1,
        ]);
        User::create([
            'name' => 'Siswa',
            'email' => 'siswa@example.com',
            'password' => bcrypt('siswasiswa'),
            'foto' => '',
            'role_id' => 2,
        ]);
    }
}
