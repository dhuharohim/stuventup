<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->where('name', 'Himpunan Mahasiswa Ilmu Komputer')->pluck('id');
        $user1 = DB::table('users')->where('name', 'Himpunan Mahasiswa Teknik Mesin')->pluck('id');

        $faker = Faker::create();
        DB::table('profile')->insert([
            'user_id' => $faker->randomElement($user),
        ]);
        DB::table('profile')->insert([
            'user_id' => $faker->randomElement($user1),
        ]);
    }
}
