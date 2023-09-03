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
        Schema::create('goal_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('goal_id');
            $table->string('locale')->index();
            $table->string('main_title');
            $table->longText('description');

            $table->unique(['goal_id', 'locale']);
            $table->foreign('goal_id')->references('id')->on('goals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goal_translations');
    }
};