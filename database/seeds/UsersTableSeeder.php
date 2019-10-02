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
    public function run()
    {
        User::create([
            'name'=>'Luis Rodrigo Abasto',
            'email'=>'vida12345abasto@gmail.com',
            'password'=>bcrypt('12345678')
        ]);

        User::create([
            'name'=>'Sam Juarez',
            'email'=>'sam@gmail.com',
            'password'=>bcrypt('12345678')
        ]);

        User::create([
            'name'=>'Antonia Juarez',
            'email'=>'antonia@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
    }
}
