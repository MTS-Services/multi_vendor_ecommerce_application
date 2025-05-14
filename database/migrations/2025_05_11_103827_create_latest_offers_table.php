<?php

use App\Models\LatestOffer;
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
        Schema::create('latest_offers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sort_order')->default(0);
            $table->string('title');
            $table->string('image');
            $table->string('url');
            $table->string('description');
            $table->boolean('status')->default(LatestOffer::STATUS_ACTIVE)->comment(LatestOffer::STATUS_ACTIVE . ': Active, ' . LatestOffer::STATUS_DEACTIVE . ': Inactive');
            $table->timestamps();
            $table->softDeletes();
            $this->addAdminAuditColumns($table);



            $table->index('sort_order');
            $table->index('title');
            $table->index('url');
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
        Schema::dropIfExists('latest_offers');
    }
};
