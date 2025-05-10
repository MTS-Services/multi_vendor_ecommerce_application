<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\AuditColumnsTrait;
use App\Models\Seller;

return new class extends Migration
{
    use SoftDeletes, AuditColumnsTrait;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sort_order')->default(0);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique()->min(5)->max(20)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('image')->nullable();

            $table->string('shop_name')->nullable();
            $table->string('shop_slug')->unique()->nullable();
            $table->string('shop_logo')->nullable();
            $table->string('shop_banner')->nullable();
            $table->string('shop_description')->nullable();
            $table->string('business_phone')->nullable();

            $table->boolean('status')->default(Seller::STATUS_ACTIVE)->comment(Seller::STATUS_ACTIVE . ': Active, ' . Seller::STATUS_DEACTIVE . ': Inactive');
            $table->boolean('is_verify')->default(Seller::UNVERIFIED)->comment(Seller::UNVERIFIED . ': Unverified, ' . Seller::VERIFIED . ': Verified');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $this->addMorphedAuditColumns($table);

            // Add the otp_send_at column (if it doesn't exist already)
            $table->timestamp('otp_send_at')->nullable(); // Add this line

            // Indexes
            $table->index('first_name'); // Index for first name (optional, if queried often)
            $table->index('last_name'); // Index for last name (optional, if queried often)
            $table->index('username'); // Index for username (unique constraint already exists)
            $table->index('sort_order');
            $table->index('email');
            $table->index('phone'); // Index for phone (optional, if queried often)
            $table->index('status');
            $table->index('is_verify');
            $table->index('created_at');
            $table->index('updated_at');
            $table->index('deleted_at');
            $table->index('otp_send_at');

            $table->index('shop_name');
            $table->index('shop_slug');
            $table->index('shop_description');
            $table->index('business_phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');

    }
};
