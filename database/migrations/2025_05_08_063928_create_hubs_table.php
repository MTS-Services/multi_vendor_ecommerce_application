<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\AuditColumnsTrait;
use App\Models\Hub;

return new class extends Migration
{
    use SoftDeletes, AuditColumnsTrait;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hubs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sort_order')->default(0);
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('operation_area_id')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->longText('address')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('status')->default(Hub::STATUS_ACTIVE)->comment(Hub::STATUS_DEACTIVE . ': Deactive, ' . Hub::STATUS_ACTIVE . ': Active');
            $table->integer('latitude')->nullable();
            $table->integer('longitude')->nullable();
            $table->string('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $this->addAdminAuditColumns($table);

            // Foreign keys
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('operation_area_id')->references('id')->on('operation_areas')->onDelete('cascade')->onUpdate('cascade');

            // Indexes
            $table->index('sort_order');
            $table->index('country_id');
            $table->index('state_id');
            $table->index('city_id');
            $table->index('operation_area_id');
            $table->index('status');
            $table->index('created_at');
            $table->index('updated_at');
            $table->index('deleted_at');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hubs');
    }
};
