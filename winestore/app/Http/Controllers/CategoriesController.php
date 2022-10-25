<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\URL;

class CategoriesController extends Controller
{
    public function index($page)
    {
        $categoryArray = Category::skip(($page - 1) * 10)->take(10)->get();
        $pagin = Category::count();
        $currentpage = $page;
        return response(view('dynamic_layout.tablecategory', compact('categoryArray', 'pagin', 'currentpage')), 200);
    }

    public function show($id)
    {
        return Category::find($id);
    }

    public function store(Request $request)
    {
        Category::create(
            [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
            ]
        );
        return $this->index($request->input('page'));
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
        return $this->index($request->input('page'));
    }

    public function pagination($page)
    {
        return $this->index($page);
    }
}
