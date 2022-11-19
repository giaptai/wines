<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Cookies;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

    //trang quản lý đơn hàng
    public function MyPassword()
    {
        return view('page/matkhaucanhan');
    }

    //trang quản lý chi tiết đơn hàng
    public function MyOrderDetails($id)
    {
        $OrderDetails = Http::withToken(session('tokenUser'))->get('http://127.0.0.1:8001/api/v1/orders/' . $id);
        // return $OrderDetails;
        return view('layout/order_detail', ['OrderDetails' => $OrderDetails]);
    }

    // đăng xuất tài khoản
    public function logoutAcc()
    {
        if (session()->has('tokenUser')) {
            Http::withToken(session('tokenUser'))->post('http://127.0.0.1:8001/api/v1/logout');
            session()->forget(['UserID', 'tokenUser', 'UserEmail']);
        }
        return view('page/logger');
    }

    // đăng nhập tài khoản
    public function loginAcc(Request $request)
    {
        // return $request->all();
        $respon = Http::withToken($request->input('_token')) //token khi kèm khi ta tạo @csrf
            ->post(
                'http://127.0.0.1:8001/api/v1/login',
                [
                    "email" => $request->input('emaillogin'),
                    "password" =>  $request->input('passlogin'),
                ]
            );
        // return $respon;
        if ($respon['status']) {
            if ($request->input('loginadmin') == 'loginadmin') {
                $request->session()->put('tokenAdmin', $respon['token']);
                return  redirect('admin/statistic');
            } else {
                // Cookie::queue('UserID', $respon['token'][0]['user_id'], 60);
                $request->session()->put('UserID', $respon['data'][0]['id']);
                $request->session()->put('tokenUser', $respon['token']);
                return redirect('home');
            }
        } else echo $respon['message'];
    }

    // đăng ký tài khoản
    public function signUpAcc(Request $request)
    {
        // return $request;
        $respon = Http::withToken($request->input('_token'))
            ->post(
                'http://127.0.0.1:8001/api/v1/register',
                [
                    "firstname" => $request->input('firstname'),
                    "lastname" => $request->input('lastname'),
                    "email" => $request->input('email'),
                    "phone" => $request->input('phone'),
                    "password" => $request->input('password'),
                    "c_password" => $request->input('password'),
                ]
            );
        $emailok = $request->input('email'); //email cần gửi
        Mail::send(
            "email.template",
            [
                'token' => Str::random(42),
                'email' => $request->input('email'),
                'name' => $request->input('lastname') . ' ' . $request->input('firstname')
            ],
            function ($email) use ($emailok) {
                $email->subject('ĐĂNG KÝ THÀNH CÔNG');
                $email->to($emailok, "xxxx");
            }
        );
        return $respon;
    }

    // đổi mật khẩu
    public function changePassword(Request $request)
    {
        // return $request;
        // $clientemail = $request->input('email');
        // $res = Mail::send(
        //     "email.template",
        //     [
        //         'token' => Str::random(16),
        //         'email' => $request->input('email'),
        //         'title' => 'Đổi mật khẩu',
        //     ],
        //     function ($email) use ($clientemail) {
        //         $email->subject('XÁC NHẬN ĐỔI MẬT KHẨU');
        //         $email->to($clientemail, "xxxx");
        //     }
        // );
        $respon = Http::withToken(session('tokenUser'))
            ->post(
                'http://127.0.0.1:8001/api/v1/change-password',
                [
                    "email" => $request->input('email'),
                    "password" => $request->input('oldpass'),
                    "new_password" => $request->input('newpass'),
                    "c_password" => $request->input('newpass'),
                ]
            );

        // return $respon;
        if ($respon['status'] == true) {
            return response()->json([
                'status' => true,
                'message' => 'Đổi mật khẩu thành công !'
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Đổi mật khẩu thất bại !'
            ], 200);
        }
    }

    // public function getClientView($action, $query, $page)
    // {
    //     if (session()->exists('UserEmail')) {
    //         $getId = Http::get('http://127.0.0.1:8001/api/v1/customers?email[eq]=' . session('UserEmail'))['data'][0];
    //         $strQuery = 'http://127.0.0.1:8001/api/v1/orders?customerId[eq]=' . $getId['user_id'] . ''; // lấy mặc định
    //     }

    //     $page = ($page == NULL ? 1 : $page);
    //     switch ($action) {
    //         case 'filter':
    //             if ($query == -1) {
    //                 $respon = Http::get($strQuery);
    //             } else {
    //                 $respon = Http::get($strQuery . '&status[eq]=' . $query . '&page=' . $page);
    //             }
    //             $orderclientArray = $respon['data'];
    //             break;

    //         case 'search':
    //             if (isset($query)) {
    //                 $respon = Http::get($strQuery . '/' . $query);
    //                 if (isset($respon['data'])) {
    //                     $orderclientArray = $respon['data'];
    //                 } else $orderclientArray = $respon;
    //             } else {
    //                 $respon = Http::get($strQuery);
    //                 $orderclientArray = $respon['data'];
    //             }
    //             break;

    //         default:
    //             $respon = Http::get($strQuery);
    //             $orderclientArray = $respon['data'];
    //             break;
    //     }
    //     $pagin = (!isset($respon['total']) ? 0 : $respon['total']);
    //     $currentpage = $page;
    //     return response(view('dynamic_layout.tableorderclient', compact('orderclientArray', 'pagin', 'currentpage')), 200);
    // }

    public function getClientView($url)
    {
        $linkAPI = Http::withToken(session('tokenUser'))->get('http://127.0.0.1:8001/api/v1/orders?customerId[eq]=' . session('UserID') . $url);
        return (view('dynamic_layout.tableorderclient', ['OrderClient' => $linkAPI])->render());
    }
    // thêm 1 địa chỉ mới
    public function addAddress(Request $request)
    {
        // return $request->all();
        $getUser = Http::withToken(session('tokenUser'))->get('http://127.0.0.1:8001/api/v1/customers?email[eq]=' . session('UserEmail'))['data'][0];

        $respon = Http::withToken(session('tokenUser'))
            ->post(
                'http://127.0.0.1:8001/api/v1/customers/' . $getUser['user_id'],
                [
                    "firstname" => $request->input('firstname'),
                    "lastname" => $request->input('lastname'),
                    "phone" => $request->input('phone'),
                    "email" => session('UserEmail'),
                    "city" => $request->input('city'),
                    "districts" => $request->input('districts'),
                    "ward" => $request->input('ward'),
                    "address" => $request->input('address'),
                    "type" => 0
                ]
            );
        return $respon;
    }

    // lọc loại đơn hàng
    public function filterOrderClient(Request $request)
    {
        // return $request->all();
        $url = $request->input('status') != -1 ? '&status[eq]=' . $request->input('status') . '&page=1' : '&page=1';
        // return $url;
        return $this->getClientView($url);
    }

    // tìm kiếm mã đơn hàng của khách hàng
    public function searchOrderClient(Request $request)
    {
        // return $request->input('id');
        $url = '&id[eq]=' . $request->input('id');
        // return $url;
        return $this->getClientView($url);
    }

    // phân trang
    public function pagination(Request $request)
    {
        // return $request->all();
        $url = $request->input('status') != -1 ? '&status[eq]=' . $request->input('status') . '&page=' . $request->input('page') : '&page=' . $request->input('page');
        // return $url;
        return $this->getClientView($url);
    }


    //cập nhật trạng thái thông tin cá nhân
    public function updateClient(Request $request, $id)
    {
        $respon = Http::withToken(session('tokenUser'))
            ->patch(
                'http://127.0.0.1:8001/api/v1/customers/'.$id,
                [
                    "firstname" => $request->input('firstname'),
                    "lastname" =>  $request->input('lastname'),
                    "phone" => $request->input('phone'),
                    "email" => $request->input('email'),
                    "city" => 'Không',
                    "district"=>'Không',
                    "wards"=>'Không',
                    "address" => 'Không',
                ]
            );
            // return $respon;
        if ($respon['status'] == true) {
            return response()->json([
                'status' => true,
                'message' => 'Đổi thông tin cá nhân thành công !'
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Đổi thông tin cá nhân thất bại !'
            ], 200);
        }
    }
}
