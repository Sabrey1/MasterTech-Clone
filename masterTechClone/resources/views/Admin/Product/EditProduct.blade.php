@extends('Admin.Layout.master')

@section('content')
    <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                          <h2>Create Product<h2>
                          <a href="/product" class="btn btn-outline-danger btn-sm ">Back</a>
                    </div>
                    <form class="forms-sample" id="formCreateProduct" action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" value="{{ $product->name }}" name="name" id="name" placeholder="Product Name">
                        <p></p>
                      </div>
                      <div class="mb-3">
                        <label>Category</label>
                        <select name="productCategory" class="form-select">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $product->productCategory ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                      <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" value="{{$product -> price}}" class="form-control" name="price" id="price" placeholder="Price">
                        <p></p>
                      </div>
                      <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" value="{{$product -> stock}}" name="stock" id="stock" placeholder="Stock">
                        <p></p>
                      </div>

                      <div class="form-group">
                        <label>Current Image</label><br>
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}"
                                class="rounded-lg border mt-2"
                                width="120">
                        @else
                            <p>No image uploaded</p>
                        @endif
                    </div>

                    <div class="form-group mt-3">
                        <label>Upload New Image</label><br>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="2">{{$product -> description}}</textarea>
                      </div>
                      <button type="submit" class="btn btn-success mr-2">Update</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection
