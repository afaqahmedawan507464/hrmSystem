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
    <title>Document</title>
</head>
<body>
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <p class="blue-text">Social Media Informations.</p>
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
                            <form action="{{ route('addsocialMediaAccounts') }}" method="post">
                                @csrf
                                <div class="row justify-content-between text-start">
                                    {{-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Bank Name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="fname" placeholder="Enter your first name"> </div> --}}
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Twitter</label> <input type="text" class="form-control" id="twitter" name="twitter" placeholder="e.g http://twitter.com/codemindz"> </div>
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Facebook<span class="text-danger"> *</span></label> <input type="text" class="form-control" id="facebook" name="facebook" placeholder="e.g http://facebook.com/codemindz"> </div>
                                </div>
                                <div class="row justify-content-between text-start">
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Linkedin</label> <input type="text" class="form-control" id="linkeden" name="linkeden" placeholder="e.g http://linkeden.com/codemindz"> </div>
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Skype<span class="text-danger"> *</span></label><input type="text" class="form-control" id="skype" name="skype" placeholder="e.g http://skype.com/codemindz"></div>
                                </div>
                                <div class="row justify-content-between text-start">
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Yahoo</label> <input type="text" class="form-control" id="yahoo" name="yahoo" placeholder="e.g http://yohoo.com/codemindz"> </div>
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Google<span class="text-danger"> *</span></label><input type="text" class="form-control" id="google" name="google" placeholder="e.g http://google.com/codemindz"></div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-12 d-flex align-items-center">
                                        <div class="py-2 px-2">
                                           <button class="btn btn-primary" type="submit">Save Information</button>
                                        </div>
                                        <div class="py-2">
                                           <button class="btn btn-danger"><a class="text-white text-decoration-none" href="{{ route('employeeDashboard') }}">Back</a></button>
                                        </div>
                                     </div>
                                </div>
                            </form>
                        </div>
                        @elseif (Auth::guard('employee')->user()->roll_status == 3)
                        {{-- <div class="card p-5"> --}}
                            {{-- <h5 class="text-center mb-4">Add Your Bank Accounts Details.</h5> --}}
                            {{-- <form action="{{ route('addsocialMediaAccounts') }}" method="post">
                                @csrf
                                <div class="row justify-content-between text-start"> --}}
                                    {{-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Bank Name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="fname" placeholder="Enter your first name"> </div> --}}
                                    {{-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Twitter</label> <input type="text" class="form-control" id="twitter" name="twitter" placeholder="e.g http://twitter.com/codemindz"> </div>
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Facebook<span class="text-danger"> *</span></label> <input type="text" class="form-control" id="facebook" name="facebook" placeholder="e.g http://facebook.com/codemindz"> </div>
                                </div>
                                <div class="row justify-content-between text-start">
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Linkedin</label> <input type="text" class="form-control" id="linkeden" name="linkeden" placeholder="e.g http://linkeden.com/codemindz"> </div>
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Skype<span class="text-danger"> *</span></label><input type="text" class="form-control" id="skype" name="skype" placeholder="e.g http://skype.com/codemindz"></div>
                                </div>
                                <div class="row justify-content-between text-start">
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Yahoo</label> <input type="text" class="form-control" id="yahoo" name="yahoo" placeholder="e.g http://yohoo.com/codemindz"> </div>
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Google<span class="text-danger"> *</span></label><input type="text" class="form-control" id="google" name="google" placeholder="e.g http://google.com/codemindz"></div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-12 d-flex align-items-center">
                                        <div class="py-2 px-2">
                                           <button class="btn btn-primary" type="submit">Save Information</button>
                                        </div>
                                        <div class="py-2">
                                           <button class="btn btn-danger"><a class="text-white text-decoration-none" href="{{ route('employeeDashboard') }}">Back</a></button>
                                        </div>
                                     </div>
                                </div>
                            </form>
                        </div> --}}
                        @elseif (Auth::guard('employee')->user()->roll_status == 2)
                        {{-- <div class="card p-5"> --}}
                            {{-- <h5 class="text-center mb-4">Add Your Bank Accounts Details.</h5> --}}
                            {{-- <form action="{{ route('addsocialMediaAccounts') }}" method="post">
                                @csrf
                                <div class="row justify-content-between text-start"> --}}
                                    {{-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Bank Name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="fname" placeholder="Enter your first name"> </div> --}}
                                    {{-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Twitter</label> <input type="text" class="form-control" id="twitter" name="twitter" placeholder="e.g http://twitter.com/codemindz"> </div>
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Facebook<span class="text-danger"> *</span></label> <input type="text" class="form-control" id="facebook" name="facebook" placeholder="e.g http://facebook.com/codemindz"> </div>
                                </div>
                                <div class="row justify-content-between text-start">
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Linkedin</label> <input type="text" class="form-control" id="linkeden" name="linkeden" placeholder="e.g http://linkeden.com/codemindz"> </div>
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Skype<span class="text-danger"> *</span></label><input type="text" class="form-control" id="skype" name="skype" placeholder="e.g http://skype.com/codemindz"></div>
                                </div>
                                <div class="row justify-content-between text-start">
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Yahoo</label> <input type="text" class="form-control" id="yahoo" name="yahoo" placeholder="e.g http://yohoo.com/codemindz"> </div>
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Google<span class="text-danger"> *</span></label><input type="text" class="form-control" id="google" name="google" placeholder="e.g http://google.com/codemindz"></div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-12 d-flex align-items-center">
                                        <div class="py-2 px-2">
                                           <button class="btn btn-primary" type="submit">Save Information</button>
                                        </div>
                                        <div class="py-2">
                                           <button class="btn btn-danger"><a class="text-white text-decoration-none" href="{{ route('employeeDashboard') }}">Back</a></button>
                                        </div>
                                     </div>
                                </div>
                            </form>
                        </div> --}}
                        @elseif (Auth::guard('employee')->user()->roll_status == 1)
                        {{-- <div class="card p-5"> --}}
                            {{-- <h5 class="text-center mb-4">Add Your Bank Accounts Details.</h5> --}}
                            {{-- <form action="{{ route('addsocialMediaAccounts') }}" method="post">
                                @csrf
                                <div class="row justify-content-between text-start"> --}}
                                    {{-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Bank Name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="fname" placeholder="Enter your first name"> </div> --}}
                                    {{-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Twitter</label> <input type="text" class="form-control" id="twitter" name="twitter" placeholder="e.g http://twitter.com/codemindz"> </div>
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Facebook<span class="text-danger"> *</span></label> <input type="text" class="form-control" id="facebook" name="facebook" placeholder="e.g http://facebook.com/codemindz"> </div>
                                </div>
                                <div class="row justify-content-between text-start">
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Linkedin</label> <input type="text" class="form-control" id="linkeden" name="linkeden" placeholder="e.g http://linkeden.com/codemindz"> </div>
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Skype<span class="text-danger"> *</span></label><input type="text" class="form-control" id="skype" name="skype" placeholder="e.g http://skype.com/codemindz"></div>
                                </div>
                                <div class="row justify-content-between text-start">
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Yahoo</label> <input type="text" class="form-control" id="yahoo" name="yahoo" placeholder="e.g http://yohoo.com/codemindz"> </div>
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Google<span class="text-danger"> *</span></label><input type="text" class="form-control" id="google" name="google" placeholder="e.g http://google.com/codemindz"></div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-12 d-flex align-items-center">
                                        <div class="py-2 px-2">
                                           <button class="btn btn-primary" type="submit">Save Information</button>
                                        </div>
                                        <div class="py-2">
                                           <button class="btn btn-danger"><a class="text-white text-decoration-none" href="{{ route('employeeDashboard') }}">Back</a></button>
                                        </div>
                                     </div>
                                </div>
                            </form>
                        </div> --}}
                        @elseif (Auth::guard('employee')->user()->roll_status == 5)
                        <div class="card p-5">
                            {{-- <h5 class="text-center mb-4">Add Your Bank Accounts Details.</h5> --}}
                            <form action="{{ route('hraddsocialMediaAccounts') }}" method="post">
                                @csrf
                                <div class="row justify-content-between text-start">
                                    {{-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Bank Name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="fname" placeholder="Enter your first name"> </div> --}}
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Twitter</label> <input type="text" class="form-control" id="twitter" name="twitter" placeholder="e.g http://twitter.com/codemindz"> </div>
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Facebook<span class="text-danger"> *</span></label> <input type="text" class="form-control" id="facebook" name="facebook" placeholder="e.g http://facebook.com/codemindz"> </div>
                                </div>
                                <div class="row justify-content-between text-start">
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Linkedin</label> <input type="text" class="form-control" id="linkeden" name="linkeden" placeholder="e.g http://linkeden.com/codemindz"> </div>
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Skype<span class="text-danger"> *</span></label><input type="text" class="form-control" id="skype" name="skype" placeholder="e.g http://skype.com/codemindz"></div>
                                </div>
                                <div class="row justify-content-between text-start">
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Yahoo</label> <input type="text" class="form-control" id="yahoo" name="yahoo" placeholder="e.g http://yohoo.com/codemindz"> </div>
                                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Google<span class="text-danger"> *</span></label><input type="text" class="form-control" id="google" name="google" placeholder="e.g http://google.com/codemindz"></div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-12 d-flex align-items-center">
                                        <div class="py-2 px-2">
                                           <button class="btn btn-primary" type="submit">Save Information</button>
                                        </div>
                                        <div class="py-2">
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
