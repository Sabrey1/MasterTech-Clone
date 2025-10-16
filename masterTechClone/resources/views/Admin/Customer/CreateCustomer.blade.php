@extends('Admin.Layout.master')

@section('content')
    <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                          <h2>Create Customer<h2>
                          <a href="/customer" class="btn btn-outline-danger btn-sm ">Back</a>
                    </div>
                    <form class="forms-sample" id="formCreateCustomer" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Customer Name">
                        <p></p>
                      </div>
                      <div class="form-group">
                        <label for="gender">Gender</label>
                        <input type="text" class="form-control" name="gender" id="gender" placeholder="Gender">
                        <p></p>
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                        <p></p>
                      </div>
                      <div class="form-group">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="Phone Number">
                        <p></p>
                      </div>
                      <div class="form-group">
                        <label for="dob">Date Of Birth</label>
                        <input type="text" class="form-control" name="dob" id="dob" placeholder="Phone Number">
                        <p></p>
                      </div>

                      <div class="form-group">
                        <label>File upload</label><br>
                        <input type="file" name="image" id="image" class="file-upload">
                    </div>
                      <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" name="address" id="address" rows="2"></textarea>
                      </div>
                      <button type="button" onclick="StoreCustomer('#formCreateCustomer')" class="btn btn-success mr-2">Save</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection
@section('scripts')
<script>

    const StoreCustomer = (form) => {
        let payload = new FormData($(form)[0]);

        $.ajax({
            type: 'POST',
            url: '{{ route('customer.store') }}',
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
                    window.location.href = "{{ route('customer')}}";

                }else{
                    let errors = response.errors;

                    if(errors.name != null){
                        $('#name').addClass('is-invalid').siblings('p').addClass('text-danger').text(errors.name);
                    }else{
                        $('#name').removeClass('is-invalid').siblings('p').removeClass('text-danger').text('');
                    }
                    if(errors.gender != null){
                        $('#gender').addClass('is-invalid').siblings('p').addClass('text-danger').text(errors.gender);
                    }else{
                        $('#gender').removeClass('is-invalid').siblings('p').removeClass('text-danger').text('');
                    }
                    if(errors.image != null){
                        $('#image').addClass('is-invalid').siblings('p').addClass('text-danger').text(errors.image);
                    }else{
                        $('#image').removeClass('is-invalid').siblings('p').removeClass('text-danger').text('');
                    }
                    if(errors.email != null){
                        $('#email').addClass('is-invalid').siblings('p').addClass('text-danger').text(errors.email);
                    }else{
                        $('#email').removeClass('is-invalid').siblings('p').removeClass('text-danger').text('');
                    }
                    if(errors.phoneNumber != null){
                        $('#phoneNumber').addClass('is-invalid').siblings('p').addClass('text-danger').text(errors.phoneNumber);
                    }else{
                        $('#phoneNumber').removeClass('is-invalid').siblings('p').removeClass('text-danger').text('');
                    }
                    if(errors.dob != null){
                        $('#dob').addClass('is-invalid').siblings('p').addClass('text-danger').text(errors.dob);
                    }else{
                        $('#dob').removeClass('is-invalid').siblings('p').removeClass('text-danger').text('');
                    }
                    if(errors.address != null){
                        $('#address').addClass('is-invalid').siblings('p').addClass('text-danger').text(errors.address);
                    }else{
                        $('#address').removeClass('is-invalid').siblings('p').removeClass('text-danger').text('');
                    }
                }
            }
        })
    }
</script>
@endsection

