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
               'password'=> bcrypt('1234'),
               'is_admin'=>'1',
            ],
            [
               'name'=>'User1',
               'email'=>'user1@email.com',
               'password'=> bcrypt('1234'),
               'is_admin'=>'0',
            ],
            [
               'name'=>'User2',
               'email'=>'user2@email.com',
               'password'=> bcrypt('1234'),
               'is_admin'=>'0',
            ],
            [
               'name'=>'User3',
               'email'=>'user3@email.com',
               'password'=> bcrypt('1234'),
               'is_admin'=>'0',
            ],
            [
               'name'=>'User4',
               'email'=>'user4@email.com',
               'password'=> bcrypt('1234'),
               'is_admin'=>'0',
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
