<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
    Schema::table('users', function (Blueprint $table) {
        $table->string('otp_code')->nullable();
        $table->boolean('is_otp_verified')->default(false);
        $table->timestamp('otp_created_at')->nullable(); //
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['otp_code', 'is_otp_verified', 'otp_created_at']);
    });
    }
};