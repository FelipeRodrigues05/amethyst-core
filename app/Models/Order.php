<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory, HasUuids;

    public static function boot() {
        parent::boot();

        static::creating(fn($model) => $model->id = Str::uuid());
    }
    protected $fillable = [
        'customer_name',
        'customer_address',
        'customer_phone',

        'order_status',
        'product_id',
    ];

    protected $hidden = [];

    protected function casts()
    {
        return [
            'order_status' => OrderStatusEnum::class,
            'product_id' => 'array',
        ];
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
