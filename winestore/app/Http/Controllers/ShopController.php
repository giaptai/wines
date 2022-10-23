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
        $collection = $request->input('arr') == NULL ?  Category::get('id') : explode(",", $request->input('arr'));     // category
        $collection2 = $request->input('arr2') == NULL ?  Country::get('id') : explode(",", $request->input('arr2'));   //country
        $collection3 = $request->input('arr3') == NULL ? Brand::get('id') : explode(",", $request->input('arr3'));      //brand
        $collection4 = explode("-", $request->input('arr4'));                                                           //tone
        $firstprice = $request->input('firstprice') == NULL ? 0 : $request->input('firstprice');                        //first-price
        $lastprice = $request->input('lastprice') == NULL ? 9999999999 : $request->input('lastprice');                  //first-price
        $page = $request->input('page') == NULL ? 1 : $request->input('page');                                          //page
        $dispose = $request->input('dispose') == NULL ? 'ASC' : $request->input('dispose');                             //ASC - DESC
        
        //lấy dữ liệu xong chuyển thành innerHTML để gửi lại
        // $arr = array('showproduct' => '', 'pagin' => '', 'soluong' => 0);

        $result = DB::table('products')
            ->whereIn('category', $collection)
            ->whereIn('country', $collection2)
            ->whereIn('brand', $collection3)
            ->whereBetween('tone', $collection4)
            ->whereBetween('price', [$firstprice, $lastprice])
            ->orderBy('price', $dispose);
        // ->skip(0)->take(12)->get();

        // $result1=$result->skip(0)->take(12)->get();
        // $result2=$result->count();

        // if ($result->count() > 0) {
        // $arr['soluong']=$result->count();
        $paginate=$result->count();
        $wineArray=$result->skip(($page-1)*12)->take(12)->get();
        // for ($i = 0; $i < ceil(($result->count()) / 12); $i++) {
        //     if ($i == ($page-1)) {
        //         $arr['pagin'] .= '<li class="page-item"><a class="page-link active">' . ($i + 1) . '</a></li>';
        //     } else {
        //         $arr['pagin'] .= '<li class="page-item"><a class="page-link" onclick="phantrang(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
        //     }
        // }
        // foreach ($result->skip(($page-1)*12)->take(12)->get() as $value) {
        //     $arr['showproduct'] .=
        //         '<div class="col">
        //                 <div class="card h-100 rounded-0" style="">
        //                     <div class="row g-0">
        //                         <div class="col-md-4 col-sm-12">
        //                             <a href="/shop/details/' . $value->id . '">
        //                                 <div class="m-2"
        //                                     style="height: 120px; width: 90px;background-image: url(' . $value->image . '); background-size:contain;background-repeat: no-repeat;background-position: center;">
        //                                 </div>
        //                             </a>
        //                         </div>
        //                         <div class="col-md-8 col-sm-12">
        //                             <div class="card-body">
        //                                 <h5 class="card-title">' . $value->name . '</h5>
        //                                 <span class="fs-5"> ' . number_format($value->price) . ' đ</span>
        //                             </div>
        //                             <div class="card-footer bg-white border-0">';
        //                             if (session()->exists('cart.' . $value->id)) {
        //                                 $arr['showproduct'] .= '<button type="button" class="btn disabled btn-sm btn-primary">Trong giỏ hàng</button>';
        //                             } else {
        //                                 $arr['showproduct'] .= '
        //                                     <button type="button" onclick="addtocart(' . $value->id . ', this)"
        //                                         class="btn btn-sm btn-outline-primary" id="btn' . $value->id . '">Thêm vào
        //                                         giỏ</button>';
        //                             }
        //                             $arr['showproduct'] .= '
        //                                         </div>
        //                                     </div>
        //                                 </div>
        //                             </div>
        //                         </div>';
        // }

        // }
        // else {
        //     echo 'Có 0 sản phẩm !';
        //     die();
        // }
        return response(view('dynamic_layout.tableshop', compact('wineArray','paginate', 'page', 'dispose')), 200);
    }
}
