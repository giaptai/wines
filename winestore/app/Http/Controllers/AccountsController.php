<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Account;

use Illuminate\Support\Facades\Cookie;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class AccountsController extends Controller
{
    //trả về view
    public function accountView($url)
    {
        // return 'http://127.0.0.1:8001/api/v1/customers' . $url;
        $linkAPI = Http::withToken(session('tokenAdmin'))->get('http://127.0.0.1:8001/api/v1/customers' . $url);
        return (view('dynamic_layout.tableaccount', ['Customers' => $linkAPI])->render());
    }

    //tìm kiếm theo email, số điện thoại
    public function searchAccount(Request $request)
    {
        // return $request->all();
        if ($request->input('email') == NULL && $request->input('phone') == NULL) {
            $url = '?page=' . $request->input('page');
        } else if ($request->input('email') != NULL && $request->input('phone') == NULL) {
            $url = '?email[eq]=' . $request->input('email') . '&page=' . $request->input('page');
        } else if ($request->input('email') == NULL && $request->input('phone') != NULL) {
            $url = '?phone[eq]=' . $request->input('phone') . '&page=' . $request->input('page');
        } else {
            $url = '?email[eq]=' . $request->input('email') . '&phone[eq]=' . $request->input('phone') . '&page=' . $request->input('page');
        }
        // return $url;
        return $this->accountView($url);
    }

    //phân trang
    public function pagination(Request $request)
    {
        // return $request->all();
        if ($request->input('email') == NULL && $request->input('phone') == NULL) {
            $url = '?page=' . $request->input('page');
        } else if ($request->input('email') != NULL && $request->input('phone') == NULL) {
            $url = '?email[eq]=' . $request->input('email') . '&page=' . $request->input('page');
        } else if ($request->input('email') == NULL && $request->input('phone') != NULL) {
            $url = '?phone[eq]=' . $request->input('phone') . '&page=' . $request->input('page');
        } else {
            $url = '?email[eq]=' . $request->input('email') . '&phone[eq]=' . $request->input('phone') . '&page=' . $request->input('page');
        }
        // return $url;
        return $this->accountView($url);
    }
}
