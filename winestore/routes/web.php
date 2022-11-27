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
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\statisticController;
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
  Route::get('/', [MenuBarController::class, 'home'])->name('home');
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

  //trang register
  Route::get('/register', [MenuBarController::class, 'register'])->name('register');

  //trang lienhe
  Route::get('/lienhe', [MenuBarController::class, 'contact'])->name('contact');
});

Route::post('/vnpay/vnpay_payment', [CheckoutController::class, 'vnpayPayment'])->name('checkout');
Route::get('/vnpay/vnpay_return', [CheckoutController::class, 'paymentsResult'])->name('checkout-result');

Route::prefix('admin')->group(function () {
  // Controller điều hương vô trang quản lý
  //trang quản lý thống kê
  Route::get('/login', [ManageController::class, 'LoginPage'])->name('loginadmin');

  Route::get('/logout', [ManageController::class, 'LogoutPage'])->name('logoutadmin');

  //trang quản lý thống kê
  Route::get('/statistic', [ManageController::class, 'Statistic'])->name('statistic');
  //trang quản lý sản phẩm
  Route::get('/products', [ManageController::class, 'Products'])->name('products');
  //trang quản lý đơn hàng
  Route::get('/orders', [ManageController::class, 'Orders'])->name('orders');
  //trang quản lý tài khoản
  Route::get('/accounts', [ManageController::class, 'Accounts'])->name('accounts');
  Route::get('/customers', [ManageController::class, 'Accounts'])->name('customers');
  //trang quản lý thể loại
  Route::get('/categories', [ManageController::class, 'Categories'])->name('categories');
  //trang quản lý thương hiệu
  Route::get('/brands', [ManageController::class, 'Brands'])->name('brands');
  //trang quản lý quốc gia
  Route::get('/countries', [ManageController::class, 'Countries'])->name('countries');
  // Controller điều hương vô trang quản lý

  //QUAN LY THONG KE
  Route::get('/statistic-order', [statisticController::class, 'Statistic'])->name('statistic-order');

  //QUẢN LÝ ĐƠN HÀNG
  Route::put('/orders/{id}', [OrdersController::class, 'modifyOrder'])->name('orders-edit');
  // Route::post('/product-add', [ProductsController::class, 'store'])->name('product-add');
  Route::get('/paginate-order', [OrdersController::class, 'pagination'])->name('paginate-order');
  Route::get('/search-order', [OrdersController::class, 'searchOrder'])->name('search-order');
  Route::get('/filter-order', [OrdersController::class, 'filterOrder'])->name('filter-order');
  Route::get('/order-details/{id}', [OrdersController::class, 'OrderDetails'])->name('order-details');
  Route::get('/order-excel', [OrdersController::class, 'orderAll'])->name('order-excel');


  //QUẢN LÝ SẢN PHẨM
  Route::delete('/products/{id}', [ProductsController::class, 'deleteProduct'])->name('products-delete');
  Route::post('/products/{id}', [ProductsController::class, 'modifyProduct'])->name('products-edit');
  // Route::post('/products-edit/{id}', [ProductsController::class, 'modifyProduct'])->name('products-edit');
  Route::post('/add-product', [ProductsController::class, 'addProduct'])->name('add-product');
  Route::get('/paginate-product', [ProductsController::class, 'pagination'])->name('paginate-product');
  Route::get('/search-product', [ProductsController::class, 'searchProduct'])->name('search-product');

  Route::post('/uploadfile-product', [ProductsController::class, 'UploadFile'])->name('uploadfile-product');

  //trang thêm sản phẩm
  Route::get('/productspage', [ManageController::class, 'manage_product_add'])->name('productspage');

  //QUẢN LÝ TÀI KHOẢN
  // Route::put('/accounts/{id}', [AccountsController::class, 'update'])->name('accounts-edit');
  Route::get('/paginate-account', [AccountsController::class, 'pagination'])->name('paginate-account');
  Route::get('/search-accounts', [AccountsController::class, 'searchAccount'])->name('search-account');

  //QUẢN LÝ THỂ LOẠI
  Route::delete('/categories/{id}', [CategoriesController::class, 'deleteCategory'])->name('categories-delete');
  Route::put('/categories/{id}', [CategoriesController::class, 'modifyCategory'])->name('categories-edit');
  Route::post('/add-category', [CategoriesController::class, 'addCategory'])->name('add-category');
  Route::get('/paginate-category', [CategoriesController::class, 'pagination'])->name('paginate-category');
  Route::get('/search-category', [CategoriesController::class, 'searchCategory'])->name('search-category');

  //QUẢN LÝ THƯƠNG HIỆU
  Route::delete('/brands/{id}', [BrandsController::class, 'deleteBrand'])->name('brands-delete');
  Route::put('/brands/{id}', [BrandsController::class, 'modifyBrand'])->name('brands-edit');
  Route::post('/add-brand', [BrandsController::class, 'addBrand'])->name('add-brand');
  Route::get('/paginate-brand', [BrandsController::class, 'pagination'])->name('paginate-brand');
  Route::get('/search-brand', [BrandsController::class, 'searchBrand'])->name('search-brand');

  //QUẢN LÝ XUẤT XỨ
  Route::delete('/countries/{id}', [CountriesController::class, 'deleteCountry'])->name('countries-delete');
  Route::put('/countries/{id}', [CountriesController::class, 'modifyCountry'])->name('countries-edit');
  Route::post('/add-country', [CountriesController::class, 'addCountry'])->name('add-country');
  Route::get('/paginate-country', [CountriesController::class, 'pagination'])->name('paginate-country');
  Route::get('/search-country', [CountriesController::class, 'searchCountry'])->name('search-country');
});

//QUẢN LÝ TÀI KHOẢN CÁ NHÂN
Route::prefix('account')->group(function () {
  // VÔ GIAO DIỆN TRANG CÁ NHÂN
  Route::get('/my-account', [ClientController::class, 'MyInfor'])->name('my-account');
  Route::get('/my-address', [ClientController::class, 'MyAddress'])->name('my-address');
  Route::get('/my-order', [ClientController::class, 'MyOrder'])->name('my-order');
  Route::get('/my-password', [ClientController::class, 'MyPassword'])->name('my-password');
  Route::get('/my-order-details/{id}', [ClientController::class, 'MyOrderDetails'])->name('my-order-details');
  // VÔ GIAO DIỆN TRANG CÁ NHÂN

  //THAO TÁC THÔNG TIN CÁ NHÂN
  Route::post('/my-account/login', [ClientController::class, 'loginAcc'])->name('client-login');
  Route::get('/my-account/logout', [ClientController::class, 'logoutAcc'])->name('client-logout');
  Route::post('/my-account/signup', [ClientController::class, 'signUpAcc'])->name('client-signup');
  Route::post('/add-address', [ClientController::class, 'addAddress'])->name('add-address');
  Route::post('/change-password', [ClientController::class, 'changePassword'])->name('change-password');

  Route::put('/cancel-order/{id}', [ClientController::class, 'cancelOrder'])->name('cancel-order');


  Route::put('/my-account/{id}', [ClientController::class, 'updateClient'])->name('my-infor-update');
  Route::post('/my-account', [ClientController::class, 'store'])->name('my-infor-store');
  Route::get('/filter-order', [ClientController::class, 'filterOrderClient'])->name('filter-order');
  Route::get('/paginate-order-client', [ClientController::class, 'pagination'])->name('paginate-order-client');
  Route::get('/search-order-client', [ClientController::class, 'searchOrderClient'])->name('search-order-client');
});
