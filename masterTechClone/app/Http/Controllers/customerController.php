<?php

namespace App\Http\Controllers;
use App\Models\customer;
use Illuminate\Http\Request;

class customerController extends Controller
{
    public function index(){
        $customers = customer::orderBy('id','asc')->paginate(10);
        return view('Admin.Customer.customer',[
            'customers' => $customers
        ]);
    }

    public function store(){
        return "store";
    }
    public function create(){
        return "create";
    }
    public function edit(){
        return "edit";
    }
    public function update(){
        return "update";
    }
    public function delete(){
        return "delete";
    }
}
