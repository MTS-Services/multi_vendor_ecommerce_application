<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\AuditColumnsTrait;
use App\Models\Product;

return new class extends Migration
{
    use SoftDeletes, AuditColumnsTrait;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sort_order')->default(0);
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('tax_class_id');
            $table->string("name");
            $table->string("slug")->unique();
            $table->string("sku")->unique();
            $table->tinyInteger('status')->default(Product::STATUS_ACTIVE)->comment(Product::STATUS_ACTIVE . ': Active, ' . Product::STATUS_DEACTIVE . ': Inactive');
            $table->tinyInteger('is_featured')->default(Product::NOT_FEATURED)->comment(Product::NOT_FEATURED . ': Not Featured, ' . Product::FEATURED . ': Featured');
            $table->tinyInteger('is_published')->default(Product::NOT_PUBLISHED)->comment(Product::NOT_PUBLISHED . ': Not Published, ' . Product::PUBLISHED . ': Published,');
            $table->longText("description")->nullable();
            $table->string("short_description")->nullable();
            $table->longText("meta_title")->nullable();
            $table->longText("meta_description")->nullable();
            $table->longText("meta_keywords")->nullable();
            $table->timestamps();
            $table->softDeletes();
            $this->addMorphedAuditColumns($table);

            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tax_class_id')->references('id')->on('tax_classes')->onDelete('cascade')->onUpdate('cascade');

            $table->index('sort_order');
            $table->index('seller_id');
            $table->index('brand_id');
            $table->index('category_id');
            $table->index('tax_class_id');
            $table->index('name');
            $table->index('slug');
            $table->index('sku');
            $table->index('status');
            $table->index('is_featured');
            $table->index('is_published');

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
        Schema::dropIfExists('products');
    }
};
