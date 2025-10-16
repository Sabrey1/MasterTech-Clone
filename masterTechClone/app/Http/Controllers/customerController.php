<?php

namespace App\Http\Controllers;
use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class customerController extends Controller
{
    public function index(){
        $customers = customer::orderBy('id','asc')->paginate(10);
        return view('Admin.Customer.customer',[
            'customers' => $customers
        ]);
    }

    public function create(){
        return view("Admin.Customer.CreateCustomer");
    }
    public function edit(){
        return view("Admin.Customer.CustomerEdit");
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
        ]);

        if($validator->passes()){
            $customers = new customer();
            if ($request->hasFile('image')) {
                    $path = $request->file('image')->store('customer', 'public');
                } else {
                    $path = null;
            }

            $customers->image = $path;
            $customers->name = $request->input('name');
            $customers->gender = $request->input('gender');
            $customers->email = $request->input('email');
            $customers->dob = $request->input('dob');
            $customers->phoneNumber = $request->input('phoneNumber');
            $customers->address = $request->input('address');
            $customers->save();

            session()->flash('success','Customer created successfully');
            return response()->json(
                [
                    'status'=>200,
                    'message'=>'Customer created successfully'
                ]
                );
        }

        else{
            return response([
                'status'=>500,
                'message'=>'Customer not created',
                'errors'=>$request->errors()
            ]);
        }



    }

    public function update(){
        return "update";
    }
    public function delete(string $id){
        $customers = customer::find($id);

        if($customers == null){
            return redirect()->back();
        }
        $customers->delete();

        //redirect
        return redirect()->back()->with('success','Customer deleted successfully');
    }
}
