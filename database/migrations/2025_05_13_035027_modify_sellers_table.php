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
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('operation_area_id')->nullable();
            $table->unsignedBigInteger('operation_sub_area_id')->nullable();
            $table->unsignedBigInteger('hub_id');

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('operation_area_id')->references('id')->on('operation_areas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('operation_sub_area_id')->references('id')->on('operation_sub_areas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('hub_id')->references('id')->on('hubs')->onDelete('cascade')->onUpdate('cascade');

            $table->index('country_id');
            $table->index('state_id');
            $table->index('city_id');
            $table->index('operation_area_id');
            $table->index('operation_sub_area_id');
            $table->index('hub_id');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    Schema::table('sellers', function (Blueprint $table) {
        $table->dropForeign(['country_id']);
        $table->dropForeign(['state_id']);
        $table->dropForeign(['city_id']);
        $table->dropForeign(['operation_area_id']);
        $table->dropForeign(['operation_sub_area_id']);
        $table->dropForeign(['hub_id']);

        $table->dropIndex(['country_id']);
        $table->dropIndex(['state_id']);
        $table->dropIndex(['city_id']);
        $table->dropIndex(['operation_area_id']);
        $table->dropIndex(['operation_sub_area_id']);
        $table->dropIndex(['hub_id']);

        $table->dropColumn('country_id');
        $table->dropColumn('state_id');
        $table->dropColumn('city_id');
        $table->dropColumn('operation_area_id');
        $table->dropColumn('operation_sub_area_id');
        $table->dropColumn('hub_id');

        });
    }
};
