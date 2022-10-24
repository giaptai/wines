<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;
use GrahamCampbell\ResultType\Success;

class BrandsController extends Controller
{
    public function index()
    {
        $brandArray = Brand::paginate(10);
        $pagin = Brand::count();
        return response(view('dynamic_layout.tablebrand', compact('brandArray', 'pagin')), 200);
    }
 
    public function show($id)
    {
        return Brand::find($id);
    }

    public function store(Request $request)
    {
        Brand::create($request->all());
        return $this->index();
    }

    public function update(Request $request, $id)
    {
        $Brand = Brand::findOrFail($id);
        $Brand->update($request->all());
        return response($Brand, 200);
    }

    public function delete($id)
    {
        $Brand = Brand::findOrFail($id);
        $Brand->delete();
        return $this->index();
    }
}
