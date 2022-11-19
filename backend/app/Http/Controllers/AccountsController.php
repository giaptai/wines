<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Account;

class AccountsController extends Controller
{
    public function index()
    {
        return Account::all();
    }
 
    public function show($id)
    {
        return Account::find($id);
    }

    public function store(Request $request)
    {
        return Account::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $Account = Account::findOrFail($id);
        $Account->update($request->all());

        return $Account;
    }

    public function delete(Request $request, $id)
    {
        $Account = Account::findOrFail($id);
        $Account->delete();

        return 204;
    }
}
