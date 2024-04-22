@extends('employee_side.dashboard-layout.layout')
@section('compony_addform')
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-12 text-center">
                {{-- <p class="blue-text">Company Information.</p> --}}
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
                        {{-- <div class="col-12 text-center d-flex flex-column justify-content-center align-items-center">
                         </div> --}}
                <div class="card p-5">
                    @if (Auth::guard('employee')->user())
                    {{-- hr department --}}
                    <form action="{{ route('hraddCompany') }}" method="post" enctype="multipart/form-data">
                        @csrf
                      {{-- <h5 class="text-center mb-4">Add Your Bank Accounts Details.</h5> --}}
                        <div class="row justify-content-between text-start">
                            {{-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Bank Name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="fname" placeholder="Enter your first name"> </div> --}}
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Company logo<span class="text-danger"> *</span></label> <input type="file" name="company_logo" id="company_logo" class="form-control" value=""> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Company name<span class="text-danger"> *</span></label> <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company name" value=""> </div>
                        </div>
                        <div class="row justify-content-between text-start">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Owner name<span class="text-danger"> *</span></label> <input type="text" class="form-control" name="ownername" id="ownername" value="" placeholder="Owner name"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Company address<span class="text-danger"> *</span></label> <input type="text" class="form-control" name="companyaddress" id="companyaddress" value="" placeholder="Company address"> </div>
                        </div>
                        <div class="row justify-content-between text-start">
                            {{-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Bank Name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="fname" placeholder="Enter your first name"> </div> --}}
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">N.T.N number<span class="text-danger"> *</span></label> <input type="number" class="form-control" name="ntnnumber" id="ntnnumber" value="" placeholder="Ntn number"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">G.S.T tax number<span class="text-danger"> *</span></label> <input type="number" class="form-control" name="gsttaxnumber" id="gsttaxnumber" value="" placeholder="Gst tax number"> </div>
                        </div>
                        <div class="row justify-content-between text-start">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Company working short details<span class="text-danger"> *</span></label> <input type="text" class="form-control" name="companywork" id="companywork" value="" placeholder="Company work type"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Contact number<span class="text-danger"> *</span></label> <input type="number" class="form-control" name="contactnumber" id="contactnumber" value="" placeholder="Contact number"> </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-12 d-flex align-items-center py-2">
                                <div class="py-1">
                                    <button class="btn btn-primary text-white">Add Company</button>
                                 </div>
                                <div class="py-1 px-2">
                                   <button class="btn btn-danger"><a class="text-white text-decoration-none" href="{{ route('hrDashboard') }}">Back</a></button>
                                </div>
                             </div>
                        </div>
                    </form>
                    @else
                    <form action="{{ route('addCompany') }}" method="post" enctype="multipart/form-data">
                        @csrf
                      {{-- <h5 class="text-center mb-4">Add Your Bank Accounts Details.</h5> --}}
                        <div class="row justify-content-between text-start">
                            {{-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Bank Name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="fname" placeholder="Enter your first name"> </div> --}}
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Company logo<span class="text-danger"> *</span></label> <input type="file" name="company_logo" id="company_logo" class="form-control" value=""> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Company name<span class="text-danger"> *</span></label> <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company name" value=""> </div>
                        </div>
                        <div class="row justify-content-between text-start">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Owner name<span class="text-danger"> *</span></label> <input type="text" class="form-control" name="ownername" id="ownername" value="" placeholder="Owner name"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Company address<span class="text-danger"> *</span></label> <input type="text" class="form-control" name="companyaddress" id="companyaddress" value="" placeholder="Company address"> </div>
                        </div>
                        <div class="row justify-content-between text-start">
                            {{-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Bank Name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="fname" placeholder="Enter your first name"> </div> --}}
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">N.T.N number<span class="text-danger"> *</span></label> <input type="number" class="form-control" name="ntnnumber" id="ntnnumber" value="" placeholder="Ntn number"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">G.S.T tax number<span class="text-danger"> *</span></label> <input type="number" class="form-control" name="gsttaxnumber" id="gsttaxnumber" value="" placeholder="Gst tax number"> </div>
                        </div>
                        <div class="row justify-content-between text-start">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Company working short details<span class="text-danger"> *</span></label> <input type="text" class="form-control" name="companywork" id="companywork" value="" placeholder="Company work type"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Contact number<span class="text-danger"> *</span></label> <input type="number" class="form-control" name="contactnumber" id="contactnumber" value="" placeholder="Contact number"> </div>
                        </div>
                        <div class="row justify-content-end py-4">
                            <div class="col-12 d-flex align-items-center">
                                <div class="py-1">
                                    <button class="btn btn-primary text-white">Add Company</button>
                                 </div>
                                <div class="py-1 px-2">
                                   <button class="btn btn-danger"><a class="text-white text-decoration-none" href="{{ route('hrDashboard') }}">Back</a></button>
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




