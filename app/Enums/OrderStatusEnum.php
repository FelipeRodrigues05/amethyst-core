<?php

namespace App\Enums;

enum OrderStatusEnum: string
{
    case ORDER_PLACED = 'order_placed';
    case PENDING_CONFIRMATION = 'pending_confirmation';
    case WAITING_PAYMENT = 'waiting_payment';
    case PAYMENT_CONFIRMED = 'payment_confirmed';
    case ORDER_SHIPPED = 'order_shipped';
    case DELIVERED = 'delivered';
}
