@extends('employee_side.dashboard-layout.layout')
@section('department_addform')
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-12 text-center">
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
                              <li style="list-style: none">{{ $item }}</li>
                            @endforeach
                        </div>
                        @endif
                        <div class="col-12 text-center d-flex flex-column justify-content-center align-items-center">
                            {{-- @if (empty($employeeData->user_image))
                            <div class="userImages">
                               <img src="https://img.freepik.com/premium-vector/brunette-man-avatar-portrait-young-guy-vector-illustration-face_217290-1035.jpg?w=2000">
                            </div>
                            @else
                            <div class="userImages">
                               <img src="" alt="user-avatar" class="img-circle img-fluid">
                            </div>
                            @endif --}}
                         </div>
                         @foreach ($adminDetails as $item)

                         @endforeach
                <div class="card p-5">
                    @if (Auth::guard('employee')->user())
                    <form action="{{ route('hraddDepartments') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- <h5 class="text-center mb-4">Add Your Bank Accounts Details.</h5> --}}
                        <div class="row justify-content-between text-start">
                            {{-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Bank Name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="fname" placeholder="Enter your first name"> </div> --}}
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Department name<span class="text-danger"> *</span></label> <input type="text" name="departmentname" id="departmentname" class="form-control" placeholder="Enter departments" value="{{ old('departments') }}"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Department Supervisior Name<span class="text-danger"> *</span></label> <input type="text" name="supervisorname" id="supervisorname" class="form-control" value="{{ $item->employee_name }}" disabled> </div>
                        </div>
                        <div class="row justify-content-between text-start">
                            <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label">Department working details<span class="text-danger"> *</span></label> <textarea class="form-control" name="departmentworkdetails" id="departmentworkdetails" cols="30" rows="10" placeholder="Department details">{{ old('departmentworkdetails') }}</textarea> </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-12 d-flex align-items-center">
                                <div class="py-1">
                                    <button class="btn btn-primary text-white">Add Department</button>
                                 </div>
                                <div class="py-1 px-2">
                                   <button class="btn btn-danger"><a class="text-white text-decoration-none" href="{{ route('hrDashboard') }}">Back</a></button>
                                </div>
                             </div>
                        </div>
                    </form>
                    @else
                    <form action="{{ route('addDepartments') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- <h5 class="text-center mb-4">Add Your Bank Accounts Details.</h5> --}}
                        <div class="row justify-content-between text-start">
                            {{-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Bank Name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="fname" placeholder="Enter your first name"> </div> --}}
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Department name<span class="text-danger"> *</span></label> <input type="text" name="departmentname" id="departmentname" class="form-control" placeholder="Enter departments" value="{{ old('departments') }}"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Department Supervisior Name<span class="text-danger"> *</span></label> <input type="text" name="supervisorname" id="supervisorname" class="form-control" value="{{ $item->employee_name }}" disabled> </div>
                        </div>
                        <div class="row justify-content-between text-start">
                            <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label">Department working details<span class="text-danger"> *</span></label> <textarea class="form-control" name="departmentworkdetails" id="departmentworkdetails" cols="30" rows="10" placeholder="Department details">{{ old('departmentworkdetails') }}</textarea> </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-12 d-flex align-items-center py-2">
                                <div class="py-3">
                                    <button class="btn btn-primary text-white">Add Department</button>
                                 </div>
                                <div class="py-3 px-2">
                                   <button class="btn btn-danger"><a class="text-white text-decoration-none" href="{{ route('adminDashboard') }}">Back</a></button>
                                </div>
                             </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection



