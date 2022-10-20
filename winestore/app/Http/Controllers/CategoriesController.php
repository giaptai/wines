<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        return Category::all();
    }
 
    public function show($id)
    {
        return Category::find($id);
    }

    public function store(Request $request)
    {
        return Category::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $Category = Category::findOrFail($id);
        $Category->update($request->all());
        return $Category;
    }

    public function delete(Request $request, $id)
    {
        $Category = Category::findOrFail($id);
        $Category->delete();
        return 206;
    }
}
