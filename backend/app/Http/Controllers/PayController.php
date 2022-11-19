<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\orders;

class PayController extends Controller
{
    // thanh toán trực tiếp COD
    public function addOrder(Request $request)
    {
        // response(var_dump(session('cart')), 200);
        // die();
        $id = rand(10000000, 99999999);
        $query = DB::table('orders')->insert([
            'id'     =>   $id,
            'id_account'=> 100121, //phai co id khach hang
            'fullname'     => $request->input("fullname"),
            'phone'     => $request->input("phone"),
            'email'     => $request->input("email"),
            'address'     => $request->input("address"),
            'date'     => date("Y-m-d H:i:s"),
            'status'     => "Chờ xác nhận",
            'total_money'     => $request->input("total_money"),
            'pay_method'     => 'COD'
        ]);

        foreach (session('cart') as $key => $value) {
            DB::table('order_details')->insert([
                'id_order'     =>   $id,
                'id_wine'     => $value['id'],
                'quantity'     => $value['quantity'],
            ]);
        }
        session()->pull('cart', 'default');
        return response($query, 200);
    }
}
