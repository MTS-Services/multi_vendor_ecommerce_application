<?php

use App\Models\ProductAttribute;
use App\Http\Traits\AuditColumnsTrait;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    use SoftDeletes, AuditColumnsTrait;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('our_connections', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->bigInteger("sort_order")->default(0);
            $table->boolean('status')->default(ProductAttribute::STATUS_ACTIVE)->comment(ProductAttribute::STATUS_ACTIVE . ': Active, ' . ProductAttribute::STATUS_DEACTIVE . ': Inactive');
            $table->string('image');
            $table->string('website')->nullable();
            $table->longText("description")->nullable();
            $table->timestamps();
            $table->softDeletes();
            $this->addMorphedAuditColumns($table);

            // Indexes
            $table->index('name');
            $table->index('sort_order');
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
        Schema::dropIfExists('our_connections');
    }
};
