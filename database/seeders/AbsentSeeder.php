<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AbsentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Absent::create([
            'id_staff'   => 1,
            'date'       => date("2022-10-10"),
            'time_start' => Carbon::now(),
            'time_end'   => Carbon::now(),
            'note'       => 'Laravel 9',
            'overtime'   => 'iya',
        ]);
    }
}
