<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\AuditColumnsTrait;
use App\Models\Staff;

return new class extends Migration
{
    use SoftDeletes, AuditColumnsTrait;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
             $table->bigInteger('sort_order')->default(0);
            $table->unsignedBigInteger('hub_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique()->min(5)->max(20)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(Staff::STATUS_ACTIVE)->comment(Staff::STATUS_ACTIVE . ': Active, ' . Staff::STATUS_DEACTIVE . ': Inactive');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $this->addMorphedAuditColumns($table);
            $table->foreign('hub_id')->references('id')->on('hubs')->onDelete('cascade')->onUpdate('cascade');

         
            // Indexes
            $table->index('first_name');
            $table->index('last_name');
            $table->index('username');
            $table->index('email');
            $table->index('status');
            $table->index('phone');
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
        Schema::dropIfExists('staffs');
    }
};
