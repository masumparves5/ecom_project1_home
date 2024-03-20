<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Session;

class CustomerAuthController extends Controller
{
    public $customer;
    public function login()
    {
        return view('frontEnd.login.login');
    }
    public function dashboard()
    {
        return view('frontEnd.login.dashboard', [
            'orders' => Order::where('customer_id', Session::get('customer_id'))->get()
        ]);
    }
    public function loginCheck(Request $request)
    {
        $this->customer = Customer::where('email', $request->user)->orWhere('mobile', $request->user)->first();
        if ($this->customer)
        {
            if (password_verify($request->password, $this->customer->password))
            {
                Session::put('customer_id', $this->customer->id);
                Session::put('customer_name', $this->customer->name);
                return redirect('/customer-dashboard');
            }
            else
            {
                return back()->with('message', 'Invalid Username or Password');
            }
        }
        else
        {
            return back()->with('message', 'Invalid Username or Password');
        }
    }
    public function register()
    {
        return view('frontEnd.login.register');
    }
    public function CustomerRegister(Request $request)
    {
        $this->customer = Customer::where('email', $request->name)->orWhere('mobile', $request->mobile)->first();
        if ( $this->customer)
        {
            return back()->with('message', "This Email or Phone is already Registered");
        }
        else
        {
            if ($request->password == $request->confirmPassword)
            {
                $this->customer = Customer::newCustomer($request);
                Session::put('customer_id', $this->customer->id);
                Session::put('customer_name', $this->customer->name);
                return redirect('/customer-dashboard');
            }
            else
            {
                return back()->with('message', 'Password did not match');
            }
        }
    }

    public function logout()
    {
        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect('/customer/login');
    }
}
