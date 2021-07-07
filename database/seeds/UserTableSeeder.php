<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ernesto Mejia',
            'email' => 'ernesto@devs.com',
            'password' => bcrypt('12345')

        ]);

        User::create([
            'name' => 'Jared Jimenez',
            'email' => 'jared@devs.com',
            'password' => bcrypt('12345')

        ]);
    }
}
