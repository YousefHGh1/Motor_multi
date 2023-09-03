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

        Schema::create('contact_us_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('contact_us_id');
            $table->string('locale')->index();
            $table->string('main_title');
            $table->string('description');
            $table->string('address1');
            $table->string('address2');

            $table->unique(['contact_us_id', 'locale']);
            $table->foreign('contact_us_id')->references('id')->on('contact_us')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_us_translations');
    }
};