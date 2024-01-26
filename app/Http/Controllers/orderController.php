<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Orders;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function getallOrder()
    {
        $orders = Orders::all();
        return OrderResource::collection($orders);
    }

public function getOrderDetails()
{

    
}
    public function addOrder(Request $request)
{
    $request->validate([
        'name' => 'required',
        'user_id' => 'required|exists:users,id',
        'total_amount' => 'required|numeric',
        'date' => 'required|date',
    ]);

    $order = Orders::create($request->all());

    return new OrderResource($order);
}

public function updateOrder(Request $request, $orderId)
{
    $order = Orders::findOrFail($orderId);

    $request->validate([
        'name' => 'required',
        'user_id' => 'required|exists:users,id',
        'total_amount' => 'required|numeric',
        'date' => 'required|date',
    ]);

    $order->update($request->all());

    return new OrderResource($order);
}

public function deleteOrder(Orders $order)
{
    $order = Orders::findOrFail($order);
    $order->delete();

    return response()->json(['message' => 'Order deleted successfully']);
}
}
