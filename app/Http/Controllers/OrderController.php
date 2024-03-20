<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\DefaultOrderResource;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Exception;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new OrderResource(Order::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        try {
            $request->validated();

            Order::create($request->all());

            return response()->json([
                'success' => true,
            ]);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        try {
            $order = Order::find($order->id);

            return response()->json([
                'success' => true,
                'order' => new DefaultOrderResource($order),
            ]);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        try {
            $request->validated();

            Order::findOrFail($order->id)->updateOrFail($request->all());

            return response()->json([
                'success' => true,
            ]);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        try {
            Order::findOrFail($order->id)->delete();

            return response()->json([
                'success' => true,
            ]);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
