<?php

namespace App\Http\Controllers;

use App\Mail\OrderCnfirmaionMail;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_detail;
use Illuminate\Http\Request;
use Cart;
use Session;
use Mail;

class CheckoutController extends Controller
{
    private $order, $customer, $orderDetail;
    public function index()
    {
        if (Session::get('customer_id'))
        {
            $this->customer = Customer::find(Session::get('customer_id'));
        }
        else
        {
            $this->customer = ' ';
        }
        return view('frontEnd.checkout.index', [
            'customer' => $this->customer
        ]);
    }

    public function newOrder(Request $request)
    {
        if (Session::get('customer_id'))
        {
            $this->customer = Customer::find(Session::get('customer_id'));
        }
        else
        {
            $this->customer = Customer::where('email', $request->email)->orWhere('mobile', $request->mobile)->first();
            if ($this->customer)
            {
                Session::put('customer_id', $this->customer->id);
                Session::put('customer_name', $this->customer->name);
            }
            else
            {
                $this->customer = Customer::newCustomer($request);

                Session::put('customer_id', $this->customer->id);
                Session::put('customer_name', $this->customer->name);
            }

        }

        $this->order = new Order();
        $this->order->customer_id = $this->customer->id;
        $this->order->order_total = $request->order_total;
        $this->order->tax_total = $request->tax_total;
        $this->order->shipping_total = $request->shipping_total;
        $this->order->order_date = date('Y-m-d');
        $this->order->order_timestamp = strtotime(date('Y-m-d'));
        $this->order->delivery_address = $request->delivery_address;
        $this->order->payment_method = $request->payment_method;
        $this->order->save();

        foreach (Cart::content() as $item)
        {
            $this->orderDetail = new Order_detail();
            $this->orderDetail->order_id = $this->order->id;
            $this->orderDetail->product_id = $item->id;
            $this->orderDetail->product_name = $item->name;
            $this->orderDetail->product_code = $item->options->code;
            $this->orderDetail->product_image = $item->options->image;
            $this->orderDetail->product_price = $item->price;
            $this->orderDetail->product_qty = $item->qty;
            $this->orderDetail->save();

            Cart::remove($item->rowId);
        }

        $title = 'Welcome to our website ';
        $body = 'Thank you for your order ';
        Mail::to($this->customer->email)->send(new OrderCnfirmaionMail($title, $body));
        return redirect('/complete-order')->with('message', 'Congratulation.. your order has been successful. We will contact with you very soon');
    }


    public function completeOrder()
    {
        return view('frontEnd.checkout.complete-order');
    }
}
