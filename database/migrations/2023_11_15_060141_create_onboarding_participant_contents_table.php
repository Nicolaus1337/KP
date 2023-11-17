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
            $table->id();
            $table->unsignedBigInteger('ob_participant_id');
            $table->unsignedBigInteger('ob_content_id');

            $table->foreign('ob_participant_id')->references('id')->on('onboarding_participants')->onDelete('cascade');
            $table->foreign('ob_content_id')->references('id')->on('onboarding_contents')->onDelete('cascade');
            $table->enum('status', ['done', 'not done']);
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
