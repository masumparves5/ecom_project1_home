
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Sell Invoice</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-header h1 {
            font-size: 36px;
            color: #333;
            margin: 0;
        }
        .invoice-details {
            margin-bottom: 30px;
        }
        .invoice-details p {
            margin: 5px 0;
            color: #666;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .invoice-table th, .invoice-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        .invoice-table th {
            background-color: #f5f5f5;
            color: #333;
        }
        .total-section {
            margin-top: 20px;
        }
        .total-section p {
            text-align: right;
            margin: 5px 0;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="invoice-header">
        <h1>Product Sell Invoice</h1>
    </div>
    <div class="invoice-details">
        <p><strong>Invoice Number:</strong> {{$order->id}}</p>
        <p><strong>Date:</strong> {{date('Y-m-d')}}</p>
        <p><strong>Customer Name:</strong>{{$order->customer->name}}</p>
    </div>
    <table class="invoice-table">
        <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price (per unit)</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        @php $sum = 0 @endphp
        @foreach($order->orderDetails as $product)
        <tr>
            <td>{{$product->product_name}}</td>
            <td>{{$product->product_qty}}</td>
            <td>{{$product->product_price}}</td>
            <td>{{$total = $product->product_price * $product->product_qty}}</td>
        </tr>
            @php $sum += $product->product_price @endphp
        @endforeach
        </tbody>
    </table>
    <div class="total-section">
        <p><strong>Subtotal:</strong> {{$sum}}</p>
        <p><strong>Tax (10%):</strong> {{$tax = $sum*0.10}}</p>
        <p><strong>Shipping Cost:</strong> TK {{$shipping = 100}}</p>
        <br/>
        <p><strong>Total:</strong> {{$sum + $tax + $shipping}}</p>
    </div>
    <p><strong>Payment Method:</strong> {{$order->payment_method}}</p>
    <div class="footer">
        <p>Thank you for your purchase!</p>
    </div>
</div>
</body>
</html>
