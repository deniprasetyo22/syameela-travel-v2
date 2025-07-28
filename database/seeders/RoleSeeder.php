<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Nonaktifkan pengecekan foreign key
        Schema::disableForeignKeyConstraints();

        // Kosongkan tabel roles
        DB::table('roles')->truncate();

        // Aktifkan kembali pengecekan foreign key
        Schema::enableForeignKeyConstraints();

        Role::create([
            'name' => 'Admin',
            'description' => 'Admin can manage everything'
        ]);

        Role::create([
            'name' => 'User',
            'description' => 'User can only manage their own data'
        ]);
    }
}