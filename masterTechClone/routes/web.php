<?php

use App\Http\Controllers\customerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productCategoryController;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\productController;
use App\Models\productCategory;
use App\Models\Product;

// Login
Route::get('/login', function () {
    return view('Auth.Login');
})->name('login');
Route::get('/register', function () {
    return view('Auth.Register');
})->name('register');;



//User || client
// Route::get('/', function () {
//     return view('HomePage');
// });

Route::get('/', function () {
    // Get all categories from the database
    $categories = productCategory::all();
    $products = Product::all();
    // Pass data to the view
    return view('HomePage', compact('categories', 'products'));
});

// Admin
Route::get('/admin',function(){
    return view('Admin.AdminPage');
})->name('adminPage');

Route::get('/dashboard', function(){
    return view('Admin.Dashboard.dashboard');
})->name('dashboard');

// product
Route::get('/product',[productController::class,'index'])->name('product');
//create
Route::get('/product/create', [productController::class,'create'])->name('product.create');
//delete
Route::get('/product/{id}',[productController::class,'delete'])->name('product.delete');
//edit
Route::get('/product/edit/{id}',[productController::class,'edit'])->name('product.edit');
//store
Route::post('/product/store',[productController::class,'store'])->name('product.store');
//update
Route::put('/product/update/{id}',[productController::class,'update'])->name('product.update');


// Category
Route::get('/category',[productCategoryController::class,'index'])->name('productCategory');
//create
Route::get('/category/create', [productCategoryController::class,'create'])->name('productCategory.create');
//delete
Route::get('/category/{id}',[productCategoryController::class,'delete'])->name('productCategory.delete');
//edit
Route::get('/category/edit/{id}',[productCategoryController::class,'edit'])->name('productCategory.edit');
//store
Route::post('/category/store',[productCategoryController::class,'store'])->name('productCategory.store');
//update
Route::put('/category/update/{id}',[productCategoryController::class,'update'])->name('productCategory.update');

// customer
Route::get('/customer',[customerController::class,'index'])->name('customer');
//create
Route::get('/customer/create',[customerController::class,'create'])->name('customer.create');
//edit
Route::get('/customer/edit',[customerController::class,'edit'])->name('customer.edit');
//delete
Route::get('/customer/{id}',[customerController::class,'delete'])->name('customer.delete');
//update
Route::put('/customer/update/{id}',[customerController::class,'update'])->name('customer.update');


// employee
Route::get('/employee',[employeeController::class,'index'])->name('employee');
//create
Route::get('/employee/create',[employeeController::class,'create'])->name('employee.create');
//edit
Route::get('/employee/edit',[employeeController::class,'edit'])->name('employee.edit');
//delete
Route::get('/employee/{id}',[employeeController::class,'delete'])->name('employee.delete');
//update
Route::put('/employee/update/{id}',[employeeController::class,'update'])->name('employee.update');

