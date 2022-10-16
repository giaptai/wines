<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use Illuminate\Pagination\Paginator;

class MenuBarController extends Controller
{
    //
    //trang home
    public function home()
    {
        return view('home');
    }

    //trang sản phẩm
    public function shop()
    {
        Paginator::useBootstrapFive();
        $table = products::count();
        $wineArray = products::paginate(10);
        return view('shop',  compact('wineArray', 'table'));
    }

    //trang quản lý sản phẩm
    public function cart()
    {
        return view('cart');
    }

    //trang quản lý khách hàng
    public function account(){
        return view('account');
    }

    //trang quản lý khách hàng
    public function login(){
        return view('logger');
    }

}
