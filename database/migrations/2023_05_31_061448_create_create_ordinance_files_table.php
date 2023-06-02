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
        Schema::create('ordinance_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ordinance_id');
            $table->string('file_path')->nullable();
            $table->integer('version');
            $table->string('last_action')->nullable();
            $table->date('last_action_date')->nullable();
            $table->timestamps();

            $table->foreign('ordinance_id')->references('id')->on('ordinances')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('create_ordinance_files');
    }
};
