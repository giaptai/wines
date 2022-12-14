<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
    public function getDistric(Request $request){
        //lấy quận huyện
        $respon=Http::get('https://provinces.open-api.vn/api/p/'.$request->input('id').'?depth=2');
        return response($respon['districts'], 200);
    }

    public function getBlock(Request $request){
        //lấy phường xã
        $respon=Http::get('https://provinces.open-api.vn/api/d/'.$request->input('id').'?depth=2');
        return response($respon['wards'], 200);
    }
}
