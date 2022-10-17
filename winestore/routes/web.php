<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ManageController;
use App\Http\Controllers\MenuBarController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\ShopController;


use Illuminate\Http\Request;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// giao dien
Route::prefix('/')->group(function () {

  //trang quản lý thống kê
  Route::get('/home', [MenuBarController::class, 'home'])->name('home');

  //trang quản lý sản phẩm
  Route::get('/shop', [MenuBarController::class, 'shop'])->name('shop');

  Route::get('/shop/details/{id}', [ProductsController::class, 'getWines'])->name('product_details');

  Route::get('/shop/search', [ShopController::class, 'searchedShop'])->name('searched_shop');

  Route::get('/shop/filter', [ShopController::class, 'filteredShop'])->name('filtered_shop');

  Route::get('/add-to-cart/{id}', [ProductsController::class, 'addToCart'])->name('add_to_cart');

  Route::get('/minus-to-cart/{id}', [ProductsController::class, 'minusToCart'])->name('minus_to_cart');

  Route::get('/del-item-cart/{id}', [ProductsController::class, 'deletedItemCart'])->name('del-item-cart');

  //trang quản lý đơn hàng
  Route::get('/cart', [MenuBarController::class, 'cart'])->name('cart');

  Route::post('/pay-cod', [PayController::class, 'addOrder'])->name('pay-cod');

  //trang quản lý khách hàng
  Route::get('/account', [MenuBarController::class, 'account'])->name('account');

  //trang login
  Route::get('/login', [MenuBarController::class, 'login'])->name('login');
});




Route::prefix('admin')->group(function () {

  //trang quản lý thống kê
  Route::get('/statistic', [ManageController::class, 'manage_statistic'])->name('statistic');

  //trang quản lý sản phẩm
  Route::get('/products', [ManageController::class, 'manage_product'])->name('products');

  //thêm sản phẩm
  Route::get('/products/add-product', [ManageController::class, 'manage_product_add'])->name('add-product');

  //xóa sản phẩm
  Route::get('/products/deleted', [ProductsController::class, 'deletedProduct'])->name('deleted-product');

  //tìm sản phẩm
  Route::get('/products/searched', [ProductsController::class, 'searchedProduct'])->name('searched-product');

  Route::get('/search-products-pagination', [ProductsController::class, 'Pagination'])->name('search-products-pagination');

  //sửa sản phẩm
  Route::post('/products/edited', [ProductsController::class, 'editedProduct'])->name('edited-product');

  // Route::post('/products/edited/{id}', function(Request $request){
  //   echo var_dump($request->all());
  // })->name('edited-product');

  // thêm dữ liệu vào database
  Route::get('/products/add-product/add', [ProductsController::class, 'addProduct'])->name('add-product-add');

  //trang quản lý đơn hàng
  Route::get('/orders', [ManageController::class, 'manage_orders'])->name('orders');

  Route::get('/search-orders-pagination', [OrdersController::class, 'OrdersPagination'])->name('search-orders-pagination');

  //thay đổi trạng thái đơn hàng
  Route::post('/status-order', [OrdersController::class, 'updateOrder'])->name('status-order');

  //lọc đơn hàng
  Route::post('/filter-order', [OrdersController::class, 'filterOrder'])->name('filter-order');

  //lọc đơn hàng
  Route::post('/search-order', [OrdersController::class, 'searchOrder'])->name('search-order');

  //trang quản lý khách hàng
  Route::get('/customers', [ManageController::class, 'manage_customers'])->name('customers');

  Route::get('/search-accounts', [AccountsController::class, 'Search'])->name('search-accounts');

  Route::get('/search-accounts-pagination', [AccountsController::class, 'Pagination'])->name('search-accounts-pagination');
  
});


Route::prefix('account')->group(function () {

  Route::get('/my-account', [ClientController::class, 'my_infor'])->name('my-account');

  Route::post('/my-account/update', [ClientController::class, 'updateInfo'])->name('my-infor-update');

  Route::get('/my-address', [ClientController::class, 'my_address'])->name('my-address');

  Route::get('/my-order', [ClientController::class, 'my_order'])->name('my-order');
});
