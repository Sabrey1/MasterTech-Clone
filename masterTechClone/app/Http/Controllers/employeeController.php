<?php

namespace App\Http\Controllers;
use App\Models\employee;
use Illuminate\Http\Request;

class employeeController extends Controller
{
    public function index(){
        $employees = employee::orderBy('id','asc')->paginate(10);
        return view('Admin.Employee.employee',[
            'employees' => $employees
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
