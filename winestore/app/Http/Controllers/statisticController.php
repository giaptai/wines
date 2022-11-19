<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class statisticController extends Controller
{
    public function Statistic(){
        $staticOrders=Http::withToken(session('tokenAdmin'))->get('http://127.0.0.1:8001/api/v1/statistic?year=2022');
        return response($staticOrders, 200);
    }
}
