<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Account;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Country;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

class ManageController extends Controller
{
    //trang quản lý thống kê
    public function Statistic()
    {
        // $wines = Http::get('http://127.0.0.1:8001/api/v1/products?page=1')['meta']['total'];
        // $accounts = Http::get('http://127.0.0.1:8001/api/v1/customers?page=1')['meta']['total'];
        // $orders = Http::get('http://127.0.0.1:8001/api/v1/orders?page=1')['meta']['total'];
        return view('page/quanly_thongke');
    }

    //trang quản lý sản phẩm, lấy dữ liệu từ wines
    public function Products()
    {
        // $respon=Http::get('http://127.0.0.1:8001/api/v1/products?page=1');
        // $productArray = $respon['data'];
        // $pagin = $respon['meta']['total'];
        // $countryArray = Http::get('http://127.0.0.1:8001/api/v1/origins')['data'];
        // $categoryArray = Http::get('http://127.0.0.1:8001/api/v1/categories')['data'];
        // $brandArray =  Http::get('http://127.0.0.1:8001/api/v1/brands')['data'];
        // $currentpage=1;
        return view('page/quanly_sanpham');
    }

    //trang quản lý đơn hàng
    public function Orders()
    {
        // $respon=Http::get('http://127.0.0.1:8001/api/v1/orders?page=1');
        // $orderArray = $respon['data'];
        // $pagin = $respon['total'];
        // $currentpage=1;
        return view('page/quanly_donhang');
    }

    //trang quản lý tài khoản
    public function Accounts()
    {
        // $respon=Http::get('http://127.0.0.1:8001/api/v1/customers?page=1');
        // $customerArr = $respon['data'];
        // $pagin = $respon['meta']['total'];
        // $currentpage=1;
        return view('page/quanly_taikhoan');
    }

    //trang quản lý thể loại
    public function Categories()
    {
        // $respon=Http::get('http://127.0.0.1:8001/api/v1/categories?page=1');
        // $categoryArray = $respon['data'];
        // $pagin = $respon['meta']['total'];
        // $currentpage = 1;
        return view('page/quanly_theloai')->render();
    }

    //trang quản lý thương hiệu
    public function Brands()
    {
        // $respon=Http::get('http://127.0.0.1:8001/api/v1/brands?page=1');
        // $brandArray = $respon['data'];
        // $pagin = $respon['meta']['total'];
        // $currentpage=1;
        return view('page/quanly_thuonghieu');
    }

    //trang quản lý quốc gia
    public function Countries()
    {
        // $respon=Http::get('http://127.0.0.1:8001/api/v1/origins?page=1');
        // $countryArray = $respon['data'];
        // $pagin = $respon['meta']['total'];
        // $currentpage=1;
        return view('page/quanly_quocgia');
    }

    //trang quản lý them sản phẩm
    public function manage_product_add()
    {
        // $countryArray = Http::get('http://127.0.0.1:8001/api/v1/origins')['data'];
        // $categoryArray = Http::get('http://127.0.0.1:8001/api/v1/categories')['data'];
        // $brandArray =  Http::get('http://127.0.0.1:8001/api/v1/brands')['data'];
        return view('page/quanly_sanpham_them');
    }
}
