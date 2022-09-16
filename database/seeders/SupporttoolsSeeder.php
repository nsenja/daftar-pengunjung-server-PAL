<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupporttoolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supporttools')->insert([
            [
                'support_options' => 'Ya',
            ],
            [
                'support_options' => 'Tidak',
            ],
        ]);
    }
}
