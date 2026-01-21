<?php

namespace Database\Seeders;

use App\Constants\ShipmentStatus;
use App\Models\Shipment;
use App\Models\StatusLog;
use Illuminate\Database\Seeder;

class ShipmentSeeder extends Seeder
{
    public function run(): void
    {
        Shipment::factory()
            ->count(50)
            ->create()
            ->each(function (Shipment $shipment) {

                $statuses = ShipmentStatus::all();

                foreach ($statuses as $index => $status) {
                    StatusLog::factory()->create([
                        'shipment_id' => $shipment->id,
                        'status' => $status,
                        'location' => fake()->city(),
                        'created_at' => now()->subDays(count($statuses) - $index),
                    ]);
                }

                $shipment->update([
                    'status' => end($statuses),
                ]);
            });

        $this->command->info('Shipment seed completed');
    }
}
