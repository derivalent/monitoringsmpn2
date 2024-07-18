<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'adminsmpn2sempu@gmail.com',
            'password' => Hash::make('smpn2sempu123'),
            'telepon' => '088888888888',
            'nip' => '88888888',
            'jabatan' => 'Creator',
            'jenis_kelamin' => 'pria',
            'tempat_lahir' => 'Banyuwangi',
            'tanggal_lahir' => null, // Set to null if not available
            'pendidikan_terakhir' => 'D4 TRPL',
            'bidang_studi' => 'TI',
            'status_pekerjaan' => 'pns', // Updated to match the new enum values
            'role' => 'super admin',
            'alamat' => 'Banyuwangi',
        ]);
    }
}
