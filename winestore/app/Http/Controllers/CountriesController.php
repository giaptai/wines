<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountriesController extends Controller
{
    public function index()
    {
        return Country::all();
    }
 
    public function show($id)
    {
        return Country::find($id);
    }

    public function store(Request $request)
    {
        return Country::create($request->all());
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
        return 206;
    }
}
