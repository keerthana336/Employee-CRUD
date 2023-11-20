@extends('layouts.admin')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Edit Employee</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Employee</a></li>
          <!-- <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Layouts</li> -->
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Employee</h5>
              <!-- Horizontal Form -->
              <form action="{{ url('update-employee/'.$employee->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{$employee->name}}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" value="{{$employee->email}}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Employee ID</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="employee_id" value="{{$employee->employee_id}}">
                  </div>
                </div>
                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender"  value="female" {{ $employee->gender == 'female' ? 'checked' : '' }}>
                      <label class="form-check-label" for="gridRadios1">
                        female
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender"  value="male" {{ $employee->gender == 'male' ? 'checked' : '' }}>
                      <label class="form-check-label" for="gridRadios2">
                        male
                      </label>
                    </div>
                  </div>
                </fieldset>
                <div class="row mb-3">
                  <label for="formFile" class="col-sm-2 col-form-label">Profile</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file" name="profile_image" onchange="loadFile(event)">
                      @if($employee->profile_image)
                      <img id="output" src="{{asset('uploads/employee/'.$employee->profile_image)}}" alt="image" style="height: 250px;width: 250px;object-fit: cover;">
                      @else
                      <img id="output" src="{{URL::to('assets/img/avatar.jpg')}}" style="height: 250px;width: 250px;object-fit: cover;"/>
                      @endif
                    </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary float-start">Update</button>
                  <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>
        </div>
      </div>
    </section>
</main><!-- End #main -->
@include('includes.footer')
@endsection

<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };

//     function FormSubmit() {
//     $("#category").validate({
//       rules : {
//       name : {
//         required : true,
//       },
//       editor1 : {
//         required : true,
//       },
//       },
//       messages     : {
//         name       : "Name is required",
//       },
//       submitHandler: function (form) {
//         form.submit();
//       }
//     });
//   }
</script>