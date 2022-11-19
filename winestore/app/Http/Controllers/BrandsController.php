<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Http;

class BrandsController extends Controller
{

    public function brandView($url)
    {
        // return 'http://127.0.0.1:8001/api/v1/categories' . $url;
        $linkAPI = Http::withToken('tokenAdmin')->get('http://127.0.0.1:8001/api/v1/brands' . $url);
        return (view('dynamic_layout.tablebrand', ['Brands' => $linkAPI])->render());
    }

    //thêm 1 thương hiệu
    public function addBrand(Request $request)
    {
        // return $request->all();
        $url =  $request->input('name') != NULL ? '?name[like]=' . $request->input('name') . '&page=' . $request->input('page'):'?page=' . $request->input('page');
        // return $url;
        $respon = Http::withToken(session('tokenAdmin'))->post('http://127.0.0.1:8001/api/v1/brands', [
            'name' => $request->input('namep'),
            'images' => 'https://chevalier.vn/wp-content/uploads/2021/09/Ruou-Vang-Chateau-Gruaud-Larose.jpg',
            'description' => $request->input('desc'),
        ]);
        // return $respon;
        if ($respon['status']) {
            return response()->json(['message' => $respon['message'], 'status' => 1, 'response' => $this->brandView($url)]);
        } else {
            return response()->json(['message' => 'Thêm thương hiệu thất bại', 'status' => 0]);
        }
    }

    // sửa 1 thương hiệu
    public function modifyBrand(Request $request, $id)
    {
        // return $request->all();
        $url =  $request->input('name') != NULL ? '?name[like]=' . $request->input('name') . '&page=' . $request->input('page'):'?page=' . $request->input('page');
        // return $url;
        $respon = Http::withToken(session('tokenAdmin'))->put('http://127.0.0.1:8001/api/v1/brands/' . $id, [
            'name' => $request->input('namep'),
            'images' => 'https://chevalier.vn/wp-content/uploads/2021/09/Ruou-Vang-Chateau-Gruaud-Larose.jpg',
            'description' => $request->input('desc'),
        ]);
        // return $respon;
        if (!$respon['status']) {
            return response()->json(['message' => 'Xóa thương hiệu thất bại', 'status' => 0]);
        } else {
            return response()->json(['message' => $respon['message'], 'status' => 1, 'response' => $this->brandView($url)]);
        }
    }

    //xóa thương hiệu
    public function deleteBrand(Request $request, $id)
    {
        // return $request->all();
        $url =  $request->input('name') != NULL ? '?name[like]=' . $request->input('name') . '&page=' . $request->input('page'):'?page=' . $request->input('page');
        // return $url;
        $respon = Http::withToken(session('tokenAdmin'))->delete('http://127.0.0.1:8001/api/v1/brands/' . $id);
        // return $respon;
        if (!$respon['status']) {
            return response()->json(['message' => 'Xóa thương hiệu thất bại', 'status' => 0]);
        } else {
            return response()->json(['message' => $respon['message'], 'status' => 1, 'response' => $this->brandView($url)]);
        }
    }

    //phân trang
    public function pagination(Request $request)
    {
        // return $request->all();
        $url =  $request->input('name') != NULL ? '?name[like]=' . $request->input('name') . '&page=' . $request->input('page'):'?page=' . $request->input('page');
        return $this->brandView($url);
    }

    //tìm kiếm
    public function searchBrand(Request $request)
    {
        // return $request->all();
        $url =  $request->input('name') != NULL ? '?name[like]=' . $request->input('name') . '&page=' . $request->input('page'):'?page=' . $request->input('page');
        // return $url;
        return $this->brandView($url);
    }
}
