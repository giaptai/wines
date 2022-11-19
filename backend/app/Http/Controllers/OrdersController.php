<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function index($page)
    {
        $orderArray = Order::skip(($page - 1) * 15)->take(15)->get();
        $pagin = Order::count();
        $currentpage = $page;
        return response(view('dynamic_layout.tableorder', compact('orderArray', 'pagin', 'currentpage')), 200);
    }

    //cập nhật trạng thái đơn hàng
     public function update(Request $request, $id)
    {
        $Order = Order::findOrFail($id);
        $Order->update($request->all());
        return $Order;
    }

    public function pagination($page)
    {
        return $this->index($page);
    }
}
