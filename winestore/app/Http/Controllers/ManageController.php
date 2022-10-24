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
        Paginator::useBootstrapFive();
        $productArray = Product::paginate(10);
        $pagin = Product::count();
        $countryArray = Country::all();
        $categoryArray = Category::all();
        $brandArray = Brand::all();
        return view('page/quanly_sanpham', compact('productArray', 'pagin', 'countryArray',  'categoryArray', 'brandArray',));
    }

    //trang quản lý đơn hàng
    public function Orders()
    {
        Paginator::useBootstrapFive();
        $orders = Order::paginate(15);
        $pagin = Order::count();
        return view('page/quanly_donhang', compact('orders', 'pagin'));
    }

    //trang quản lý tài khoản
    public function Accounts()
    {
        Paginator::useBootstrapFive();
        $accounts = Account::paginate(10);
        $pagin = Account::count();
        return view('page/quanly_taikhoan', compact('accounts', 'pagin'));
    }

    //trang quản lý thể loại
    public function Categories()
    {
        Paginator::useBootstrapFive();
        $categoryArray = Category::paginate(10);
        $pagin = Category::count();
        return view('page/quanly_theloai', compact('categoryArray', 'pagin'))->render();
    }

    //trang quản lý thương hiệu
    public function Brands()
    {
        Paginator::useBootstrapFive();
        $brandArray = Brand::paginate(10);
        $pagin = Brand::count();
        return view('page/quanly_thuonghieu', compact('brandArray', 'pagin'))->render();
    }

    //trang quản lý quốc gia
    public function Countries()
    {
        Paginator::useBootstrapFive();
        $countryArray = Country::paginate(10);
        $pagin = Country::count();
        return view('page/quanly_quocgia', compact('countryArray', 'pagin'))->render();
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
