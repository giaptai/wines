<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    //trang quản lý thông tin cá nhân
    public function MyInfor()
    {
        return view('page/thongtincanhan');
    }

    //trang quản lý địa chỉ cá nhân
    public function MyAddress()
    {
        return view('page/diachicanhan');
    }

    //trang quản lý đơn hàng
    public function MyOrder()
    {
        return view('page/donhangcanhan');
    }
}
