<?php

namespace App\Constants;

class ShipmentStatus
{
    public const PENDING = 'pending';
    public const TRANSIT = 'transit';
    public const DELIVERED = 'delivered';

    /**
     * Return all allowed statuses
     */
    public static function all(): array
    {
        return [
            self::PENDING,
            self::TRANSIT,
            self::DELIVERED,
        ];
    }
}
