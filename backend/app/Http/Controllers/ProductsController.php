<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Origin;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Country;
use App\Models\Product;


class ProductsController extends Controller
{

    public function index($page)
    {
        $productArray = Product::skip(($page - 1) * 10)->take(10)->get();
        $countryArray = Origin::all();
        $categoryArray = Category::all();
        $brandArray = Brand::all();
        $pagin = Product::count();
        $currentpage=$page;
        return response(view('dynamic_layout.tableproduct', compact('currentpage','productArray', 'pagin', 'countryArray',  'categoryArray', 'brandArray',)), 200);
    }

    public function show($id)
    {
        return Product::find($id);
    }

    public function store(Request $request)
    {
        Product::create($request->all());
        return $this->index(1);
    }

    public function update(Request $request, $id)
    {
        $Product = Product::findOrFail($id);
        $Product->update($request->all());
        return $Product;
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
    public function getAll()
    {
        $winedetail = DB::table('products')->get();
        return view('product_details', ["winedetail" => $winedetail]);
    }


    //lấy dữ liệu từ wines cu the
    public function getWines($id)
    {
        $winedetail = Product::select(
            'products.*',
            'categories.name as category',
            'origins.name as origins',
            'brands.name as brand'
        )
            ->join('categories', 'categories.id', 'products.category_id')
            ->join('brands', 'brands.id', 'products.brand_id')
            ->join('origins', 'origins.id', 'products.origin_id')
            ->where('products.id', $id)
            ->first();

        return view('page/product_details', compact('winedetail'));
    }
}
