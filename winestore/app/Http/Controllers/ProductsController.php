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

        $productArray = $respon['data'];
        $countryArray = Http::get('http://127.0.0.1:8001/api/v1/origins')['data'];
        $categoryArray = Http::get('http://127.0.0.1:8001/api/v1/categories')['data'];
        $brandArray = Http::get('http://127.0.0.1:8001/api/v1/brands')['data'];

        $pagin = $respon['meta']['total'];
        $currentpage = $page;
        return response(view('dynamic_layout.tableproduct', compact('currentpage', 'productArray', 'pagin', 'countryArray',  'categoryArray', 'brandArray',)), 200);
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
        Product::create($request->all());
        return $this->index(1);
    }

    public function update(Request $request, $id)
    {
        // return response($id,200);
        $respon = Http::withToken($request->header('X-CSRF-TOKEN'))->put('http://127.0.0.1:8001/api/v1/products/' . $id, [
            "name" => "abc1",
            "description" => "Crush minh thư",
            "images" => $request->input('image'),
            "quantity" => 2,
            "vol" => 700,
            "c" => 15,
            "brand_id" => 1,
            "category_id" => 2,
            "origin_id" => 3,
            "price" => 1500000,
            "year" => 1912

        ]);
        return response($respon['message']);
    }

    public function delete(Request $request, $id)
    {
        $Product = Product::findOrFail($id);
        $Product->delete();
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
