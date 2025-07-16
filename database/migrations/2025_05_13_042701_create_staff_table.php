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
             $table->bigInteger("sort_order")->default(0);
            $table->unsignedBigInteger('hub_id');
            $table->string('first_name')->nullable();
            $table->string('last_name');
            $table->string('username')->unique()->min(5)->max(20)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(Staff::STATUS_ACTIVE)->comment(Staff::STATUS_ACTIVE . ': Active, ' . Staff::STATUS_DEACTIVE . ': Inactive');
            $table->tinyInteger('is_verify')->default(Staff::UNVERIFIED)->comment(Staff::UNVERIFIED . ': Unverified, ' . Staff::VERIFIED . ': Verified');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $this->addMorphedAuditColumns($table);

            $table->foreign('hub_id')->references('id')->on('hubs')->onDelete('cascade')->onUpdate('cascade');

            // Add the otp_send_at column (if it doesn't exist already)
            $table->timestamp('otp_send_at')->nullable(); // Add this line

            // Indexes
            $table->index('hub_id'); // Index for first name (optional, if queried often)
            $table->index('first_name'); // Index for first name (optional, if queried often)
            $table->index('last_name'); // Index for last name (optional, if queried often)
            $table->index('username'); // Index for username (unique constraint already exists)
            $table->index('email'); // Index for email (unique constraint already exists)
            $table->index('status'); // Index for status (frequently filtered)
            $table->index('is_verify'); // Index for email verification status
            $table->index('otp_send_at'); // Index for OTP sent timestamp
            $table->index('phone'); // Index for phone (optional, if queried often)
            $table->index('created_at'); // Index for soft deletes
            $table->index('updated_at'); // Index for soft deletes
            $table->index('deleted_at'); // Index for soft deletes
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
