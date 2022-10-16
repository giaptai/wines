<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    //cập nhật trạng thái đơn hàng
    public function updateOrder(Request $request)
    {
        $arr = $request->all();
        // return response($arr, 200);
        // die();
        $query = DB::table('orders')->where('id', $arr['id'])->update([
            'status'     => $arr['str'],
        ]);
        return response($query, 200);
    }

    //lọc đơn hàng
    public function filterOrder(Request $request)
    {
        $arr = $request->all();
           return response($arr, 200);
        die();
        if ($arr['status'] == 'Tổng đơn') {
            $query = DB::table('orders')->get();
        } else $query = DB::table('orders')->where('status', $arr['status'])->get();
        return response($query, 200);
    }

    //lọc đơn hàng
    public function searchOrder(Request $request)
    {
        $arr = $request->all();
        if(isset($arr['search'])){
            $query = DB::table('orders')->where('id', $arr['search'])->get();
        }else $query = DB::table('orders')->get();
        return response($query, 200);
    }
}
