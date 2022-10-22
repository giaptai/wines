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
        $categoryArray = Category::get('name');
        $brandArray = Brand::all();
        return view('page.trangchu',compact('categoryArray','brandArray' ));
    }

    //trang sản phẩm
    public function shop()
    {
        Paginator::useBootstrapFive();
        $paginate = Product::count();
        $wineArray = Product::paginate(12);
        $countryArray = Country::all();
        $categoryArray = Category::all();
        $brandArray = Brand::all();
        return view('page.cuahang',  compact('wineArray', 'countryArray', 'categoryArray', 'brandArray', 'paginate'));
    }

    //trang quản lý sản phẩm
    public function cart()
    {
        $respon=Http::get('https://provinces.open-api.vn/api/p');
        $apiOk=$respon->json();
        return view('page.giohang', compact('apiOk'));
    }

    //trang quản lý khách hàng
    public function account(){
        return view('page.taikhoan');
    }

    //trang quản lý khách hàng
    public function login(){
        return view('page/logger');
    }

}
