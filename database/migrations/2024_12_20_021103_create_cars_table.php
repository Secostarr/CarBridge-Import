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
        Schema::create('cars', function (Blueprint $table) {
            $table->integer('id_cars')->primary()->autoIncrement();
            $table->enum('merek', ['BMW', 'Mercedes', 'Porsche', 'Subaru', 'Toyota', 'Nissan']);
            $table->string('car_type', 50)->nullable();
            $table->string('type_of_car', 150)->nullable();
            $table->string('photo', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('engine', 150)->nullable();
            $table->string('transmission', 150)->nullable();
            $table->string('capacity', 150)->nullable();
            $table->string('feature', 150)->nullable();
            $table->string('price', 255)->nullable();
            $table->enum('status', ['for_sale', 'sold']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
