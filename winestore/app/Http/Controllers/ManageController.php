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
        $wines = Product::all();
        $accounts = Account::all();
        $orders = Order::all();

        return view('page/quanly_thongke', compact('wines', 'accounts', 'orders'));
    }

    //trang quản lý sản phẩm, lấy dữ liệu từ wines
    public function Products()
    {
        $respon=Http::get('http://127.0.0.1:8001/api/v1/products');

        $productArray = $respon['data'];
        $pagin = $respon['meta']['total'];
        $countryArray = Http::get('http://127.0.0.1:8001/api/v1/origins')['data'];
        $categoryArray = Http::get('http://127.0.0.1:8001/api/v1/categories')['data'];
        $brandArray =  Http::get('http://127.0.0.1:8001/api/v1/brands')['data'];
        $currentpage=1;
        return view('page/quanly_sanpham', compact('productArray', 'pagin', 'countryArray',  'categoryArray', 'brandArray', 'currentpage'));
    }

    //trang quản lý đơn hàng
    public function Orders()
    {
        $respon=Http::get('http://127.0.0.1:8001/api/v1/orders');
        $orderArray = $respon['data'];
        $pagin = $respon['total'];
        $currentpage=1;
        return view('page/quanly_donhang', compact('orderArray', 'pagin', 'currentpage'));
    }

    //trang quản lý tài khoản
    public function Accounts()
    {
        $respon=Http::get('http://127.0.0.1:8001/api/v1/customers');
        $customerArr = $respon['data'];
        $pagin = $respon['meta']['total'];

        $currentpage=1;

        return view('page/quanly_taikhoan', compact('customerArr', 'pagin', 'currentpage'));
    }

    //trang quản lý thể loại
    public function Categories()
    {
        $respon=Http::get('http://127.0.0.1:8001/api/v1/categories');
        $categoryArray = $respon['data'];
        $pagin = $respon['meta']['total'];
        $currentpage = 1;
        return view('page/quanly_theloai', compact('categoryArray', 'pagin', 'currentpage'))->render();
    }

    //trang quản lý thương hiệu
    public function Brands()
    {
        $respon=Http::get('http://127.0.0.1:8001/api/v1/brands');

        $brandArray = $respon['data'];
        $pagin = $respon['meta']['total'];
        $currentpage=1;
        return view('page/quanly_thuonghieu', compact('brandArray', 'pagin', 'currentpage'));
    }

    //trang quản lý quốc gia
    public function Countries()
    {
        Paginator::useBootstrapFive();
        $respon=Http::get('http://127.0.0.1:8001/api/v1/origins');

        $countryArray = $respon['data'];
        $pagin = $respon['meta']['total'];
        $currentpage=1;
        return view('page/quanly_quocgia', compact('countryArray', 'pagin', 'currentpage'));
    }

    //trang quản lý them sản phẩm
    public function manage_product_add()
    {
        $countryArray = Country::all();
        $categoryArray = Category::all();
        $brandArray = Brand::all();
        return view('page/quanly_sanpham_them', compact('countryArray',  'categoryArray', 'brandArray'));
    }

    //trang quản lý them thể loại
    public function manage_category_add()
    {
        return view('page/quanly_theloai_them');
    }

    //trang quản lý them thuong hieu
    public function manage_brand_add()
    {
        return view('page/quanly_thuonghieu_them');
    }

    //trang quản lý them quốc gia
    public function manage_country_add()
    {
        return view('page/quanly_quocgia_them');
    }
}
