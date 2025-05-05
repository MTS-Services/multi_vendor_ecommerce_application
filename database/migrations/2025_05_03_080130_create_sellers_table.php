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
            $table->string('name');
            $table->string('username')->unique()->min(5)->max(20)->nullable();
            $table->string('email')->unique();
            $table->string('image')->nullable();
            $table->boolean('status')->default(Seller::STATUS_ACTIVE)->comment(Seller::STATUS_ACTIVE . ': Active, ' . Seller::STATUS_DEACTIVE . ': Inactive');
            $table->boolean('is_verify')->default(Seller::UNVERIFIED)->comment(Seller::UNVERIFIED . ': Unverified, ' . Seller::VERIFIED . ': Verified');
            $table->tinyInteger('gender')->nullable()->comment(Seller::GENDER_MALE . ': Male, ' . Seller::GENDER_FEMALE . ': Female, ' . Seller::GENDER_OTHERS . ': Other');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $this->addMorphedAuditColumns($table);

            // Add the otp_send_at column (if it doesn't exist already)
            $table->timestamp('otp_send_at')->nullable(); // Add this line
            // Infromation
            $table->string('emergency_phone')->nullable();
            $table->string('phone')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();

            // Indexes
            $table->index('sort_order');
            $table->index('email'); // Index for email (unique constraint already exists)
            $table->index('status'); // Index for status (frequently filtered)
            $table->index('is_verify'); // Index for email verification status
            $table->index('gender'); // Index for gender (optional, if queried often)
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
        Schema::dropIfExists('sellers');

    }
};
