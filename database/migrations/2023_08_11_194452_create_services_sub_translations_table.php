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
        Schema::create('services_sub_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('services_sub_id');
            $table->string('locale')->index();
            $table->string('logo_title');
            $table->string('short_title_logo');
            $table->longText('long_title_logo');

            $table->unique(['services_sub_id', 'locale']);
            $table->foreign('services_sub_id')->references('id')->on('services_subs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services_sub_translations');
    }
};