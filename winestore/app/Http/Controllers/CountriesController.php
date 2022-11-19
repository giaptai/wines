<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CountriesController extends Controller
{
    public function countryView($url)
    {
        // return 'http://127.0.0.1:8001/api/v1/origins' . $url;
        $linkAPI = Http::withToken(session('tokenAdmin'))->get('http://127.0.0.1:8001/api/v1/origins' . $url);
        return (view('dynamic_layout.tablecountry', ['Countries' => $linkAPI])->render());
    }

    //thêm 1 quốc gia
    public function addCountry(Request $request)
    {
        // return $request->all();
        $url =  $request->input('name') != NULL ? '?name[like]=' . $request->input('name') . '&page=' . $request->input('page') : '?page=' . $request->input('page');
        // return $url;
        $respon = Http::withToken(session('tokenAdmin'))->post('http://127.0.0.1:8001/api/v1/origins', [
            'name' => $request->input('namep'),
            'description' => $request->input('desc'),
        ]);
        // return $respon;
        if ($respon['status']) {
            return response()->json(['message' => $respon['message'], 'status' => 1, 'response' => $this->countryView($url)]);
        } else {
            return response()->json(['message' => 'Thêm quốc gia thất bại', 'status' => 0]);
        }
    }

    // sửa 1 quốc gia
    public function modifyCountry(Request $request, $id)
    {
        // return $request->all();
        $url =  $request->input('name') != NULL ? '?name[like]=' . $request->input('name') . '&page=' . $request->input('page') : '?page=' . $request->input('page');
        // return $url;
        $respon = Http::withToken(session('tokenAdmin'))->put('http://127.0.0.1:8001/api/v1/origins/' . $id, [
            'name' => $request->input('namep'),
            'description' => $request->input('desc'),
        ]);
        // return $respon; 
        if (!$respon['status']) {
            return response()->json(['message' => 'Xóa quốc gia thất bại', 'status' => 0]);
        } else {
            return response()->json(['message' => $respon['message'], 'status' => 1, 'response' => $this->countryView($url)]);
        }
    }

    //xóa quốc gia
    public function deleteCountry(Request $request, $id)
    {
        // return $request->all();
        $url =  $request->input('name') != NULL ? '?name[like]=' . $request->input('name') . '&page=' . $request->input('page') : '?page=' . $request->input('page');
        // return $url;
        $respon = Http::withToken(session('tokenAdmin'))->delete('http://127.0.0.1:8001/api/v1/origins/' . $id);
        // return $respon; 
        if (!$respon['status']) {
            return response()->json(['message' => 'Xóa quốc gia thất bại', 'status' => 0]);
        } else {
            return response()->json(['message' => $respon['message'], 'status' => 1, 'response' => $this->countryView($url)]);
        }
    }

    //phân trang
    public function pagination(Request $request)
    {
        // return $request->all();
        $url =  $request->input('name') != NULL ? '?name[like]=' . $request->input('name') . '&page=' . $request->input('page') : '?page=' . $request->input('page');
        return $this->countryView($url);
    }

    //tìm kiếm
    public function searchCountry(Request $request)
    {
        // return $request->all();
        $url =  $request->input('name') != NULL ? '?name[like]=' . $request->input('name') . '&page=' . $request->input('page') : '?page=' . $request->input('page');
        // return $url;
        return $this->countryView($url);
    }
}
