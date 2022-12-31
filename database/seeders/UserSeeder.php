<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Himpunan Mahasiswa Ilmu Komputer",
            'username' => "hmik.up",
            'password' => bcrypt("123"),
            'role' => "admin"
        ]);
        DB::table('users')->insert([
            'name' => "Himpunan Mahasiswa Teknik Mesin",
            'username' => "mesin.up",
            'password' => bcrypt("123"),
            'role' => "admin"
        ]);
    }
}
