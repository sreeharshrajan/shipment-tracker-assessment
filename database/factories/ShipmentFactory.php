<?php

namespace Database\Factories;

use App\Models\Shipment;
use App\Constants\ShipmentStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShipmentFactory extends Factory
{
    protected $model = Shipment::class;

    public function definition(): array
    {
        return [
            'tracking_number' => 'ST' . $this->faker->unique()->numerify('########'),
            'sender_name' => $this->faker->name(),
            'sender_address' => $this->faker->address(),
            'receiver_name' => $this->faker->name(),
            'receiver_address' => $this->faker->address(),
            'destination_city' => $this->faker->city(),
            'status' => $this->faker->randomElement(
                ShipmentStatus::all()
            ),
        ];
    }
}
