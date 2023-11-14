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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('npk');
            $table->string('name');
            $table->string('unit_kerja')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password');
            // $table->string('profile_image')->nullable();
            // $table->string('nickname')->nullable();
            // $table->longText('about_user')->nullable();
            // $table->string('wa')->nullable();
            // $table->string('birth_date')->nullable();
            // $table->string('hobby')->nullable();
            // $table->string('food')->nullable();
            // $table->string('drink')->nullable();
            // $table->string('film')->nullable();
            // $table->string('interest')->nullable();
            // $table->longText('job_desc')->nullable();
            // $table->string('personality')->nullable();
            // $table->string('strength')->nullable();
            // $table->string('weakness')->nullable();
            // $table->string('comm_pref')->nullable();
            // $table->string('created_by')->nullable();
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
