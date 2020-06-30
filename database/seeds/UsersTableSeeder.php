<?php

use App\User;
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
        User::create(['name' => 'Faisal Abdul Hamid', 'email' => 'faisal.abdulhamid@gmail.com', 'password' => bcrypt('Password0!')]);
    }
}
