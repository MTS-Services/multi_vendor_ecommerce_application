<?php

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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sort_order')->default(0);
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('variation_id')->nullable();
            $table->integer('quantity');
            $table->decimal('price', 8, 2);
            $table->softDeletes();
            $table->timestamps();
            $this->addMorphedAuditColumns($table);

            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('variation_id')->references('id')->on('product_variations')->onDelete('cascade')->onUpdate('cascade');



            $table->index('sort_order');
            $table->index('cart_id');
            $table->index('product_id');
            $table->index('variation_id');
            $table->index('quantity');
            $table->index('price');
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
        Schema::dropIfExists('cart_items');
    }
};
