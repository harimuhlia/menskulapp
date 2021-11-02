<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \DB::table('users')->insert([
            [
                'name' => 'Hari Muhlia, S.Kom.',
                'email' => 'harimuhlia@gmail.com',
                'password' => \Hash::make('12345678'),
                'role' => 'Administrator'
            ],
            [
                'name' => 'Ade Sunandar, S.Pd.',
                'email' => 'adesunandar@gmail.com',
                'password' => \Hash::make('12345678'),
                'role' => 'Pembina'
            ]
        ]);
    }
}
