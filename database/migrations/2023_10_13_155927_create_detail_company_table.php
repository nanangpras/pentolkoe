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
        Schema::create('detail_company', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tagline');
            $table->longText('description');
            $table->text('image');
            $table->string('link');
            $table->string('address');
            $table->string('link_fb');
            $table->string('link_ig');
            $table->string('link_tiktok');
            $table->string('phone');
            $table->string('email');
            $table->string('logo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_company');
    }
};
