<?php

use App\Models\Brand;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\AuditColumnsTrait;

return new class extends Migration
{
    use SoftDeletes, AuditColumnsTrait;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sort_order')->default(0);
            $table->string("name")->unique();
            $table->string("slug")->unique();
            $table->string("logo")->nullable();
            $table->string("website")->nullable();
            $table->boolean('status')->default(Brand::STATUS_ACTIVE)->comment(Brand::STATUS_ACTIVE . ': Active, ' . Brand::STATUS_DEACTIVE . ': Inactive');
            $table->boolean('is_featured')->default(Brand::NOT_FEATURED)->comment(Brand::NOT_FEATURED . ': No, ' . Brand::FEATURED . ': Yes');
            $table->string("meta_title")->nullable();
            $table->longText("meta_description")->nullable();
            $table->longText("description")->nullable();
            $table->timestamps();
            $table->softDeletes();
            $this->addMorphedAuditColumns($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
