<?php

namespace Database\Factories;

use App\Models\StatusLog;
use App\Models\Shipment;
use App\Constants\ShipmentStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatusLogFactory extends Factory
{
    protected $model = StatusLog::class;

    public function definition(): array
    {
        return [
            'shipment_id' => Shipment::factory(),
            'status'      => $this->faker->randomElement([
                 ShipmentStatus::all()
            ]),
            'location'    => $this->faker->city(),
        ];
    }
}
