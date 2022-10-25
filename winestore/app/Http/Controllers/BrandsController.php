<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;
use GrahamCampbell\ResultType\Success;

class BrandsController extends Controller
{
    public function index($page)
    {
        $brandArray = Brand::skip(($page - 1) * 10)->take(10)->get();
        $pagin = Brand::count();
        $currentpage = $page;
        return response(view('dynamic_layout.tablebrand', compact('brandArray', 'pagin', 'currentpage')), 200);
    }

    public function show($id)
    {
        return Brand::find($id);
    }

    public function store(Request $request)
    {
        Brand::create(
            [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
            ]
        );
        return $this->index($request->input('page'));
    }

    public function update(Request $request, $id)
    {
        $Brand = Brand::findOrFail($id);
        $Brand->update($request->all());
        return response($Brand, 200);
    }

    public function delete(Request $request, $id)
    {
        $Brand = Brand::findOrFail($id);
        $Brand->delete();
        return $this->index($request->input('page'));
    }

    public function pagination($page)
    {
        return $this->index($page);
    }
}
