<?php

use App\Models\Product;
use App\Models\ProductReview;
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
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sort_order')->default(0);
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('user_id');
            $table->double('rating')->nullable();
            $table->string('title')->nullable();
            $table->longText('review')->nullable();
            $table->boolean('status')->default(ProductReview::STATUS_ACTIVE)->comment(ProductReview::STATUS_ACTIVE . ': Active, ' . ProductReview::STATUS_DEACTIVE . ': Inactive');
            $table->softDeletes();
            $this->addMorphedAuditColumns($table);
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('casecade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->index('sort_order');
            $table->index('product_id');
            $table->index('user_id');
            $table->index('rating');
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
        Schema::dropIfExists('product_reviews');
    }
};
