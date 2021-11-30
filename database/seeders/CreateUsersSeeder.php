<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'email'=>'admin@email.com',
               'password'=> bcrypt('12345678'),
               'is_admin'=>'1',
            ],
            [
               'name'=>'User',
               'email'=>'user@email.com',
               'password'=> bcrypt('12345678'),
               'is_admin'=>'0',
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
