<?php

use Illuminate\Database\Seeder;

class UsersTableSeedes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
         DB::table('users')->insert([
            'name' => 'J',
            'surname' => 'W',
            'email' => 'jw@gmail.com',
            'password' => bcrypt('qwerty'),
            'role' => 'admin'
        ]);

        DB::table('users')->insert([
            'name' => 'O',
            'surname' => 'Z',
            'email' => 'oz@gmail.com',
            'password' => bcrypt('qwerty'),
            'role' => 'manager'
        ]);

        DB::table('users')->insert([
            'name' => 'M',
            'surname' => 'S',
            'email' => 'ms@gmail.com',
            'password' => bcrypt('qwerty'),
            'role' => 'user'
        ]);
    }
}
