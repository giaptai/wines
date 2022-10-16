<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\products;

class ProductsController extends Controller
{
    //lấy dữ liệu từ wines cu the
    public function getAll()
    {
        $winedetail = DB::table('wines')->get();
        return view('product_details', ["winedetail" => $winedetail]);
    }


    //lấy dữ liệu từ wines cu the
    public function getWines($id)
    {
        $winedetail = DB::table('wines')->where('id', $id)->first();
        return view('product_details', compact('winedetail'));
    }

    //lấy dữ liệu từ wines cu the
    public function addToCart($id)
    {
        $arr = array('arr1' => '', 'arr2' => 0, 'arr3' => 0);
        $sum = 0;
        $wineArr = products::find($id);
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

    //lấy dữ liệu từ wines cu the
    public function minusToCart($id)
    {
        $wineArr = products::find($id);
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


        $arr = array('arr1' => '', 'arr2' => 0, 'arr3'=>0);
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

    //lấy dữ liệu từ wines cu the
    public function deletedItemCart($id)
    {
        $arr = array('arr1' => '', 'arr2' => 0, 'arr3'=>0);
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

    // sửa dữ liệu từ database loi
    // error thuong gap
    //Cannot use object of type stdClass as array
    //$product["id"] ghi thanh $product->id
    public function searchedProduct(Request $request)
    {
        $result = '';
        $i = 0;
        $val = request()->all();
        // return response($request->all(), 200);
        if($val['search_id']!=NULL || $val['search_name']!=NULL){
            $wineArray = DB::table('wines')->where('id', $val['search_id'])->where('name', 'LIKE', "%{$val['search_name']}%")->get();
        }else $wineArray = products::all();
        // return response($wineArray, 200);
        if (sizeof($wineArray) > 0) {
            foreach ($wineArray as $key => $product) {
                $result .= '<tr>
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
                    <td>' . number_format($product->price * 6) . '</td>
                    <td>
                        <button type="button" class="btn" data-bs-toggle="modal"
                            data-bs-target="#minhthu' . $product->id . '">
                            <i class="bi bi-exclamation-circle-fill text-primary"></i>
                        </button>
                        <button onclick="deleted(' . $product->id . ')" value="' . $product->id . '" class="delete-btn btn btn-sm bi bi-x-lg text-danger" type="button"></button>
                    </td>
                </tr>';
            };
        } else $result .= 'Không có kết quả';
        return response($result, 200); // nếu bên ajax là console.log(xhttp.responseText); thì ra kết quả
    }
}
