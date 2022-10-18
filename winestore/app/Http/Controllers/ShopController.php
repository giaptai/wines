<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function searchedShop(Request $request)
    {
        $query = $request->all();

        $arr = array('arr1' => '', 'arr2' => '', 'soluong' => 0);
        // if ($request->input('search_name') != null) {
        $winedetail = DB::table('wines')->where('name', 'LIKE', '%' . $request->input('search_name') . '%')->skip(($request->input('page') - 1) * 12)->take(12)->get();
        $count = DB::table('wines')->where('name', 'LIKE', '%' . $request->input('search_name')  . '%')->count();
        // }else {
        // $winedetail = DB::table('wines')->skip(($request->input('page') - 1) * 10)->take(10)->get();
        // $count = DB::table('wines')->count();
        // }
        $arr['soluong'] = $count;
        // if ($count > 0) {
        foreach ($winedetail as $value) {
            $arr['arr1'] .= '<div class="col">
    <div class="card h-100 rounded-0" style="">
        <div class="row g-0">
            <div class="col-md-4 col-sm-12">
                <a href="/shop/details/' . $value->id . '">
                    <div class="m-2"
                        style="height: 120px; width: 90px;background-image: url(' . $value->image . '); background-size:contain;background-repeat: no-repeat;background-position: center;">
                    </div>
                </a>
    
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="card-body">
                    <h5 class="card-title">' . $value->name . '</h5>
                    <p class="card-text"><small>' . $value->country . ', ' . $value->category . ', ' . $value->tone . '%,
                            ' . $value->year . '</small>
                    </p>
                    <span class="fs-5"> ' . number_format($value->price) . ' đ</span>
                </div>
                <div class="card-footer bg-white">';

            if (session()->exists('cart.' . $value->id)) {
                $arr['arr1'] .= '<button type="button" class="btn disabled btn-sm btn-primary">Trong giỏ hàng</button>';
            } else {
                $arr['arr1'] .= '
                    <button type="button" onclick="addtocart(' . $value->id . ', this)"
                        class="btn btn-sm btn-outline-primary" id="liveToastBtn">Thêm vào
                        giỏ</button>';
            }
            $arr['arr1'] .= '
                </div>
            </div>
        </div>
    </div>
    </div>';
        }
        // }
        // $arr['arr1'] = 'Không tìm thấy sản phẩm phù hợp !';

        return response($arr, 200);
    }

    public function filteredShop(Request $request)
    {

        $checkbox = ($request->input('search_checkbox') == '' ? array('Vang trắng', 'Vang đỏ', 'Vang ngọt') : explode(",", $request->input('search_checkbox')));

        $country = ($request->input('search_country') == '' ? array('Pháp', 'Ý', 'Chile') : explode(",", $request->input('search_country')));

        $brand = ($request->input('search_brand') == '' ? array('Gruaud-Larose', 'Lucente', 'Concha Y Toro', 'Urbina') : explode(",", $request->input('search_brand')));

        $tone = explode("-", $request->input('search_tone'));

        $firstprice = ($request->input('first_price') == '' ? 0 : $request->input('first_price'));
        $lastprice = ($request->input('last_price') == '' ? 999999999 : $request->input('last_price'));

        $arr = array('arr1' => '', 'arr2' => '', 'soluong' => 0);
        $table = DB::table('wines')->whereIn('category', $checkbox)
            ->whereIn('country', $country)
            ->whereIn('brand', $brand)
            ->whereBetween('tone', [$tone[0], $tone[1]])
            ->whereBetween('price', [$firstprice, $lastprice])
            ->skip(($request->input('page') - 1) * 12)->take(12)->get();

        $arr['soluong'] = DB::table('wines')->whereIn('category', $checkbox)
            ->whereIn('country', $country)
            ->whereIn('brand', $brand)
            ->whereBetween('price', [$firstprice, $lastprice])
            ->whereBetween('tone', [$tone[0], $tone[1]])->count();

        if ($arr['soluong'] > 0) {

            foreach ($table as $value) {
                $arr['arr1'] .= '<div class="col">
<div class="card h-100 rounded-0" style="">
    <div class="row g-0">
        <div class="col-md-4 col-sm-12">
            <a href="/shop/details/' . $value->id . '">
                <div class="m-2"
                    style="height: 120px; width: 90px;background-image: url(' . $value->image . '); background-size:contain;background-repeat: no-repeat;background-position: center;">
                </div>
            </a>

        </div>
        <div class="col-md-8 col-sm-12">
            <div class="card-body">
                <h5 class="card-title">' . $value->name . '</h5>
                <p class="card-text"><small>' . $value->country . ', ' . $value->category . ', ' . $value->tone . '%,
                        ' . $value->year . '</small>
                </p>
                <span class="fs-5"> ' . number_format($value->price) . ' đ</span>
            </div>
            <div class="card-footer bg-white">';

                if (session()->exists('cart.' . $value->id)) {
                    $arr['arr1'] .= '<button type="button" class="btn disabled btn-sm btn-primary">Trong giỏ hàng</button>';
                } else {
                    $arr['arr1'] .= '
                <button type="button" onclick="addtocart(' . $value->id . ', this)"
                    class="btn btn-sm btn-outline-primary" id="liveToastBtn">Thêm vào
                    giỏ</button>';
                }
                $arr['arr1'] .= '
            </div>
        </div>
    </div>
</div>
</div>';
            }
        } else $arr['arr1'] .= 'Không tìm thấy !';
        return response($arr, 200);
    }
}
