<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Mockery\Undefined;

class OrdersController extends Controller
{
    //trả về view
    public function orderView($url)
    {
        // return 'http://127.0.0.1:8001/api/v1/orders' . $url;
        $linkAPI = Http::withToken(session('tokenAdmin'))->get('http://127.0.0.1:8001/api/v1/orders' . $url);
        return (view('dynamic_layout.tableorder', ['Orders' => $linkAPI])->render());
    }

    // tìm kiếm mã đơn hàng
    public function searchOrder(Request $request)
    {
        // return $request->all();
        if ($request->input('search') == NULL) {
            if ($request->input('status') == -1) {
                $url = '?page=' . $request->input('page');
            } else $url = '?status[eq]=' . $request->input('status') . '&page=' . $request->input('page');
        } else {
            $url = '?id[eq]=' . $request->input('search');
        }
        // return $url;
        return $this->orderView($url);
    }

    // lọc loại đơn hàng
    public function filterOrder(Request $request)
    {
        $url = $request->input('status') != -1 ? '?status[eq]=' . $request->input('status') : '';
        return $this->orderView($url);
    }

    // phân trang
    public function pagination(Request $request)
    {
        // return $request->all();
        $url = $request->input('status') != -1 ? '?status[eq]=' . $request->input('status') . '&page=' . $request->input('page') : '?page=' . $request->input('page');
        // return $url;
        return $this->orderView($url);
    }

    //cập nhật trạng thái đơn hàng
    public function modifyOrder(Request $request, $id)
    {
        // return $request->all();
        if($request->input('plight') == -1){
            $url = '?page=' . $request->input('page');
        }else {
            $url ='?status[eq]=' . $request->input('plight') . '&page=' . $request->input('page');
        }
        // $url = $request->input('plight') != -1 ? '?status[eq]=' . $request->input('plight') . '&page=' . $request->input('page') : '?page=' . $request->input('page');
        // return 'http://127.0.0.1:8001/api/v1/orders' . $url;
        $res = Http::withToken(session('tokenAdmin'))->patch(
            'http://127.0.0.1:8001/api/v1/orders/' . $id,
            [
                'status' => $request->input('action')
            ]

        );
        // return $res;
        return $this->orderView($url);
    }

    //trang quản lý chi tiết đơn hàng
    public function OrderDetails($id)
    {
        $OrderDetails = Http::withToken(session('tokenAdmin'))->get('http://127.0.0.1:8001/api/v1/orders/' . $id);
        // return $OrderDetails;
        return view('layout/order_detail', ['OrderDetails' => $OrderDetails]);
    }
}
