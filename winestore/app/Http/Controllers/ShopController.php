<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ShopController extends Controller
{
    public function shopView($url)
    {
        // return 'http://localhost:8001/api/v1/products?' . $url;
        $Wines = Http::get('http://localhost:8001/api/v1/products?' . $url);
        return response(view('dynamic_layout.tableshop', compact('Wines')), 200);
    }

    public function searchedShop(Request $request)
    {
        // $Wines = Http::get('http://localhost:8001/api/v1/products?name[like]=' . $request->input('qrname'));
        // $url='name[like]=' . $request->input('qrname');
        // return view('dynamic_layout.tableshop', compact('Wines'));
        // return view('page.cuahang', compact('Wines'));
        return redirect('shop?qrname='.$request->input('qrname'));
    }

    public function FilterShop(Request $request)
    {
        $collection = $request->input('arr') == NULL ?  '' : '[' . $request->input('arr') . ']';                            // category
        $collection2 = $request->input('arr2') == NULL ?  '' : '[' . $request->input('arr2') . ']';                         //country
        $collection3 = $request->input('arr3') == NULL ? '' : '[' . $request->input('arr3') . ']';                          //brand
        $collection4 = '[' . str_replace("-", ",", $request->input('arr4')) . ']';                                          //tone
        $firstprice = $request->input('firstprice') == NULL ? 0 : $request->input('firstprice');                        //first-price
        $lastprice = $request->input('lastprice') == NULL ? 9999999999 : $request->input('lastprice');                  //first-price
        $price = '[' . $firstprice . ',' . $lastprice . ']';
        $page = $request->input('page') == NULL ? 1 : $request->input('page');                                          //page
        $dispose = $request->input('dispose') == NULL ? 'ASC' : $request->input('dispose');                             //ASC - DESC

        $url = 'cateId[in]=' . $collection . '&originId[in]=' . $collection2 . '&brandId[in]=' . $collection3 . '&price[between]=' . $price . '&c[between]=' . $collection4 . '&price[sort]=' . $dispose . '&page=' . $page . '';
        // return $url;
        return $this->shopView($url);
    }
}
