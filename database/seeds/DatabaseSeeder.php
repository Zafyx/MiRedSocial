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
      DB::table('users')->truncate();
      DB::table('users')->insert([
      'name'  => 'usuario',
      'user_name'  => 'usuario',
      'profile_photo'  => '',
      'email'     => 'usuario@gmail.com',
      'password'  => bcrypt('usuario'),
    ]);

      DB::table('users')->insert([
      'name'  => 'usuario2',
      'user_name'  => 'usuario2',
      'profile_photo'  => '',
      'email'     => 'usuario2@gmail.com',
      'password'  => bcrypt('usuario'),
      ]);
    }
}
