<?php

use Illuminate\Database\Seeder;
use App\Mark;

class MarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        Mark::create([ 'name' => 'dev', 'color' => '#3c8dbc' ]);
        Mark::create([ 'name' => 'test', 'color' => '#d84315' ]);
        Mark::create([ 'name' => 'design', 'color' => '#00695c' ]);
    }
}
