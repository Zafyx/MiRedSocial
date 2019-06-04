<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
      'name'  => 'usuario',
      'user_name'  => 'usuario',
      'profile_photo'  => '',
      'email'     => 'usuario@gmail.com',
      'password'  => bcrypt('usuario'),
      ]);
    }
}
