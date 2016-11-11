<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $user = User::create([
            'name' => 'admin',
            'email' => 'valera@mail.ru',
            'password' => '123456789'
        ]);

        $user->teams()->create([
            'name' => 'admin`s team #1'
        ]);
        $user->teams()->create([
            'name' => 'admin`s team #2'
        ]);

        $user = User::create([
            'name' => 'test',
            'email' => 'test@test.test',
            'password' => 'qwerty'
        ]);

        $user->teams()->create([
            'name' => 'test`s team #1'
        ]);
        $user->teams()->create([
            'name' => 'test`s team #2'
        ]);

        $user = User::create([
            'name' => 'test2',
            'email' => 'test@test.test2',
            'password' => 'qwerty'
        ]);

        $user->teams()->create([
            'name' => 'test2`s team #1'
        ]);
        $user->teams()->create([
            'name' => 'test2`s team #2'
        ]);
    }
}
