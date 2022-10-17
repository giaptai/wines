<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\orders;
use App\Models\accounts;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ManageController extends Controller
{
    //trang quản lý thống kê
    public function manage_statistic()
    {
        $wines = products::all();
        $accounts = accounts::all();
        $orders = orders::all();

        return view('admin/mn_statistic', compact('wines', 'accounts', 'orders'));
    }

    //trang quản lý sản phẩm
    //lấy dữ liệu từ wines
    public function manage_product()
    {
        Paginator::useBootstrapFive();
        $wineArray = products::paginate(10);
        $pagin = products::count();
        // $wineArray=DB::table('wines')-paginate(10);
        return view('admin/mn_products', compact('wineArray', 'pagin'))->render();
    }

    //trang quản lý them sản phẩm
    public function manage_product_add()
    {
        return view('admin/mn_product_add');
    }

    //trang quản lý sản phẩm
    public function manage_orders()
    {
        $orders = orders::paginate(15);
        $pagin = orders::count();
        return view('admin/mn_orders', compact('orders', 'pagin'));
    }

    //trang quản lý khách hàng
    public function manage_customers()
    {
        $accounts = accounts::paginate(10);
        $pagin = accounts::count();
        return view('admin/mn_customers', compact('accounts', 'pagin'));
    }
}
