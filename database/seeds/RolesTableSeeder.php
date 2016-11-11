<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        Role::create([ 'name' => 'user' ]);
        Role::create([ 'name' => 'manager' ]);
        Role::create([ 'name' => 'admin' ]);
    }
}
