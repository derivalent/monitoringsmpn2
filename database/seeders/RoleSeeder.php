<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengisi data ke dalam tabel role
        $roles = [
            ['role' => 'super admin'],
            ['role' => 'admin'],
            ['role' => 'user'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
