<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            ['id' => 1, 'name' => 'create', 'guard_name' => 'web', 'created_at' => '2023-03-09 00:04:10', 'updated_at' => '2023-03-09 00:04:10'],
            ['id' => 2, 'name' => 'edit', 'guard_name' => 'web', 'created_at' => '2023-03-09 00:04:18', 'updated_at' => '2023-03-09 00:04:18'],
            ['id' => 3, 'name' => 'show', 'guard_name' => 'web', 'created_at' => '2023-03-09 00:04:24', 'updated_at' => '2023-03-09 00:04:24'],
            ['id' => 4, 'name' => 'delete', 'guard_name' => 'web', 'created_at' => '2023-03-09 00:04:31', 'updated_at' => '2023-03-09 00:04:31'],
            ['id' => 5, 'name' => 'permissions', 'guard_name' => 'web', 'created_at' => '2023-03-09 00:04:39', 'updated_at' => '2023-03-09 00:04:39'],
        ];

        DB::table('permissions')->insert($permissions);

    }
}