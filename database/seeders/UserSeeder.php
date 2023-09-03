<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@app.com',
            'password' => Hash::make('1234'),
        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@app.com',
            'password' => Hash::make('4321'),
        ]);

    }
}
