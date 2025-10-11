@extends('Admin.Layout.master')

@section('content')
    <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                          <h2>Create Product<h2>
                          <a href="/product" class="btn btn-outline-danger btn-sm ">Back</a>
                    </div>
                    <form class="forms-sample" id="formCreateProduct" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Product Name">
                        <p></p>
                      </div>
                      <div class="mb-3">
                        <label>Category</label>
                        <select name="productCategory" class="form-select">
                            @foreach ($categories as $category)
                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                      <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" name="price" id="price" placeholder="Price">
                        <p></p>
                      </div>
                      <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" name="stock" id="stock" placeholder="Stock">
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
                      <button onclick="StoreProduct('#formCreateProduct')" type="button" class="btn btn-success mr-2">Save</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection

@section('scripts')
<script>

    const StoreProduct = (form) => {
        let payload = new FormData($(form)[0]);

        $.ajax({
            type: 'POST',
            url: '{{ route('product.store') }}',
            data: payload,
            dateType:'json',
            contentType: false,
            processData: false,
            success: function(response){
                if(response.status == 200){
                     //form reset
                    $('form').trigger('reset')

                    // remove field error
                    $('input').removeClass('is-invalid').siblings('p').removeClass('text-danger').text('');

                    // redirect
                    window.location.href = "{{ route('product')}}";

                }else{
                    let errors = response.errors;

                    if(errors.name != null){
                        $('#name').addClass('is-invalid').siblings('p').addClass('text-danger').text(errors.name);
                    }else{
                        $('#name').removeClass('is-invalid').siblings('p').removeClass('text-danger').text('');
                    }
                    if(errors.description != null){
                        $('#description').addClass('is-invalid').siblings('p').addClass('text-danger').text(errors.description);
                    }else{
                        $('#description').removeClass('is-invalid').siblings('p').removeClass('text-danger').text('');
                    }
                }
            }
        })
    }
</script>
@endsection
