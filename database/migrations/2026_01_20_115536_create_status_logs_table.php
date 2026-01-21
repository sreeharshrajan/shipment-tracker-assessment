<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Constants\ShipmentStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('status_logs', function (Blueprint $table) {
            $table->uuid('id')->primary(); 
            $table->foreignUuid('shipment_id')->constrained()->cascadeOnDelete();
            $table->enum('status', ShipmentStatus::all());
            $table->string('location');
            $table->timestamps();
            $table->softDeletes();

            $table->index('shipment_id');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_logs');
    }
};
