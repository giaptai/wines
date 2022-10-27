<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;

class CategoriesController extends Controller
{
    public function index($page)
    {
        $respon = Http::get('http://127.0.0.1:8001/api/v1/categories?page=' . $page);
        $categoryArray = $respon['data'];
        $pagin = $respon['meta']['total'];
        $currentpage = $page;
        return response(view('dynamic_layout.tablecategory', compact('categoryArray', 'pagin', 'currentpage')), 200);
    }

    public function show(Request $request)
    {
        $respon = Http::get('http://127.0.0.1:8001/api/v1/categories?name[like]='.$request->input('name'));
        $categoryArray = $respon['data'];
        $pagin = $respon['meta']['total'];
        $currentpage = $respon['meta']['current_page'];
        return response(view('dynamic_layout.tablecategory', compact('categoryArray', 'pagin', 'currentpage')), 200);
    }

    public function store(Request $request)
    {
        $respon = Http::withToken('1|eSDkOlgFWKqgqfaulM7UBBClhWKm5CzsjgSvPlSc')->post('http://127.0.0.1:8001/api/v1/categories', [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);
        return $this->index($request->input('page'));
    }

    public function update(Request $request, $id)
    {
        $respon = Http::withToken('1|eSDkOlgFWKqgqfaulM7UBBClhWKm5CzsjgSvPlSc')->put('http://127.0.0.1:8001/api/v1/categories/' . $id, $request->all());
        return response( $respon, 200);
    }

    public function delete(Request $request, $id)
    {
        $respon = Http::withToken('1|eSDkOlgFWKqgqfaulM7UBBClhWKm5CzsjgSvPlSc')->delete('http://127.0.0.1:8001/api/v1/categories/' . $id);
        return $this->index($request->input('page'));
    }

    public function pagination($page)
    {
        return $this->index($page);
    }
}
