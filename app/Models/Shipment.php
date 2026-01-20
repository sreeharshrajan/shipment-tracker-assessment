<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Shipment extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $table = 'shipments';

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'tracking_number',
        'sender_name',
        'sender_address',
        'receiver_name',
        'receiver_address',
        'destination_city',
        'status',
    ];

    protected $casts = [
        'id' => 'string',
    ];

    /**
     * Shipment has many status logs
     */
    public function statusLogs()
    {
        return $this->hasMany(StatusLog::class, 'shipment_id');
    }
}
