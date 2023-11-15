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
        Schema::create('onboarding_participant_contents', function (Blueprint $table) {
            $table->unsignedBigInteger('onboarding_participant_id');
            $table->unsignedBigInteger('onboarding_content_id');

            $table->foreign('onboarding_participant_id')->references('id')->on('onboarding_participant')->onDelete('cascade');
            $table->foreign('onboarding_content_id')->references('id')->on('onboarding_content')->onDelete('cascade');
            $table->enum('status', ['done', 'not_done']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('onboarding_participant_contents');
    }
};
