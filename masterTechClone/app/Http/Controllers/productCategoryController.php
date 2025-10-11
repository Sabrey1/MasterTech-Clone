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
            if ($request->hasFile('image')) {
                    $path = $request->file('image')->store('categories', 'public');
                } else {
                    $path = null;
                }

            $categories->image = $path;
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
       $categories = ProductCategory::find($id);

       if($categories == null){
           return redirect()->back();
       }
        $categories->delete();

        //redirect
        return redirect()->back()->with('success','Category deleted successfully');
    }

    public function update(string $id, Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'description' => 'required'
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    $category = ProductCategory::findOrFail($id);
    $category->name = $request->input('name');
    $category->description = $request->input('description');
    $category->image = $request->file('image')
        ? $request->file('image')->store('categories', 'public')
        : $category->image; // keep old image if not uploaded
    $category->save();

     return redirect()->route('productCategory')
        ->with('success', 'Category updated successfully');
}

}
