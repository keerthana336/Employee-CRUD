@include('layouts.admin')
    <main id="main" class="main">

    <div class="pagetitle">
      <h1>List Employee</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">List Employee</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List Employee</h5>
        
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">EmployeeID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($employee as $allemployee)
                <tr>
                    <th scope="row">{{$allemployee->id}}</th>
                    <td>{{$allemployee->name}}</td>
                    <td>{{$allemployee->email}}</td>
                    <td>{{$allemployee->gender}}</td>
                    <td>{{$allemployee->employee_id}}</td>
                    <td>
                        <img src="{{asset('uploads/employee/'.$allemployee->profile_image)}}" alt="image" width="70px" height="70px">
                    </td>
                    <td>
                        <a href="{{URL::to('edit-employee/'.$allemployee->id)}}" class="btn btn-primary">Edit</a>

                        <a href="{{URL::to('delete-employee/'.$allemployee->id)}}"  class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@include('includes.footer')
