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
        Schema::create('ordinances', function (Blueprint $table) {
            $table->id();
            $table->string('ordinance_number');
            $table->enum('tracking_level',['priority','of_interest','graveyard','passed']);
            $table->string('title');
            $table->string('author');
            $table->date('date');

            $table->text('keywords')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordinances');
    }
};
