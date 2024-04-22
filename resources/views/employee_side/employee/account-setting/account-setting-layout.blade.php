@extends('employee_side.dashboard-layout.layout')

@section('employeeaccount')
@if (Auth::guard('employee')->user()->roll_status == 4)
<div class="row">
    <div class="col-12">
      <div class="card mb-3 btn-reveal-trigger">
        <div class="card-header position-relative min-vh-25 mb-8">
          <div class="cover-image">
            <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(/public/assets/img/generic/4.jpg);">
            </div>
            <!--/.bg-holder-->

            <input class="d-none" id="upload-cover-image" type="file" />
            <label class="cover-image-file-input" for="upload-cover-image"><span class="fas fa-camera me-2"></span><span>Change cover photo</span></label>
          </div>
          <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle">
            <div class="h-100 w-100 rounded-circle overflow-hidden position-relative">
                @if (!empty(Auth::guard('employee')->user()->image))
                <img src="{{asset(Auth::guard('employee')->user()->image)}}" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail">
                @else
                <img src="/admin/dist/img/avators.jpg" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail">
                @endif
                {{-- <input class="d-none" id="profile-image" type="file" />
                <label class="mb-0 overlay-icon d-flex flex-center" for="profile-image"><span class="bg-holder overlay overlay-0"></span><span class="z-index-1 text-white dark__text-white text-center fs--1"><span class="fas fa-camera"></span><span class="d-block">Update</span></span></label> --}}
             </div>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="row g-0">
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
    @foreach ($usersSetting as $item)
    @endforeach
    <div class="col-lg-8 pe-lg-2">
        @if($personalInform->isEmpty())
        <div class="card mb-3">
            <div class="card-header">
              <h5 class="mb-0">Profile Settings</h5>
            </div>
            <div class="card-body bg-light">
                <form class="row g-3" method="post" action="{{ route('personalAccountInformation') }}" enctype="multipart/form-data">
                    @csrf
                <div class="col-lg-12">
                    <label class="form-label" for="first-name">User Image</label>
                    <input class="form-control" type="file" name="userimage">

                </div>
                <div class="col-lg-6">
                  <label class="form-label" for="first-name">Employee Name</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="First name" value="{{old('username')}}">
                </div>
                <div class="col-lg-6">
                  <label class="form-label" for="last-name">Email Address</label>
                  <input type="email" class="form-control" id="emailaddress" name="emailaddress" placeholder="Enter email address" value="{{ $item->email }}{{old('emailaddress')}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Office Number</label>
                    <input type="number" class="form-control" id="officenumber" name="officenumber" placeholder="Enter Office Number" value="{{old('officenumber')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Contact Number</label>
                    <input type="number" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter Mobile Number" value="{{ $item->mobile }}{{old('mobilenumber')}}">
                </div>
                <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Gender</label>
                    <select name="salutions" id="salutions" class="form-control">
                        <option value="">Salutions</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Other</option>
                     </select>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Nationality</label>
                    <select name="nationality" id="nationality" class="form-control">
                        <option value="">Nationality</option>
                        <option value="pakistan">Pakistan</option>
                     </select>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Date of birth</label>
                      <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{old('dateofbirth')}}">
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Martrial Status</label>
                      <select name="matrialstatus" id="matrialstatus" class="form-control">
                        <option value="">Matrial Status</option>
                        <option value="married">Married</option>
                        <option value="single">Single</option>
                     </select>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Blood group</label>
                    <select name="bloodgroup" id="bloodgroup" class="form-control">
                        <option value="">Blood group</option>
                        <option value="a+">A+</option>
                        <option value="a-">A-</option>
                        <option value="b+">B+</option>
                        <option value="b-">B-</option>
                        <option value="o-">O-</option>
                        <option value="o+">O+</option>
                     </select>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Cnic Number</label>
                      <input type="number" class="form-control" id="cnicnumber" name="cnicnumber" placeholder="Enter cnic number" value="{{old('cnicnumber')}}">
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Father Name</label>
                      <input type="text" class="form-control" id="fathername" name="fathername" placeholder="enter father name" value="{{old('fathername')}}">
                </div>
                  <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Address</label>
                    <div class="textbox"><input type="text" class="form-control" id="address" name="address" placeholder="Adress" value="{{old('address')}}"></div>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">City</label>
                      <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="{{old('city')}}">
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">State/Province</label>
                      <input type="text" class="form-control" id="state" name="state" placeholder="State/Province" value="{{old('state')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Postal code</label>
                    <input type="number" class="form-control" id="postalcode" name="postalcode" placeholder="Enter postal code" value="{{old('postalcode')}}">
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Country</label>
                      <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="{{old('country')}}">
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Phone Number</label>
                      <input type="number" class="form-control" id="contactnumber" name="contactnumber" placeholder="Enter Contact number"  value="{{old('contactnumber')}}">
                </div>
                  <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Emergency Contact Person Name</label>
                    <input type="text" class="form-control" id="emergencycontactperson" name="econtactperson" placeholder="Enter Emergency Contact Person Name" value="{{old('econtactperson')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Emergency Contact Person Relationship</label>
                    <input type="text" class="form-control" id="relationship" name="relationship" placeholder="Enter Relationship" value="{{old('relationship')}}">
                </div>
                <div class="col-lg-6">
                  <label class="form-label" for="last-name">Emergency Contact Number</label>
                  <input type="number" class="form-control" id="emergencypersonphonenumber" name="epersonphonenumber" placeholder="Enter Emergency Person Number" value="{{old('epersonphonenumber')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Place Of birth</label>
                    <input type="text" class="form-control" id="placeofbirth" name="placeofbirth" placeholder="place of birth" value="{{old('placeofbirth')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Sub Department</label>
                    <input type="text" class="form-control" id="subdepartment" name="subdepartment" placeholder="Sub-Department" value="{{old('subdepartment')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Resign Date</label>
                    <input type="date" class="form-control" id="prcbationenddate" name="prcbationenddate" value="{{old('prcbationenddate')}}">
                </div>
                <hr>
                <div class="col-12 d-flex justify-content-end">
                  <button class="btn btn-primary" type="submit">Add Details</button>
                </div>
              </form>
            </div>
          </div>
        @else
        @foreach ($personalInform as $personal)
        @endforeach
        <div class="card mb-3">
            <div class="card-header">
              <h5 class="mb-0">Profile Settings</h5>
            </div>
            <div class="card-body bg-light">
                <form class="row g-3" method="post" action="{{ route('personalAccountInformation') }}" enctype="multipart/form-data">
                    @csrf
                {{-- <div class="col-lg-12">
                    <label class="form-label" for="first-name">User Image</label>
                    <input class="form-control" type="file" name="userimage">

                </div> --}}
                <div class="col-lg-6">
                  <label class="form-label" for="first-name">Employee Name</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="First name" value="{{$personal->first_name}}" disabled>
                </div>
                <div class="col-lg-6">
                  <label class="form-label" for="last-name">Email Address</label>
                  <input type="email" class="form-control" id="emailaddress" name="emailaddress" placeholder="Enter email address" value="{{$personal->email_address}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Office Number</label>
                    <input type="number" class="form-control" id="officenumber" name="officenumber" placeholder="Enter Office Number" value="{{$personal->office_number}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Contact Number</label>
                    <input type="number" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter Mobile Number" value="{{$personal->mobile_number}}" disabled>
                </div>
                <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Gender</label>
                    <select name="salutions" id="salutions" class="form-control" disabled>
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
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Nationality</label>
                    <select name="nationality" id="nationality" class="form-control" disabled>
                        if($personal->nationality == 'pakistan'){
                            echo "selected";
                            <option value="pakistan">Pakistan</option>
                        }
                     </select>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Date of birth</label>
                      <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{$personal->date_of_birth}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Martrial Status</label>
                      <select name="matrialstatus" id="matrialstatus" class="form-control" disabled>
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
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Blood group</label>
                    <select name="bloodgroup" id="bloodgroup" class="form-control" disabled>
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
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Cnic Number</label>
                      <input type="number" class="form-control" id="cnicnumber" name="cnicnumber" placeholder="Enter cnic number" value="{{$personal->cnic_number}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Father Name</label>
                      <input type="text" class="form-control" id="fathername" name="fathername" placeholder="enter father name" value="{{$personal->father_name}}" disabled>
                </div>
                  <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Adress" value="{{$personal->address}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">City</label>
                      <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="{{$personal->city}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">State/Province</label>
                      <input type="text" class="form-control" id="state" name="state" placeholder="State/Province" value="{{$personal->province}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Postal code</label>
                    <input type="number" class="form-control" id="postalcode" name="postalcode" placeholder="Enter postal code" value="{{$personal->postal_code}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Country</label>
                      <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="{{$personal->country}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Phone Number</label>
                      <input type="number" class="form-control" id="contactnumber" name="contactnumber" placeholder="Enter Contact number"  value="{{$personal->contact_number}}" disabled>
                </div>
                  <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Emergency Contact Person Name</label>
                    <input type="text" class="form-control" id="emergencycontactperson" name="econtactperson" placeholder="Enter Emergency Contact Person Name" value="{{$personal->emergency_contact_person}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Emergency Contact Person Relationship</label>
                    <input type="text" class="form-control" id="relationship" name="relationship" placeholder="Enter Relationship" value="{{$personal->relationship}}" disabled>
                </div>
                <div class="col-lg-6">
                  <label class="form-label" for="last-name">Emergency Contact Number</label>
                  <input type="number" class="form-control" id="emergencypersonphonenumber" name="epersonphonenumber" placeholder="Enter Emergency Person Number" value="{{$personal->person_contact}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Place Of birth</label>
                    <input type="text" class="form-control" id="placeofbirth" name="placeofbirth" placeholder="place of birth" value="{{$personal->place_of_birth}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Sub Department</label>
                    <input type="text" class="form-control" id="subdepartment" name="subdepartment" placeholder="Sub-Department" value="{{$personal->sub_department}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Resign Date</label>
                    <input type="date" class="form-control" id="prcbationenddate" name="prcbationenddate" value="{{$personal->end_date}}" disabled>
                </div>
                <hr>
              </form>
            </div>
            </div>
        @endif
      {{-- <div class="card mb-3">
        <div class="card-header">
          <h5 class="mb-0"></h5>
        </div>
        <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href=""><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add More</span></a>
            <div class="collapse" id="experience-form1">
            <div class="border-dashed-bottom my-4"></div>
            </div>

        </div>
      </div> --}}
      {{--  --}}
      {{-- <div class="card mb-3">
        <div class="card-header">
          <h5 class="mb-0"></h5>
        </div>
        <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href=""><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add More</span></a>
          <div class="collapse" id="experience-form1">
            <div class="border-dashed-bottom my-4"></div>
          </div>

        </div>
      </div> --}}
       {{--  --}}
      {{--  --}}
    </div>
    <div class="col-lg-4 ps-lg-2">
      <div class="sticky-sidebar">
        <br>
        <div class="card mb-3 overflow-hidden">
            <div class="card-header">
                <h5 class="mb-0">Change Password</h5>
              </div>
              <div class="card-body bg-light">
                <form action="{{ route('employeeChangePassword') }}" method="post">
                    @csrf
                    @method('PUT')
                  <div class="mb-3">
                    <label class="form-label" for="old-password">Old Password</label>
                    <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter Old Password">
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="new-password">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new Password">
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="confirm-password">Confirm Password</label>
                    <input type="password" class="form-control" id="conform_password" name="conform_password" placeholder="Enter conform Password">
                  </div>
                  <button class="btn btn-primary d-block w-100" type="submit">Update Password </button>
                </form>
              </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h5 class="mb-0">Bank Informations</h5>
          </div>
          <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href="{{ route('bankDetailsData') }}"><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add More</span></a>
            <div class="collapse" id="experience-form1">
              <div class="border-dashed-bottom my-4"></div>
            </div>
            @if ($userBank->isEmpty())

          @else
          @foreach ($userBank as $bankData)
          <div class="d-flex">
            <div class="flex-1 position-relative ps-3">
              <h6 class="fs-0 mb-0" style="text-transform: capitalize">{{ $bankData->bank_name }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
              </h6>
              <p class="mb-1">{{ $bankData->account_number }}</p>
              <p class="text-1000 mb-0">{{ $bankData->account_title }}</p>
              <div class="d-flex py-2">
                <a class="pe-2 text-black text-decoration-none" href="{{ route('editBankData',$bankData->id) }}"><i class="fa fa-solid fa-edit"></i></a>
                <a class="px-2 text-black text-decoration-none" href="{{ route('deleteBankData',$bankData->id) }}"><i class="fa fa-solid fa-trash"></i></a>
              </div>
              <div class="border-dashed-bottom my-3"></div>
            </div>
          </div>
          @endforeach
          @endif
          </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Education Informations</h5>
            </div>
            <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href="{{ route('showQualificationPage') }}"><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add More</span></a>
              <div class="collapse" id="experience-form1">
                <div class="border-dashed-bottom my-4"></div>
              </div>
              @if ($userQualification->isEmpty())

          @else
          @foreach ($userQualification as $item)
            <div class="d-flex">
            <div class="flex-1 position-relative ps-3">
              <h6 class="fs-0 mb-0" style="text-transform: capitalize">{{ $item->degree }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
              </h6>
              <p class="mb-1">{{ $item->subject }}</p>
              <p class="text-1000 mb-0">{{ $item->duration }}</p>
              <p class="text-1000 mb-0">{{ $item->country }}</p>
              <div class="d-flex py-2">
                <a class="pe-2 text-black text-decoration-none" href="{{ route('editQualificationData',$item->id) }}"><i class="fa fa-solid fa-edit"></i></a>
                <a class="px-2 text-black text-decoration-none" href="{{ route('deleteQualificationData',$item->id) }}"><i class="fa fa-solid fa-trash"></i></a>
              </div>
              <div class="border-dashed-bottom my-3"></div>
            </div>

            </div>
          @endforeach
          @endif
            </div>
        </div>
          <br>
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Social Media Accounts</h5>
            </div>
            <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href="{{ route('socialmediaPage') }}"><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add More</span></a>
              <div class="collapse" id="experience-form1">
                <div class="border-dashed-bottom my-4"></div>
              </div>
              @if ($userSocialMedia->isEmpty())

              @else
              @foreach ($userSocialMedia as $socialMedia)
              <div class="d-flex">
                <div class="flex-1 position-relative ps-3">
                  <h6 class="fs-0 mb-0">{{ $socialMedia->twitter_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  <h6 class="fs-0 mb-0">{{ $socialMedia->facebook_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  <h6 class="fs-0 mb-0" >{{ $socialMedia->instagram_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  <h6 class="fs-0 mb-0">{{ $socialMedia->skype_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  <h6 class="fs-0 mb-0">{{ $socialMedia->yahoo_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  <h6 class="fs-0 mb-0">{{ $socialMedia->google_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  {{-- <div class="d-flex py-2">
                    <a class="pe-2 text-black text-decoration-none" href="{{ route('editBankData',$socialMedia->id) }}"><i class="fa fa-solid fa-edit"></i></a>
                    <a class="px-2 text-black text-decoration-none" href="{{ route('deleteBankData',$socialMedia->id) }}"><i class="fa fa-solid fa-trash"></i></a>
                  </div> --}}
                  <div class="border-dashed-bottom my-3"></div>
                </div>
              </div>
              @endforeach
              @endif
            </div>
          </div>
          <br>
      </div>
    </div>
</div>
@elseif (Auth::guard('employee')->user()->roll_status == 3)
{{-- <div class="row">
    <div class="col-12">
      <div class="card mb-3 btn-reveal-trigger">
        <div class="card-header position-relative min-vh-25 mb-8">
          <div class="cover-image">
            <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(/public/assets/img/generic/4.jpg);">
            </div>
            <!--/.bg-holder-->

            <input class="d-none" id="upload-cover-image" type="file" />
            <label class="cover-image-file-input" for="upload-cover-image"><span class="fas fa-camera me-2"></span><span>Change cover photo</span></label>
          </div>
          <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle">
            <div class="h-100 w-100 rounded-circle overflow-hidden position-relative">
                @if (!empty(Auth::guard('employee')->user()->image))
                <img src="{{asset(Auth::guard('employee')->user()->image)}}" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail">
                @else
                <img src="/admin/dist/img/avators.jpg" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail">
                @endif --}}
                {{-- <input class="d-none" id="profile-image" type="file" />
                <label class="mb-0 overlay-icon d-flex flex-center" for="profile-image"><span class="bg-holder overlay overlay-0"></span><span class="z-index-1 text-white dark__text-white text-center fs--1"><span class="fas fa-camera"></span><span class="d-block">Update</span></span></label> --}}
             {{-- </div>
          </div>
        </div>
      </div>
    </div>
</div> --}}
{{-- <div class="row g-0">
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
    @foreach ($usersSetting as $item)
    @endforeach
    <div class="col-lg-8 pe-lg-2">
        @if($personalInform->isEmpty())
        <div class="card mb-3">
            <div class="card-header">
              <h5 class="mb-0">Profile Settings</h5>
            </div>
            <div class="card-body bg-light">
                <form class="row g-3" method="post" action="{{ route('personalAccountInformation') }}" enctype="multipart/form-data">
                    @csrf
                <div class="col-lg-12">
                    <label class="form-label" for="first-name">User Image</label>
                    <input class="form-control" type="file" name="userimage">

                </div>
                <div class="col-lg-6">
                  <label class="form-label" for="first-name">Employee Name</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="First name" value="{{old('username')}}">
                </div>
                <div class="col-lg-6">
                  <label class="form-label" for="last-name">Email Address</label>
                  <input type="email" class="form-control" id="emailaddress" name="emailaddress" placeholder="Enter email address" value="{{ $item->email }}{{old('emailaddress')}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Office Number</label>
                    <input type="number" class="form-control" id="officenumber" name="officenumber" placeholder="Enter Office Number" value="{{old('officenumber')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Contact Number</label>
                    <input type="number" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter Mobile Number" value="{{ $item->mobile }}{{old('mobilenumber')}}">
                </div>
                <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Gender</label>
                    <select name="salutions" id="salutions" class="form-control">
                        <option value="">Salutions</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Other</option>
                     </select>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Nationality</label>
                    <select name="nationality" id="nationality" class="form-control">
                        <option value="">Nationality</option>
                        <option value="pakistan">Pakistan</option>
                     </select>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Date of birth</label>
                      <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{old('dateofbirth')}}">
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Martrial Status</label>
                      <select name="matrialstatus" id="matrialstatus" class="form-control">
                        <option value="">Matrial Status</option>
                        <option value="married">Married</option>
                        <option value="single">Single</option>
                     </select>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Blood group</label>
                    <select name="bloodgroup" id="bloodgroup" class="form-control">
                        <option value="">Blood group</option>
                        <option value="a+">A+</option>
                        <option value="a-">A-</option>
                        <option value="b+">B+</option>
                        <option value="b-">B-</option>
                        <option value="o-">O-</option>
                        <option value="o+">O+</option>
                     </select>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Cnic Number</label>
                      <input type="number" class="form-control" id="cnicnumber" name="cnicnumber" placeholder="Enter cnic number" value="{{old('cnicnumber')}}">
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Father Name</label>
                      <input type="text" class="form-control" id="fathername" name="fathername" placeholder="enter father name" value="{{old('fathername')}}">
                </div>
                  <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Address</label>
                    <div class="textbox"><input type="text" class="form-control" id="address" name="address" placeholder="Adress" value="{{old('address')}}"></div>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">City</label>
                      <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="{{old('city')}}">
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">State/Province</label>
                      <input type="text" class="form-control" id="state" name="state" placeholder="State/Province" value="{{old('state')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Postal code</label>
                    <input type="number" class="form-control" id="postalcode" name="postalcode" placeholder="Enter postal code" value="{{old('postalcode')}}">
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Country</label>
                      <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="{{old('country')}}">
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Phone Number</label>
                      <input type="number" class="form-control" id="contactnumber" name="contactnumber" placeholder="Enter Contact number"  value="{{old('contactnumber')}}">
                </div>
                  <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Emergency Contact Person Name</label>
                    <input type="text" class="form-control" id="emergencycontactperson" name="econtactperson" placeholder="Enter Emergency Contact Person Name" value="{{old('econtactperson')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Emergency Contact Person Relationship</label>
                    <input type="text" class="form-control" id="relationship" name="relationship" placeholder="Enter Relationship" value="{{old('relationship')}}">
                </div>
                <div class="col-lg-6">
                  <label class="form-label" for="last-name">Emergency Contact Number</label>
                  <input type="number" class="form-control" id="emergencypersonphonenumber" name="epersonphonenumber" placeholder="Enter Emergency Person Number" value="{{old('epersonphonenumber')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Place Of birth</label>
                    <input type="text" class="form-control" id="placeofbirth" name="placeofbirth" placeholder="place of birth" value="{{old('placeofbirth')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Sub Department</label>
                    <input type="text" class="form-control" id="subdepartment" name="subdepartment" placeholder="Sub-Department" value="{{old('subdepartment')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Resign Date</label>
                    <input type="date" class="form-control" id="prcbationenddate" name="prcbationenddate" value="{{old('prcbationenddate')}}">
                </div>
                <hr>
                <div class="col-12 d-flex justify-content-end">
                  <button class="btn btn-primary" type="submit">Add Details</button>
                </div>
              </form>
            </div>
            </div>
        @else
        @foreach ($personalInform as $personal)
        @endforeach
        <div class="card mb-3">
            <div class="card-header">
              <h5 class="mb-0">Profile Settings</h5>
            </div>
            <div class="card-body bg-light">
                <form class="row g-3" method="post" action="{{ route('personalAccountInformation') }}" enctype="multipart/form-data">
                    @csrf --}}
                {{-- <div class="col-lg-12">
                    <label class="form-label" for="first-name">User Image</label>
                    <input class="form-control" type="file" name="userimage">

                </div> --}}
                {{-- <div class="col-lg-6">
                  <label class="form-label" for="first-name">Employee Name</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="First name" value="{{$personal->first_name}}" disabled>
                </div>
                <div class="col-lg-6">
                  <label class="form-label" for="last-name">Email Address</label>
                  <input type="email" class="form-control" id="emailaddress" name="emailaddress" placeholder="Enter email address" value="{{$personal->email_address}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Office Number</label>
                    <input type="number" class="form-control" id="officenumber" name="officenumber" placeholder="Enter Office Number" value="{{$personal->office_number}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Contact Number</label>
                    <input type="number" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter Mobile Number" value="{{$personal->mobile_number}}" disabled>
                </div>
                <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Gender</label>
                    <select name="salutions" id="salutions" class="form-control" disabled>
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
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Nationality</label>
                    <select name="nationality" id="nationality" class="form-control" disabled>
                        if($personal->nationality == 'pakistan'){
                            echo "selected";
                            <option value="pakistan">Pakistan</option>
                        }
                     </select>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Date of birth</label>
                      <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{$personal->date_of_birth}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Martrial Status</label>
                      <select name="matrialstatus" id="matrialstatus" class="form-control" disabled>
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
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Blood group</label>
                    <select name="bloodgroup" id="bloodgroup" class="form-control" disabled>
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
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Cnic Number</label>
                      <input type="number" class="form-control" id="cnicnumber" name="cnicnumber" placeholder="Enter cnic number" value="{{$personal->cnic_number}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Father Name</label>
                      <input type="text" class="form-control" id="fathername" name="fathername" placeholder="enter father name" value="{{$personal->father_name}}" disabled>
                </div>
                  <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Adress" value="{{$personal->address}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">City</label>
                      <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="{{$personal->city}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">State/Province</label>
                      <input type="text" class="form-control" id="state" name="state" placeholder="State/Province" value="{{$personal->province}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Postal code</label>
                    <input type="number" class="form-control" id="postalcode" name="postalcode" placeholder="Enter postal code" value="{{$personal->postal_code}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Country</label>
                      <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="{{$personal->country}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Phone Number</label>
                      <input type="number" class="form-control" id="contactnumber" name="contactnumber" placeholder="Enter Contact number"  value="{{$personal->contact_number}}" disabled>
                </div>
                  <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Emergency Contact Person Name</label>
                    <input type="text" class="form-control" id="emergencycontactperson" name="econtactperson" placeholder="Enter Emergency Contact Person Name" value="{{$personal->emergency_contact_person}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Emergency Contact Person Relationship</label>
                    <input type="text" class="form-control" id="relationship" name="relationship" placeholder="Enter Relationship" value="{{$personal->relationship}}" disabled>
                </div>
                <div class="col-lg-6">
                  <label class="form-label" for="last-name">Emergency Contact Number</label>
                  <input type="number" class="form-control" id="emergencypersonphonenumber" name="epersonphonenumber" placeholder="Enter Emergency Person Number" value="{{$personal->person_contact}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Place Of birth</label>
                    <input type="text" class="form-control" id="placeofbirth" name="placeofbirth" placeholder="place of birth" value="{{$personal->place_of_birth}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Sub Department</label>
                    <input type="text" class="form-control" id="subdepartment" name="subdepartment" placeholder="Sub-Department" value="{{$personal->sub_department}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Resign Date</label>
                    <input type="date" class="form-control" id="prcbationenddate" name="prcbationenddate" value="{{$personal->end_date}}" disabled>
                </div>
                <hr>
              </form>
            </div>
            </div>
        @endif --}}
      {{-- <div class="card mb-3">
        <div class="card-header">
          <h5 class="mb-0"></h5>
        </div>
        <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href=""><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add More</span></a>
            <div class="collapse" id="experience-form1">
            <div class="border-dashed-bottom my-4"></div>
            </div>

        </div>
      </div> --}}
      {{--  --}}
      {{-- <div class="card mb-3">
        <div class="card-header">
          <h5 class="mb-0"></h5>
        </div>
        <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href=""><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add More</span></a>
          <div class="collapse" id="experience-form1">
            <div class="border-dashed-bottom my-4"></div>
          </div>

        </div>
      </div> --}}
       {{--  --}}
      {{--  --}}
    {{-- </div>
    <div class="col-lg-4 ps-lg-2">
      <div class="sticky-sidebar">
        <br>
        <div class="card mb-3 overflow-hidden">
            <div class="card-header">
                <h5 class="mb-0">Change Password</h5>
              </div>
              <div class="card-body bg-light">
                <form action="{{ route('employeeChangePassword') }}" method="post">
                    @csrf
                    @method('PUT')
                  <div class="mb-3">
                    <label class="form-label" for="old-password">Old Password</label>
                    <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter Old Password">
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="new-password">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new Password">
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="confirm-password">Confirm Password</label>
                    <input type="password" class="form-control" id="conform_password" name="conform_password" placeholder="Enter conform Password">
                  </div>
                  <button class="btn btn-primary d-block w-100" type="submit">Update Password </button>
                </form>
              </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h5 class="mb-0">Bank Informations</h5>
          </div>
          <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href="{{ route('bankDetailsData') }}"><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add More</span></a>
            <div class="collapse" id="experience-form1">
              <div class="border-dashed-bottom my-4"></div>
            </div>
            @if ($userBank->isEmpty())

          @else
          @foreach ($userBank as $bankData)
          <div class="d-flex">
            <div class="flex-1 position-relative ps-3">
              <h6 class="fs-0 mb-0" style="text-transform: capitalize">{{ $bankData->bank_name }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
              </h6>
              <p class="mb-1">{{ $bankData->account_number }}</p>
              <p class="text-1000 mb-0">{{ $bankData->account_title }}</p>
              <div class="d-flex py-2">
                <a class="pe-2 text-black text-decoration-none" href="{{ route('editBankData',$bankData->id) }}"><i class="fa fa-solid fa-edit"></i></a>
                <a class="px-2 text-black text-decoration-none" href="{{ route('deleteBankData',$bankData->id) }}"><i class="fa fa-solid fa-trash"></i></a>
              </div>
              <div class="border-dashed-bottom my-3"></div>
            </div>
          </div>
          @endforeach
          @endif
          </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Education Informations</h5>
            </div>
            <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href="{{ route('showQualificationPage') }}"><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add More</span></a>
              <div class="collapse" id="experience-form1">
                <div class="border-dashed-bottom my-4"></div>
              </div>
              @if ($userQualification->isEmpty())

          @else
          @foreach ($userQualification as $item)
            <div class="d-flex">
            <div class="flex-1 position-relative ps-3">
              <h6 class="fs-0 mb-0" style="text-transform: capitalize">{{ $item->degree }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
              </h6>
              <p class="mb-1">{{ $item->subject }}</p>
              <p class="text-1000 mb-0">{{ $item->duration }}</p>
              <p class="text-1000 mb-0">{{ $item->country }}</p>
              <div class="d-flex py-2">
                <a class="pe-2 text-black text-decoration-none" href="{{ route('editQualificationData',$item->id) }}"><i class="fa fa-solid fa-edit"></i></a>
                <a class="px-2 text-black text-decoration-none" href="{{ route('deleteQualificationData',$item->id) }}"><i class="fa fa-solid fa-trash"></i></a>
              </div>
              <div class="border-dashed-bottom my-3"></div>
            </div>

            </div>
          @endforeach
          @endif
            </div>
        </div>
          <br>
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Social Media Accounts</h5>
            </div>
            <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href="{{ route('socialmediaPage') }}"><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add More</span></a>
              <div class="collapse" id="experience-form1">
                <div class="border-dashed-bottom my-4"></div>
              </div>
              @if ($userSocialMedia->isEmpty())

              @else
              @foreach ($userSocialMedia as $socialMedia)
              <div class="d-flex">
                <div class="flex-1 position-relative ps-3">
                  <h6 class="fs-0 mb-0">{{ $socialMedia->twitter_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  <h6 class="fs-0 mb-0">{{ $socialMedia->facebook_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  <h6 class="fs-0 mb-0" >{{ $socialMedia->instagram_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  <h6 class="fs-0 mb-0">{{ $socialMedia->skype_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  <h6 class="fs-0 mb-0">{{ $socialMedia->yahoo_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  <h6 class="fs-0 mb-0">{{ $socialMedia->google_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br> --}}
                  {{-- <div class="d-flex py-2">
                    <a class="pe-2 text-black text-decoration-none" href="{{ route('editBankData',$socialMedia->id) }}"><i class="fa fa-solid fa-edit"></i></a>
                    <a class="px-2 text-black text-decoration-none" href="{{ route('deleteBankData',$socialMedia->id) }}"><i class="fa fa-solid fa-trash"></i></a>
                  </div> --}}
                  {{-- <div class="border-dashed-bottom my-3"></div>
                </div>
              </div>
              @endforeach
              @endif
            </div>
          </div>
          <br>
      </div>
    </div>
</div> --}}
@elseif (Auth::guard('employee')->user()->roll_status == 2)
{{-- <div class="row">
    <div class="col-12">
      <div class="card mb-3 btn-reveal-trigger">
        <div class="card-header position-relative min-vh-25 mb-8">
          <div class="cover-image">
            <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(/public/assets/img/generic/4.jpg);">
            </div>
            <!--/.bg-holder-->

            <input class="d-none" id="upload-cover-image" type="file" />
            <label class="cover-image-file-input" for="upload-cover-image"><span class="fas fa-camera me-2"></span><span>Change cover photo</span></label>
          </div>
          <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle">
            <div class="h-100 w-100 rounded-circle overflow-hidden position-relative">
                @if (!empty(Auth::guard('employee')->user()->image))
                <img src="{{asset(Auth::guard('employee')->user()->image)}}" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail">
                @else
                <img src="/admin/dist/img/avators.jpg" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail">
                @endif --}}
                {{-- <input class="d-none" id="profile-image" type="file" />
                <label class="mb-0 overlay-icon d-flex flex-center" for="profile-image"><span class="bg-holder overlay overlay-0"></span><span class="z-index-1 text-white dark__text-white text-center fs--1"><span class="fas fa-camera"></span><span class="d-block">Update</span></span></label> --}}
             {{-- </div>
          </div>
        </div>
      </div>
    </div>
</div> --}}
{{-- <div class="row g-0">
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
    @foreach ($usersSetting as $item)
    @endforeach
    <div class="col-lg-8 pe-lg-2">
        @if($personalInform->isEmpty())
        <div class="card mb-3">
            <div class="card-header">
              <h5 class="mb-0">Profile Settings</h5>
            </div>
            <div class="card-body bg-light">
                <form class="row g-3" method="post" action="{{ route('personalAccountInformation') }}" enctype="multipart/form-data">
                    @csrf
                <div class="col-lg-12">
                    <label class="form-label" for="first-name">User Image</label>
                    <input class="form-control" type="file" name="userimage">

                </div>
                <div class="col-lg-6">
                  <label class="form-label" for="first-name">Employee Name</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="First name" value="{{old('username')}}">
                </div>
                <div class="col-lg-6">
                  <label class="form-label" for="last-name">Email Address</label>
                  <input type="email" class="form-control" id="emailaddress" name="emailaddress" placeholder="Enter email address" value="{{ $item->email }}{{old('emailaddress')}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Office Number</label>
                    <input type="number" class="form-control" id="officenumber" name="officenumber" placeholder="Enter Office Number" value="{{old('officenumber')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Contact Number</label>
                    <input type="number" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter Mobile Number" value="{{ $item->mobile }}{{old('mobilenumber')}}">
                </div>
                <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Gender</label>
                    <select name="salutions" id="salutions" class="form-control">
                        <option value="">Salutions</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Other</option>
                     </select>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Nationality</label>
                    <select name="nationality" id="nationality" class="form-control">
                        <option value="">Nationality</option>
                        <option value="pakistan">Pakistan</option>
                     </select>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Date of birth</label>
                      <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{old('dateofbirth')}}">
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Martrial Status</label>
                      <select name="matrialstatus" id="matrialstatus" class="form-control">
                        <option value="">Matrial Status</option>
                        <option value="married">Married</option>
                        <option value="single">Single</option>
                     </select>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Blood group</label>
                    <select name="bloodgroup" id="bloodgroup" class="form-control">
                        <option value="">Blood group</option>
                        <option value="a+">A+</option>
                        <option value="a-">A-</option>
                        <option value="b+">B+</option>
                        <option value="b-">B-</option>
                        <option value="o-">O-</option>
                        <option value="o+">O+</option>
                     </select>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Cnic Number</label>
                      <input type="number" class="form-control" id="cnicnumber" name="cnicnumber" placeholder="Enter cnic number" value="{{old('cnicnumber')}}">
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Father Name</label>
                      <input type="text" class="form-control" id="fathername" name="fathername" placeholder="enter father name" value="{{old('fathername')}}">
                </div>
                  <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Address</label>
                    <div class="textbox"><input type="text" class="form-control" id="address" name="address" placeholder="Adress" value="{{old('address')}}"></div>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">City</label>
                      <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="{{old('city')}}">
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">State/Province</label>
                      <input type="text" class="form-control" id="state" name="state" placeholder="State/Province" value="{{old('state')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Postal code</label>
                    <input type="number" class="form-control" id="postalcode" name="postalcode" placeholder="Enter postal code" value="{{old('postalcode')}}">
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Country</label>
                      <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="{{old('country')}}">
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Phone Number</label>
                      <input type="number" class="form-control" id="contactnumber" name="contactnumber" placeholder="Enter Contact number"  value="{{old('contactnumber')}}">
                </div>
                  <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Emergency Contact Person Name</label>
                    <input type="text" class="form-control" id="emergencycontactperson" name="econtactperson" placeholder="Enter Emergency Contact Person Name" value="{{old('econtactperson')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Emergency Contact Person Relationship</label>
                    <input type="text" class="form-control" id="relationship" name="relationship" placeholder="Enter Relationship" value="{{old('relationship')}}">
                </div>
                <div class="col-lg-6">
                  <label class="form-label" for="last-name">Emergency Contact Number</label>
                  <input type="number" class="form-control" id="emergencypersonphonenumber" name="epersonphonenumber" placeholder="Enter Emergency Person Number" value="{{old('epersonphonenumber')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Place Of birth</label>
                    <input type="text" class="form-control" id="placeofbirth" name="placeofbirth" placeholder="place of birth" value="{{old('placeofbirth')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Sub Department</label>
                    <input type="text" class="form-control" id="subdepartment" name="subdepartment" placeholder="Sub-Department" value="{{old('subdepartment')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Resign Date</label>
                    <input type="date" class="form-control" id="prcbationenddate" name="prcbationenddate" value="{{old('prcbationenddate')}}">
                </div>
                <hr>
                <div class="col-12 d-flex justify-content-end">
                  <button class="btn btn-primary" type="submit">Add Details</button>
                </div>
              </form>
            </div>
            </div>
        @else
        @foreach ($personalInform as $personal)
        @endforeach
        <div class="card mb-3">
            <div class="card-header">
              <h5 class="mb-0">Profile Settings</h5>
            </div>
            <div class="card-body bg-light">
                <form class="row g-3" method="post" action="{{ route('personalAccountInformation') }}" enctype="multipart/form-data">
                    @csrf --}}
                {{-- <div class="col-lg-12">
                    <label class="form-label" for="first-name">User Image</label>
                    <input class="form-control" type="file" name="userimage">

                </div> --}}
                {{-- <div class="col-lg-6">
                  <label class="form-label" for="first-name">Employee Name</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="First name" value="{{$personal->first_name}}" disabled>
                </div>
                <div class="col-lg-6">
                  <label class="form-label" for="last-name">Email Address</label>
                  <input type="email" class="form-control" id="emailaddress" name="emailaddress" placeholder="Enter email address" value="{{$personal->email_address}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Office Number</label>
                    <input type="number" class="form-control" id="officenumber" name="officenumber" placeholder="Enter Office Number" value="{{$personal->office_number}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Contact Number</label>
                    <input type="number" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter Mobile Number" value="{{$personal->mobile_number}}" disabled>
                </div>
                <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Gender</label>
                    <select name="salutions" id="salutions" class="form-control" disabled>
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
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Nationality</label>
                    <select name="nationality" id="nationality" class="form-control" disabled>
                        if($personal->nationality == 'pakistan'){
                            echo "selected";
                            <option value="pakistan">Pakistan</option>
                        }
                     </select>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Date of birth</label>
                      <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{$personal->date_of_birth}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Martrial Status</label>
                      <select name="matrialstatus" id="matrialstatus" class="form-control" disabled>
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
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Blood group</label>
                    <select name="bloodgroup" id="bloodgroup" class="form-control" disabled>
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
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Cnic Number</label>
                      <input type="number" class="form-control" id="cnicnumber" name="cnicnumber" placeholder="Enter cnic number" value="{{$personal->cnic_number}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Father Name</label>
                      <input type="text" class="form-control" id="fathername" name="fathername" placeholder="enter father name" value="{{$personal->father_name}}" disabled>
                </div>
                  <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Adress" value="{{$personal->address}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">City</label>
                      <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="{{$personal->city}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">State/Province</label>
                      <input type="text" class="form-control" id="state" name="state" placeholder="State/Province" value="{{$personal->province}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Postal code</label>
                    <input type="number" class="form-control" id="postalcode" name="postalcode" placeholder="Enter postal code" value="{{$personal->postal_code}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Country</label>
                      <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="{{$personal->country}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Phone Number</label>
                      <input type="number" class="form-control" id="contactnumber" name="contactnumber" placeholder="Enter Contact number"  value="{{$personal->contact_number}}" disabled>
                </div>
                  <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Emergency Contact Person Name</label>
                    <input type="text" class="form-control" id="emergencycontactperson" name="econtactperson" placeholder="Enter Emergency Contact Person Name" value="{{$personal->emergency_contact_person}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Emergency Contact Person Relationship</label>
                    <input type="text" class="form-control" id="relationship" name="relationship" placeholder="Enter Relationship" value="{{$personal->relationship}}" disabled>
                </div>
                <div class="col-lg-6">
                  <label class="form-label" for="last-name">Emergency Contact Number</label>
                  <input type="number" class="form-control" id="emergencypersonphonenumber" name="epersonphonenumber" placeholder="Enter Emergency Person Number" value="{{$personal->person_contact}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Place Of birth</label>
                    <input type="text" class="form-control" id="placeofbirth" name="placeofbirth" placeholder="place of birth" value="{{$personal->place_of_birth}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Sub Department</label>
                    <input type="text" class="form-control" id="subdepartment" name="subdepartment" placeholder="Sub-Department" value="{{$personal->sub_department}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Resign Date</label>
                    <input type="date" class="form-control" id="prcbationenddate" name="prcbationenddate" value="{{$personal->end_date}}" disabled>
                </div>
                <hr>
              </form>
            </div>
            </div>
        @endif --}}
      {{-- <div class="card mb-3">
        <div class="card-header">
          <h5 class="mb-0"></h5>
        </div>
        <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href=""><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add More</span></a>
            <div class="collapse" id="experience-form1">
            <div class="border-dashed-bottom my-4"></div>
            </div>

        </div>
      </div> --}}
      {{--  --}}
      {{-- <div class="card mb-3">
        <div class="card-header">
          <h5 class="mb-0"></h5>
        </div>
        <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href=""><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add More</span></a>
          <div class="collapse" id="experience-form1">
            <div class="border-dashed-bottom my-4"></div>
          </div>

        </div>
      </div> --}}
       {{--  --}}
      {{--  --}}
    {{-- </div>
    <div class="col-lg-4 ps-lg-2">
      <div class="sticky-sidebar">
        <br>
        <div class="card mb-3 overflow-hidden">
            <div class="card-header">
                <h5 class="mb-0">Change Password</h5>
              </div>
              <div class="card-body bg-light">
                <form action="{{ route('employeeChangePassword') }}" method="post">
                    @csrf
                    @method('PUT')
                  <div class="mb-3">
                    <label class="form-label" for="old-password">Old Password</label>
                    <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter Old Password">
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="new-password">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new Password">
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="confirm-password">Confirm Password</label>
                    <input type="password" class="form-control" id="conform_password" name="conform_password" placeholder="Enter conform Password">
                  </div>
                  <button class="btn btn-primary d-block w-100" type="submit">Update Password </button>
                </form>
              </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h5 class="mb-0">Bank Informations</h5>
          </div>
          <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href="{{ route('bankDetailsData') }}"><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add More</span></a>
            <div class="collapse" id="experience-form1">
              <div class="border-dashed-bottom my-4"></div>
            </div>
            @if ($userBank->isEmpty())

          @else
          @foreach ($userBank as $bankData)
          <div class="d-flex">
            <div class="flex-1 position-relative ps-3">
              <h6 class="fs-0 mb-0" style="text-transform: capitalize">{{ $bankData->bank_name }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
              </h6>
              <p class="mb-1">{{ $bankData->account_number }}</p>
              <p class="text-1000 mb-0">{{ $bankData->account_title }}</p>
              <div class="d-flex py-2">
                <a class="pe-2 text-black text-decoration-none" href="{{ route('editBankData',$bankData->id) }}"><i class="fa fa-solid fa-edit"></i></a>
                <a class="px-2 text-black text-decoration-none" href="{{ route('deleteBankData',$bankData->id) }}"><i class="fa fa-solid fa-trash"></i></a>
              </div>
              <div class="border-dashed-bottom my-3"></div>
            </div>
          </div>
          @endforeach
          @endif
          </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Education Informations</h5>
            </div>
            <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href="{{ route('showQualificationPage') }}"><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add More</span></a>
              <div class="collapse" id="experience-form1">
                <div class="border-dashed-bottom my-4"></div>
              </div>
              @if ($userQualification->isEmpty())

          @else
          @foreach ($userQualification as $item)
            <div class="d-flex">
            <div class="flex-1 position-relative ps-3">
              <h6 class="fs-0 mb-0" style="text-transform: capitalize">{{ $item->degree }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
              </h6>
              <p class="mb-1">{{ $item->subject }}</p>
              <p class="text-1000 mb-0">{{ $item->duration }}</p>
              <p class="text-1000 mb-0">{{ $item->country }}</p>
              <div class="d-flex py-2">
                <a class="pe-2 text-black text-decoration-none" href="{{ route('editQualificationData',$item->id) }}"><i class="fa fa-solid fa-edit"></i></a>
                <a class="px-2 text-black text-decoration-none" href="{{ route('deleteQualificationData',$item->id) }}"><i class="fa fa-solid fa-trash"></i></a>
              </div>
              <div class="border-dashed-bottom my-3"></div>
            </div>

            </div>
          @endforeach
          @endif
            </div>
        </div>
          <br>
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Social Media Accounts</h5>
            </div>
            <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href="{{ route('socialmediaPage') }}"><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add More</span></a>
              <div class="collapse" id="experience-form1">
                <div class="border-dashed-bottom my-4"></div>
              </div>
              @if ($userSocialMedia->isEmpty())

              @else
              @foreach ($userSocialMedia as $socialMedia)
              <div class="d-flex">
                <div class="flex-1 position-relative ps-3">
                  <h6 class="fs-0 mb-0">{{ $socialMedia->twitter_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  <h6 class="fs-0 mb-0">{{ $socialMedia->facebook_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  <h6 class="fs-0 mb-0" >{{ $socialMedia->instagram_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  <h6 class="fs-0 mb-0">{{ $socialMedia->skype_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  <h6 class="fs-0 mb-0">{{ $socialMedia->yahoo_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  <h6 class="fs-0 mb-0">{{ $socialMedia->google_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br> --}}
                  {{-- <div class="d-flex py-2">
                    <a class="pe-2 text-black text-decoration-none" href="{{ route('editBankData',$socialMedia->id) }}"><i class="fa fa-solid fa-edit"></i></a>
                    <a class="px-2 text-black text-decoration-none" href="{{ route('deleteBankData',$socialMedia->id) }}"><i class="fa fa-solid fa-trash"></i></a>
                  </div> --}}
                  {{-- <div class="border-dashed-bottom my-3"></div>
                </div>
              </div>
              @endforeach
              @endif
            </div>
          </div>
          <br>
      </div>
    </div>
</div> --}}
@elseif (Auth::guard('employee')->user()->roll_status == 1)
{{-- <div class="row">
    <div class="col-12">
      <div class="card mb-3 btn-reveal-trigger">
        <div class="card-header position-relative min-vh-25 mb-8">
          <div class="cover-image">
            <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(/public/assets/img/generic/4.jpg);">
            </div>
            <!--/.bg-holder-->

            <input class="d-none" id="upload-cover-image" type="file" />
            <label class="cover-image-file-input" for="upload-cover-image"><span class="fas fa-camera me-2"></span><span>Change cover photo</span></label>
          </div>
          <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle">
            <div class="h-100 w-100 rounded-circle overflow-hidden position-relative">
                @if (!empty(Auth::guard('employee')->user()->image))
                <img src="{{asset(Auth::guard('employee')->user()->image)}}" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail">
                @else
                <img src="/admin/dist/img/avators.jpg" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail">
                @endif --}}
                {{-- <input class="d-none" id="profile-image" type="file" />
                <label class="mb-0 overlay-icon d-flex flex-center" for="profile-image"><span class="bg-holder overlay overlay-0"></span><span class="z-index-1 text-white dark__text-white text-center fs--1"><span class="fas fa-camera"></span><span class="d-block">Update</span></span></label> --}}
             {{-- </div>
          </div>
        </div>
      </div>
    </div>
</div> --}}
{{-- <div class="row g-0">
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
    @foreach ($usersSetting as $item)
    @endforeach
    <div class="col-lg-8 pe-lg-2">
        @if($personalInform->isEmpty())
        <div class="card mb-3">
            <div class="card-header">
              <h5 class="mb-0">Profile Settings</h5>
            </div>
            <div class="card-body bg-light">
                <form class="row g-3" method="post" action="{{ route('personalAccountInformation') }}" enctype="multipart/form-data">
                    @csrf
                <div class="col-lg-12">
                    <label class="form-label" for="first-name">User Image</label>
                    <input class="form-control" type="file" name="userimage">

                </div>
                <div class="col-lg-6">
                  <label class="form-label" for="first-name">Employee Name</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="First name" value="{{old('username')}}">
                </div>
                <div class="col-lg-6">
                  <label class="form-label" for="last-name">Email Address</label>
                  <input type="email" class="form-control" id="emailaddress" name="emailaddress" placeholder="Enter email address" value="{{ $item->email }}{{old('emailaddress')}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Office Number</label>
                    <input type="number" class="form-control" id="officenumber" name="officenumber" placeholder="Enter Office Number" value="{{old('officenumber')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Contact Number</label>
                    <input type="number" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter Mobile Number" value="{{ $item->mobile }}{{old('mobilenumber')}}">
                </div>
                <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Gender</label>
                    <select name="salutions" id="salutions" class="form-control">
                        <option value="">Salutions</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Other</option>
                     </select>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Nationality</label>
                    <select name="nationality" id="nationality" class="form-control">
                        <option value="">Nationality</option>
                        <option value="pakistan">Pakistan</option>
                     </select>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Date of birth</label>
                      <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{old('dateofbirth')}}">
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Martrial Status</label>
                      <select name="matrialstatus" id="matrialstatus" class="form-control">
                        <option value="">Matrial Status</option>
                        <option value="married">Married</option>
                        <option value="single">Single</option>
                     </select>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Blood group</label>
                    <select name="bloodgroup" id="bloodgroup" class="form-control">
                        <option value="">Blood group</option>
                        <option value="a+">A+</option>
                        <option value="a-">A-</option>
                        <option value="b+">B+</option>
                        <option value="b-">B-</option>
                        <option value="o-">O-</option>
                        <option value="o+">O+</option>
                     </select>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Cnic Number</label>
                      <input type="number" class="form-control" id="cnicnumber" name="cnicnumber" placeholder="Enter cnic number" value="{{old('cnicnumber')}}">
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Father Name</label>
                      <input type="text" class="form-control" id="fathername" name="fathername" placeholder="enter father name" value="{{old('fathername')}}">
                </div>
                  <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Address</label>
                    <div class="textbox"><input type="text" class="form-control" id="address" name="address" placeholder="Adress" value="{{old('address')}}"></div>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">City</label>
                      <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="{{old('city')}}">
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">State/Province</label>
                      <input type="text" class="form-control" id="state" name="state" placeholder="State/Province" value="{{old('state')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Postal code</label>
                    <input type="number" class="form-control" id="postalcode" name="postalcode" placeholder="Enter postal code" value="{{old('postalcode')}}">
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Country</label>
                      <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="{{old('country')}}">
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Phone Number</label>
                      <input type="number" class="form-control" id="contactnumber" name="contactnumber" placeholder="Enter Contact number"  value="{{old('contactnumber')}}">
                </div>
                  <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Emergency Contact Person Name</label>
                    <input type="text" class="form-control" id="emergencycontactperson" name="econtactperson" placeholder="Enter Emergency Contact Person Name" value="{{old('econtactperson')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Emergency Contact Person Relationship</label>
                    <input type="text" class="form-control" id="relationship" name="relationship" placeholder="Enter Relationship" value="{{old('relationship')}}">
                </div>
                <div class="col-lg-6">
                  <label class="form-label" for="last-name">Emergency Contact Number</label>
                  <input type="number" class="form-control" id="emergencypersonphonenumber" name="epersonphonenumber" placeholder="Enter Emergency Person Number" value="{{old('epersonphonenumber')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Place Of birth</label>
                    <input type="text" class="form-control" id="placeofbirth" name="placeofbirth" placeholder="place of birth" value="{{old('placeofbirth')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Sub Department</label>
                    <input type="text" class="form-control" id="subdepartment" name="subdepartment" placeholder="Sub-Department" value="{{old('subdepartment')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Resign Date</label>
                    <input type="date" class="form-control" id="prcbationenddate" name="prcbationenddate" value="{{old('prcbationenddate')}}">
                </div>
                <hr>
                <div class="col-12 d-flex justify-content-end">
                  <button class="btn btn-primary" type="submit">Add Details</button>
                </div>
              </form>
            </div>
            </div>
        @else
        @foreach ($personalInform as $personal)
        @endforeach
        <div class="card mb-3">
            <div class="card-header">
              <h5 class="mb-0">Profile Settings</h5>
            </div>
            <div class="card-body bg-light">
                <form class="row g-3" method="post" action="{{ route('personalAccountInformation') }}" enctype="multipart/form-data">
                    @csrf --}}
                {{-- <div class="col-lg-12">
                    <label class="form-label" for="first-name">User Image</label>
                    <input class="form-control" type="file" name="userimage">

                </div> --}}
                {{-- <div class="col-lg-6">
                  <label class="form-label" for="first-name">Employee Name</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="First name" value="{{$personal->first_name}}" disabled>
                </div>
                <div class="col-lg-6">
                  <label class="form-label" for="last-name">Email Address</label>
                  <input type="email" class="form-control" id="emailaddress" name="emailaddress" placeholder="Enter email address" value="{{$personal->email_address}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Office Number</label>
                    <input type="number" class="form-control" id="officenumber" name="officenumber" placeholder="Enter Office Number" value="{{$personal->office_number}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Contact Number</label>
                    <input type="number" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter Mobile Number" value="{{$personal->mobile_number}}" disabled>
                </div>
                <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Gender</label>
                    <select name="salutions" id="salutions" class="form-control" disabled>
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
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Nationality</label>
                    <select name="nationality" id="nationality" class="form-control" disabled>
                        if($personal->nationality == 'pakistan'){
                            echo "selected";
                            <option value="pakistan">Pakistan</option>
                        }
                     </select>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Date of birth</label>
                      <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{$personal->date_of_birth}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Martrial Status</label>
                      <select name="matrialstatus" id="matrialstatus" class="form-control" disabled>
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
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Blood group</label>
                    <select name="bloodgroup" id="bloodgroup" class="form-control" disabled>
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
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Cnic Number</label>
                      <input type="number" class="form-control" id="cnicnumber" name="cnicnumber" placeholder="Enter cnic number" value="{{$personal->cnic_number}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Father Name</label>
                      <input type="text" class="form-control" id="fathername" name="fathername" placeholder="enter father name" value="{{$personal->father_name}}" disabled>
                </div>
                  <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Adress" value="{{$personal->address}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">City</label>
                      <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="{{$personal->city}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">State/Province</label>
                      <input type="text" class="form-control" id="state" name="state" placeholder="State/Province" value="{{$personal->province}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Postal code</label>
                    <input type="number" class="form-control" id="postalcode" name="postalcode" placeholder="Enter postal code" value="{{$personal->postal_code}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Country</label>
                      <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="{{$personal->country}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Phone Number</label>
                      <input type="number" class="form-control" id="contactnumber" name="contactnumber" placeholder="Enter Contact number"  value="{{$personal->contact_number}}" disabled>
                </div>
                  <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Emergency Contact Person Name</label>
                    <input type="text" class="form-control" id="emergencycontactperson" name="econtactperson" placeholder="Enter Emergency Contact Person Name" value="{{$personal->emergency_contact_person}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Emergency Contact Person Relationship</label>
                    <input type="text" class="form-control" id="relationship" name="relationship" placeholder="Enter Relationship" value="{{$personal->relationship}}" disabled>
                </div>
                <div class="col-lg-6">
                  <label class="form-label" for="last-name">Emergency Contact Number</label>
                  <input type="number" class="form-control" id="emergencypersonphonenumber" name="epersonphonenumber" placeholder="Enter Emergency Person Number" value="{{$personal->person_contact}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Place Of birth</label>
                    <input type="text" class="form-control" id="placeofbirth" name="placeofbirth" placeholder="place of birth" value="{{$personal->place_of_birth}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Sub Department</label>
                    <input type="text" class="form-control" id="subdepartment" name="subdepartment" placeholder="Sub-Department" value="{{$personal->sub_department}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Resign Date</label>
                    <input type="date" class="form-control" id="prcbationenddate" name="prcbationenddate" value="{{$personal->end_date}}" disabled>
                </div>
                <hr>
              </form>
            </div>
            </div>
        @endif --}}
      {{-- <div class="card mb-3">
        <div class="card-header">
          <h5 class="mb-0"></h5>
        </div>
        <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href=""><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add More</span></a>
            <div class="collapse" id="experience-form1">
            <div class="border-dashed-bottom my-4"></div>
            </div>

        </div>
      </div> --}}
      {{--  --}}
      {{-- <div class="card mb-3">
        <div class="card-header">
          <h5 class="mb-0"></h5>
        </div>
        <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href=""><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add More</span></a>
          <div class="collapse" id="experience-form1">
            <div class="border-dashed-bottom my-4"></div>
          </div>

        </div>
      </div> --}}
       {{--  --}}
      {{--  --}}
    {{-- </div>
    <div class="col-lg-4 ps-lg-2">
      <div class="sticky-sidebar">
        <br>
        <div class="card mb-3 overflow-hidden">
            <div class="card-header">
                <h5 class="mb-0">Change Password</h5>
              </div>
              <div class="card-body bg-light">
                <form action="{{ route('employeeChangePassword') }}" method="post">
                    @csrf
                    @method('PUT')
                  <div class="mb-3">
                    <label class="form-label" for="old-password">Old Password</label>
                    <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter Old Password">
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="new-password">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new Password">
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="confirm-password">Confirm Password</label>
                    <input type="password" class="form-control" id="conform_password" name="conform_password" placeholder="Enter conform Password">
                  </div>
                  <button class="btn btn-primary d-block w-100" type="submit">Update Password </button>
                </form>
              </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h5 class="mb-0">Bank Informations</h5>
          </div>
          <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href="{{ route('bankDetailsData') }}"><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add More</span></a>
            <div class="collapse" id="experience-form1">
              <div class="border-dashed-bottom my-4"></div>
            </div>
            @if ($userBank->isEmpty())

          @else
          @foreach ($userBank as $bankData)
          <div class="d-flex">
            <div class="flex-1 position-relative ps-3">
              <h6 class="fs-0 mb-0" style="text-transform: capitalize">{{ $bankData->bank_name }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
              </h6>
              <p class="mb-1">{{ $bankData->account_number }}</p>
              <p class="text-1000 mb-0">{{ $bankData->account_title }}</p>
              <div class="d-flex py-2">
                <a class="pe-2 text-black text-decoration-none" href="{{ route('editBankData',$bankData->id) }}"><i class="fa fa-solid fa-edit"></i></a>
                <a class="px-2 text-black text-decoration-none" href="{{ route('deleteBankData',$bankData->id) }}"><i class="fa fa-solid fa-trash"></i></a>
              </div>
              <div class="border-dashed-bottom my-3"></div>
            </div>
          </div>
          @endforeach
          @endif
          </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Education Informations</h5>
            </div>
            <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href="{{ route('showQualificationPage') }}"><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add More</span></a>
              <div class="collapse" id="experience-form1">
                <div class="border-dashed-bottom my-4"></div>
              </div>
              @if ($userQualification->isEmpty())

          @else
          @foreach ($userQualification as $item)
            <div class="d-flex">
            <div class="flex-1 position-relative ps-3">
              <h6 class="fs-0 mb-0" style="text-transform: capitalize">{{ $item->degree }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
              </h6>
              <p class="mb-1">{{ $item->subject }}</p>
              <p class="text-1000 mb-0">{{ $item->duration }}</p>
              <p class="text-1000 mb-0">{{ $item->country }}</p>
              <div class="d-flex py-2">
                <a class="pe-2 text-black text-decoration-none" href="{{ route('editQualificationData',$item->id) }}"><i class="fa fa-solid fa-edit"></i></a>
                <a class="px-2 text-black text-decoration-none" href="{{ route('deleteQualificationData',$item->id) }}"><i class="fa fa-solid fa-trash"></i></a>
              </div>
              <div class="border-dashed-bottom my-3"></div>
            </div>

            </div>
          @endforeach
          @endif
            </div>
        </div>
          <br>
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Social Media Accounts</h5>
            </div>
            <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href="{{ route('socialmediaPage') }}"><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add More</span></a>
              <div class="collapse" id="experience-form1">
                <div class="border-dashed-bottom my-4"></div>
              </div>
              @if ($userSocialMedia->isEmpty())

              @else
              @foreach ($userSocialMedia as $socialMedia)
              <div class="d-flex">
                <div class="flex-1 position-relative ps-3">
                  <h6 class="fs-0 mb-0">{{ $socialMedia->twitter_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  <h6 class="fs-0 mb-0">{{ $socialMedia->facebook_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  <h6 class="fs-0 mb-0" >{{ $socialMedia->instagram_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  <h6 class="fs-0 mb-0">{{ $socialMedia->skype_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  <h6 class="fs-0 mb-0">{{ $socialMedia->yahoo_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  <h6 class="fs-0 mb-0">{{ $socialMedia->google_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br> --}}
                  {{-- <div class="d-flex py-2">
                    <a class="pe-2 text-black text-decoration-none" href="{{ route('editBankData',$socialMedia->id) }}"><i class="fa fa-solid fa-edit"></i></a>
                    <a class="px-2 text-black text-decoration-none" href="{{ route('deleteBankData',$socialMedia->id) }}"><i class="fa fa-solid fa-trash"></i></a>
                  </div> --}}
                  {{-- <div class="border-dashed-bottom my-3"></div>
                </div>
              </div>
              @endforeach
              @endif
            </div>
          </div>
          <br>
      </div>
    </div>
</div> --}}
@elseif (Auth::guard('employee')->user()->roll_status == 5)
<div class="row">
    <div class="col-12">
      <div class="card mb-3 btn-reveal-trigger">
        <div class="card-header position-relative min-vh-25 mb-8">
          <div class="cover-image">
            <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(/public/assets/img/generic/4.jpg);">
            </div>
            <!--/.bg-holder-->

            <input class="d-none" id="upload-cover-image" type="file" />
            <label class="cover-image-file-input" for="upload-cover-image"><span class="fas fa-camera me-2"></span><span>Change cover photo</span></label>
          </div>
          <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle">
            <div class="h-100 w-100 rounded-circle overflow-hidden position-relative">
                @if (!empty(Auth::guard('employee')->user()->image))
                <img src="{{asset(Auth::guard('employee')->user()->image)}}" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail">
                @else
                <img src="/admin/dist/img/avators.jpg" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail">
                @endif
                {{-- <input class="d-none" id="profile-image" type="file" />
                <label class="mb-0 overlay-icon d-flex flex-center" for="profile-image"><span class="bg-holder overlay overlay-0"></span><span class="z-index-1 text-white dark__text-white text-center fs--1"><span class="fas fa-camera"></span><span class="d-block">Update</span></span></label> --}}
             </div>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="row g-0">
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
    @foreach ($usersSetting as $item)
    @endforeach
    <div class="col-lg-8 pe-lg-2">
        @if($personalInform->isEmpty())
        <div class="card mb-3">
            <div class="card-header">
              <h5 class="mb-0">Profile Settings</h5>
            </div>
            <div class="card-body bg-light">
                <form class="row g-3" method="post" action="{{ route('hrpersonalAccountInformation') }}" enctype="multipart/form-data">
                    @csrf
                <div class="col-lg-12">
                    <label class="form-label" for="first-name">User Image</label>
                    <input class="form-control" type="file" name="userimage">

                </div>
                <div class="col-lg-6">
                  <label class="form-label" for="first-name">Employee Name</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="First name" value="{{old('username')}}">
                </div>
                <div class="col-lg-6">
                  <label class="form-label" for="last-name">Email Address</label>
                  <input type="email" class="form-control" id="emailaddress" name="emailaddress" placeholder="Enter email address" value="{{ $item->email }}{{old('emailaddress')}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Office Number</label>
                    <input type="number" class="form-control" id="officenumber" name="officenumber" placeholder="Enter Office Number" value="{{old('officenumber')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Contact Number</label>
                    <input type="number" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter Mobile Number" value="{{ $item->mobile }}{{old('mobilenumber')}}">
                </div>
                <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Gender</label>
                    <select name="salutions" id="salutions" class="form-control">
                        <option value="">Salutions</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Other</option>
                     </select>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Nationality</label>
                    <select name="nationality" id="nationality" class="form-control">
                        <option value="">Nationality</option>
                        <option value="pakistan">Pakistan</option>
                     </select>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Date of birth</label>
                      <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{old('dateofbirth')}}">
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Martrial Status</label>
                      <select name="matrialstatus" id="matrialstatus" class="form-control">
                        <option value="">Matrial Status</option>
                        <option value="married">Married</option>
                        <option value="single">Single</option>
                     </select>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Blood group</label>
                    <select name="bloodgroup" id="bloodgroup" class="form-control">
                        <option value="">Blood group</option>
                        <option value="a+">A+</option>
                        <option value="a-">A-</option>
                        <option value="b+">B+</option>
                        <option value="b-">B-</option>
                        <option value="o-">O-</option>
                        <option value="o+">O+</option>
                     </select>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Cnic Number</label>
                      <input type="number" class="form-control" id="cnicnumber" name="cnicnumber" placeholder="Enter cnic number" value="{{old('cnicnumber')}}">
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Father Name</label>
                      <input type="text" class="form-control" id="fathername" name="fathername" placeholder="enter father name" value="{{old('fathername')}}">
                </div>
                  <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Address</label>
                    <div class="textbox"><input type="text" class="form-control" id="address" name="address" placeholder="Adress" value="{{old('address')}}"></div>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">City</label>
                      <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="{{old('city')}}">
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">State/Province</label>
                      <input type="text" class="form-control" id="state" name="state" placeholder="State/Province" value="{{old('state')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Postal code</label>
                    <input type="number" class="form-control" id="postalcode" name="postalcode" placeholder="Enter postal code" value="{{old('postalcode')}}">
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Country</label>
                      <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="{{old('country')}}">
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Phone Number</label>
                      <input type="number" class="form-control" id="contactnumber" name="contactnumber" placeholder="Enter Contact number"  value="{{old('contactnumber')}}">
                </div>
                  <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Emergency Contact Person Name</label>
                    <input type="text" class="form-control" id="emergencycontactperson" name="econtactperson" placeholder="Enter Emergency Contact Person Name" value="{{old('econtactperson')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Emergency Contact Person Relationship</label>
                    <input type="text" class="form-control" id="relationship" name="relationship" placeholder="Enter Relationship" value="{{old('relationship')}}">
                </div>
                <div class="col-lg-6">
                  <label class="form-label" for="last-name">Emergency Contact Number</label>
                  <input type="number" class="form-control" id="emergencypersonphonenumber" name="epersonphonenumber" placeholder="Enter Emergency Person Number" value="{{old('epersonphonenumber')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Place Of birth</label>
                    <input type="text" class="form-control" id="placeofbirth" name="placeofbirth" placeholder="place of birth" value="{{old('placeofbirth')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Sub Department</label>
                    <input type="text" class="form-control" id="subdepartment" name="subdepartment" placeholder="Sub-Department" value="{{old('subdepartment')}}">
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Resign Date</label>
                    <input type="date" class="form-control" id="prcbationenddate" name="prcbationenddate" value="{{old('prcbationenddate')}}">
                </div>
                <hr>
                <div class="col-12 d-flex justify-content-end">
                  <button class="btn btn-primary" type="submit">Add Details</button>
                </div>
              </form>
            </div>
            </div>
        @else
        @foreach ($personalInform as $personal)
        @endforeach
        <div class="card mb-3">
            <div class="card-header">
              <h5 class="mb-0">Profile Settings</h5>
            </div>
            <div class="card-body bg-light">
                <form class="row g-3" method="post" action="{{ route('hrpersonalAccountInformation') }}" enctype="multipart/form-data">
                    @csrf
                {{-- <div class="col-lg-12">
                    <label class="form-label" for="first-name">User Image</label>
                    <input class="form-control" type="file" name="userimage">

                </div> --}}
                <div class="col-lg-6">
                  <label class="form-label" for="first-name">Employee Name</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="First name" value="{{$personal->first_name}}" disabled>
                </div>
                <div class="col-lg-6">
                  <label class="form-label" for="last-name">Email Address</label>
                  <input type="email" class="form-control" id="emailaddress" name="emailaddress" placeholder="Enter email address" value="{{$personal->email_address}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Office Number</label>
                    <input type="number" class="form-control" id="officenumber" name="officenumber" placeholder="Enter Office Number" value="{{$personal->office_number}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Contact Number</label>
                    <input type="number" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter Mobile Number" value="{{$personal->mobile_number}}" disabled>
                </div>
                <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Gender</label>
                    <select name="salutions" id="salutions" class="form-control" disabled>
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
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Nationality</label>
                    <select name="nationality" id="nationality" class="form-control" disabled>
                        if($personal->nationality == 'pakistan'){
                            echo "selected";
                            <option value="pakistan">Pakistan</option>
                        }
                     </select>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Date of birth</label>
                      <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{$personal->date_of_birth}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Martrial Status</label>
                      <select name="matrialstatus" id="matrialstatus" class="form-control" disabled>
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
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Blood group</label>
                    <select name="bloodgroup" id="bloodgroup" class="form-control" disabled>
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
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Cnic Number</label>
                      <input type="number" class="form-control" id="cnicnumber" name="cnicnumber" placeholder="Enter cnic number" value="{{$personal->cnic_number}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Father Name</label>
                      <input type="text" class="form-control" id="fathername" name="fathername" placeholder="enter father name" value="{{$personal->father_name}}" disabled>
                </div>
                  <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Adress" value="{{$personal->address}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">City</label>
                      <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="{{$personal->city}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">State/Province</label>
                      <input type="text" class="form-control" id="state" name="state" placeholder="State/Province" value="{{$personal->province}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Postal code</label>
                    <input type="number" class="form-control" id="postalcode" name="postalcode" placeholder="Enter postal code" value="{{$personal->postal_code}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="first-name">Country</label>
                      <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="{{$personal->country}}" disabled>
                </div>
                <div class="col-lg-6">
                      <label class="form-label" for="last-name">Phone Number</label>
                      <input type="number" class="form-control" id="contactnumber" name="contactnumber" placeholder="Enter Contact number"  value="{{$personal->contact_number}}" disabled>
                </div>
                  <hr>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Emergency Contact Person Name</label>
                    <input type="text" class="form-control" id="emergencycontactperson" name="econtactperson" placeholder="Enter Emergency Contact Person Name" value="{{$personal->emergency_contact_person}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Emergency Contact Person Relationship</label>
                    <input type="text" class="form-control" id="relationship" name="relationship" placeholder="Enter Relationship" value="{{$personal->relationship}}" disabled>
                </div>
                <div class="col-lg-6">
                  <label class="form-label" for="last-name">Emergency Contact Number</label>
                  <input type="number" class="form-control" id="emergencypersonphonenumber" name="epersonphonenumber" placeholder="Enter Emergency Person Number" value="{{$personal->person_contact}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="first-name">Place Of birth</label>
                    <input type="text" class="form-control" id="placeofbirth" name="placeofbirth" placeholder="place of birth" value="{{$personal->place_of_birth}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Sub Department</label>
                    <input type="text" class="form-control" id="subdepartment" name="subdepartment" placeholder="Sub-Department" value="{{$personal->sub_department}}" disabled>
                </div>
                <div class="col-lg-6">
                    <label class="form-label" for="last-name">Resign Date</label>
                    <input type="date" class="form-control" id="prcbationenddate" name="prcbationenddate" value="{{$personal->end_date}}" disabled>
                </div>
                <hr>
              </form>
            </div>
            </div>
        @endif
      {{-- <div class="card mb-3">
        <div class="card-header">
          <h5 class="mb-0"></h5>
        </div>
        <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href=""><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add More</span></a>
            <div class="collapse" id="experience-form1">
            <div class="border-dashed-bottom my-4"></div>
            </div>

        </div>
      </div> --}}
      {{--  --}}
      {{-- <div class="card mb-3">
        <div class="card-header">
          <h5 class="mb-0"></h5>
        </div>
        <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href=""><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add More</span></a>
          <div class="collapse" id="experience-form1">
            <div class="border-dashed-bottom my-4"></div>
          </div>

        </div>
      </div> --}}
       {{--  --}}
      {{--  --}}
    </div>
    <div class="col-lg-4 ps-lg-2">
      <div class="sticky-sidebar">
        <br>
        <div class="card mb-3 overflow-hidden">
            <div class="card-header">
                <h5 class="mb-0">Change Password</h5>
              </div>
              <div class="card-body bg-light">
                <form action="{{ route('hremployeeChangePassword') }}" method="post">
                    @csrf
                    @method('PUT')
                  <div class="mb-3">
                    <label class="form-label" for="old-password">Old Password</label>
                    <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter Old Password">
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="new-password">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new Password">
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="confirm-password">Confirm Password</label>
                    <input type="password" class="form-control" id="conform_password" name="conform_password" placeholder="Enter conform Password">
                  </div>
                  <button class="btn btn-primary d-block w-100" type="submit">Update Password </button>
                </form>
              </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h5 class="mb-0">Bank Informations</h5>
          </div>
          <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href="{{ route('hrbankDetailsData') }}"><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add More</span></a>
            <div class="collapse" id="experience-form1">
              <div class="border-dashed-bottom my-4"></div>
            </div>
            @if ($userBank->isEmpty())

          @else
          @foreach ($userBank as $bankData)
          <div class="d-flex">
            <div class="flex-1 position-relative ps-3">
              <h6 class="fs-0 mb-0" style="text-transform: capitalize">{{ $bankData->bank_name }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
              </h6>
              <p class="mb-1">{{ $bankData->account_number }}</p>
              <p class="text-1000 mb-0">{{ $bankData->account_title }}</p>
              <div class="d-flex py-2">
                <a class="pe-2 text-black text-decoration-none" href="{{ route('hreditBankData',$bankData->id) }}"><i class="fa fa-solid fa-edit"></i></a>
                <a class="px-2 text-black text-decoration-none" href="{{ route('hrdeleteBankData',$bankData->id) }}"><i class="fa fa-solid fa-trash"></i></a>
              </div>
              <div class="border-dashed-bottom my-3"></div>
            </div>
          </div>
          @endforeach
          @endif
          </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Education Informations</h5>
            </div>
            <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href="{{ route('hrshowQualificationPage') }}"><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add More</span></a>
              <div class="collapse" id="experience-form1">
                <div class="border-dashed-bottom my-4"></div>
              </div>
              @if ($userQualification->isEmpty())

          @else
          @foreach ($userQualification as $item)
            <div class="d-flex">
            <div class="flex-1 position-relative ps-3">
              <h6 class="fs-0 mb-0" style="text-transform: capitalize">{{ $item->degree }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
              </h6>
              <p class="mb-1">{{ $item->subject }}</p>
              <p class="text-1000 mb-0">{{ $item->duration }}</p>
              <p class="text-1000 mb-0">{{ $item->country }}</p>
              <div class="d-flex py-2">
                <a class="pe-2 text-black text-decoration-none" href="{{ route('hreditQualificationData',$item->id) }}"><i class="fa fa-solid fa-edit"></i></a>
                <a class="px-2 text-black text-decoration-none" href="{{ route('hrdeleteQualificationData',$item->id) }}"><i class="fa fa-solid fa-trash"></i></a>
              </div>
              <div class="border-dashed-bottom my-3"></div>
            </div>

            </div>
          @endforeach
          @endif
            </div>
        </div>
          <br>
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Social Media Accounts</h5>
            </div>
            <div class="card-body bg-light"><a class="mb-4 d-block d-flex align-items-center" href="{{ route('hrsocialmediaPage') }}"><span class="circle-dashed"><span class="fas fa-plus"></span></span><span class="ms-3">Add More</span></a>
              <div class="collapse" id="experience-form1">
                <div class="border-dashed-bottom my-4"></div>
              </div>
              @if ($userSocialMedia->isEmpty())

              @else
              @foreach ($userSocialMedia as $socialMedia)
              <div class="d-flex">
                <div class="flex-1 position-relative ps-3">
                  <h6 class="fs-0 mb-0">{{ $socialMedia->twitter_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  <h6 class="fs-0 mb-0">{{ $socialMedia->facebook_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  <h6 class="fs-0 mb-0" >{{ $socialMedia->instagram_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  <h6 class="fs-0 mb-0">{{ $socialMedia->skype_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  <h6 class="fs-0 mb-0">{{ $socialMedia->yahoo_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  <h6 class="fs-0 mb-0">{{ $socialMedia->google_account }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small  data-fa-transform="shrink-4 down-2"></small></span>
                  </h6>
                  <br>
                  {{-- <div class="d-flex py-2">
                    <a class="pe-2 text-black text-decoration-none" href="{{ route('editBankData',$socialMedia->id) }}"><i class="fa fa-solid fa-edit"></i></a>
                    <a class="px-2 text-black text-decoration-none" href="{{ route('deleteBankData',$socialMedia->id) }}"><i class="fa fa-solid fa-trash"></i></a>
                  </div> --}}
                  <div class="border-dashed-bottom my-3"></div>
                </div>
              </div>
              @endforeach
              @endif
            </div>
          </div>
          <br>
      </div>
    </div>
</div>
@endif

@endsection
