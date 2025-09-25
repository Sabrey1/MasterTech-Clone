<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productCategoryController;

//User || client
Route::get('/', function () {
    return view('HomePage');
});

// Admin
Route::get('/admin',function(){
    return view('Admin.AdminPage');
})->name('adminPage');

Route::get('/dashboard', function(){
    return view('Admin.Dashboard.dashboard');
})->name('dashboard');

// product
Route::get('/product',function(){
    return view('Admin.Product.product');
})->name('product');
//create
Route::get('/product/create',function(){
    return view('Admin.Product.CreateProduct');
})->name('productCreate');


// Category
Route::get('/category',[productCategoryController::class,'index'])->name('product');
//create
Route::get('/category/create',function(){
    return view('Admin.Category.CreateCategory');
})->name('productCategoryCreate');

// customer
Route::get('/customer',function(){
    return view('Admin.Customer.customer');
})->name('customer');
//create
Route::get('/customer/create',function(){
    return view('Admin.Customer.CreateCustomer');
})->name('customerCreate');


// employee
Route::get('/employee',function(){
    return view('Admin.Employee.employee');
})->name('employee');

