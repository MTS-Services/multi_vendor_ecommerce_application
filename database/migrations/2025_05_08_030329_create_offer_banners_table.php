<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\AuditColumnsTrait;
use App\Models\OfferBanner;

return new class extends Migration
{
    use SoftDeletes, AuditColumnsTrait;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('offer_banners', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sort_order')->default(0);
            $table->string('title');
            $table->string('subtitle');
            $table->string('image');
            $table->string('url');
           $table->boolean('status')->default(OfferBanner::STATUS_ACTIVE)->comment(OfferBanner::STATUS_ACTIVE . ': Active, ' . OfferBanner::STATUS_DEACTIVE . ': Inactive');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
            $table->softDeletes();
            $this->addAdminAuditColumns($table);


             // Indexes
             $table->index('sort_order');
             $table->index('title');
             $table->index('status');
             $table->index('start_date');
             $table->index('end_date');
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
        Schema::dropIfExists('offer_banners');
    }
};
