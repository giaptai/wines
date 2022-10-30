<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Account;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class AccountsController extends Controller
{
    public function index($page)
    {
        $respon = Http::get('http://127.0.0.1:8001/api/v1/customers?page=' . $page);
        $customerArr = $respon['data'];
        $pagin = $respon['meta']['total'];
        $currentpage = $respon['meta']['current_page'];
        return response(view('dynamic_layout.tableclient', compact('customerArr', 'pagin', 'currentpage')), 200);
    }

    public function show(Request $request)
    {
        if ($request->input('email') == NULL && $request->input('phone') == NULL) {
            return $this->index(1);
        } else if ($request->input('email') != NULL && $request->input('phone') == NULL) {
            $respon = Http::get('http://127.0.0.1:8001/api/v1/customers?email[like]=' . $request->input('email'));
        } else if ($request->input('email') == NULL && $request->input('phone') != NULL) {
            $respon = Http::get('http://127.0.0.1:8001/api/v1/customers?phone[eq]=' . $request->input('phone'));
        } else {
            $respon = Http::get('http://127.0.0.1:8001/api/v1/customers?email[like]=' . $request->input('email') . '&phone[eq]=' . $request->input('phone'));
        }
        $customerArr = $respon['data'];
        $pagin = $respon['meta']['total'];
        $currentpage = $respon['meta']['current_page'];
        return response(view('dynamic_layout.tableclient', compact('customerArr', 'pagin', 'currentpage')), 200);
    }

    // đăng ký tài khoản
    public function store(Request $request)
    {
        $respon = Http::withToken($request->input('_token'))
            ->post(
                'http://127.0.0.1:8001/api/v1/register',
                [
                    "firstname" => $request->input('firstname'),
                    "lastname" => $request->input('lastname'),
                    "email" => $request->input('email'),
                    "password" => $request->input('password'),
                    "c_password" => $request->input('password'),
                ]
            );
        $emailok = $request->input('email'); //email cần gửi
        // return ($respon);
        // {
        //     "status":true,
        //     "message":"Create user successfully!",
        //     "data":
        //     {
        //         "token":"6|1vZDGm1N24jDVYqVfnozuP1mTwA3FissXrWONqnZ",
        //         "user":
        //         {
        //             "firstname":"Th\u01b0",
        //             "lastname":"Nguy\u00ea\u0303n Thi\u0323 Hoa\u0300ng",
        //             "email":"thucute@gmail.com",
        //             "updated_at":"2022-10-29T15:06:01.000000Z",
        //             "created_at":"2022-10-29T15:06:01.000000Z",
        //             "id":7
        //         }
        //     }
        // }
        // return ve view dang nhap 
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

    public function update(Request $request, $id)
    {
        $Account = Account::findOrFail($id);
        $Account->update($request->all());

        return $Account;
    }

    public function delete(Request $request, $id)
    {
        $Account = Account::findOrFail($id);
        $Account->delete();

        return 204;
    }

    public function pagination($page)
    {
        return $this->index($page);
    }
}
