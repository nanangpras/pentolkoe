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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('province_id')->after('password')->default(NULL);
            $table->integer('city_id')->after('province_id')->default(NULL);
            $table->integer('subdistrict_id')->after('city_id')->default(NULL);
            $table->integer('postcode')->after('subdistrict_id')->default(NULL);
            $table->string('address')->after('postcode')->default(NULL);
            $table->string('phone')->after('address')->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('province_id');
            $table->dropColumn('city_id');
            $table->dropColumn('postcode');
            $table->dropColumn('address');
            $table->dropColumn('phone');
            $table->dropColumn('subdistrict_id');
        });
    }
};
