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
        Schema::create('contact', function (Blueprint $table) {
            $table->integer('id_contact')->primary()->autoIncrement();
            $table->string('lokasi', 255)->nullable();
            $table->string('email', 120)->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->string('url_github', 255)->nullable();
            $table->string('url_instagram', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
