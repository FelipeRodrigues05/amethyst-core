<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Employee extends Model
{
    use HasFactory, HasUuids;

    public static function boot() {
        parent::boot();

        static::creating(fn($model) => $model->id = Str::uuid());
    }
    protected $fillable = ['name', 'email', 'password', 'company_profile', 'company_id'];

    protected function casts()
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
