<?php

namespace Database\Seeders;

use App\Models\User;
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
            'name' => 'AAIT.SA',
            'phone' => '+966541867992',
            'email' => 'aait@info.sa',
            'password' => bcrypt('aaitsa050'),
            'is_Admin' => 1,
        ]);
        User::create([
            'name' => 'moaz',
            'phone' => '+01222442506',
            'email' => 'moaz@yahoo..com',
            'password' => bcrypt('aaitsa050'),
            'is_Admin' => 1,
        ]);
    }
}
