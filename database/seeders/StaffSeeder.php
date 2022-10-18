<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Staff::create([
            'name'          => 'Gusti Randa Pangestu',
            'phone_number'  => '085363940662',
            'position'      => 'Manager',
            'is_active'     => 1
        ]);
    }
}
