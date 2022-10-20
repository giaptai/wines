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
        return Brand::all();
    }
 
    public function show($id)
    {
        return Brand::find($id);
    }

    public function store(Request $request)
    {
        return Brand::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $Brand = Brand::findOrFail($id);
        $Brand->update($request->all());
        return $Brand;
    }

    public function delete(Request $request, $id)
    {
        $Brand = Brand::findOrFail($id);
        $Brand->delete();
        return 206;
    }
}
