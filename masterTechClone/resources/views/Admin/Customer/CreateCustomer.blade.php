@extends('Admin.Layout.master')

@section('content')
    <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                          <h2>Create Customer<h2>
                          <a href="/category" class="btn btn-outline-danger btn-sm ">Back</a>
                    </div>
                    <form class="forms-sample" id="formCreateProduct" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Customer Name">
                        <p></p>
                      </div>

                      <div class="form-group">
                        <label>File upload</label><br>
                        <input type="file" name="image" id="image" class="file-upload">
                    </div>
                      <div class="form-group">
                        <label for="description">description</label>
                        <textarea class="form-control" name="description" id="description" rows="2"></textarea>
                      </div>
                      <button type="button" class="btn btn-success mr-2">Save</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection


