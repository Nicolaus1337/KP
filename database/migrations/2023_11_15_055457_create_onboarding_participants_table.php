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
        Schema::create('onboarding_participants', function (Blueprint $table) {
            
            $table->unsignedBigInteger('onboarding_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('onboarding_id')->references('id')->on('onboardings')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status', ['not_started', 'in_process', 'done']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('onboarding_participants');
    }
};
