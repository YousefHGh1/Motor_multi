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
        Schema::create('footer_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('footer_id');
            $table->string('locale')->index();
            $table->longText('description');
            $table->string('link_down');
            $table->string('link_contact');
            $table->string('address');
            $table->string('allsave');

            $table->unique(['footer_id', 'locale']);
            $table->foreign('footer_id')->references('id')->on('footers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_translations');
    }
};