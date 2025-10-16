<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductCategory;
class productController extends Controller
{
    public function index(){
        $products = product::orderBy('id','asc')->paginate(10);
        return view('Admin.Product.product',[
            'products' => $products
        ]);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'productCategory' => 'required|string',
            'price'=> 'required',
            'stock'=> 'required'
        ]);

        if($validator->passes()){
        $products = new product();
            if($request->hasfile('image')){
                $path = $request->file('image')->store('products','public');
            }
            else{
                $path = null;
            }
            $category = ProductCategory::where('name', $request->input('productCategory'))->first();
            if (!$category) {
                return response()->json(['error' => 'Category not found'], 404);
            }

            $products->name = $request->name;
            $products->productCategory = $category->id;
            $products->price = $request->price;
            $products->stock = $request->stock;
            $products->description = $request->description;
            $products->image = $path;
            $products->save();

            session()->flash('success','Product created successfully');
                return response()->json(
                    [
                        'status'=>200,
                        'message'=>'Product created successfully'
                    ]
                    );
                }
                else{
            return response([
                'status'=>500,
                'message'=>'Product not created',
                'errors'=>$validator->errors()
            ]);
        }
    }

    public function create(){
         // Get all categories for dropdown
        $categories = ProductCategory::orderBy('name')->get();

        return view('Admin.Product.CreateProduct', compact('categories'));

    }

    public function edit(string $id){
        $product = product::find($id);
         $categories = ProductCategory::orderBy('name')->get();
        return view("Admin.Product.EditProduct", compact('product','categories'));
    }

    public function delete(string $id){
        $product = product::find($id);

        if($product == null){
            return redirect()->back();
        }
        $product->delete();

        return redirect()->back()->with('success','Product deleted successfully');
    }

    public function update(string $id, Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'productCategory' => 'required|string',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $product = Product::findOrFail($id);

    $product->name = $request->input('name');
    $product->productCategory = $request->input('productCategory');
    $product->price = $request->input('price');
    $product->stock = $request->input('stock');
    $product->image = $request->file('image')
        ? $request->file('image')->store('products', 'public')
        : $product->image;
    $product->description = $request->input('description');

    $product->save();

    return redirect()->route('product')
        ->with('success', 'Product updated successfully');
}
}
