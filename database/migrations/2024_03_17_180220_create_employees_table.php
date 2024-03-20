<?php

use App\Enums\CompanyProfileEnum;
use App\Models\Company;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('password');

            $table->enum('company_profile', [
                CompanyProfileEnum::COMPANY_ADMIN->value,
                CompanyProfileEnum::COMPANY_EMPLOYEE->value,
            ])->default(CompanyProfileEnum::COMPANY_EMPLOYEE->value);
            $table->foreignIdFor(Company::class, 'company_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
