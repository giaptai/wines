<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ManageController;
use App\Http\Controllers\MenuBarController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\SessionController;

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
//trang home

// giao dien
Route::prefix('/')->group(function () {
  //trang chủ
  Route::get('/home', [MenuBarController::class, 'home'])->name('home');

  //trang cửa hàng
  Route::get('/shop', [MenuBarController::class, 'shop'])->name('shop');

  Route::get('/shop/details/{id}', [ProductsController::class, 'getWines'])->name('product_details');

  Route::get('/shop/search', [ShopController::class, 'searchedShop'])->name('searched_shop');

  Route::get('/shop/filter', [ShopController::class, 'FilterShop'])->name('filter_shop');

  Route::post('/store-to-cart/{id}', [SessionController::class, 'store'])->name('store_to_cart');

  Route::get('/minus-to-cart/{id}', [SessionController::class, 'minus'])->name('minus_to_cart');

  Route::get('/add-to-cart/{id}', [SessionController::class, 'add'])->name('add_to_cart');

  Route::get('/del-item-cart/{id}', [SessionController::class, 'delete'])->name('del-item-cart');

  //trang quản lý đơn hàng
  Route::get('/cart', [MenuBarController::class, 'cart'])->name('cart');

  Route::get('/cart/distric', [CartController::class, 'getDistric'])->name('get-distric');
  Route::get('/cart/block', [CartController::class, 'getBlock'])->name('get-block');

  Route::post('/pay-cod', [PayController::class, 'addOrder'])->name('pay-cod');

  //trang tài khoản cá nhân
  Route::get('/account', [MenuBarController::class, 'account'])->name('account');

  //trang login
  Route::get('/login', [MenuBarController::class, 'login'])->name('login');
});


Route::view('/cart/checkout', 'vnpay.checkout')->name('checkout');

Route::prefix('admin')->group(function () {
  // Controller điều hương vô trang quản lý
  //trang quản lý thống kê
  Route::get('/statistic', [ManageController::class, 'Statistic'])->name('statistic');
  //trang quản lý sản phẩm
  Route::get('/products', [ManageController::class, 'Products'])->name('products');
  //trang quản lý đơn hàng
  Route::get('/orders', [ManageController::class, 'Orders'])->name('orders');
  //trang quản lý tài khoản
  Route::get('/accounts', [ManageController::class, 'Accounts'])->name('accounts');
  //trang quản lý thể loại
  Route::get('/categories', [ManageController::class, 'Categories'])->name('categories');
  //trang quản lý thương hiệu
  Route::get('/brands', [ManageController::class, 'Brands'])->name('brands');
  //trang quản lý quốc gia
  Route::get('/countries', [ManageController::class, 'Countries'])->name('countries');
  // Controller điều hương vô trang quản lý

  //trang thêm sản phẩm
  Route::get('/products-add', [ManageController::class, 'manage_product_add'])->name('add-product');

  Route::get('/search-accounts', [AccountsController::class, 'Search'])->name('search-accounts');

  Route::get('/search-accounts-pagination', [AccountsController::class, 'Pagination'])->name('search-accounts-pagination');

  Route::get('/customers', [ManageController::class, 'Accounts'])->name('customers');

  // Route::delete('/products/{id}', [ProductsController::class, 'delete'])->name('products-delete');
  Route::put('/orders/{id}', [OrdersController::class, 'update'])->name('orders-edit');
  // Route::post('/product-add', [ProductsController::class, 'store'])->name('product-add');
  Route::get('/orders/{page}', [OrdersController::class, 'pagination'])->name('paginate-order');
  Route::get('/search-order', [OrdersController::class, 'show'])->name('search-order');


  Route::delete('/products/{id}', [ProductsController::class, 'delete'])->name('products-delete');
  Route::put('/products/{id}', [ProductsController::class, 'update'])->name('products-edit');
  Route::post('/product-add', [ProductsController::class, 'store'])->name('product-add');
  Route::get('/products/{page}', [ProductsController::class, 'pagination'])->name('paginate-product');


  Route::delete('/categories/{id}', [CategoriesController::class, 'delete'])->name('categories-delete');
  Route::put('/categories/{id}', [CategoriesController::class, 'update'])->name('categories-edit');
  Route::post('/add-category', [CategoriesController::class, 'store'])->name('add-category');
  Route::get('/categories/{page}', [CategoriesController::class, 'pagination'])->name('paginate-category');
  Route::get('/search-category', [CategoriesController::class, 'show'])->name('search-category');

  Route::delete('/brands/{id}', [BrandsController::class, 'delete'])->name('brands-delete');
  Route::put('/brands/{id}', [BrandsController::class, 'update'])->name('brands-edit');
  Route::post('/add-brand', [BrandsController::class, 'store'])->name('add-brand');
  Route::get('/brands/{page}', [BrandsController::class, 'pagination'])->name('paginate-brand');
  Route::get('/search-brand', [BrandsController::class, 'show'])->name('search-brand');

  Route::delete('/countries/{id}', [CountriesController::class, 'delete'])->name('countries-delete');
  Route::put('/countries/{id}', [CountriesController::class, 'update'])->name('countries-edit');
  Route::post('/add-country', [CountriesController::class, 'store'])->name('add-country');

  Route::get('/countries/{page}', [CountriesController::class, 'pagination'])->name('paginate-country');
  Route::get('/search-country', [CountriesController::class, 'show'])->name('search-country');

});


Route::prefix('account')->group(function () {

  Route::get('/my-account', [ClientController::class, 'MyInfor'])->name('my-account');

  Route::get('/my-address', [ClientController::class, 'MyAddress'])->name('my-address');

  Route::get('/my-order', [ClientController::class, 'MyOrder'])->name('my-order');

  Route::post('/my-account/update', [ClientController::class, 'updateInfo'])->name('my-infor-update');
});
