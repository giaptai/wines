<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountsController extends Controller
{
    public function Search(Request $request)
    {
        // $arr = $request->all();
        // return response($arr, 200);
        // die();
        $count = 0;

        $arr = array('tbody' => '', 'footer' => '');

        if ($request->input('email') != null && $request->input('phone') != null) {
            $query = DB::table('account')->where('email', 'LIKE', '%' . $request->input('email') . '%')->where('phone', $request->input('phone'))->skip(10 * ($request->input('page') - 1))->take(10)->get();
            $count = DB::table('account')->where('email', 'LIKE', '%' . $request->input('email') . '%')->where('phone', $request->input('phone'))->count();
        } else if ($request->input('email') != null && $request->input('phone') == null) {
            $query = DB::table('account')->where('email', 'LIKE', '%' . $request->input('email') . '%')->skip(10 * ($request->input('page') - 1))->take(10)->get();

            $count = DB::table('account')->where('email', 'LIKE', '%' . $request->input('email') . '%')->count();
        } else if ($request->input('email') == null && $request->input('phone') != null) {
            $query = DB::table('account')->where('phone', $request->input('phone'))->skip(10 * ($request->input('page') - 1))->take(10)->get();

            $count = DB::table('account')->where('phone', $request->input('phone'))->count();
        } else {
            $query = DB::table('account')->skip(10 * ($request->input('page') - 1))->take(10)->get();

            $count = DB::table('account')->count();
        }

        $i = 0;
        foreach ($query as $key => $value) {
            $arr['tbody'] .= '<tr>
                <th scope="row">' . ++$i . '</th>
                <td>' . $value->fullname . '</td>
                <td>' . $value->email . '</td>
                <td>' . $value->phone . '</td>
                <td>' . ($value->status == 1 ? 'Mở' : 'Khóa') . '</td>
                <td>
                    <i class="bi bi-lock-fill"></i>
                </td>
            </tr>';
        }
        for ($i = 0; $i < ceil($count / 10); $i++) {
            if ($request->input('page') - 1 == $i) {
                $arr['footer'] .=  '<li class="page-item"><a class="page-link active" onclick="phantrang(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
            } else $arr['footer'] .=  '<li class="page-item"><a class="page-link" onclick="phantrang(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
        }
        return response($arr, 200);
    }

    public function Pagination(Request $request)
    {
        //     return response($request->input('page'), 200);
        // die();
        $count = 0;

        $arr = array('tbody' => '', 'footer' => '');

        if ($request->input('email') != null && $request->input('phone') != null) {
            $query = DB::table('account')->where('email', 'LIKE', '%' . $request->input('email') . '%')->where('phone', $request->input('phone'))->skip(10 * ($request->input('page') - 1))->take(10)->get();
            $count = DB::table('account')->where('email', 'LIKE', '%' . $request->input('email') . '%')->where('phone', $request->input('phone'))->count();
        } else if ($request->input('email') != null && $request->input('phone') == null) {
            $query = DB::table('account')->where('email', 'LIKE', '%' . $request->input('email') . '%')->skip(10 * ($request->input('page') - 1))->take(10)->get();

            $count = DB::table('account')->where('email', 'LIKE', '%' . $request->input('email') . '%')->count();
        } else if ($request->input('email') == null && $request->input('phone') != null) {
            $query = DB::table('account')->where('phone', $request->input('phone'))->skip(10 * ($request->input('page') - 1))->take(10)->get();

            $count = DB::table('account')->where('phone', $request->input('phone'))->count();
        } else {
            $query = DB::table('account')->skip(10 * ($request->input('page') - 1))->take(10)->get();

            $count = DB::table('account')->count();
        }

        $i = 0;
        foreach ($query as $key => $value) {
            $arr['tbody'] .= '<tr>
                <th scope="row">' . ++$i . '</th>
                <td>' . $value->fullname . '</td>
                <td>' . $value->email . '</td>
                <td>' . $value->phone . '</td>
                <td>' . ($value->status == 1 ? 'Mở' : 'Khóa') . '</td>
                <td>
                    <i class="bi bi-lock-fill"></i>
                </td>
            </tr>';
        }
        for ($i = 0; $i < ceil($count / 10); $i++) {
            if ($request->input('page') - 1 == $i) {
                $arr['footer'] .=  '<li class="page-item"><a class="page-link active" onclick="phantrang(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
            } else $arr['footer'] .=  '<li class="page-item"><a class="page-link" onclick="phantrang(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
        }
        return response($arr, 200);
    }
}
