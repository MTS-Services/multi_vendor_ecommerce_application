<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\AuditColumnsTrait;
use App\Models\PersonalInformation;

return new class extends Migration
{
    use SoftDeletes, AuditColumnsTrait;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personal_information', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sort_order')->default(0);
            $table->unsignedBigInteger('profile_id');
            $table->string('profile_type');
            $table->date('dob')->nullable();
            $table->tinyInteger('gender')->nullable()->comment(PersonalInformation::GENDER_MALE . ': Male, ' . PersonalInformation::GENDER_FEMALE . ': Female' . PersonalInformation::GENDER_OTHERS . ': Others');
            $table->string('emergency_phone')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('nationality')->nullable();
            $table->longText('bio')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $this->addMorphedAuditColumns($table);

           // Indexes
            $table->index('sort_order');
            $table->index('profile_id');
            $table->index('profile_type');
            $table->index('dob');
            $table->index('gender');

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
        Schema::dropIfExists('personal_information');
    }
};
