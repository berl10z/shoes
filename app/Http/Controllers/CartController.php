<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart($product_id) {
        $product = Product::find($product_id);
        $cart = session()->get('cart');
        if(empty($cart[$product->id])) {
            $cart[$product->id] = [
                'product' => $product,
                'qty' => 1,
            ];
        }   else {
            $cart[$product->id]['qty']++;
        }

        session()->put('cart', $cart);
        DB::table('products')->where('id', $product_id)->decrement('count');

        return back();
    }

    public function index()
    {
        if(!session()->has('cart')) {
            session()->put('cart',[]);
        }
        $products = session()->get('cart');
        return view('cart', compact('products'));
    }

    public function deleteFromCart($id) {
        $qtyStr = 'cart.'.$id.'.qty';
        $qty = session()->get($qtyStr);

        if($qty <= 1) {
            session()->forget('cart.'.$id);
        } else {
            session()->decrement($qtyStr);
        }
        session()->save();
        DB::table('products')->where('id', $id)->increment('count');

        return back();
    }
}
