<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CardController extends Controller
{
    private $product, $cartProducts;
    public function index()
    {
        $this->cartProducts = Cart::content();
        return view('frontEnd.card.index', ['cart_products' =>$this->cartProducts]);
    }

    public function addCart(Request $request)
    {
        $this->product = Product::find($request->id);
        Cart::add([
            'id'      => $request->id,
            'name'    => $this->product->name,
            'qty'     => $request->qty,
            'price'   => $this->product->selling_price,
            'options' => [
                'code'  => $this->product->code,
                'image' => $this->product->image,
                ]
        ]);
        return redirect('/card-show');
    }

    public function cartUpdate(Request $request, $rowId)
    {
        Cart::update($rowId, $request->qty);
        return redirect('card-show')->with('message', 'Cart Product Quantity Update Successfully');
    }
    public function cartDelete($rowId)
    {
        Cart::remove($rowId);
        return redirect('card-show')->with('message', 'Cart Product Delete Successfully');
    }
}
