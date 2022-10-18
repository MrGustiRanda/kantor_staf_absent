<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name'     => 'Gusti Randa Pangestu',
            'email'    => 'asd@gmail.com',
            'password' => Hash::make(12345),
        ]);
    }
}
