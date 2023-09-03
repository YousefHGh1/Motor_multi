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
        Schema::create('management_subs', function (Blueprint $table) {
            $table->id();
            $table->text('logo');
            $table->text('image1');
            $table->string('email');
            $table->string('phone');
            $table->string('link1');
            $table->string('link2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('management_subs');
    }
};