<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    //
    public function add($product_id){
        // for indentification purpose
        $session_id = session()->get('_token');
        // get product details by id
        $product = Product::where('id', '=', $product_id)->first();

        if (null == $product) {
            abort(404);
        }

        if (Cart::where('session_id', '=', $session_id)->exists()) {
            // check whether product exist if yes increase quantity
            $enty = Cart::where(['session_id' => $session_id,
                'product_id' => $product_id]->increment('qty', 1));
            if (!$enty) {
                Cart::create([
                    'session_id' => $session_id,
                    'product_id' => $product_id,
                    'price' => $product['discount_price'],
                    'product_name' => $product['title'],
                    'qty' => 1
                ]);
            } else {
                Cart::create([
                    'session_id'   => $session_id,
                    'product_id'   => $product_id,
                    'product_name' => $product['title'],
                    'price'        => $product['discount_price'],
                    'qty'          => 1
                ]);
            }
        }

        // first check whether the cart exist
        return redirect()->route('cart.show');
    }

    public function show() {
        $session_id = session()->get( '_token' );
        $entries       = Cart::where( 'session_id', $session_id )->get();
        return view( 'cart/show' )
            ->with( 'entries', $entries )
            ->with( 'session_id', $session_id );
    }
}
