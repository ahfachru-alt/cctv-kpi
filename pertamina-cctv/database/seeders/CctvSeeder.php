<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\Cctv;
use App\Models\Room;
use Illuminate\Database\Seeder;

class CctvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure each building has a default room and 700 CCTV distributed
        $buildings = Building::all();
        if ($buildings->isEmpty()) {
            $this->call(BuildingSeeder::class);
            $buildings = Building::all();
        }

        $totalCctv = 700;
        $ipPrefix = '10.56.236.';
        for ($i = 1; $i <= $totalCctv; $i++) {
            $building = $buildings[$i % $buildings->count()];
            $room = Room::firstOrCreate([
                'building_id' => $building->id,
                'name' => 'Room '.(($i % 20) + 1),
                'floor' => (($i % 5) + 1),
            ]);

            $octet = str_pad((string) $i, 3, '0', STR_PAD_LEFT);
            $ip = $ipPrefix.($i);
            $rtsp = "rtsp://admin:password.123@{$ip}/streaming/channels/";

            Cctv::updateOrCreate(
                ['name' => 'CCTV '.$i],
                [
                    'building_id' => $building->id,
                    'room_id' => $room->id,
                    'rtsp_url' => $rtsp,
                    'status' => ['online', 'offline', 'maintenance'][$i % 3],
                    'ip_address' => $ip,
                ]
            );
        }
    }
}
