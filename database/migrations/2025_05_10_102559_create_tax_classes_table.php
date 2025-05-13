<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\AuditColumnsTrait;
use App\Models\TaxClass;

return new class extends Migration
{
    use SoftDeletes, AuditColumnsTrait;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tax_classes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sort_order')->default(0);
            $table->string('name')->unique();
            $table->boolean('status')->default(TaxClass::STATUS_ACTIVE)->comment(TaxClass::STATUS_ACTIVE . ': Active, ' . TaxClass::STATUS_DEACTIVE . ': Inactive');
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $this->addAdminAuditColumns($table);

            // Indexes
            $table->index('sort_order');
            $table->index('name');
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
        Schema::dropIfExists('tax_classes');
    }
};
