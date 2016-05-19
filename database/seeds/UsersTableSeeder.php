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
        //Use this user for login as admin
        // User::create(['username' => 'rat','password' => bcrypt('a')]);
        //Use this user for login as user
        User::create(['username' => 'admin','password' => bcrypt('a')]);
        User::create(['username' => 'joy','password' => bcrypt('a')]);

        //creating 10 test users
        // factory(User::class,10)->create();



    }
}
