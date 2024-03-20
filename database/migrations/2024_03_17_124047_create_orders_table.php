<?php

use App\Enums\OrderStatusEnum;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string('customer_name');
            $table->string('customer_address');
            $table->string('customer_phone');

            $table->enum('order_status', [
                OrderStatusEnum::ORDER_PLACED->value,
                OrderStatusEnum::PENDING_CONFIRMATION->value,
                OrderStatusEnum::WAITING_PAYMENT->value,
                OrderStatusEnum::PAYMENT_CONFIRMED->value,
                OrderStatusEnum::ORDER_SHIPPED->value,
                OrderStatusEnum::DELIVERED->value,
            ]);
            $table->foreignIdFor(Product::class, 'product_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
