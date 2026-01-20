<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class StatusLog extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $table = 'status_logs';

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'shipment_id',
        'status',
        'location',
    ];

    protected $casts = [
        'id' => 'string',
        'shipment_id' => 'string',
    ];

    /**
     * Status log belongs to a shipment
     */
    public function shipment()
    {
        return $this->belongsTo(Shipment::class, 'shipment_id');
    }
}
