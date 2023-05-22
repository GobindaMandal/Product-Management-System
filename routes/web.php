<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BranchController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\Product;
use App\Http\Controllers\Backend\PurchaseController;
use App\Http\Controllers\Backend\SaleController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'/branch'],function(){
    Route::get('/add',[BranchController::class,'add'])->name('branchadd');
    Route::post('/store',[BranchController::class,'store'])->name('branchstore');
    Route::get('/show',[BranchController::class,'show'])->name('branchshow');
    Route::get('/edit/{id}',[BranchController::class,'edit'])->name('branchedit');
    Route::post('/update/{id}',[BranchController::class,'update'])->name('branchupdate');
    Route::get('/destroy/{id}',[BranchController::class,'destroy'])->name('branchdestroy');
    Route::get('/status/{id}',[BranchController::class,'status'])->name('status');
});

Route::group(['prefix'=>'/product'],function(){
    Route::get('/add',[ProductController::class,'add'])->name('productadd');
    Route::post('/store',[ProductController::class,'store']);
    Route::get('/show',[ProductController::class,'show']);
    Route::get('/edit/{id}',[ProductController::class,'edit']);
    Route::post('/update/{id}',[ProductController::class,'update']);
    Route::get('/destroy/{id}',[ProductController::class,'destroy']);
});

Route::group(['prefix'=>'/purchse'],function(){
    Route::get('/add',[PurchaseController::class,'add'])->name('purchaseadd');
    Route::post('/store',[PurchaseController::class,'store']);
    Route::get('/show',[PurchaseController::class,'show']);
    Route::get('/edit/{id}',[PurchaseController::class,'edit']);
    Route::get('/find/{id}',[PurchaseController::class,'find']);
    Route::post('/update/{id}',[PurchaseController::class,'update']);
    Route::get('/destroy/{id}',[PurchaseController::class,'destroy']);
    Route::get('/stock',[PurchaseController::class,'stock'])->name("stock");
});

Route::group(['prefix'=>'/sale'],function(){
    Route::get('/add',[SaleController::class,'add'])->name('saleadd');
    Route::post('/store',[SaleController::class,'store']);
    Route::get('/show',[SaleController::class,'show']);
    Route::get('/edit/{id}',[SaleController::class,'edit']);
    Route::get('/find/{id}',[SaleController::class,'find']);
    Route::post('/update/{id}',[SaleController::class,'update']);
    Route::get('/destroy/{id}',[SaleController::class,'destroy'])->name("destroy");
    Route::get('/salesShow/{id}',[SaleController::class,'salesShow']);
    Route::get('/print/{id}',[SaleController::class,'print'])->name("print");
});


Route::get('/admin', function () {
    return view('backend.dashboard');
})->name("dashboard");


// Route::get('/admin/addproduct', function () {
//     return view('backend.pages.product.addproduct');
// })->name("addproduct");


// Route::get('/admin/manageproduct', function () {
//     return view('backend.pages.product.manageproduct');
// })->name("manageproduct");
