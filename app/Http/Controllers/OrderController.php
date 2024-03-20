<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.order.index', [
            'orders' => Order::all()
        ]);
    }

    public function orderDetail($id)
    {
        return view('admin.order.detail', [
            'order' => Order::find($id)
        ]);
    }
    public function orderEdit($id)
    {
        return view('admin.order.edit', [
            'order' => Order::find($id)
        ]);
    }
    public function orderUpdate(Request $request)
    {
        Order::updateOrder($request);
        return redirect()
            ->route('manage.order')
            ->with('message', 'Order Info Update Successfully');
    }
    public function orderInvoice1($id)
    {
        return view('admin.order.invoice1', [
            'order' => Order::find($id)
        ]);
    }
    public function orderInvoice($id)
    {
        $pdf = Pdf::loadView('admin.order.invoice', [
            'order' => Order::find($id)
        ]);
        return $pdf->stream();
    }
}
