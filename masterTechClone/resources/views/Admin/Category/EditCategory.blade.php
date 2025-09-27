@extends('Admin.Layout.master')

@section('content')
    <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                          <h2>Create Category</h2>
                          <a href="/category" class="btn btn-outline-danger btn-sm ">Back</a>
                    </div>
                    <form action="{{route('productCategory.update',$categories->id)}}" class="forms-sample" id="formCreateProduct" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" value="{{($categories->name !=''?$categories->name:'null')}}" name="name" id="name" placeholder="Category Name">
                        <p></p>
                      </div>

                      <div class="form-group">
                        <label>File upload</label><br>
                        <input type="file" name="image" value="{{($categories->image)}}" id="image" class="file-upload">
                    </div>
                      <div class="form-group">
                        <label for="description">description</label>
                        <textarea class="form-control" name="description" id="description" rows="2">{{$categories->description}}</textarea>
                      </div>
                      <button type="submit"  class="btn btn-success mr-2">Update</button>
                      <button type="reset" class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection


