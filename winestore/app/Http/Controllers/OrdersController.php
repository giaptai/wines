<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function index($page)
    {
        $respon = Http::get('http://127.0.0.1:8001/api/v1/orders?page=' . $page);

        $orderArray = $respon['data'];
        $pagin = $respon['total'];
        $currentpage = $page;
        return response(view('dynamic_layout.tableorder', compact('orderArray', 'pagin', 'currentpage')), 200);
    }

    public function show(Request $request)
    {
        if ($request->input('id') == null) {
            return $this->index(1);
        } else {
            $respon = Http::get('http://127.0.0.1:8001/api/v1/orders/' . $request->input('id'));
        }
        $orderArray = [$respon['data']];
        $pagin = 1;
        $currentpage = 1;
        return response(view('dynamic_layout.tableorder', compact('orderArray', 'pagin', 'currentpage')), 200);
    }

    //cập nhật trạng thái đơn hàng
    public function update(Request $request, $id)
    {
        $respon = Http::withToken('1|eSDkOlgFWKqgqfaulM7UBBClhWKm5CzsjgSvPlSc')->patch('http://127.0.0.1:8001/api/v1/orders/' . $id, ['status'=> $request->input('status')]);
        return response($respon, 200);
    }

    public function pagination($page)
    {
        return $this->index($page);
    }
}
