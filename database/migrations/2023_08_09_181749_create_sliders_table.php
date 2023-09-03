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
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('whatsapp_link');
            $table->string('tiktok_link');
            $table->string('snapcaht_link');
            $table->string('instagram_link');
            $table->string('youtube_link');
            $table->text('background');
            $table->text('logo');
            $table->string('maintenance_link');
            $table->string('materials_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};