<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;

class CategoriesController extends Controller
{
    public function categoryView($url)
    {
        // return 'http://127.0.0.1:8001/api/v1/categories' . $url;
        $linkAPI = Http::withToken('tokenAdmin')->get('http://127.0.0.1:8001/api/v1/categories' . $url);
        return (view('dynamic_layout.tablecategory', ['Categories' => $linkAPI])->render());
    }

    //thêm 1 thể loại
    public function addCategory(Request $request)
    {
        // return $request->all();
        $url =  $request->input('name') != NULL ? '?name[like]=' . $request->input('name') . '&page=' . $request->input('page') : '?page=' . $request->input('page');
        // return $url;
        $respon = Http::withToken(session('tokenAdmin'))->post('http://127.0.0.1:8001/api/v1/categories', [
            'name' => $request->input('namep'),
            'description' => $request->input('desc'),
        ]);
        // return $respon;
        if ($respon['status']) {
            return response()->json(['message' => $respon['message'], 'status' => 1, 'response' => $this->categoryView($url)]);
        } else {
            return response()->json(['message' => 'Thêm thể loại thất bại', 'status' => 0]);
        }
    }

    // sửa 1 thể loại
    public function modifyCategory(Request $request, $id)
    {
        // return $request->all();
        $url =  $request->input('name') != NULL ? '?name[like]=' . $request->input('name') . '&page=' . $request->input('page') : '?page=' . $request->input('page');
        // return $url;
        $respon = Http::withToken(session('tokenAdmin'))->put('http://127.0.0.1:8001/api/v1/categories/' . $id, [
            'name' => $request->input('namep'),
            'description' => $request->input('desc'),
        ]);
        // return $respon;
        if (!$respon['status']) {
            return response()->json(['message' => 'Xóa thể loại thất bại', 'status' => 0]);
        } else {
            return response()->json(['message' => $respon['message'], 'status' => 1, 'response' => $this->categoryView($url)]);
        }
    }

    //xóa thể loại
    public function deleteCategory(Request $request, $id)
    {
        // return $request->all();
        $url =  $request->input('name') != NULL ? '?name[like]=' . $request->input('name') . '&page=' . $request->input('page') : '?page=' . $request->input('page');
        // return $url;
        $respon = Http::withToken(session('tokenAdmin'))->delete('http://127.0.0.1:8001/api/v1/categories/' . $id);
        // return $respon;
        if (!$respon['status']) {
            return response()->json(['message' => 'Xóa thể loại thất bại', 'status' => 0]);
        } else {
            return response()->json(['message' => $respon['message'], 'status' => 1, 'response' => $this->categoryView($url)]);
        }
    }

    //phân trang
    public function pagination(Request $request)
    {
        // return $request->all();
        $url =  $request->input('name') != NULL ? '?name[like]=' . $request->input('name') . '&page=' . $request->input('page') : '?page=' . $request->input('page');
        return $this->categoryView($url);
    }

    //tìm kiếm
    public function searchCategory(Request $request)
    {
        // return $request->all();
        $url =  $request->input('name') != NULL ? '?name[like]=' . $request->input('name') . '&page=' . $request->input('page') : '?page=' . $request->input('page');
        // return $url;
        return $this->categoryView($url);
    }
}
