<?php

namespace Database\Seeders;

use App\Models\Building;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buildings = [
            'Gedung Kolaboratif',
            'Gerbang Utama',
            'AWI',
            'Shelter Maintenance Area 1',
            'Shelter Maintenance Area 2',
            'Shelter Maintenance Area 3',
            'Shelter Maintenance Area 4',
            'Shelter White OM',
            'Pintu Masuk Area Kilang Pertamina',
            'Marine Region III Pertamina Balongan',
            'Main Control Room',
            'Tank Farm Area 1',
            'Gedung EXOR',
            'Area Produksi Crude Distillation Unit (CDU)',
            'HSSE Demo Room',
            'Gedung Amanah',
            'POC',
            'JGC',
        ];

        // Approximate center of Kilang Pertamina Balongan
        $baseLat = -6.3675; // sample
        $baseLng = 108.4115; // sample

        foreach ($buildings as $index => $name) {
            Building::updateOrCreate(
                ['name' => $name],
                [
                    'latitude' => $baseLat + ($index * 0.001),
                    'longitude' => $baseLng + ($index * 0.001),
                    'address' => 'Kilang Pertamina International RU VI Balongan',
                ]
            );
        }
    }
}
