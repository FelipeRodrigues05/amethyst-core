<?php

use App\Enums\CompanyTypeEnum;
use App\Models\Employee;
use App\Models\Product;
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
        Schema::create('companies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('company_name');
            $table->string('company_document')->unique();
            $table->string('company_phone');
            $table->string('company_email')->unique();
            $table->enum('company_type', [
                CompanyTypeEnum::PF->value,
                CompanyTypeEnum::PJ->value,
            ]);
            $table->foreignIdFor(Employee::class, 'employee_id')->nullable();
            $table->foreignIdFor(Product::class, 'product_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
