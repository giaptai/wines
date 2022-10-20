<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductsController extends Controller
{
    //lấy dữ liệu từ wines cu the
    public function getAll()
    {
        $winedetail = DB::table('products')->get();
        return view('product_details', ["winedetail" => $winedetail]);
    }


    //lấy dữ liệu từ wines cu the
    public function getWines($id)
    {
        $winedetail = DB::table('products')->where('id', $id)->first();
        return view('page/product_details', compact('winedetail'));
    }

    //them vao cart
    public function addToCart($id)
    {
        $arr = array('arr1' => '', 'arr2' => 0, 'arr3' => 0);
        $sum = 0;
        $wineArr = Product::find($id);
        $cart = session('cart'); //tao session cart

        // if (count($cart) > 10) {
        //     $arr['arr1'] = 'Tối đa 10 sản phẩm';
        //     return response($arr, 200);
        //     die();
        // } else {
        if (isset($cart[$id])) {
            $cart[$id] = [
                'id' => $wineArr['id'],
                'name' => $wineArr['name'],
                'image' => $wineArr['image'],
                'quantity' => ++$cart[$id]['quantity'],
                'price' => $wineArr['price']
            ];
        } else {
            $cart[$id] = [
                'id' => $wineArr['id'],
                'name' => $wineArr['name'],
                'image' => $wineArr['image'],
                'quantity' => 1,
                'price' => $wineArr['price']
            ];
        }
        session()->put('cart', $cart);
        // }
        if (session()->has('cart')) {
            foreach (session('cart') as $key => $value) {
                $sum += $value['price'] * $value['quantity'];
                $arr['arr1'] .= '<tr>
            <td>
                <div class="d-flex flex-column align-items-center">
                    <img class="img"
                        src="https://vinoteka.vn/assets/components/phpthumbof/cache/071801-1.3899b5ec6313090055de59b4621df17a.jpg"
                        width="82"><span class="">' . $value['name'] . '</span>
                </div>
            </td>
            <td>
                <div class="d-flex">
                    <button class="btn bi bi-dash-circle"
                        onclick="minustocart(' . $value['id'] . ')"></button>
                    <input type="text" min="1" max="99" step="1" disabled
                        class="btn" value="' . $value['quantity'] . '"
                        style="text-align: center; width: 3rem;">
                    <button class="btn bi bi-plus-circle"
                        onclick="addtocart(' . $value['id'] . ')"></button>
                </div>
            </td>
            <td>' . number_format($value['price']) . '</td>
            <td>
                <div class="row">
                    <span class="col-12">' . number_format($value['price'] * $value['quantity']) . '</span>
                    <span class="col-12 text-decoration-underline text-danger"
                        onclick="deletedItem(' . $value['id'] . ')">Xóa</span>
                </div>
            </td>
        </tr>';
            }
            $arr['arr2'] = number_format($sum);
            $arr['arr3'] = $sum;
        }
        return response($arr, 200);
    }

    //tru so luong cart
    public function minusToCart($id)
    {
        $wineArr = Product::find($id);
        $cart = session()->get('cart');
        if ($cart[$id]['quantity'] > 1) {
            $cart[$id] = [
                'id' => $wineArr['id'],
                'name' => $wineArr['name'],
                'image' => $wineArr['image'],
                'quantity' => --$cart[$id]['quantity'],
                'price' => $wineArr['price']
            ];
            session()->put('cart', $cart);
        } else session()->pull('cart.' . $id);


        $arr = array('arr1' => '', 'arr2' => 0, 'arr3' => 0);
        $sum = 0;
        if (session()->has('cart')) {
            foreach (session('cart') as $key => $value) {
                $sum += $value['price'] * $value['quantity'];
                $arr['arr1'] .= '<tr>
            <td>
                <div class="d-flex flex-column align-items-center">
                    <img class="img"
                        src="https://vinoteka.vn/assets/components/phpthumbof/cache/071801-1.3899b5ec6313090055de59b4621df17a.jpg"
                        width="82"><span class="">' . $value['name'] . '</span>
                </div>
            </td>
            <td>
                <div class="d-flex">
                    <button class="btn bi bi-dash-circle"
                        onclick="minustocart(' . $value['id'] . ')"></button>
                    <input type="text" min="1" max="99" step="1" disabled
                        class="btn" value="' . $value['quantity'] . '"
                        style="text-align: center; width: 3rem;">
                    <button class="btn bi bi-plus-circle"
                        onclick="addtocart(' . $value['id'] . ')"></button>
                </div>
            </td>
            <td>' . number_format($value['price']) . '</td>
            <td>
                <div class="row">
                    <span class="col-12">' . number_format($value['price'] * $value['quantity']) . '</span>
                    <span class="col-12 text-decoration-underline text-danger"
                        onclick="deletedItem(' . $value['id'] . ')">Xóa</span>
                </div>
            </td>
        </tr>';
            }
            $arr['arr2'] = number_format($sum);
            $arr['arr3'] = $sum;
        }

        return response($arr, 200);
    }

    //xoa 1 item trong cart
    public function deletedItemCart($id)
    {
        $arr = array('arr1' => '', 'arr2' => 0, 'arr3' => 0);
        $sum = 0;
        if (session()->has('cart')) {
            session()->pull('cart.' . $id);
            foreach (session('cart') as $key => $value) {
                $sum += $value['price'] * $value['quantity'];
                $arr['arr1'] .= '<tr>
            <td>
                <div class="d-flex flex-column align-items-center">
                    <img class="img"
                        src="https://vinoteka.vn/assets/components/phpthumbof/cache/071801-1.3899b5ec6313090055de59b4621df17a.jpg"
                        width="82"><span class="">' . $value['name'] . '</span>
                </div>
            </td>
            <td>
                <div class="d-flex">
                    <button class="btn bi bi-dash-circle"
                        onclick="minustocart(' . $value['id'] . ')"></button>
                    <input type="text" min="1" max="99" step="1" disabled
                        class="btn" value="' . $value['quantity'] . '"
                        style="text-align: center; width: 3rem;">
                    <button class="btn bi bi-plus-circle"
                        onclick="addtocart(' . $value['id'] . ')"></button>
                </div>
            </td>
            <td>' . number_format($value['price']) . '</td>
            <td>
                <div class="row">
                    <span class="col-12">' . number_format($value['price'] * $value['quantity']) . '</span>
                    <span class="col-12 text-decoration-underline text-danger"
                        onclick="deletedItem(' . $value['id'] . ')">Xóa</span>
                </div>
            </td>
        </tr>';
            }
            $arr['arr2'] = number_format($sum);
            $arr['arr3'] = $sum;
        }

        return response($arr, 200);
    }

    // thêm giá trị mới vô database
    public function addProduct(Request $request)
    {
        DB::table('wines')->insert([
            'id'     =>   $request->input("id-product"),
            'name'     => $request->input("name-product"),
            'image'     => $request->input("iptIMG"),
            'country'     => $request->input("country-product"),
            'brand'     => $request->input("brand-product"),
            'category'     => $request->input("category-product"),
            'tone'     => $request->input("tone-product"),
            'year'     => $request->input("year-product"),
            'description'     => $request->input("intro-product"),
            'quantity'     => $request->input("number-product"),
            'price'     => $request->input("price-product"),
        ]);
        return redirect("admin/products/add-product");
    }

    // xóa dữ liệu từ database
    public function deletedProduct(Request $request)
    {
        return response($request->all(), 200);
        die();
        $arr = array('tbody' => '', 'footer' => '');
        $arr = $request->all();
        // if (isset($id)) {
        $query = DB::table('wines')->where('id', $arr['id'])->delete();
        // $arr = '';
        // $i = 0;
        return response($query, 200);
        // die();
        // if ($query ==1) {
        // $wineArray = products::simplePaginate(10);
        // foreach ($wineArray as $key => $product) {
        //     $arr .= '<tr>
        //         <th scope="row">' . (++$i) . '</th>
        //         <td>
        //             <div class="d-flex align-items-center">
        //                 <img class="img"
        //                     src="https://vinoteka.vn/assets/components/phpthumbof/cache/071801-1.3899b5ec6313090055de59b4621df17a.jpg"
        //                     width="90">
        //                 <span>' . $product['name'] . '</span>
        //             </div>
        //         </td>
        //         <td>' . $product['quantity'] . '</td>
        //         <td>' . number_format($product['price']) . '</td>
        //         <td>' . number_format($product['price'] * 6) . '</td>
        //         <td>
        //             <button type="button" class="btn" data-bs-toggle="modal"
        //                 data-bs-target="#minhthu' . $product['id'] . '">
        //                 <i class="bi bi-exclamation-circle-fill text-primary"></i>
        //             </button>
        //             <button onclick="deleted(' . $product["id"] . ')" value="' . $product["id"] . '" class="delete-btn btn btn-sm bi bi-x-lg text-danger" type="button"></button>
        //         </td>
        //     </tr>';
        // }
        // return $arr;
        // }
        // }
    }

    // sửa dữ liệu từ database
    public function editedProduct(Request $request)
    {
        $arr = $request->all();
        // return response($request->all(), 200);
        // $result = '';
        if (isset($arr)) {
            $query = DB::table('wines')
                ->where('id', $arr['id'])
                ->update(
                    [
                        'name' => $arr['name'],
                        'image' => 1,
                        'country' =>  $arr['country'],
                        'brand' =>  $arr['brand'],
                        'category' =>  $arr['category'],
                        'tone' =>  $arr['tone'],
                        'year' => (int)$arr['year'],
                        'description' => $arr['description'],
                        'quantity' =>  $arr['quantity'],
                        'price' =>  $arr['price']
                    ],
                );
            return response($query, 200);
            // die();
        }
    }

    // tìm kiếm từ database loi
    // error thuong gap
    //Cannot use object of type stdClass as array
    //$product["id"] ghi thanh $product->id
    public function searchedProduct(Request $request)
    {
        $arr = array('tbody' => '', 'footer' => '');
        $count = 0;
        if ($request->input('search_id') != null && $request->input('search_name') != null) {
            $query = DB::table('wines')->where('id', $request->input('search_id'))->where('name', 'LIKE', "%{$request->input('search_name')}%")->skip(0)->take(10)->get();
            $count = DB::table('wines')->where('id', $request->input('search_id'))->where('name', 'LIKE', "%{$request->input('search_name')}%")->count();
        } else if ($request->input('search_id') != null && $request->input('search_name') == null) {
            $query = DB::table('wines')->where('id', $request->input('search_id'))->skip(0)->take(10)->get();
            $count = DB::table('wines')->where('id', $request->input('search_id'))->count();
        } else if ($request->input('search_id') == null && $request->input('search_name') != null) {
            $query = DB::table('wines')->where('name', 'LIKE', "%{$request->input('search_name')}%")->skip(0)->take(10)->get();
            $count = DB::table('wines')->where('name', 'LIKE', "%{$request->input('search_name')}%")->count();
        } else {
            $query = DB::table('wines')->skip(0)->take(10)->get();
            $count = DB::table('wines')->count();
        }
    
        $i = 0;
        foreach ($query as $key => $product) {
            $arr['tbody'] .= '<tr>
            <th scope="row">' . (++$i) . '</th>
            <th scope="row">' . $product->id . '</th>
            <td>
                <div class="d-flex align-items-center">
                    <img class="img"
                        src="https://vinoteka.vn/assets/components/phpthumbof/cache/071801-1.3899b5ec6313090055de59b4621df17a.jpg"
                        width="90">
                    <span>' . $product->name . '</span>
                </div>
            </td>
            <td>' . $product->quantity . '</td>
            <td>' . number_format($product->price) . '</td>
            <td>' . number_format($product->price * $product->quantity) . '</td>
            <td>
                <button type="button" class="btn" data-bs-toggle="modal"
                    data-bs-target="#minhthu' . $product->id . '">
                    <i class="bi bi-exclamation-circle-fill text-primary"></i>
                </button>
                <button onclick="deleted(' . $product->id . ')" value="' . $product->id . '" class="delete-btn btn btn-sm bi bi-x-lg text-danger" type="button"></button>
            </td>
        </tr>';
        }
        for ($i = 0; $i < ceil($count / 10); $i++) {
            if ($request->input('page') - 1 == $i) {
                $arr['footer'] .=  '<li class="page-item"><a class="page-link active">' . ($i + 1) . '</a></li>';
            } else $arr['footer'] .=  '<li class="page-item"><a class="page-link" onclick="phantrang(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
        }
    
        return response($arr, 200);
    }

    public function Pagination(Request $request)
    {
        $count = 0;

        $arr = array('tbody' => '', 'footer' => '');

        if ($request->input('search_id') != null && $request->input('search_name') != null) {
            $query = DB::table('wines')->where('id', $request->input('search_id'))->where('name', 'LIKE', "%{$request->input('search_name')}%")->skip(10 * ($request->input('page') - 1))->take(10)->get();
            $count = DB::table('wines')->where('id', $request->input('search_id'))->where('name', 'LIKE', "%{$request->input('search_name')}%")->count();
        } else if ($request->input('search_id') != null && $request->input('search_name') == null) {
            $query = DB::table('wines')->where('id', $request->input('search_id'))->skip(10 * ($request->input('page') - 1))->take(10)->get();
            $count = DB::table('wines')->where('id', $request->input('search_id'))->skip(10 * ($request->input('page') - 1))->count();
        } else if ($request->input('search_id') == null && $request->input('search_name') != null) {
            $query = DB::table('wines')->where('name', 'LIKE', "%{$request->input('search_name')}%")->skip(10 * ($request->input('page') - 1))->take(10)->get();
            $count = DB::table('wines')->where('name', 'LIKE', "%{$request->input('search_name')}%")->count();
        } else {
            $query = DB::table('wines')->skip(10 * ($request->input('page') - 1))->take(10)->get();
            $count = DB::table('wines')->count();
        }

        $i = 0;
        foreach ($query as $key => $product) {
            $arr['tbody'] .= '<tr>
            <th scope="row">' . (++$i) . '</th>
            <th scope="row">' . $product->id . '</th>
            <td>
                <div class="d-flex align-items-center">
                    <img class="img"
                        src="https://vinoteka.vn/assets/components/phpthumbof/cache/071801-1.3899b5ec6313090055de59b4621df17a.jpg"
                        width="90">
                    <span>' . $product->name . '</span>
                </div>
            </td>
            <td>' . $product->quantity . '</td>
            <td>' . number_format($product->price) . '</td>
            <td>' . number_format($product->price * $product->quantity) . '</td>
            <td>
                <button type="button" class="btn" data-bs-toggle="modal"
                    data-bs-target="#minhthu' . $product->id . '">
                    <i class="bi bi-exclamation-circle-fill text-primary"></i>
                </button>
                <button onclick="deleted(' . $product->id . ')" value="' . $product->id . '" class="delete-btn btn btn-sm bi bi-x-lg text-danger" type="button"></button>
            </td>
        </tr>';
        }
        for ($i = 0; $i < ceil($count / 10); $i++) {
            if ($request->input('page') - 1 == $i) {
                $arr['footer'] .=  '<li class="page-item"><a class="page-link active">' . ($i + 1) . '</a></li>';
            } else $arr['footer'] .=  '<li class="page-item"><a class="page-link" onclick="phantrang(' . ($i + 1) . ')">' . ($i + 1) . '</a></li>';
        }
        return response($arr, 200);
    }
}
