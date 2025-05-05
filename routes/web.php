<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

// shop routes
Route::get("/", [ShopController::class, 'index'])->name('shop.index');
Route::get('/shirt/{slug}', [ShopController::class, 'detail'])->name('shop.detail');


Route::get("/login", [AuthController::class, 'loginForm'])->name("loginForm");
Route::post("/login", [AuthController::class, 'login'])->name("login");
Route::post("/logout", [AuthController::class, 'logout'])->name('logout');


Route::get("/signup", [AuthController::class, 'signupForm'])->name("signupForm");
Route::post("/register", [AuthController::class, 'register'])->name("register");





// Admin Dashboard Routes
Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get("/main", [AdminController::class, 'index'])->name('admin.main');
    Route::get("/products", [AdminController::class, 'products'])->name('admin.products');
    Route::get("/orders", [AdminController::class, 'orders'])->name('admin.orders');

    // product crud routes
    Route::get("/product/create", [ProductController::class, 'create'])->name('admin.products.create');
    Route::post("/product/store", [ProductController::class, 'store'])->name('admin.products.store');
    Route::get("/product/edit", [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::post("/product/destroy", [ProductController::class, 'delete'])->name('admin.products.destroy');

    //categories
    Route::get("/categories", [CategoryController::class, 'index'])->name('admin.cat');
    Route::get("/category/create", [CategoryController::class, 'create'])->name('cat.create');
    Route::post("/category/store", [CategoryController::class, 'store'])->name('cat.store');
    Route::get("/category/delete/{id}", [CategoryController::class, 'destroy'])->name('cat.delete');

    Route::post("/category/update", [CategoryController::class, 'update'])->name('cat.update');
});
