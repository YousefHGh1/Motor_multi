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
        Schema::create('services_main_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('services_main_id')->unsigned();
            $table->string('locale')->index();
            $table->string('main_title');
            $table->longText('description');

            $table->unique(['services_main_id', 'locale']);
            $table->foreign('services_main_id')->references('id')->on('services_mains')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services_main_translations');
    }
};