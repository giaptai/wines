<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Http;

class BrandsController extends Controller
{
    public function index($page)
    {
        $respon = Http::get('http://127.0.0.1:8001/api/v1/brands?page=' . $page);

        $brandArray = $respon['data'];
        $pagin = $respon['meta']['total'];
        $currentpage = $page;
        return response(view('dynamic_layout.tablebrand', compact('brandArray', 'pagin', 'currentpage')), 200);
    }

    public function show(Request $request)
    {
        $respon = Http::get('http://127.0.0.1:8001/api/v1/brands?name[like]='.$request->input('name'));

        $brandArray = $respon['data'];
        $pagin = $respon['meta']['total'];
        $currentpage = 1;
        return response(view('dynamic_layout.tablebrand', compact('brandArray', 'pagin', 'currentpage')), 200);
    }

    public function store(Request $request)
    {
        $respon = Http::withToken('1|eSDkOlgFWKqgqfaulM7UBBClhWKm5CzsjgSvPlSc')->post('http://127.0.0.1:8001/api/v1/brands', [
            'name' => $request->input('name'),
            'images'=>'https://chevalier.vn/wp-content/uploads/2021/09/Ruou-Vang-Chateau-Gruaud-Larose.jpg',
            'description' => $request->input('description'),
        ]);
        return $this->index($request->input('page'));
    }

    public function update(Request $request, $id)
    {
        $respon = Http::withToken('1|eSDkOlgFWKqgqfaulM7UBBClhWKm5CzsjgSvPlSc')->put('http://127.0.0.1:8001/api/v1/brands/'.$id, [
            'name' => $request->input('name'),
            'images'=>'https://chevalier.vn/wp-content/uploads/2021/09/Ruou-Vang-Chateau-Gruaud-Larose.jpg',
            'description' => $request->input('description'),
        ]);
        return response($respon, 200);
    }

    public function delete(Request $request, $id)
    {
        $respon = Http::withToken('1|eSDkOlgFWKqgqfaulM7UBBClhWKm5CzsjgSvPlSc')->delete('http://127.0.0.1:8001/api/v1/brands/'.$id);
        return $this->index($request->input('page'));
    }

    public function pagination($page)
    {
        return $this->index($page);
    }
}
