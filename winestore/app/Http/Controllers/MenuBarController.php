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
        $respon=Http::get('http://127.0.0.1:8001/api/v1/brands');
        $respon2=Http::get('http://127.0.0.1:8001/api/v1/categories');
        $categoryArray = $respon2['data'];
        $brandArray = $respon['data'];
        return view('page.trangchu',compact('categoryArray','brandArray' ));
    }

    //trang sản phẩm
    public function shop()
    {
        $respon=Http::get('http://127.0.0.1:8001/api/v1/products');

        $paginate = $respon['meta']['total'];
        $wineArray = $respon['data'];
        $countryArray = Http::get('http://127.0.0.1:8001/api/v1/origins')['data'];
        $categoryArray = Http::get('http://127.0.0.1:8001/api/v1/categories')['data'];
        $brandArray = Http::get('http://127.0.0.1:8001/api/v1/brands')['data'];
        $currentpage=1;
        // return response($categoryArray, 200);
        return view('page.cuahang',  compact('wineArray', 'countryArray', 'categoryArray', 'brandArray', 'paginate','currentpage'));
    }

    //trang quản lý sản phẩm
    public function cart()
    {
        $respon = Http::get('https://provinces.open-api.vn/api/p');
        $apiOk = $respon->json();

        return view('page.giohang',compact('apiOk'));
    }

    //trang quản lý khách hàng
    public function account(){
        return view('page.taikhoan');
    }

    //trang quản lý khách hàng
    public function register(){
        return view('page/logger');
    }

}
