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
                <p class="blue-text">Bank Details Add Forms.</p>
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
                        @if (Auth::guard('employee')->user()->roll_status == 4)
                            <div class="card p-5">
                               {{-- <h5 class="text-center mb-4">Add Your Bank Accounts Details.</h5> --}}
                               <form class="form-card" action="{{ route('addBanksDetails') }}" method="post">
                                   @csrf
                                   <div class="row justify-content-between text-start">
                               {{-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Bank Name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="fname" placeholder="Enter your first name"> </div> --}}
                                       <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Bank Name<span class="text-danger"> *</span></label> <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="enter bank name"> </div>
                                       <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Account Number<span class="text-danger"> *</span></label> <input type="text" class="form-control" id="account_number" name="account_number" placeholder="A/C Number"> </div>
                                   </div>
                                   <div class="row justify-content-between text-start">
                                       <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">account Title<span class="text-danger"> *</span></label> <input type="text" class="form-control" id="account_title" name="account_title" placeholder="Enter Account title"> </div>
                                       <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Account Type<span class="text-danger"> *</span></label>
                                           <select name="account_type" id="account_type" class="form-control">
                                               <option value="">Select Account Type</option>
                                               <option value="primary">Primary</option>
                                               <option value="secondary">Secondary</option>
                                         </select>
                                       </div>
                                   </div>
                                   <div class="row justify-content-end">
                                       <div class="col-12 d-flex align-items-center">
                                           <div class="py-5 px-2">
                                              <button class="btn btn-primary" type="submit">Save Information</button>
                                           </div>
                                           <div class="py-5">
                                              <button class="btn btn-danger"><a class="text-white text-decoration-none" href="{{ route('employeeDashboard') }}">Back</a></button>
                                           </div>
                                        </div>
                                   </div>
                               </form>
                           </div>
                        @elseif (Auth::guard('employee')->user()->roll_status == 3)
                           {{-- <div class="card p-5"> --}}
                                {{-- <h5 class="text-center mb-4">Add Your Bank Accounts Details.</h5> --}}
                                 {{-- <form class="form-card" action="{{ route('addBanksDetails') }}" method="post">
                                     @csrf
                                     <div class="row justify-content-between text-start"> --}}
                                         {{-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Bank Name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="fname" placeholder="Enter your first name"> </div> --}}
                                         {{-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Bank Name<span class="text-danger"> *</span></label> <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="enter bank name"> </div>
                                         <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Account Number<span class="text-danger"> *</span></label> <input type="text" class="form-control" id="account_number" name="account_number" placeholder="A/C Number"> </div>
                                     </div>
                                     <div class="row justify-content-between text-start">
                                         <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">account Title<span class="text-danger"> *</span></label> <input type="text" class="form-control" id="account_title" name="account_title" placeholder="Enter Account title"> </div>
                                         <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Account Type<span class="text-danger"> *</span></label>
                                             <select name="account_type" id="account_type" class="form-control">
                                                 <option value="">Select Account Type</option>
                                                 <option value="primary">Primary</option>
                                                 <option value="secondary">Secondary</option>
                                           </select>
                                         </div>
                                     </div>
                                     <div class="row justify-content-end">
                                         <div class="col-12 d-flex align-items-center">
                                             <div class="py-5 px-2">
                                                <button class="btn btn-primary" type="submit">Save Information</button>
                                             </div>
                                             <div class="py-5">
                                                <button class="btn btn-danger"><a class="text-white text-decoration-none" href="{{ route('employeeDashboard') }}">Back</a></button>
                                             </div>
                                          </div>
                                     </div>
                                 </form>
                            </div> --}}
                        @elseif (Auth::guard('employee')->user()->roll_status == 2)
                            {{-- <div class="card p-5"> --}}
                                  {{-- <h5 class="text-center mb-4">Add Your Bank Accounts Details.</h5> --}}
                                 {{-- <form class="form-card" action="{{ route('addBanksDetails') }}" method="post">
                                     @csrf
                                     <div class="row justify-content-between text-start"> --}}
                                         {{-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Bank Name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="fname" placeholder="Enter your first name"> </div> --}}
                                         {{-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Bank Name<span class="text-danger"> *</span></label> <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="enter bank name"> </div>
                                         <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Account Number<span class="text-danger"> *</span></label> <input type="text" class="form-control" id="account_number" name="account_number" placeholder="A/C Number"> </div>
                                     </div>
                                     <div class="row justify-content-between text-start">
                                         <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">account Title<span class="text-danger"> *</span></label> <input type="text" class="form-control" id="account_title" name="account_title" placeholder="Enter Account title"> </div>
                                         <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Account Type<span class="text-danger"> *</span></label>
                                             <select name="account_type" id="account_type" class="form-control">
                                                 <option value="">Select Account Type</option>
                                                 <option value="primary">Primary</option>
                                                 <option value="secondary">Secondary</option>
                                           </select>
                                         </div>
                                     </div>
                                     <div class="row justify-content-end">
                                         <div class="col-12 d-flex align-items-center">
                                             <div class="py-5 px-2">
                                                <button class="btn btn-primary" type="submit">Save Information</button>
                                             </div>
                                             <div class="py-5">
                                                <button class="btn btn-danger"><a class="text-white text-decoration-none" href="{{ route('employeeDashboard') }}">Back</a></button>
                                             </div>
                                          </div>
                                     </div>
                                 </form>
                            </div> --}}
                        @elseif (Auth::guard('employee')->user()->roll_status == 1)
                            {{-- <div class="card p-5"> --}}
                                 {{-- <h5 class="text-center mb-4">Add Your Bank Accounts Details.</h5> --}}
                                   {{-- <form class="form-card" action="{{ route('addBanksDetails') }}" method="post">
                                       @csrf
                                       <div class="row justify-content-between text-start"> --}}
                                           {{-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Bank Name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="fname" placeholder="Enter your first name"> </div> --}}
                                           {{-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Bank Name<span class="text-danger"> *</span></label> <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="enter bank name"> </div>
                                           <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Account Number<span class="text-danger"> *</span></label> <input type="text" class="form-control" id="account_number" name="account_number" placeholder="A/C Number"> </div>
                                       </div>
                                       <div class="row justify-content-between text-start">
                                           <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">account Title<span class="text-danger"> *</span></label> <input type="text" class="form-control" id="account_title" name="account_title" placeholder="Enter Account title"> </div>
                                           <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Account Type<span class="text-danger"> *</span></label>
                                               <select name="account_type" id="account_type" class="form-control">
                                                   <option value="">Select Account Type</option>
                                                   <option value="primary">Primary</option>
                                                   <option value="secondary">Secondary</option>
                                             </select>
                                           </div>
                                       </div>
                                       <div class="row justify-content-end">
                                           <div class="col-12 d-flex align-items-center">
                                               <div class="py-5 px-2">
                                                  <button class="btn btn-primary" type="submit">Save Information</button>
                                               </div>
                                               <div class="py-5">
                                                  <button class="btn btn-danger"><a class="text-white text-decoration-none" href="{{ route('employeeDashboard') }}">Back</a></button>
                                               </div>
                                            </div>
                                       </div>
                                   </form>
                            </div> --}}
                        @elseif (Auth::guard('employee')->user()->roll_status == 5)
                           <div class="card p-5">
                              {{-- <h5 class="text-center mb-4">Add Your Bank Accounts Details.</h5> --}}
                               <form class="form-card" action="{{ route('hraddBanksDetails') }}" method="post">
                                   @csrf
                                   <div class="row justify-content-between text-start">
                                       {{-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Bank Name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="fname" placeholder="Enter your first name"> </div> --}}
                                       <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Bank Name<span class="text-danger"> *</span></label> <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="enter bank name"> </div>
                                       <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Account Number<span class="text-danger"> *</span></label> <input type="text" class="form-control" id="account_number" name="account_number" placeholder="A/C Number"> </div>
                                   </div>
                                   <div class="row justify-content-between text-start">
                                       <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">account Title<span class="text-danger"> *</span></label> <input type="text" class="form-control" id="account_title" name="account_title" placeholder="Enter Account title"> </div>
                                       <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Account Type<span class="text-danger"> *</span></label>
                                           <select name="account_type" id="account_type" class="form-control">
                                               <option value="">Select Account Type</option>
                                               <option value="primary">Primary</option>
                                               <option value="secondary">Secondary</option>
                                         </select>
                                       </div>
                                   </div>
                                   <div class="row justify-content-end">
                                       <div class="col-12 d-flex align-items-center">
                                           <div class="py-5 px-2">
                                              <button class="btn btn-primary" type="submit">Save Information</button>
                                           </div>
                                           <div class="py-5">
                                              <button class="btn btn-danger"><a class="text-white text-decoration-none" href="{{ route('employeeDashboard') }}">Back</a></button>
                                           </div>
                                        </div>
                                   </div>
                               </form>
                           </div>
                        @endif
            </div>
        </div>
    </div>
</body>
</html>
