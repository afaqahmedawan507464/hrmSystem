<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="admin/input_forms/index.css">
    <link rel="stylesheet" href="/cusstom-css.css">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <p class="blue-text">Employee Categories Information.</p>
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
                    @if (Auth::guard('employee')->user())
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
                                <div class="py-1">
                                    <button class="btn btn-primary text-white">Add Category</button>
                                 </div>
                                <div class="py-1 px-2">
                                   <button class="btn btn-danger"><a class="text-white text-decoration-none" href="{{ route('adminDashboard') }}">Back</a></button>
                                </div>
                             </div>
                        </div>
                    </form>
                    @else
                    <form action="{{ route('addEmployeeCategory') }}" method="post" enctype="multipart/form-data">
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
                                <div class="py-1">
                                    <button class="btn btn-primary text-white">Add Category</button>
                                 </div>
                                <div class="py-1 px-2">
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
</body>
</html>



