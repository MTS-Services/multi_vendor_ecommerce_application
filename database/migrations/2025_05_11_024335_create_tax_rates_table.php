<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\AuditColumnsTrait;
use App\Models\TaxRate;

return new class extends Migration
{
    use SoftDeletes, AuditColumnsTrait;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tax_rates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sort_order')->default(0);
            $table->unsignedBigInteger('tax_class_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id');
            $table->boolean('status')->default(TaxRate::STATUS_ACTIVE)->comment(TaxRate::STATUS_ACTIVE . ': Active, ' . TaxRate::STATUS_DEACTIVE . ': Inactive');

            $table->decimal('rate', 8, 2);
            $table->string('name');
            $table->tinyInteger('priority')->default(0)->comment(TaxRate::PRIORITY_URGENT . ': Urgent, ' . TaxRate::PRIORITY_HIGH . ': High, ' . TaxRate::PRIORITY_NORMAL . ': Normal, ' . TaxRate::PRIORITY_LOW . ': Low');
            $table->boolean('compound');
            $table->timestamps();
            $table->softDeletes();

            $this->addAdminAuditColumns($table);

            $table->foreign('tax_class_id')->references('id')->on('tax_classes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            // Indexes
            $table->index('sort_order');
            $table->index('tax_class_id');
            $table->index('country_id');
            $table->index('state_id');
            $table->index('city_id');
            $table->index('status');
            $table->index('rate');
            $table->index('name');
            $table->index('priority');
            $table->index('compound');
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
        Schema::dropIfExists('tax_rates');
    }
};
