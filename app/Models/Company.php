<?php

namespace App\Models;

use App\Enums\CompanyTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['company_name', 'company_document', 'company_phone', 'company_email', 'company_type', 'employee_id', 'product_id'];

    protected $hidden = [];

    protected function casts()
    {
        return [
            'company_type' => CompanyTypeEnum::class,
            'product_id' => 'array',
            'employee_id' => 'array',
        ];
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
