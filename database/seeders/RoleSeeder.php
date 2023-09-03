<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roles = [
            ['id' => 1, 'name' => 'admin', 'guard_name' => 'web', 'created_at' => '2023-03-09 17:48:35', 'updated_at' => '2023-03-09 17:48:35'],
            ['id' => 2, 'name' => 'user', 'guard_name' => 'web', 'created_at' => '2023-03-09 17:48:36', 'updated_at' => '2023-03-09 17:48:36'],
        ];

        DB::table('roles')->insert($roles);

    }
}
