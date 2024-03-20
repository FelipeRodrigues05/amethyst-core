<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, HasUuids;

    public static function boot() {
        parent::boot();

        static::creating(fn($model) => $model->id = Str::uuid());
    }

    protected $fillable = [
        'product_name',
        'product_description',
        'product_price',
        'image_url',
        'total_available',
        'total_selled',

        'company_id',
        'order_id',
    ];

    protected $hidden = [];

    protected function casts()
    {
        return [
            'image_url' => 'array',
        ];
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
