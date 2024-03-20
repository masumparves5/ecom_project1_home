<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    private static $order;
    public static function updateOrder($request)
    {
        self::$order = Order::find($request->id);

        if ($request->order_status == 'Pending')
        {
            self::$order->order_status = $request->order_status;
            self::$order->delivery_status = $request->order_status;
            self::$order->payment_status = $request->order_status;
        }
        elseif ($request->order_status == 'Processing')
        {
            self::$order->order_status = $request->order_status;
            self::$order->delivery_status = $request->order_status;
            self::$order->delivery_address = $request->delivery_address;
            self::$order->courier_id = $request->courier_id;
            self::$order->payment_status = $request->order_status;
        }
        elseif ($request->order_status == 'Complete')
        {
            self::$order->order_status = $request->order_status;
            self::$order->payment_status = $request->order_status;
            self::$order->delivery_address = $request->delivery_address;
            self::$order->payment_date = date('Y-m-d');
            self::$order->delivery_date = date('Y-m-d');
            self::$order->payment_timestamp = strtotime(date('Y-m-d'));
            self::$order->delivery_timestamp = strtotime(date('Y-m-d'));

        }
        elseif ($request->order_status == 'Cancel')
        {
            self::$order->order_status = $request->order_status;
            self::$order->delivery_status = $request->order_status;
            self::$order->payment_status = $request->order_status;
        }
        self::$order->save();
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function orderDetails()
    {
        return $this->hasMany(Order_detail::class);
    }
}

