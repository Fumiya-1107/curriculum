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
          'name' => 'Hideki Matsui',
          'email' => 'f.tarumac@gmail.com',
          'password' => 'hidekimatsui',
        ],
        [
          'name' => 'Shohei Ohtani',
          'email' => 'f.tarumac@gmail.com',
          'password' => 'shoheiohtani',
        ],
        [
          'name' => 'Ichiro Suzuki',
          'email' => 'f.tarumac@gmail.com',
          'password' => 'ichirosuzuki',
        ],
      ]);
    }
}