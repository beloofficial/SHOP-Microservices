<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Payment;
use App\Product;
use Session;
class OrderController extends Controller
{
    //
    public function store(Request $request)
    {
    	$user_id = 1;
    	$price = 10000;
    	$order = new Order;
    	$order->user_id = $user_id;
    	$order->price = $price;
    	$order->address = $request->address;
    	$order->save();
    	
    	$order->products()->sync([1,2,4]);

    	return $order;
    	
    }

    public function payStore(Order $order,Request $request)
    {
    	$order->paid()->save();
    	$user_id = 1;
    	$payment = new Payment;
    	$payment->user_id = $user_id;
    	$payment->code = $request->code;
    	$payment->payment_type = $request->payment_type;
    	$payment->save();
    	return $payment;

    }

    public function cancelOrder(Order $order)
    {
    	$order->canceled()->save();
    }

    public function update(Order $order,Request $request)
    {
    	$order->address = $request->address;
    	$order->save();
    }
}
