@extends('employee_side.dashboard-layout.layout')
@section('create_employee_designation_page')
<div class="card mb-3">
    <div class="card-header d-flex align-items-center">
        <a class="btn btn-danger me-5" href="{{ route('createProjectsPage') }}">Back</a>
        <h5 class="mb-0">Designation</h5>
    </div>
    <div class="card-body bg-light">
        {{--  --}}
    @if (Session::has('error_message'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error</strong> {{ Session::get('error_message'); }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (Session::has('success_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success:</strong> {{ Session::get('success_message'); }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
     @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show px-4" role="alert">
        @foreach ($errors->all() as $item)
        <li>{{ $item }}</li>
        @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
        {{--  --}}
        <div class="row">
            <div class="col-md-6 p-3">
                <div class="projectManagement">
                  <img src="admin/dist/img/project.jpg.jpg" alt="">
                </div>
            </div>
            <div class="col-md-6 p-3">
                <div class="d-flex flex-column justify-content-center align-items-start p-3">
                    <h3>
                        Create designation
                    </h3>
                    <p class="textparagraph">
                        Create a new employee designation page.
                    </p>
                    <br>
                    <form action="{{ route('createDesignations') }}" class="row" method="post">
                        @csrf
                        <div class="col-12">
                         <label class="form-label" for="first-name">Designation Name</label>
                         <input type="text" class="form-control w-100" id="employeeDesignation" name="employeeDesignation" placeholder="Employee designation" value="{{old('username')}}">
                        </div>
                        <br>
                        <div class="d-flex mt-3">
                           <button class="btn btn-primary w-100" type="submit">Create designation</button>
                        </div>
                     </form>
                </div>
            </div>
        </div>
        {{--  --}}
     </div>
     
    <br>
  </div>
@endsection