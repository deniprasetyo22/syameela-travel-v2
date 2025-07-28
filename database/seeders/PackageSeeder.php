<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['Haji', 'Umroh'];
        $categories = ['VIP', 'Regular'];
        $facilities = [
            'Hotel bintang 5, Transportasi AC, Konsumsi 3x sehari',
            'Hotel bintang 4, Bus Ekonomi, Makan 2x sehari',
            'Hotel dekat Masjidil Haram, Transportasi VIP, Muthawif Berpengalaman',
            'Hotel bintang 3, Bus AC, Makan dan Minum',
        ];

        for ($i = 0; $i < 10; $i++) {
            $type = fake()->randomElement($types);
            $category = fake()->randomElement($categories);
            $packageName = $type . ' ' . $category;

            DB::table('packages')->insert([
                'name' => $packageName,
                'description' => fake()->paragraph(4),
                'picture' => 'images/packages/' . Str::random(10) . '.jpg',
                'type' => $type,
                'price' => fake()->numberBetween(25000000, 70000000),
                'quota' => fake()->numberBetween(20, 100),
                'facilities' => fake()->randomElement($facilities),
                'departure_date' => fake()->dateTimeBetween('+1 month', '+6 months'),
                'return_date' => fake()->dateTimeBetween('+7 months', '+9 months'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}