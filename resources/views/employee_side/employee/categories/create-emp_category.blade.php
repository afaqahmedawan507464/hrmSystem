@extends('employee_side.dashboard-layout.layout')
@section('create_emp_category')
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-12 text-center">
            <p class="blue-text">Employee Categories Form.</p>
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
                     {{-- @foreach ($adminDetails as $item)

                     @endforeach --}}
            <div class="card p-5">
                <form action="{{ route('hraddEmployeeCategory') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{-- <h5 class="text-center mb-4">Add Your Bank Accounts Details.</h5> --}}
                    <div class="row justify-content-between text-start">
                        {{-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Bank Name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="fname" placeholder="Enter your first name"> </div> --}}
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Emp payments Details<span class="text-danger"> *</span></label> <input type="number" name="emppaymentsdetails" id="emppaymentsdetails" class="form-control" placeholder="payment detail about this category" value="{{ old('emppaymentsdetails') }}"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Emp grade<span class="text-danger"> *</span></label> <input type="text" name="empgrade" id="empgrade" class="form-control" placeholder="Emp Grade" value="{{ old('empgrade') }}"> </div>
                    </div>
                    <div class="row justify-content-between text-start">
                        <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label">Emp Category Name:<span class="text-danger"> *</span></label> <input type="text" name="empcategoryname" id="empcategoryname" class="form-control" placeholder="Emp Category Name" value="{{ old('empcategoryname') }}"> </div>
                        <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label">Employee Benifits<span class="text-danger"> *</span></label> <textarea class="form-control" name="employeebenifits" id="employeebenifits" cols="30" rows="10" placeholder="Detail About Benifits">{{ old('employeebenifits') }}</textarea> </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-12 d-flex align-items-center">
                            <div class="py-2">
                                <button class="btn btn-primary text-white">Add Category</button>
                             </div>
                         </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection