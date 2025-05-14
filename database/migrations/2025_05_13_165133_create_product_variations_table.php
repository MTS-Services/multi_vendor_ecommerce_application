<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\AuditColumnsTrait;
use App\Models\ProductVariation;

return new class extends Migration
{
    use SoftDeletes, AuditColumnsTrait;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_variations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sort_order')->default(0);
            $table->unsignedBigInteger('product_id');
            $table->string('sku');
            $table->decimal('price', 8, 2);
            $table->decimal('sale_price', 8, 2);
            $table->decimal('cost_price', 8, 2)->nullable();
            $table->decimal('special_price', 8, 2)->nullable();
            $table->integer('quantity')->default(0);
            $table->tinyInteger('status')->default(ProductVariation::STATUS_ACTIVE)->comment(ProductVariation::STATUS_ACTIVE . ': Active, ' . ProductVariation::STATUS_DEACTIVE . ': Deactive');
            $table->timestamps();
            $table->softDeletes();
            $this->addMorphedAuditColumns($table);

            $table->unique(['product_id', 'sku']);

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');

            $table->index('sort_order');
            $table->index('product_id');
            $table->index('sku');
            $table->index('status');
            $table->index('price');
            $table->index('sale_price');
            $table->index('cost_price');
            $table->index('special_price');
            $table->index('quantity');
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
        Schema::dropIfExists('product_variations');
    }
};
