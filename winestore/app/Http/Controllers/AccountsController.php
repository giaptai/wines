<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountsController extends Controller
{
    public function updateAccount(Request $request)
    {
        $arr = $request->all();
        // return response($arr, 200);
        // die();
        $query = DB::table('account')->where('email','LIKE','%'.$arr['email'].'%')->where('phone','=', $arr['phone'])->get();
        return response($query, 200);
    
    }
}
