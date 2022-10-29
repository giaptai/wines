<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ShopController extends Controller
{
    public function searchedShop(Request $request)
    {
        return response(null, 200);
    }

    public function FilterShop(Request $request)
    {
        $collection = $request->input('arr') == NULL ?  '' : '['.$request->input('arr').']';     // category
        $collection2 = $request->input('arr2') == NULL ?  '' : '['.$request->input('arr2').']';   //country
        $collection3 = $request->input('arr3') == NULL ? '' : '['.$request->input('arr3').']';      //brand
        $collection4 = '['.str_replace("-",",", $request->input('arr4')).']' ;                                                           //tone
        $firstprice = $request->input('firstprice') == NULL ? 0 : $request->input('firstprice');                        //first-price
        $lastprice = $request->input('lastprice') == NULL ? 9999999999 : $request->input('lastprice');                  //first-price
        $price='['.$firstprice.','.$lastprice.']';
        $page = $request->input('page') == NULL ? 1 : $request->input('page');                                          //page
        $dispose = $request->input('dispose') == NULL ? 'ASC' : $request->input('dispose');                             //ASC - DESC

        $respon = Http::get('http://localhost:8001/api/v1/products?cateId[in]='.$collection.'&originId[in]='.$collection2.'&brandId[in]='.$collection3.'&price[between]='.$price.'&c[between]='.$collection4.'&price[sort]='.$dispose.'&page='.$page.'');
        // return 'http://localhost:8001/api/v1/products?cateId[in]='.$collection.'&originId[in]='.$collection2.'&brandId[in]='.$collection3.'&price[between]='.$price.'&c[between]='.$collection4.'';
        // $result = DB::table('products')
        //     ->whereIn('category', $collection)
        //     ->whereIn('country', $collection2)
        //     ->whereIn('brand', $collection3)
        //     ->whereBetween('tone', $collection4)
        //     ->whereBetween('price', [$firstprice, $lastprice])
        //     ->orderBy('price', $dispose);
 
        // $paginate=$result->count();
        $wineArray=$respon['data'];
        $currentpage=$page;
        $paginate=$respon['meta']['total'];

        return response(view('dynamic_layout.tableshop', compact('wineArray','paginate', 'currentpage', 'dispose')), 200);
    }
}
