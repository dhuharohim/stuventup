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
        $user2 = DB::table('users')->where('name', 'Himpunan Mahasiswa Teknik Elektro')->pluck('id');
        $user3 = DB::table('users')->where('name', 'Himpunan Mahasiswa Teknik Geofisika')->pluck('id');
        $user4 = DB::table('users')->where('name', 'Himpunan Mahasiswa Teknik Logistik')->pluck('id');
        $user5 = DB::table('users')->where('name', 'Himpunan Mahasiswa Teknik Geologi')->pluck('id');
        $user6 = DB::table('users')->where('name', 'Himpunan Mahasiswa Hubungan Internasional')->pluck('id');
        $user7 = DB::table('users')->where('name', 'Himpunan Mahasiswa Ilmu Kimia')->pluck('id');
        $user8 = DB::table('users')->where('name', 'Himpunan Mahasiswa Teknik Sipil')->pluck('id');
        $user9 = DB::table('users')->where('name', 'Himpunan Mahasiswa Ilmu Komunikasi')->pluck('id');
        $user10 = DB::table('users')->where('name', 'Himpunan Mahasiswa Manajemen')->pluck('id');
        $user11 = DB::table('users')->where('name', 'Himpunan Mahasiswa Ilmu Ekonomi')->pluck('id');
        $user12 = DB::table('users')->where('name', 'Himpunan Mahasiswa Teknik Kimia')->pluck('id');
        $user13 = DB::table('users')->where('name', 'Himpunan Mahasiswa Teknik Lingkungan')->pluck('id');
        $user14 = DB::table('users')->where('name', 'Himpunan Mahasiswa Teknik Perminyakan')->pluck('id');



        $faker = Faker::create();
        DB::table('profile')->insert([
            'user_id' => $faker->randomElement($user),
            'name_himpunan' => 'Himpunan Mahasiswa Ilmu Komputer',
            'nickname_himpunan' => 'HMIK',
            'bio_himpunan' => 'Blablablablablabla',
        ]);
        DB::table('profile')->insert([
            'user_id' => $faker->randomElement($user1),
            'name_himpunan' => 'Himpunan Mahasiswa Teknik Mesin',
            'nickname_himpunan' => 'HMTM',
            'bio_himpunan' => 'Blablablablablabla',
        ]);
        DB::table('profile')->insert([
            'user_id' => $faker->randomElement($user2),
            'name_himpunan' => 'Himpunan Mahasiswa Teknik Elektro',
            'nickname_himpunan' => 'HMTE',
            'bio_himpunan' => 'Blablablablablabla',
        ]);
        DB::table('profile')->insert([
            'user_id' => $faker->randomElement($user3),
            'name_himpunan' => 'Himpunan Mahasiswa Teknik Geofisika',
            'nickname_himpunan' => 'HMTGF',
            'bio_himpunan' => 'Blablablablablabla',
        ]);
        DB::table('profile')->insert([
            'user_id' => $faker->randomElement($user4),
            'name_himpunan' => 'Himpunan Mahasiswa Teknik Logistik',
            'nickname_himpunan' => 'HIMALOG',
            'bio_himpunan' => 'Blablablablablabla',
        ]);
        DB::table('profile')->insert([
            'user_id' => $faker->randomElement($user5),
            'name_himpunan' => 'Himpunan Mahasiswa Teknik Geologi',
            'nickname_himpunan' => 'HMTG',
            'bio_himpunan' => 'Blablablablablabla',
        ]);
        DB::table('profile')->insert([
            'user_id' => $faker->randomElement($user6),
            'name_himpunan' => 'Himpunan Mahasiswa Hubungan Internasional',
            'nickname_himpunan' => 'HMHI',
            'bio_himpunan' => 'Blablablablablabla',
        ]);
        DB::table('profile')->insert([
            'user_id' => $faker->randomElement($user7),
            'name_himpunan' => 'Himpunan Mahasiswa Ilmu Kimia',
            'nickname_himpunan' => 'HMK',
            'bio_himpunan' => 'Blablablablablabla',
        ]);
        DB::table('profile')->insert([
            'user_id' => $faker->randomElement($user8),
            'name_himpunan' => 'Himpunan Mahasiswa Teknik Sipil',
            'nickname_himpunan' => 'HMTS',
            'bio_himpunan' => 'Blablablablablabla',
        ]);
        DB::table('profile')->insert([
            'user_id' => $faker->randomElement($user9),
            'name_himpunan' => 'Himpunan Mahasiswa Ilmu Komunikasi',
            'nickname_himpunan' => 'HMTS',
            'bio_himpunan' => 'Blablablablablabla',
        ]);
        DB::table('profile')->insert([
            'user_id' => $faker->randomElement($user10),
            'name_himpunan' => 'Himpunan Mahasiswa Manajemen',
            'nickname_himpunan' => 'MSPU',
            'bio_himpunan' => 'Blablablablablabla',
        ]);
        DB::table('profile')->insert([
            'user_id' => $faker->randomElement($user11),
            'name_himpunan' => 'Himpunan Mahasiswa Ilmu Ekonomi',
            'nickname_himpunan' => 'HENNA',
            'bio_himpunan' => 'Blablablablablabla',
        ]);
        DB::table('profile')->insert([
            'user_id' => $faker->randomElement($user12),
            'name_himpunan' => 'Himpunan Mahasiswa Teknik Kimia',
            'nickname_himpunan' => 'HMTK',
            'bio_himpunan' => 'Blablablablablabla',
        ]);
        DB::table('profile')->insert([
            'user_id' => $faker->randomElement($user13),
            'name_himpunan' => 'Himpunan Mahasiswa Teknik Lingkungan',
            'nickname_himpunan' => 'HMTL',
            'bio_himpunan' => 'Blablablablablabla',
        ]);
        DB::table('profile')->insert([
            'user_id' => $faker->randomElement($user14),
            'name_himpunan' => 'Himpunan Mahasiswa Teknik Perminyakan',
            'nickname_himpunan' => 'HMTM',
            'bio_himpunan' => 'Blablablablablabla',
        ]);
    }
}
