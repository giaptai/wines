<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Country;
use Illuminate\Support\Facades\Http;

class ProductsController extends Controller
{

    public function index($page)
    {
        $respon = Http::get('http://127.0.0.1:8001/api/v1/products?page=' . $page);
        $pagin = $respon['meta']['total'];
        $currentpage = ($pagin>=10 ? $page: $page-1);
        $productArray = $respon['data'];
        $countryArray = Http::get('http://127.0.0.1:8001/api/v1/origins')['data'];
        $categoryArray = Http::get('http://127.0.0.1:8001/api/v1/categories')['data'];
        $brandArray = Http::get('http://127.0.0.1:8001/api/v1/brands')['data'];
        
        return view('dynamic_layout.tableproduct', compact('currentpage', 'productArray', 'pagin', 'countryArray',  'categoryArray', 'brandArray'));
    }

    public function show(Request $request)
    {
        // 'id' => ['eq']---'name' => ['like']
        if ($request->input('name') == NULL && $request->input('id') == NULL) {
            return $this->index(1);
        } else if ($request->input('name') != NULL && $request->input('id') == NULL) {
            $respon = Http::get('http://127.0.0.1:8001/api/v1/products?name[like]=' . $request->input('name'));
        } else if ($request->input('name') == NULL && $request->input('id') != NULL) {
            $respon = Http::get('http://127.0.0.1:8001/api/v1/products?id[eq]=' . $request->input('id'));
        } else {
            $respon = Http::get('http://127.0.0.1:8001/api/v1/products?name[like]=' . $request->input('name') . '&id[eq]=' . $request->input('id'));
        }

        $productArray = $respon['data'];
        $countryArray = Http::get('http://127.0.0.1:8001/api/v1/origins')['data'];
        $categoryArray = Http::get('http://127.0.0.1:8001/api/v1/categories')['data'];
        $brandArray = Http::get('http://127.0.0.1:8001/api/v1/brands')['data'];

        $pagin = $respon['meta']['total'];
        $currentpage = $respon['meta']['current_page'];;
        return response(view('dynamic_layout.tableproduct', compact('currentpage', 'productArray', 'pagin', 'countryArray',  'categoryArray', 'brandArray',)), 200);
    }

    public function store(Request $request)
    {
        // return response($request->all(), 200);
        $respon = Http::withToken($request->input('_token'))->post(
            'http://127.0.0.1:8001/api/v1/products',
            // để theo thứ tự
            // "_token": "nkiEEEI5OIrWKrfibSwMIfhiNYNLXRg9ULznfPae",
            // "iptIMG": "288632185_755916338754725_6516556910628993021_n.jpg",
            // "name-product": "2kuHLjEZJzj5KeK",
            // "intro-product": "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.",
            // "category-product": "1",
            // "brand-product": "1",
            // "country-product": "1",
            // "number-product": "36",
            // "vol-product": "1446",
            // "tone-product": "6",
            // "year-product": "2022",
            // "price-product": "702929"
            [
                "name" => $request->input('name-product'),
                "description" => $request->input('intro-product'),
                "images" => $request->input('iptIMG'),
                "quantity" => $request->input('number-product'),
                "vol" => $request->input('vol-product'),
                "c" => $request->input('tone-product'),
                "brand_id" => $request->input('brand-product'),
                "category_id" => $request->input('category-product'),
                "origin_id" => $request->input('country-product'),
                "price" => $request->input('price-product'),
                "year" => $request->input('year-product'),
            ]
            // $request->all()
        );
        return response($respon['message']);
    }

    public function update(Request $request, $id)
    {

        $respon = Http::withToken($request->header('X-CSRF-TOKEN'))->put(
            'http://127.0.0.1:8001/api/v1/products/' . $id,
            // để theo thứ tự
            // [
            //     "name" => $request->input('name'),
            //     "description" => $request->input('description'),
            //     "images" => $request->input('image'),
            //     "quantity" => 2,
            //     "vol" => 700,
            //     "c" => 15,
            //     "brand_id" => 1,
            //     "category_id" => 2,
            //     "origin_id" => 3,
            //     "price" => 1500000,
            //     "year" => 1912
            // ]
            $request->all()
        );
        return response($respon['message']);
    }

    public function delete(Request $request, $id)
    {
        
        $respon = Http::withToken($request->header('X-CSRF-TOKEN'))->delete('http://127.0.0.1:8001/api/v1/products/' . $id);
        return $this->index($request->input('page'));
    }

    public function pagination($page)
    {
        return $this->index($page);
    }

    //lấy dữ liệu từ wines cu the
    public function getWines($id)
    {
        $wineDetail = Http::get('http://127.0.0.1:8001/api/v1/products/' . $id)['data'];

        // $wineDetail = Product::select(
        //     'products.*',
        //     'categories.name as category',
        //     'countries.name as country',
        //     'brands.name as brand'
        // )
        //     ->join('categories', 'categories.id', 'products.category')
        //     ->join('brands', 'brands.id', 'products.brand')
        //     ->join('countries', 'countries.id', 'products.country')
        //     ->where('products.id', $id)
        //     ->first();
        // return $respon;
        return view('page/product_details', compact('wineDetail'));
    }
}
