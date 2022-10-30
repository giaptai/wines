<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Http;

class CountriesController extends Controller
{
    public function index($page)
    {
        $respon = Http::get('http://127.0.0.1:8001/api/v1/origins?page=' . $page);

        $countryArray = $respon['data'];
        $pagin = $respon['meta']['total'];
        $currentpage = $respon['meta']['current_page'];
        return response(view('dynamic_layout.tablecountry', compact('countryArray', 'pagin', 'currentpage')), 200);
    }

    public function show(Request $request)
    {
        $respon = Http::get('http://127.0.0.1:8001/api/v1/origins?name[like]='.$request->input('name'));
        $countryArray = $respon['data'];
        $pagin = $respon['meta']['total'];
        $currentpage = $respon['meta']['current_page'];
        return response(view('dynamic_layout.tablecountry', compact('countryArray', 'pagin', 'currentpage')), 200);
    }

    public function store(Request $request)
    {
        $respon = Http::withToken($request->header('X-CSRF-TOKEN'))->post('http://127.0.0.1:8001/api/v1/origins', $request->all()
        // [
        //     'name' => $request->input('name'),
        //     'description' => $request->input('description'),
        // ]
    );
        return $this->index($request->input('page'));
    }

    public function update(Request $request, $id)
    {
        $respon = Http::withToken($request->header('X-CSRF-TOKEN'))->put('http://127.0.0.1:8001/api/v1/origins/' . $id, $request->all());
        return response($respon, 200);
    }

    public function delete(Request $request, $id)
    {
        $respon = Http::withToken($request->header('X-CSRF-TOKEN'))->delete('http://127.0.0.1:8001/api/v1/origins/' . $id);
        return $this->index($request->input('page'));
    }

    public function pagination($page)
    {
        return $this->index($page);
    }
}
