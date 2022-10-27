<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Country;
use App\Models\Brand;

class ShopController extends Controller
{
    public function searchedShop(Request $request)
    {
        return response(null, 200);
    }

    public function FilterShop(Request $request)
    {
        $collection = $request->input('arr') == NULL ?  '' : explode(",", $request->input('arr'));     // category
        $collection2 = $request->input('arr2') == NULL ?  '' : explode(",", $request->input('arr2'));   //country
        $collection3 = $request->input('arr3') == NULL ? '' : explode(",", $request->input('arr3'));      //brand
        $collection4 = explode("-", $request->input('arr4'));                                                           //tone
        $firstprice = $request->input('firstprice') == NULL ? 0 : $request->input('firstprice');                        //first-price
        $lastprice = $request->input('lastprice') == NULL ? 9999999999 : $request->input('lastprice');                  //first-price
        $page = $request->input('page') == NULL ? 1 : $request->input('page');                                          //page
        $dispose = $request->input('dispose') == NULL ? 'ASC' : $request->input('dispose');                             //ASC - DESC

        // $result = DB::table('products')
        //     ->whereIn('category', $collection)
        //     ->whereIn('country', $collection2)
        //     ->whereIn('brand', $collection3)
        //     ->whereBetween('tone', $collection4)
        //     ->whereBetween('price', [$firstprice, $lastprice])
        //     ->orderBy('price', $dispose);
 
        // $paginate=$result->count();
        // $wineArray=$result->skip(($page-1)*10)->take(10)->get();
        return $collection;
        return response(view('dynamic_layout.tableshop', compact('wineArray','paginate', 'page', 'dispose')), 200);
    }
}
