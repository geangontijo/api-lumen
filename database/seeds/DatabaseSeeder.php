<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'email' => 'geangontijo07@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('Cavalloo7')
        ]);
    }
}
