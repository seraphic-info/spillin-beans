<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->truncate();

        \DB::table('users')->insert([
          [
              'name' => 'Super Admin',
              'email' => 'hello@spillinbeans.com',
              'email_verified_at' => now(),
              'password' => \Hash::make('Boston12'),
              'created_at' => now(),
              'updated_at' => now()
          ]
        ]);
    }
}
