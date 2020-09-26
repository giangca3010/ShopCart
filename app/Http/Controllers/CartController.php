<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cart;

class CartController extends Controller
{
    public function index()
    {
        $products = DB::table('product')->get();
        return view('index', compact('products'));
    }

    public function addToCart(Request $req, $id)
    {
        $product = DB::table('product')->where('id', $id)->first();
        if ( isset($product) ) {
            $oldCart = Session('cart') ? Session('cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product, $id);
            $req->session()->put('cart', $newCart);
            return response()->json($newCart, 200);
        }

//        return view('cart', compact('newCart'));
    }

    public function deleteCart(Request $req, $id)
    {
        $oldCart = Session('cart') ? Session('cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);

        if (count($newCart->products) > 0) {
            $req->session()->put('cart', $newCart);
        } else {
            $req->Session()->forget('cart');
        }
        return view('cart', compact('newCart'));

    }

}
