<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\productController;
use App\Http\Controllers\AllproductController;
use App\Http\Controllers\StripePaymentController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::any('/', [productController::class, 'index']);

Route::any('/category/{id}', [AllproductController::class, 'categoryspec']);

//user

Route::any('/users/register', [UserController::class, 'register']);

Route::any('/users/signin', [UserController::class, 'signin']);

Route::any('/register', [UserController::class, 'registerConfig']);

Route::any('/logout', [UserController::class, 'logout']);

Route::any('/authenticate', [UserController::class, 'authenticate']);

//cart
Route::any('/cart/{id}', [cartController::class, 'cart']);

Route::any('/users/cart' , [cartController::class, 'show']);

Route::any('/users/cart/{id}', [cartController::class, 'deleteCart']);

Route::any('/details/{id}', [AllproductController::class, 'showDetails']);

//order

Route::any('/users/checkout/{id}', [OrderController::class, 'showCheckout']);

Route::any('/checkout/processing/{id}', [OrderController::class, 'checkoutProcessing']);

//payment

Route::any('/users/payments/', [paymentController::class, 'index']);

Route::any('/users/pod/', [paymentController::class, 'pod']);

Route::any('/users/stripe/{totalprice}', [paymentController::class, 'stripe']);

Route::post('stripe/{totalprice}', [StripePaymentController::class, 'stripePost'])->name('stripe.post');

//Admin

Route::any('/admin/signin', [adminController::class, 'index']);

Route::any('/admin/hidden/signup', [adminController::class, 'showsignup']);

Route::any('/admin/authenticate', [adminController::class, 'signupauthenticate']);

Route::any('/admin/dashboard', [adminController::class, 'showdashboard']);

Route::any('/admin/category/create', [productController::class, 'category']);
 
Route::any('/admin/categoryconfig', [productController::class, 'storeCategory']);

Route::any('/admin/category', [productController::class, 'manage']);

Route::any('/admin/category/delete/{id}', [productController::class, 'destroy']);

Route::any('/admin/category/edit/{id}', [productController::class, 'edit']);

Route::any('/admin/category/editconfig/{id}', [productController::class, 'update']);

//all products

Route::any('/admin/allproducts/create', [AllproductController::class, 'create']);

Route::any('/admin/allproductsconfig', [AllproductController::class, 'store']);

Route::any('/admin/allproducts/manage', [AllproductController::class, 'manage']);

Route::any('/admin/allproducts/delete/{id}', [AllproductController::class, 'destroy']);

Route::any('/admin/allproducts/edit/{id}', [AllproductController::class, 'edit']);

