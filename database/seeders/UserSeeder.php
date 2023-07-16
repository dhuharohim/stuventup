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
        DB::table('users')->insert([
            'name' => "Himpunan Mahasiswa Teknik Elektro",
            'username' => "elektro.up",
            'password' => bcrypt("123"),
            'role' => "admin"
        ]);
        DB::table('users')->insert([
            'name' => "Himpunan Mahasiswa Teknik Geofisika",
            'username' => "geofisika.up",
            'password' => bcrypt("123"),
            'role' => "admin"
        ]);
        DB::table('users')->insert([
            'name' => "Himpunan Mahasiswa Teknik Logistik",
            'username' => "logistik.up",
            'password' => bcrypt("123"),
            'role' => "admin"
        ]);
        DB::table('users')->insert([
            'name' => "Himpunan Mahasiswa Teknik Geologi",
            'username' => "geologi.up",
            'password' => bcrypt("123"),
            'role' => "admin"
        ]);
        DB::table('users')->insert([
            'name' => "Himpunan Mahasiswa Teknik Sipil",
            'username' => "sipil.up",
            'password' => bcrypt("123"),
            'role' => "admin"
        ]);
        DB::table('users')->insert([
            'name' => "Himpunan Mahasiswa Teknik Kimia",
            'username' => "kimia.up",
            'password' => bcrypt("123"),
            'role' => "admin"
        ]);
        DB::table('users')->insert([
            'name' => "Himpunan Mahasiswa Teknik Lingkungan",
            'username' => "lingkungan.up",
            'password' => bcrypt("123"),
            'role' => "admin"
        ]);
        DB::table('users')->insert([
            'name' => "Himpunan Mahasiswa Teknik Perminyakan",
            'username' => "perminyakan.up",
            'password' => bcrypt("123"),
            'role' => "admin"
        ]);
        DB::table('users')->insert([
            'name' => "Himpunan Mahasiswa Ilmu Komunikasi",
            'username' => "komunikasi.up",
            'password' => bcrypt("123"),
            'role' => "admin"
        ]);
        DB::table('users')->insert([
            'name' => "Himpunan Mahasiswa Manajemen",
            'username' => "manajemen.up",
            'password' => bcrypt("123"),
            'role' => "admin"
        ]);
        DB::table('users')->insert([
            'name' => "Himpunan Mahasiswa Ilmu ekonomi",
            'username' => "Ekonomi.up",
            'password' => bcrypt("123"),
            'role' => "admin"
        ]);
        DB::table('users')->insert([
            'name' => "Himpunan Mahasiswa Hubungan Internasional",
            'username' => "hi.up",
            'password' => bcrypt("123"),
            'role' => "admin"
        ]);
        DB::table('users')->insert([
            'name' => "Himpunan Mahasiswa Ilmu Kimia",
            'username' => "ilmukimia.up",
            'password' => bcrypt("123"),
            'role' => "admin"
        ]);
    }
}
