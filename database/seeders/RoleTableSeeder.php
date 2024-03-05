<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('role')->insert([
            'role_name' => 'admin',
            'role_code' => 'admin',
        ]);

        DB::table('role')->insert([
            'role_name' => 'content writer',
            'role_code' => 'cw',
        ]);
    }
}
