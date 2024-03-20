<?php

namespace App\Models;

use App\Enums\CompanyTypeEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Company extends Model
{
    use HasFactory, HasUuids;

    public static function boot() {
        parent::boot();

        static::creating(fn($model) => $model->id = Str::uuid());
    }
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
