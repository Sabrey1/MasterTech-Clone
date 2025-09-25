<?php

namespace App\Http\Controllers;
use App\Models\productCategory;
use Illuminate\Http\Request;

class productCategoryController extends Controller
{

    public function index(){
       $categories = ProductCategory::orderBy('id','desc')->paginate(10);
return view('Admin.Category.Category', compact('categories'));
    }
    public function store(){

    }
    public function create(){

    }
    public function edit(){

    }
    public function delete(){

    }
}
