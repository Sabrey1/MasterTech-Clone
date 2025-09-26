<?php

namespace App\Http\Controllers;
use App\Models\productCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class productCategoryController extends Controller
{
    public function index(){
       $categories = ProductCategory::orderBy('id','asc')->paginate(10);
        return view('Admin.Category.Category', compact('categories'));
    }
    public function create(){
        return view('Admin.Category.CreateCategory');
    }
     public function edit(string $id){
        $categories = ProductCategory::find($id);
        return view('Admin.Category.EditCategory', compact('categories'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required'

        ]);
        if($validator->passes()){
            $categories = new productCategory();
            $categories->image = $path ?? null;
            $categories->name = $request->input('name');
            $categories->description = $request->input('description');
            $categories->save();

            session()->flash('success','Category created successfully');
            return response()->json(
                [
                    'status'=>200,
                    'message'=>'Category created successfully'
                ]
                );

        }else{
            return response([
                'status'=>500,
                'message'=>'Category not created',
                'errors'=>$validator->errors()
            ]);
        }
    }


    public function delete(string $id){

    }
}
