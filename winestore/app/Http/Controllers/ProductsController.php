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
    // trả về view sản phẩm
    public function productView($url)
    {
        // return 'http://127.0.0.1:8001/api/v1/origins' . $url;
        $Products = Http::withToken(session('tokenAdmin'))->get('http://127.0.0.1:8001/api/v1/products' . $url);
        $countryArray = Http::withToken(session('tokenAdmin'))->get('http://127.0.0.1:8001/api/v1/origins')['data'];
        $categoryArray = Http::withToken(session('tokenAdmin'))->get('http://127.0.0.1:8001/api/v1/categories')['data'];
        $brandArray = Http::withToken(session('tokenAdmin'))->get('http://127.0.0.1:8001/api/v1/brands')['data'];

        return view('dynamic_layout.tableproduct', [
            'Products' => $Products,
            'categoryArray' => $categoryArray,
            'brandArray' => $brandArray,
            'countryArray' => $countryArray,
        ])->render();
    }

    // xóa 1 sản phẩm
    public function deleteProduct(Request $request, $id)
    {
        //  return $request->all();
        if ($request->input('nameqr') == NULL && $request->input('id') == NULL) {
            $url = '?page=' . $request->input('page');
        } else if ($request->input('nameqr') != NULL && $request->input('id') == NULL) {
            $url = '?name[like]=' . $request->input('nameqr') . '&page=' . $request->input('page');
        } else if ($request->input('nameqr') == NULL && $request->input('id') != NULL) {
            $url = '?id[eq]=' . $request->input('id') . '&page=' . $request->input('page');
        } else {
            $url = '?name[like]=' . $request->input('nameqr') . '&id[eq]=' . $request->input('id') . '&page=' . $request->input('page');
        }
        $respon = Http::withToken(session('tokenAdmin'))->delete('http://127.0.0.1:8001/api/v1/products/' . $id);
        
        if ($respon['status']) {
            return response()->json(['message' => $respon['message'], 'status' => 1, 'response' => $this->productView($url)]);
        } else {
            return response()->json(['message' => 'Xóa sản phẩm thất bại', 'status' => 0]);
        }
    }

    // Thêm 1 sản phẩm mới
    public function addProduct(Request $request)
    {
        // return $request;
        if ($file = $request->file('image-product-modal')) {
            $filePath = 'uploads/' . time() . '_' .  $request->file('image-product-modal')->getClientOriginalName();
            $file->move('uploads/', $filePath);
        }
        // return $filePath;
        if ($request->input('nameqr') == NULL && $request->input('id') == NULL) {
            $url = '?page=' . $request->input('page');
        } else if ($request->input('nameqr') != NULL && $request->input('id') == NULL) {
            $url = '?name[like]=' . $request->input('nameqr') . '&page=' . $request->input('page');
        } else if ($request->input('nameqr') == NULL && $request->input('id') != NULL) {
            $url = '?id[eq]=' . $request->input('id') . '&page=' . $request->input('page');
        } else {
            $url = '?name[like]=' . $request->input('nameqr') . '&id[eq]=' . $request->input('id') . '&page=' . $request->input('page');
        }
        // return $url;
        $respon = Http::withToken(session('tokenAdmin'))->post(
            'http://127.0.0.1:8001/api/v1/products',
            // để theo thứ tự
            [
                "name" => $request->input('name-product-modal'),
                "description" => $request->input('desc-product-modal'),
                "images" =>  $filePath,
                "quantity" => $request->input('quantity-product-modal'),
                "vol" => $request->input('vol-product-modal'),
                "c" => $request->input('tone-product-modal'),
                "brand_id" => $request->input('brand-product-modal'),
                "category_id" => $request->input('category-product-modal'),
                "origin_id" => $request->input('country-product-modal'),
                "price" => $request->input('price-product-modal'),
                "year" => $request->input('year-product-modal'),
            ]
        );
        // return $respon;
        if ($respon['status']) {
            return response()->json(['message' => $respon['message'], 'status' => 1, 'response' => $this->productView($url)]);
        } else {
            return response()->json(['message' => 'Thêm sản phẩm thất bại', 'status' => 0]);
        }
    }

    //tìm kiếm theo mã, tên hoăc cả hai
    public function searchProduct(Request $request)
    {
        //  return $request->all();
        if ($request->input('nameqr') == NULL && $request->input('id') == NULL) {
            $url = '?page=' . $request->input('page');
        } else if ($request->input('nameqr') != NULL && $request->input('id') == NULL) {
            $url = '?name[like]=' . $request->input('nameqr') . '&page=' . $request->input('page');
        } else if ($request->input('nameqr') == NULL && $request->input('id') != NULL) {
            $url = '?id[eq]=' . $request->input('id') . '&page=' . $request->input('page');
        } else {
            $url = '?name[like]=' . $request->input('nameqr') . '&id[eq]=' . $request->input('id') . '&page=' . $request->input('page');
        }
        // return $url;
        return $this->productView($url);
    }

    // sửa sản phẩm
    public function modifyProduct(Request $request, $id)
    {
        // return response($request, 200);
        if ($file =  $request->file('image-product-modal')) {
            $filePath = 'uploads/' . time() . '_' .   $request->file('image-product-modal')->getClientOriginalName();
            $file->move('uploads/', $filePath);
        }
        // return $filePath;
        if ($request->input('nameqr') == NULL && $request->input('id') == NULL) {
            $url = '?page=' . $request->input('page');
        } else if ($request->input('nameqr') != NULL && $request->input('id') == NULL) {
            $url = '?name[like]=' . $request->input('nameqr') . '&page=' . $request->input('page');
        } else if ($request->input('nameqr') == NULL && $request->input('id') != NULL) {
            $url = '?id[eq]=' . $request->input('id') . '&page=' . $request->input('page');
        } else {
            $url = '?name[like]=' . $request->input('nameqr') . '&id[eq]=' . $request->input('id') . '&page=' . $request->input('page');
        }
        // return $url;
        $respon = Http::withToken(session('tokenAdmin'))->put(
            'http://127.0.0.1:8001/api/v1/products/' . $id,
            [
                "name" => $request->input('name-product-modal'),
                "description" => $request->input('desc-product-modal'),
                "images" =>  $filePath,
                "quantity" => $request->input('quantity-product-modal'),
                "vol" => $request->input('vol-product-modal'),
                "c" => $request->input('tone-product-modal'),
                "brand_id" => $request->input('brand-product-modal'),
                "category_id" => $request->input('category-product-modal'),
                "origin_id" => $request->input('country-product-modal'),
                "price" => $request->input('price-product-modal'),
                "year" => $request->input('year-product-modal'),
            ]
        );
        // return $respon;
        if ($respon['status']) {
            return response()->json(['message' => $respon['message'], 'status' => 1, 'response' => $this->productView($url)]);
        } else {
            return response()->json(['message' => 'Chỉnh sửa sản phẩm thất bại', 'status' => 0]);
        }
    }

    // phân trang
    public function pagination(Request $request)
    {
        if ($request->input('nameqr') == NULL && $request->input('id') == NULL) {
            $url = '?page=' . $request->input('page');
        } else if ($request->input('nameqr') != NULL && $request->input('id') == NULL) {
            $url = '?name[like]=' . $request->input('nameqr') . '&page=' . $request->input('page');
        } else if ($request->input('nameqr') == NULL && $request->input('id') != NULL) {
            $url = '?id[eq]=' . $request->input('id') . '&page=' . $request->input('page');
        } else {
            $url = '?name[like]=' . $request->input('nameqr') . '&id[eq]=' . $request->input('id') . '&page=' . $request->input('page');
        }
        return $this->productView($url);
    }

    // chi tiết 1 sản phẩm
    public function getWines($id)
    {
        $wineDetail = Http::get('http://127.0.0.1:8001/api/v1/products/' . $id)['data'];
        return view('page/product_details', compact('wineDetail'));
    }
}

    //lấy dữ liệu từ wines cu the
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