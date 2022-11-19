<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountriesController extends Controller
{
    public function index($page)
    {
        $countryArray = Country::skip(($page - 1) * 10)->take(10)->get();
        $pagin = Country::count();
        $currentpage = $page;
        return response(view('dynamic_layout.tablecountry', compact('countryArray', 'pagin', 'currentpage')), 200);
    }

    public function show($id)
    {
        return Country::find($id);
    }

    public function store(Request $request)
    {
        Country::create(
            [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
            ]
        );
        return $this->index($request->input('page'));
    }

    public function update(Request $request, $id)
    {
        $Country = Country::findOrFail($id);
        $Country->update($request->all());
        return $Country;
    }

    public function delete(Request $request, $id)
    {
        $Country = Country::findOrFail($id);
        $Country->delete();
        return $this->index($request->input('page'));
    }

    public function pagination($page)
    {
        return $this->index($page);
    }
}
