<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function searchedShop(Request $request)
    {
        $query = $request->all();
        $winedetail = DB::table('wines')->where('name', 'LIKE', '%' . $query['search_name'] . '%')->get();
        return response($winedetail, 200);
    }

    public function filteredShop(Request $request)
    {
        $query = $request->all();
      
        $checkbox = explode(",", $query['search_filter']);

        $table = DB::table('wines');

        $i = 0;
        foreach ($checkbox as $c) {
            if ($i == 0) {
                $table = $table->where('category', 'LIKE', '%' . $c . '%');
                $i++;
            } else {
                $table = $table->orWhere('category', 'LIKE', '%' . $c . '%');
                $i++;
            }

            if($i==3){
                $table = $table->where('country', $c);
            }
        }

        return response($table->get(), 200);
    }
}
