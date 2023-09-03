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
        Schema::create('commitment_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('commitment_id');
            $table->string('locale')->index();
            $table->string('main_title');
            $table->longText('description');

            $table->unique(['commitment_id', 'locale']);
            $table->foreign('commitment_id')->references('id')->on('commitments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commitment_translations');
    }
};