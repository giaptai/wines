<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Http;

class SessionController extends Controller
{

    public function store($id)
    {
        $item=Http::get('http://127.0.0.1:8001/api/v1/products/'.$id);

        $cart = session('cart');
        $cart[$id] =
            [
                'id' => $item['data']['id'],
                'name' => $item['data']['name'],
                'images' => $item['data']['images'],
                'quantity' => 1,
                'price' => $item['data']['price'],
            ];
        session()->put('cart', $cart);
        return response($item, 200);
    }

    public function add($id)
    {
        $cart = session('cart');
        $item=Http::get('http://127.0.0.1:8001/api/v1/products/'.$id);
        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] < $item['data']['quantity']) {
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
