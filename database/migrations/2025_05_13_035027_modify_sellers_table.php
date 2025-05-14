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
        Schema::table('sellers', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('operation_area_id')->nullable();
            $table->unsignedBigInteger('operation_sub_area_id')->nullable();
            $table->unsignedBigInteger('hub_id')->nullable();

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('operation_area_id')->references('id')->on('operation_areas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('operation_sub_area_id')->references('id')->on('operation_sub_areas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('hub_id')->references('id')->on('hubs')->onDelete('cascade')->onUpdate('cascade');

    // Shortened index name
    $table->index(
        ['country_id', 'state_id', 'city_id', 'operation_area_id', 'operation_sub_area_id', 'hub_id'],
        'sellers_location_idx'
    );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sellers', function (Blueprint $table) {
             $table->dropIndex('sellers_location_idx'); // Drop by name

    $table->dropColumn([
        'country_id',
        'state_id',
        'city_id',
        'operation_area_id',
        'operation_sub_area_id',
        'hub_id',
    ]);
        });
    }
};
