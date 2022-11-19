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
    //trang quản đăng nhập
    public function LoginPage()
    {
        return view('page/login_admin');
    }

    //trang quản lý thống kê
    public function Statistic()
    {
        return view('page/quanly_thongke');
    }

    //trang quản lý sản phẩm, lấy dữ liệu từ wines
    public function Products()
    {
        return view('page/quanly_sanpham');
    }

    //trang quản lý đơn hàng
    public function Orders()
    {
        return view('page/quanly_donhang');
    }

    //trang quản lý tài khoản
    public function Accounts()
    {
        return view('page/quanly_taikhoan');
    }

    //trang quản lý thể loại
    public function Categories()
    {
        return view('page/quanly_theloai')->render();
    }

    //trang quản lý thương hiệu
    public function Brands()
    {
        return view('page/quanly_thuonghieu');
    }

    //trang quản lý quốc gia
    public function Countries()
    {
        return view('page/quanly_quocgia');
    }

    //trang quản lý them sản phẩm
    public function manage_product_add()
    {
        return view('page/quanly_sanpham_them');
    }
}
