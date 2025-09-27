@extends('Admin.Layout.master')
    @section('content')
        <div class="col-md-12 grid-margin">
                    <div class="card">
                      <div class="card-body">

                        @if(Session::has('success'))
                            <div class="alert bg-success alert-dismissible fade show d-flex justify-content-between align-items-center p-2" role="alert">
                               <h3>{{Session::get('success')}}</h3>
                               <i class="bi bi-x" data-bs-dismiss="alert" aria-label="Close"></i>

                            </div>
                        @endif

                        <div class="d-flex justify-content-between align-items-center">
                          <h2>Customer</h2>
                          <a href="/customer/create" class="btn btn-primary btn-sm ">New Product</a>
                        </div>

                        <div class="table-responsive">
                          <table class="table table-striped table-hover">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>DOB</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>

                              @foreach ($customers as $customer)

                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td> @if ($customer->image)
                                        <img src="{{ asset('storage/' . $customer->image)}}"
                                            alt="{{ $customer->name }}"
                                            width="60" height="60"
                                            style="object-fit: cover; border-radius: 8px;">
                                    @else
                                        <span>No Image</span>
                                    @endif</td>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->gender}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->dob}}</td>
                                <td>
                                    <a href="{{route('customer.edit',$customer->id)}}" class="btn btn-sm btn-outline-primary mr-1">Edit</a>
                                    <a href="{{route('customer.delete',$customer->id)}}" onclick="return confirm('Are you sure delete?')" class="btn btn-sm btn-outline-danger">Delete</a>
                                </td>
                              </tr>
                              @endforeach

                            </tbody>
                          </table>
                          <div class="mt-3">
                            {{ $customers->links() }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
    @endsection

