<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountriesController extends Controller
{
    public function index()
    {
        $countryArray = Country::paginate(10);
        $pagin = Country::count();
        return response(view('dynamic_layout.tablecountry', compact('countryArray', 'pagin')), 200);
    }
 
    public function show($id)
    {
        return Country::find($id);
    }

    public function store(Request $request)
    {
        Country::create($request->all());
        return $this->index();
    }

    public function update(Request $request, $id)
    {
        $Country = Country::findOrFail($id);
        $Country->update($request->all());
        return $Country;
    }

    public function delete($id)
    {
        $Country = Country::findOrFail($id);
        $Country->delete();
        return $this->index();
    }
}
