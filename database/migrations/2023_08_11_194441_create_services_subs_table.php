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
        Schema::create('services_subs', function (Blueprint $table) {
            $table->id();
            $table->text('logo');
            $table->text('image1');
            $table->unsignedBigInteger('management_sub_id');

            $table->foreign('management_sub_id')->references('id')->on('management_subs')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services_subs');
    }
};