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
      'email'     => 'usuario@gmail.com',
      'password'  => bcrypt('usuario'),
      ]);
    }
}
