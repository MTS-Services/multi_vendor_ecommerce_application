<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\AuditColumnsTrait;
use App\Models\ProductAttributeValue;

return new class extends Migration
{
    use SoftDeletes, AuditColumnsTrait;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_attribute_values', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sort_order')->default(0);
            $table->unsignedBigInteger('product_attribute_id');
            $table->string('value');
            $table->boolean('status')->default(ProductAttributeValue::STATUS_ACTIVE)->comment(ProductAttributeValue::STATUS_ACTIVE . ': Active, ' . ProductAttributeValue::STATUS_DEACTIVE . ': Inactive');
            $table->timestamps();
            $table->softDeletes();
            $this->addMorphedAuditColumns($table);

            $table->unique(['product_attribute_id','value'],name: 'product_attribute_value_unique');

            // Indexes
            $table->index('sort_order');
            $table->index('value');
            $table->index('status');
            $table->index('created_at');
            $table->index('updated_at');
            $table->index('deleted_at');

            $table->foreign('product_attribute_id')->references('id')->on('product_attributes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_attribute_values');
    }
};
