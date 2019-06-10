<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name' => 'Roshan Shrestha',
            'email' => 'roshan.stha5298@gmail.com',
            'password' => bcrypt('password'),
            'admin' => 1,
            'avatar' => 'uploads/avatar/aa.png',
        ]);
    }
}
