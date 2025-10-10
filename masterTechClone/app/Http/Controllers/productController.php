<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index(){
        $products = product::orderBy('id','asc')->paginate(10);
        return view('Admin.Product.product',[
            'products' => $products
        ]);
    }

    public function store(){
       
    }

    public function create(){
        return view("Admin.Product.CreateProduct");
    }

    public function edit(){
        return "edit";
    }

    public function delete(){
        return "delete";
    }

    public function update(){
        return "update";
    }
}
