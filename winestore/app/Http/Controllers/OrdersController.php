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

    //lọc đơn hàng filter
    public function filterOrder(Request $request)
    {
        $arr = array('tbody' => '', 'footer' => '');
        $count = 0;

        if ($request->input('status') == 'Tổng') {
            $query = DB::table('orders')->skip(0)->take(15)->get();
            $count = DB::table('orders')->count();
        } else {
            $query = DB::table('orders')->where('status', $request->input('status'))->skip(0)->take(15)->get();
            $count = DB::table('orders')->where('status', $request->input('status'))->count();
        }
  
        $i = 0;
        foreach ($query as $key => $value) {
            $arr['tbody'] .= '<tr>
            <th scope="row">' . (++$i) . '</th>
            <td>' . $value->id . '</td>
            <td>' . date_format(date_create($value->date),"d/m/Y H:i:s"). '</td>
            <td>' . number_format($value->total_money) . '</td>
            <td><span>' . $value->status . '</span></td>
            <td>';
            if($value->status=='Chờ xác nhận'){
                $arr['tbody'] .= '
                <button class="bi bi-check-circle-fill text-success"
                    onclick="updateOrder(' . $value->id . ', `Đã xác nhận`, this.parentElement.parentElement)">
                </button>
                <button class="bi bi-x-lg text-danger"
                    onclick="updateOrder(' . $value->id . ', `Đã hủy`, this.parentElement.parentElement)">
                </button>
                <button class="bi bi-exclamation-circle-fill text-primary"></button>';
            }else if($value->status=='Đã xác nhận' || $value->status=='Đã hủy'){
                $arr['tbody'] .=' <button class="bi bi-exclamation-circle-fill text-primary"></button>';
            }
            $arr['tbody'] .=
            '</td>
        </tr>';
        }
        for ($i = 0; $i < ceil($count / 15); $i++) {
            if($i==0){
                $arr['footer'] .=  '<li class="page-item"><a class="page-link active" onclick="phantrang(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
            }else $arr['footer'] .=  '<li class="page-item"><a class="page-link" onclick="phantrang(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
        }
        return response($arr, 200);
    }

    //lọc đơn hàng bang ma
    public function searchOrder(Request $request)
    {
        $count = 0;
        $i = 0;
        $arr = array('tbody' => '', 'footer' => '');
        if ($request->input('search')!=null) {
            $query = DB::table('orders')->where('id', $request->input('search'))->get();
            $count = DB::table('orders')->where('id', $request->input('search'))->count();
        } else {
            if($request->input('status')=='Tổng'){
                $query = DB::table('orders')->skip(0)->take(15)->get();
                $count=DB::table('orders')->count();
            }else {
                $query = DB::table('orders')->where('status', $request->input('status'))->skip(0)->take(15)->get();
                $count=DB::table('orders')->where('status', $request->input('status'))->count();
            }
        }

        foreach ($query as $key => $value) {
            $arr['tbody'] .= '<tr>
            <th scope="row">' . (++$i) . '</th>
            <td>' . $value->id . '</td>
            <td>' . date_format(date_create($value->date),"d/m/Y H:i:s"). '</td>
            <td>' . number_format($value->total_money) . '</td>
            <td><span>' . $value->status . '</span></td>
            <td>';
            if($value->status=='Chờ xác nhận'){
                $arr['tbody'] .= '
                <button class="bi bi-check-circle-fill text-success"
                    onclick="updateOrder(' . $value->id . ', `Đã xác nhận`, this.parentElement.parentElement)">
                </button>
                <button class="bi bi-x-lg text-danger"
                    onclick="updateOrder(' . $value->id . ', `Đã hủy`, this.parentElement.parentElement)">
                </button>
                <button class="bi bi-exclamation-circle-fill text-primary"></button>';
            }else if($value->status=='Đã xác nhận' || $value->status=='Đã hủy'){
                $arr['tbody'] .=' <button class="bi bi-exclamation-circle-fill text-primary"></button>';
            }
            $arr['tbody'] .=
            '</td>
        </tr>';
        }
        for ($i = 0; $i < ceil($count / 15); $i++) {
            if($i==0){
                $arr['footer'] .=  '<li class="page-item"><a class="page-link active">' . ($i + 1) . '</a></li>';
            }else $arr['footer'] .=  '<li class="page-item"><a class="page-link" onclick="phantrang(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
        }
        return response($arr, 200);
    }

    public function OrdersPagination(Request $request)
    {
        // return response($request->input('page'), 200);
        // die();
        $count = 0;

        $arr = array('tbody' => '', 'footer' => '');

        if($request->input('status')=='Tổng'){
            $query = DB::table('orders')->skip(15*($request->input('page')-1))->take(15)->get();
            $count=DB::table('orders')->count();
        }else {
            $query = DB::table('orders')->where('status', $request->input('status'))->skip(15*($request->input('page')-1))->take(15)->get();
            $count=DB::table('orders')->where('status', $request->input('status'))->count();
        }
      
        $i = 0;
        foreach ($query as $key => $value) {
            $arr['tbody'] .= '<tr>
            <th scope="row">' . (++$i) . '</th>
            <td>' . $value->id . '</td>
            <td>' . date_format(date_create($value->date),"d/m/Y H:i:s"). '</td>
            <td>' . number_format($value->total_money) . '</td>
            <td><span>' . $value->status . '</span></td>
            <td>';
            if($value->status=='Chờ xác nhận'){
                $arr['tbody'] .= '
                <button class="bi bi-check-circle-fill text-success"
                    onclick="updateOrder(' . $value->id . ', `Đã xác nhận`, this.parentElement.parentElement)">
                </button>
                <button class="bi bi-x-lg text-danger"
                    onclick="updateOrder(' . $value->id . ', `Đã hủy`, this.parentElement.parentElement)">
                </button>
                <button class="bi bi-exclamation-circle-fill text-primary"></button>';
            }else if($value->status=='Đã xác nhận' || $value->status=='Đã hủy'){
                $arr['tbody'] .=' <button class="bi bi-exclamation-circle-fill text-primary"></button>';
            }
            $arr['tbody'] .=
            '</td>
        </tr>';
        }
        for ($i = 0; $i < ceil($count / 15); $i++) {
            if($request->input('page')-1==$i){
                $arr['footer'] .=  '<li class="page-item"><a class="page-link active">' . ($i + 1) . '</a></li>';
            }else $arr['footer'] .=  '<li class="page-item"><a class="page-link" onclick="phantrang(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
            
        }
        return response($arr, 200);
    }
}
