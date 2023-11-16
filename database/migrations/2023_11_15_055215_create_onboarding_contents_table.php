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
        Schema::create('onboarding_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('onboarding_id');
            $table->unsignedBigInteger('content_id');

            $table->foreign('onboarding_id')->references('id')->on('onboardings')->onDelete('cascade');
            $table->foreign('content_id')->references('id')->on('contents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('onboarding_contents');
    }
};
