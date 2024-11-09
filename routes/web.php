<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

//Rota Home
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/product/{id}', [HomeController::class, 'productDetails'])->name('product.details');


Route::middleware(['auth'])->group(function(){
    Route::get('/account-dashboard', [UserController::class, 'index'])->name('user.index');
});

Route::middleware(['auth', AuthAdmin::class])->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/brands', [AdminController::class, 'brands'])->name('admin.brands');
    Route::get('/admin/brand/add', [AdminController::class,'add_brand'])->name('admin.brand.add');
    Route::post('/admin/brand/store',[AdminController::class,'brand_store'])->name('admin.brand.store');
    Route::get('/admin/brand/edit/{id}',[AdminController::class,'brand_edit'])->name('admin.brand.edit');
    Route::put('/admin/brand/update', [AdminController::class,'brand_update'])->name('admin.brand.update');
    Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('/admin/products/create', [AdminController::class, 'create_product'])->name('admin.product.create');
    Route::post('/admin/products/store', [AdminController::class, 'store_product'])->name('admin.product.store');
    Route::get('/admin/products/edit/{id}', [AdminController::class, 'edit'])->name('admin.product.edit');
    Route::delete('/admin/products/delete/{id}', [AdminController::class, 'destroy'])->name('admin.product.delete');
    Route::put('/admin/products/update/{id}', [AdminController::class, 'update'])->name('admin.product.update');

});
