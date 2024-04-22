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
                <p class="blue-text">Employee Details Edit Forms.</p>
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
                <div class="card p-5">
                    @if($employee->isEmpty())
                        <div class="row justify-content-between text-start">
                            <div class="col-md-6">
                                <label class="form-label" for="first-name">User Image</label>
                                <input class="form-control" type="file" name="userimage" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="first-name">Employee Name</label>
                                <input type="text" class="form-control" id="username" name="username" disabled>
                            </div>
                        </div>
                        <div class="row justify-content-between text-start py-1">
                            <div class="col-md-6">
                                <label class="form-label" for="last-name">Email Address</label>
                                <input type="email" class="form-control" id="emailaddress" name="emailaddress" disabled>
                            </div>
                            {{--  --}}
                            <div class="col-md-6">
                                <label class="form-label" for="first-name">Office Number</label>
                                <input type="number" class="form-control" id="officenumber" name="officenumber" disabled>
                            </div>
                            {{--  --}}
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="last-name">Contact Number</label>
                                <input type="number" class="form-control" id="mobilenumber" name="mobilenumber" disabled>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="last-name">Martrial Status</label>
                                <select name="matrialstatus" id="matrialstatus" class="form-control" disabled>
                                    <option value=""></option>
                               </select>
                            </div>
                            {{--  --}}
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="first-name">Gender</label>
                                <select name="salutions" id="salutions" class="form-control" disabled>
                                    <option value=""></option>
                                 </select>
                            </div>
                            {{--  --}}
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="last-name">Nationality</label>
                                <select name="nationality" id="nationality" class="form-control" disabled>
                                    <option value=""></option>
                                 </select>
                            </div>
                            {{--  --}}
                            {{--  --}}
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="first-name">Date of birth</label>
                                <input type="date" class="form-control" id="dateofbirth" disabled>
                            </div>
                             {{--  --}}
                             <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="last-name">Blood group</label>
                                <select name="bloodgroup" id="bloodgroup" class="form-control" disabled>
                                        <option value=""></option>
                                 </select>
                            </div>
                            {{--  --}}
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="first-name">Cnic Number</label>
                                <input type="number" class="form-control" id="cnicnumber" name="cnicnumber" disabled>
                            </div>
                            {{--  --}}
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="last-name">Father Name</label>
                                <input type="text" class="form-control" id="fathername" name="fathername" disabled>
                            </div>
                             {{--  --}}
                             <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="last-name">Address</label>
                                <input type="text" class="form-control" id="address" name="address" disabled>
                            </div>
                            {{--  --}}
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="first-name">City</label>
                                <input type="text" class="form-control" id="city" name="city" disabled>
                            </div>
                            {{--  --}}
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="last-name">State/Province</label>
                                <input type="text" class="form-control" id="state" name="state" disabled>
                            </div>
                            {{--  --}}
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="last-name">Postal code</label>
                                <input type="number" class="form-control" id="postalcode" name="postalcode" disabled>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                  <label class="form-label" for="first-name">Country</label>
                                  <input type="text" class="form-control" id="country" name="country" disabled>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                  <label class="form-label" for="last-name">Phone Number</label>
                                  <input type="number" class="form-control" id="contactnumber" name="contactnumber" disabled>
                            </div>
                            {{--  --}}
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="first-name">Emergency Contact Person Name</label>
                                <input type="text" class="form-control" id="emergencycontactperson" name="econtactperson" disabled>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="last-name">Emergency Contact Person Relationship</label>
                                <input type="text" class="form-control" id="relationship" name="relationship" disabled>
                            </div>
                            <div class="col-lg-4 col-md-6">
                              <label class="form-label" for="last-name">Emergency Contact Number</label>
                              <input type="number" class="form-control" id="emergencypersonphonenumber" name="epersonphonenumber" disabled>
                            </div>
                            {{--  --}}
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="first-name">Place Of birth</label>
                                <input type="text" class="form-control" id="placeofbirth" name="placeofbirth" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="last-name">Sub Department</label>
                                <input type="text" class="form-control" id="subdepartment" name="subdepartment" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="last-name">Resign Date</label>
                                <input type="date" class="form-control" id="prcbationenddate" name="prcbationenddate" disabled>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="row justify-content-end">
                            <div class="col-12 d-flex align-items-center">
                                <div class="py-2">
                                   <button class="btn btn-danger"><a class="text-white text-decoration-none" href="{{ route('employeeDashboard') }}">Back</a></button>
                                </div>
                             </div>
                        </div>
                    @else
                    @foreach ($employee as $personal)
                    <form class="form-card" action="{{ route('editadminPersonalInformation') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row justify-content-between text-start">
                            <div class="col-md-6">
                                <label class="form-label" for="first-name">User Image</label>
                                <input class="form-control" type="file" name="userimage">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="first-name">Employee Name</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="First name" value="{{$personal->first_name}}">
                            </div>
                        </div>
                        <div class="row justify-content-between text-start py-1">
                            <div class="col-md-6">
                                <label class="form-label" for="last-name">Email Address</label>
                                <input type="email" class="form-control" id="emailaddress" name="emailaddress" placeholder="Enter email address" value="{{$personal->email_address}}">
                            </div>
                            {{--  --}}
                            <div class="col-md-6">
                                <label class="form-label" for="first-name">Office Number</label>
                                <input type="number" class="form-control" id="officenumber" name="officenumber" placeholder="Enter Office Number" value="{{$personal->office_number}}" >
                            </div>
                            {{--  --}}
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="last-name">Contact Number</label>
                                <input type="number" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter Mobile Number" value="{{$personal->mobile_number}}">
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="last-name">Martrial Status</label>
                                <select name="matrialstatus" id="matrialstatus" class="form-control">
                                  if($personal->marred_status == 'married'){
                                      echo "selected";
                                      <option value="married">Married</option>
                                  }
                                  if($personal->marred_status == 'single'){
                                      echo "selected";
                                      <option value="single">Single</option>
                                  }
                               </select>
                            </div>
                            {{--  --}}
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="first-name">Gender</label>
                                <select name="salutions" id="salutions" class="form-control">
                                    if($personal->salutation == 'male'){
                                        echo "selected";
                                        <option value="male">Male</option>
                                    }
                                    if($personal->salutation == 'female'){
                                        echo "selected";
                                        <option value="female">Female</option>
                                    }
                                    if($personal->salutation == 'other'){
                                        echo "selected";
                                        <option value="others">Other</option>
                                    }
                                 </select>
                            </div>
                            {{--  --}}
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="last-name">Nationality</label>
                                <select name="nationality" id="nationality" class="form-control">
                                    if($personal->nationality == 'pakistan'){
                                        echo "selected";
                                        <option value="pakistan">Pakistan</option>
                                    }
                                 </select>
                            </div>
                            {{--  --}}
                            {{--  --}}
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="first-name">Date of birth</label>
                                <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{$personal->date_of_birth}}">
                            </div>
                             {{--  --}}
                             <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="last-name">Blood group</label>
                                <select name="bloodgroup" id="bloodgroup" class="form-control">
                                    if($personal->blood_group == 'a+'){
                                        echo "selected";
                                        <option value="a+">A+</option>
                                    }
                                    if($personal->blood_group == 'a-'){
                                        echo "selected";
                                        <option value="a-">A-</option>
                                    }
                                    if($personal->blood_group == 'b+'){
                                        echo "selected";
                                        <option value="b+">B+</option>
                                    }
                                    if($personal->blood_group == 'b-'){
                                        echo "selected";
                                        <option value="b-">B-</option>
                                    }
                                    if($personal->blood_group == 'o-'){
                                        echo "selected";
                                        <option value="o-">O-</option>
                                    }
                                    if($personal->blood_group == 'o+'){
                                        echo "selected";
                                        <option value="o+">O+</option>
                                    }
                                 </select>
                            </div>
                            {{--  --}}
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="first-name">Cnic Number</label>
                                <input type="number" class="form-control" id="cnicnumber" name="cnicnumber" placeholder="Enter cnic number" value="{{$personal->cnic_number}}">
                            </div>
                            {{--  --}}
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="last-name">Father Name</label>
                                <input type="text" class="form-control" id="fathername" name="fathername" placeholder="enter father name" value="{{$personal->father_name}}">
                            </div>
                             {{--  --}}
                             <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="last-name">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Adress" value="{{$personal->address}}">
                            </div>
                            {{--  --}}
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="first-name">City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="{{$personal->city}}">
                            </div>
                            {{--  --}}
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="last-name">State/Province</label>
                                <input type="text" class="form-control" id="state" name="state" placeholder="State/Province" value="{{$personal->province}}">
                            </div>
                            {{--  --}}
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="last-name">Postal code</label>
                                <input type="number" class="form-control" id="postalcode" name="postalcode" placeholder="Enter postal code" value="{{$personal->postal_code}}">
                            </div>
                            <div class="col-lg-4 col-md-6">
                                  <label class="form-label" for="first-name">Country</label>
                                  <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="{{$personal->country}}">
                            </div>
                            <div class="col-lg-4 col-md-6">
                                  <label class="form-label" for="last-name">Phone Number</label>
                                  <input type="number" class="form-control" id="contactnumber" name="contactnumber" placeholder="Enter Contact number"  value="{{$personal->contact_number}}">
                            </div>
                            {{--  --}}
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="first-name">Emergency Contact Person Name</label>
                                <input type="text" class="form-control" id="emergencycontactperson" name="econtactperson" placeholder="Enter Emergency Contact Person Name" value="{{$personal->emergency_contact_person}}">
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="last-name">Emergency Contact Person Relationship</label>
                                <input type="text" class="form-control" id="relationship" name="relationship" placeholder="Enter Relationship" value="{{$personal->relationship}}">
                            </div>
                            <div class="col-lg-4 col-md-6">
                              <label class="form-label" for="last-name">Emergency Contact Number</label>
                              <input type="number" class="form-control" id="emergencypersonphonenumber" name="epersonphonenumber" placeholder="Enter Emergency Person Number" value="{{$personal->person_contact}}">
                            </div>
                            {{--  --}}
                            <div class="col-lg-4 col-md-6">
                                <label class="form-label" for="first-name">Place Of birth</label>
                                <input type="text" class="form-control" id="placeofbirth" name="placeofbirth" placeholder="place of birth" value="{{$personal->place_of_birth}}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="last-name">Sub Department</label>
                                <input type="text" class="form-control" id="subdepartment" name="subdepartment" placeholder="Sub-Department" value="{{$personal->sub_department}}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="last-name">Resign Date</label>
                                <input type="date" class="form-control" id="prcbationenddate" name="prcbationenddate" value="{{$personal->end_date}}">
                            </div>
                        </div>
                        {{--  --}}
                        <div class="row justify-content-end">
                            <div class="col-12 d-flex align-items-center">
                                <div class="py-2 px-2">
                                   <button class="btn btn-primary" type="submit">Update Informations</button>
                                </div>
                                <div class="py-2">
                                   <button class="btn btn-danger"><a class="text-white text-decoration-none" href="{{ route('employeeDashboard') }}">Back</a></button>
                                </div>
                             </div>
                        </div>
                    </form>
                    @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
</body>
</html>
