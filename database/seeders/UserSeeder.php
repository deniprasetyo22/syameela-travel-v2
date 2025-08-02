<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cari Role 'Admin' dan 'User'
        $adminRole = Role::where('name', 'Admin')->first();
        $userRole = Role::where('name', 'User')->first();

        // Buat User Admin
        if ($adminRole) {
            // 2. Simpan user yang baru dibuat ke dalam variabel
            $adminUser = User::create([
                'full_name' => 'Administrator',
                'username' => 'admin',
                'email' => 'admin@yopmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('admin12345'),
                'role_id' => $adminRole->id,
            ]);

            // 3. Buat UserProfile yang terhubung dengan user admin
            UserProfile::create([
                'user_id' => $adminUser->id,
                'gender' => 'Laki-laki',
                'phone' => '081' . rand(1000000000, 9999999999),
                'address' => 'Jl. ' . fake()->streetName() . ' No. ' . rand(1, 100),
            ]);

        } else {
            $this->command->info('Role "Admin" not found. Skipping AdminUserSeeder.');
        }

        // Buat User biasa
        if ($userRole) {
            // 2. Simpan user yang baru dibuat ke dalam variabel
            $user = User::create([
                'full_name' => 'User',
                'username' => 'user',
                'email' => 'user@yopmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('user12345'),
                'role_id' => $userRole->id,
            ]);

            // 3. Buat UserProfile yang terhubung dengan user biasa
            UserProfile::create([
                'user_id' => $user->id,
                'gender' => 'Laki-laki',
                'phone' => '081' . rand(1000000000, 9999999999),
                'address' => 'Jl. ' . fake()->streetName() . ' No. ' . rand(1, 100),
            ]);

            // 4. Buat 50 User dengan faker
            User::factory(50)
                ->create(['role_id' => $userRole->id,])
                ->each(function ($user) {
                    UserProfile::create([
                        'user_id' => $user->id,
                        'gender' => rand(0, 1) ? 'Laki-laki' : 'Perempuan',
                        'phone' => '081' . rand(1000000000, 9999999999),
                        'address' => 'Jl. ' . fake()->streetName() . ' No. ' . rand(1, 100),
                    ]);
                });

        } else {
            $this->command->info('Role "User" not found. Skipping UserSeeder.');
        }
    }
}