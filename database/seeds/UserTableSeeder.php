<?php

use App\User;
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
        User::create([
            'name'=>'Binay',
            'email'=>'thapa.binay111@gmail.com',
            'password'=>Hash::make('123456')
        ]);
    }
}
