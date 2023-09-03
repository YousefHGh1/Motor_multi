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
        Schema::create('management_sub_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('management_sub_id');
            $table->string('locale')->index();
            $table->string('logo_title');
            $table->string('short_title_logo');
            $table->longText('long_title_logo');

            $table->unique(['management_sub_id', 'locale']);
            $table->foreign('management_sub_id')->references('id')->on('management_subs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('management_sub_translations');
    }
};