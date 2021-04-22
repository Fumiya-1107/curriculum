<?php

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
      DB::table('users')->insert([
        [
          'name' => 'tarou Matsui',
          'email' => 'maaaaatusi@gmail.com',
          'password' => bcrypt('hidekimatsui'),
        ],
        [
          'name' => 'jirou Ohtani',
          'email' => 'ohtaaaaani@gmail.com',
          'password' => bcrypt('shoheiohtani'),
        ],
        [
          'name' => 'saburou Suzuki',
          'email' => 'sabuuuuurou@gmail.com',
          'password' => bcrypt('ichirosuzuki'),
        ],
      ]);
    }
}