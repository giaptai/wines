<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Country;

use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;

class MenuBarController extends Controller
{
    //
    //trang home
    public function home()
    {
        $productArray=Http::get('http://127.0.0.1:8001/api/v1/products?page=1')['data'];
        $brandArray=Http::get('http://127.0.0.1:8001/api/v1/brands')['data'];
        $categoryArray=Http::get('http://127.0.0.1:8001/api/v1/categories')['data'];
        return view('page.trangchu',compact('categoryArray','brandArray', 'productArray' ));
    }

    //trang sản phẩm
    public function shop(Request $request)
    {
        return view('page.cuahang');
    }

    //trang quản lý giỏ hàng
    public function cart()
    {
        // $respon = Http::get('https://provinces.open-api.vn/api/p');
        // $apiOk = $respon->json();
        // return view('page.giohang',compact('apiOk'));
        return view('page.giohang');
    }

    //trang quản lý khách hàng
    public function account(){
        return view('page.taikhoan');
    }

    //trang quản lý khách hàng
    public function register(){
        return view('page/logger');
    }

     //trang lienhe
     public function contact(){
        return view('page/user_address');
    }
}
