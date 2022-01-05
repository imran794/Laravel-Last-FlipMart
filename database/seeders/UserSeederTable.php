<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
          DB::table('users')->insert([
            'roled_id' => 1,
            'name' => 'MD.Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(123456789),
        ]);

          DB::table('users')->insert([
            'roled_id' => 2,
            'name' => 'MD.User',
            'email' => 'user@gmail.com',
            'password' => bcrypt(123456789),
        ]);
    }
}
