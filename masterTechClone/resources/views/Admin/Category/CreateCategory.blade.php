@extends('Admin.Layout.master')

@section('content')
    <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                          <h2>Create Category<h2>
                          <a href="/category" class="btn btn-outline-danger btn-sm ">Back</a>
                    </div>
                    <form class="forms-sample" id="formCreateCategoryProduct" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Category Name">
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
                      <button onclick="StoreCategory('#formCreateCategoryProduct')" type="button" class="btn btn-success mr-2">Save</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection

@section('scripts')
<script>

    const StoreCategory = (form) => {
        let payload = new FormData($(form)[0]);

        $.ajax({
            type: 'POST',
            url: '{{ route('productCategory.store') }}',
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
                    window.location.href = "{{ route('productCategory')}}";

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

