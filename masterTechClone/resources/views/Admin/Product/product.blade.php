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
                          <h2>Product</h2>
                          <a href="/product/create" class="btn btn-primary btn-sm ">New Product</a>
                        </div>

                        <div class="table-responsive">
                          <table class="table table-striped table-hover">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Status</th>

                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($products as $product)


                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td> @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image)}}"
                                            alt="{{ $product->name }}"
                                            width="60" height="60"
                                            style="object-fit: cover; border-radius: 8px;">
                                    @else
                                        <span>No Image</span>
                                    @endif</td>
                                <td>{{$product->name}}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->stock}}</td>
                                <td>
                                    @if ($product->stock > 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('product.edit',$product->id)}}" class="btn btn-sm btn-outline-primary mr-1">Edit</a>
                                    <a href="{{route('product.delete',$product->id)}}" onclick="return confirm('Are you sure delete?')" class="btn btn-sm btn-outline-danger">Delete</a>
                                </td>
                              </tr>
                              @endforeach

                            </tbody>
                          </table>
                          <div class="mt-3">
                            {{-- {{ $products->links() }} --}}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
    @endsection

