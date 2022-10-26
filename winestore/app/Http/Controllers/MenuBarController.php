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

        $respon=Http::get('http://127.0.0.1:8001/api/v1/products');

        $paginate = $respon['meta']['total'];
        $wineArray = $respon['data'];
        $countryArray = Country::all();
        $categoryArray = Category::all();
        $brandArray = Brand::all();

        // return response($respon, 200);
        return view('page.cuahang',  compact('wineArray', 'countryArray', 'categoryArray', 'brandArray', 'paginate'));
    }

    //trang quản lý sản phẩm
    public function cart()
    {
        return view('page.giohang');
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
