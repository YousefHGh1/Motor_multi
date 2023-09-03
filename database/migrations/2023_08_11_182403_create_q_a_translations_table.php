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
        Schema::create('q_a_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('q_a_id');
            $table->string('locale')->index();
            $table->string('question');
            $table->longText('answer');

            $table->unique(['q_a_id', 'locale']);
            $table->foreign('q_a_id')->references('id')->on('q_a_s')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('q_a_translations');
    }
};