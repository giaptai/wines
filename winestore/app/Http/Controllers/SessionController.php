<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Http;

class SessionController extends Controller
{

    public function store($id)
    {
        $item = Product::find($id);
        $cart = session('cart');
        $cart[$id] =
            [
                'id' => $id,
                'name' => $item->name,
                'image' => $item->image,
                'quantity' => 1,
                'price' => $item->price,
            ];
        session()->put('cart', $cart);
        return response($item, 200);
    }

    public function add($id)
    {
        $cart = session('cart');
        $item = Product::find($id);
        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] < $item->quantity) {
                $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
                session()->put('cart', $cart);
            } 
            else {
                echo 'Vượt số lượng kho !';
                die();
            };
        }
        return response(view('dynamic_layout.tablecart'),200);
    }

    public function minus($id)
    {
        $cart = session('cart');
        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity'] = $cart[$id]['quantity'] - 1;
                session()->put('cart', $cart);
            } else {
                session()->pull('cart.' . $id);
            }
        }
        return response(view('dynamic_layout.tablecart'),200);
    }

    public function delete($id)
    {
        $cart = session('cart');
        if (isset($cart[$id])) {
            session()->pull('cart.' . $id);
        }
        return response(view('dynamic_layout.tablecart'),200);
    }
}
