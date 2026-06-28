<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('smart_irrigations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->float('soil_moisture');
            $table->float('ambient_temperature');
            $table->float('atmospheric_humidity');
            $table->integer('cluster_zone')->default(0);
            $table->integer('dc_pump_status')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('smart_irrigations');
    }
};