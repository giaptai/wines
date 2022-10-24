<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $categoryArray = Category::paginate(10);
        $pagin = Category::count();
        return response(view('dynamic_layout.tablecategory', compact('categoryArray', 'pagin')), 200);
    }

    public function show($id)
    {
        return Category::find($id);
    }

    public function store(Request $request)
    {
        Category::create($request->all());
        return $this->index();
    }

    public function update(Request $request, $id)
    {
        $Category = Category::findOrFail($id);
        $Category->update($request->all());
        return $Category;
    }

    public function delete( $id)
    {
        $Category = Category::findOrFail($id);
        $Category->delete();
        return $this->index();
    }
}
