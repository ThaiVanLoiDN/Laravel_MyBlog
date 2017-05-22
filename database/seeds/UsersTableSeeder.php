<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'username' => 'admin',
            'fullname' => 'Administrator',
            'email' => 'thaivanloidn@gmail.com',
            'image' => '',
            'role' => 3,
            'password' => bcrypt('123456'),
        ]);
    }
}
