<head>
<style>
  .error{
    color: red;
  }
</style>
</head>

@extends('layouts.admin')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Add Employee</h1>
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
              <h5 class="card-title">Add Employee</h5>
              <!-- Horizontal Form -->
              <form id="addemp" action="{{ url('insert-employee') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name = "email">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Employee ID</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="employee_id">
                  </div>
                </div>
                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender"  value="female" >
                      <label class="form-check-label" for="gridRadios1">
                        female
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender"  value="male">
                      <label class="form-check-label" for="gridRadios2">
                        male
                      </label>
                    </div>
                    <!-- <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
                      <label class="form-check-label" for="gridRadios3">
                        Third disabled radio
                      </label>
                    </div> -->
                  </div>
                </fieldset>
                <div class="row mb-3">
                  <label for="formFile" class="col-sm-2 col-form-label">Profile</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file" name="profile_image" onchange="loadFile(event)"><br>
                      <img id="output" src="{{URL::to('admin/assets/img/avatar.jpg')}}" style="height: 250px;width: 250px;object-fit: cover;"/>
                    </div>
                </div>
                <div class="text-center">
                  <button type="submit" onclick="FormSubmit()" class="btn btn-primary float-start">Submit</button>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };

function FormSubmit() {
    $("#addemp").validate({
      rules        : {
        name    : {
          required : true,
        },
        email    : {
          required : true,
        },
        gender    : {
          required : true,
        },
        employee_id    : {
          required : true,
        },
        profile_image    : {
          required : true,
        }
      },
      messages     : {
        name       : "Name is required",
        email       : "Email is required",
        employee_id  : "ID is required",
        gender       : "Gender is required",
        profile_image  : "Image is required",
      },
      submitHandler: function (form) {
        form.submit();
      }
    });
  }
</script>