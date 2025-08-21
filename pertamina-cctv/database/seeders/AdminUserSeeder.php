<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Create default admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@pertamina.local'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('Admin#12345'),
                'email_verified_at' => now(),
            ]
        );
        $admin->assignRole($adminRole);
    }
}
