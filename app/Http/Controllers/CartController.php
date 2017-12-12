<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;
use Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::content();

        return view('cart.index', compact('cart'));
    }

    public function postAddItem(Request $request)
    {
        $id = $request->id;
        $number = $request->number;
        
        $product = Product::find($id);
        if ($id) {
           $product = Product::find($id);
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $number,
                'price' => $product->unit_price * (1 - $product->discount / 100),
                'options' => [
                    'image' => $product->image
                ]
            ]);
            return response()->json(['status' => 200]);
        }
        return response()->json(['status' => 404]);
    }

    public function getUpQuantity(Request $request)
    {
        $id = $request->id;

        if ($id) {
            $item = Cart::get($id);
            Cart::update($id, $item->qty + 1);
        }

        $cart = Cart::content();

        return view('cart.list', compact('cart'));
    }

    public function getDownQuantity(Request $request)
    {
        $id = $request->id;

        if ($id) {
            $item = Cart::get($id);
            if ($item->qty > 1) {
                Cart::update($id, $item->qty - 1);
            }
        }

        $cart = Cart::content();

        return view('cart.list', compact('cart'));
    }

    public function postDeleteItem(Request $request)
    {
        $id = $request->id;
        if ($id) {
            Cart::remove($id);
        }

        $cart = Cart::content();

        return view('cart.list', compact('cart'));
    }
}
