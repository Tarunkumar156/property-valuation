<?php

namespace Database\Seeders;

use App\Models\Admin\Auth\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'ADMIN',
            'email' => 'admin@gmail.com',
            'phone' => '1234567890',
            'password' => '12345678',
            'usertype' => 'ADMIN',
        ]);
    }
}
