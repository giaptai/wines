<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    //trang quản lý thông tin cá nhân
    public function my_infor()
    {
        return view('client/my_infor');
    }

    //trang quản lý địa chỉ cá nhân
    public function my_address()
    {
        return view('client/my_address');
    }

    //trang quản lý đơn hàng
    public function my_order()
    {
        return view('client/my_order');
    }

    //trang quản lý đơn hàng
    public function updateInfo(Request $request)
    {
        $val = $request->all();
        $query = DB::table('account')->where('email', $val['email'])->update(
            [
                'phone' => $val['phone'],
            ]
        );
        return response($query, 200);
    }
}
