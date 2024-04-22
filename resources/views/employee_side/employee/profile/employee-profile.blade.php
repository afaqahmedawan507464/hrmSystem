{{-- included profile layout file --}}
@extends('employee_side.dashboard-layout.layout')
@section('employeeprofile')
<div class="card mb-3">
@if (Auth::guard('employee')->user()->roll_status == 5)
{{-- only for hr departments --}}
@if ($checkInData->isEmpty())
@if ($users->isEmpty())

<div class="card-header position-relative min-vh-25 mb-8">
   <div class="cover-image">
      <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(/public/assets/img/generic/4.jpg);">
      </div>
      <!--/.bg-holder-->
      <input class="d-none" id="upload-cover-image" type="file" />
      <label class="cover-image-file-input" for="upload-cover-image"><span class="fas fa-camera me-2"></span><span>Change cover photo</span></label>
      <div class="clock d-flex flex-column py-3 px-4 justify-content-center align-items-end">
        {{-- clock data --}}
        <div class="clockdiv">
           <div id="clockContainer">
              <div id="hour"></div>
              <div id="minute"></div>
              <div id="second"></div>
           </div>
        </div>
        {{--  --}}
        {{-- <div class="digitalClock">
           <h5 id="time">
              hello
           </h5>
        </div> --}}
        {{--  --}}
        <p class="clock-message">You have not clocked in today!</p>
        {{--  --}}
        <div class="workwithhome d-flex justify-content-center align-items-center text-white">
           <form action="{{ route('hrcheckIn') }}" method="post">
            {{-- <form id="checkInForm" method="POST"> --}}
              @csrf
              <div class="d-flex justify-content-center align-items-center text-white message">
                 <p class="clock-message eData">
                    Work:
                 </p>
                 {{--  --}}
                 <select class="optionWidth form-control px-2" name="workType" id="workType">
                    <option value="0">Office</option>
                    <option value="1">Home</option>
                 </select>
                 {{--  --}}
              </div>
              {{--  --}}
              <div class="sign-in-button py-3">
                 <button type="submit" class="bg-danger btn text-white w-100">Check In</button>
              </div>
           </form>
        </div>
        {{--  --}}
     </div>
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
<div class="card-body">
   <div class="row">
      <div class="col-lg-8">
         <h4 class="mb-1">{{ Auth::guard('employee')->user()->employee_name }}<span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
         </h4>
         <h5 class="fs-0 fw-normal">employee designation at company name</h5>
         <p class="text-500">New York, USA</p>
         {{-- <button class="btn btn-falcon-primary btn-sm px-3" type="button">Following</button>
         <button class="btn btn-falcon-default btn-sm px-3 ms-2" type="button">Message</button> --}}
         <div class="border-dashed-bottom my-4 d-lg-none"></div>
      </div>
   </div>
</div>
@else
@foreach ($users as $employeeData)
@endforeach
<div class="card-header position-relative min-vh-25 mb-8">
   <div class="cover-image">
      <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(/public/assets/img/generic/4.jpg);">
      </div>
      <!--/.bg-holder-->
      <input class="d-none" id="upload-cover-image" type="file" />
      <label class="cover-image-file-input" for="upload-cover-image"><span class="fas fa-camera me-2"></span><span>Change cover photo</span></label>
      {{--  --}}
      <div class="clock d-flex flex-column py-3 px-4 justify-content-center align-items-end">
        {{-- clock data --}}
        <div class="clockdiv">
           <div id="clockContainer">
              <div id="hour"></div>
              <div id="minute"></div>
              <div id="second"></div>
           </div>
        </div>
        {{--  --}}
        {{-- <div class="digitalClock">
           <h5 id="time">
              hello
           </h5>
        </div> --}}
        {{--  --}}
        <p class="clock-message">You have not clocked in today!</p>
        {{--  --}}
        <div class="workwithhome d-flex justify-content-center align-items-center text-white">
           <form action="{{ route('hrcheckIn') }}" method="post">
            {{-- <form id="checkInForm" method="POST"> --}}
              @csrf
              <div class="d-flex justify-content-center align-items-center text-white message">
                 <p class="clock-message eData">
                    Work:
                 </p>
                 {{--  --}}
                 <select class="optionWidth form-control px-2" name="workType" id="workType">
                    <option value="0">Office</option>
                    <option value="1">Home</option>
                 </select>
                 {{--  --}}
              </div>
              {{--  --}}
              <div class="sign-in-button py-3">
                 <button type="submit" class="bg-danger btn text-white w-100">Check In</button>
              </div>
           </form>
        </div>
        {{--  --}}
     </div>
        {{--  --}}

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
<div class="card-body">
   <div class="row">
      <div class="col-lg-8">
         <h4 class="mb-1">{{ Auth::guard('employee')->user()->employee_name }}<span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
         </h4>
         <h5 class="fs-0 fw-normal">{{ $employeeData->employee_category_name }} at {{ $employeeData->company_name }}</h5>
         <p class="text-500">{{ $employeeData->company_address }}</p>
         {{-- <button class="btn btn-falcon-primary btn-sm px-3" type="button">Following</button>
         <button class="btn btn-falcon-default btn-sm px-3 ms-2" type="button">Message</button> --}}
         <div class="border-dashed-bottom my-4 d-lg-none"></div>
      </div>
   </div>
</div>
@endif
@else
@foreach ($checkInData as $item)
@endforeach
@if ($users->isEmpty())
<div class="card-header position-relative min-vh-25 mb-8">
   <div class="cover-image">
      <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(/public/assets/img/generic/4.jpg);">
      </div>
      <!--/.bg-holder-->
      <input class="d-none" id="upload-cover-image" type="file" />
      <label class="cover-image-file-input" for="upload-cover-image"><span class="fas fa-camera me-2"></span><span>Change cover photo</span></label>
      <div class="clock d-flex flex-column py-3 px-4 justify-content-center align-items-end">
        {{-- clock data --}}
        <div class="clockdiv">
           <div id="clockContainer">
              <div id="hour"></div>
              <div id="minute"></div>
              <div id="second"></div>
           </div>
        </div>
        {{--  --}}
        {{-- <div class="digitalClock">
           <h5 id="time">
              hello
           </h5>
        </div> --}}
        {{--  --}}
        @if (!isset($item->logout_time))
            @if ($item->late_status == 1)
               <p class="clock-message">
                    You have late clocked in today!
                </p>
            @else
            <p class="clock-message">
                You have on time clocked in today!
            </p>
            @endif
        @else
            <p class="clock-message">
                You have not clocked in today!
            </p>
        @endif
        {{--  --}}
        <div class="workwithhome d-flex justify-content-center align-items-center text-white">
           <form action="{{ route('hrcheckIn') }}" method="post">
            {{-- <form id="checkInForm" method="POST"> --}}
              @csrf
              <div class="d-flex justify-content-center align-items-center text-white message">
                 <p class="clock-message eData">
                    Work:
                 </p>
                 {{--  --}}
                 <select class="optionWidth form-control px-2" name="workType" id="workType">
                    <option value="0">Office</option>
                    <option value="1">Home</option>
                 </select>
                 {{--  --}}
              </div>
              {{--  --}}
              @if (!isset($item->logout_time))
              <div class="sign-in-button py-3">
                <button class="bg-warning btn w-100"><a href="{{ route('hrcheckOut',$item->id) }}" class="text-white text-decoration-none">Check Out</a></button>
             </div>
              @else
              <div class="sign-in-button w-100 py-3">
                <button type="submit" class="bg-danger btn text-white w-100">Check In</button>
             </div>
              @endif
           </form>
        </div>
        {{--  --}}
     </div>
   </div>
   <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle">
      <div class="h-100 w-100 rounded-circle overflow-hidden position-relative">
         @if (!empty(Auth::guard('employee')->user()->image))
         <img src="{{asset(Auth::guard('employee')->user()->image)}}" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail">
         @else
         <img src="/admin/dist/img/avators.jpg" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail">
         @endif
         <input class="d-none" id="profile-image" type="file" />
         <label class="mb-0 overlay-icon d-flex flex-center" for="profile-image"><span class="bg-holder overlay overlay-0"></span><span class="z-index-1 text-white dark__text-white text-center fs--1"><span class="fas fa-camera"></span><span class="d-block">Update</span></span></label>
      </div>
   </div>
</div>
<div class="card-body">
   <div class="row">
      <div class="col-lg-8">
         <h4 class="mb-1">{{ Auth::guard('employee')->user()->employee_name }}<span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
         </h4>
         <h5 class="fs-0 fw-normal">employee designation at company name</h5>
         <p class="text-500">New York, USA</p>
         {{-- <button class="btn btn-falcon-primary btn-sm px-3" type="button">Following</button>
         <button class="btn btn-falcon-default btn-sm px-3 ms-2" type="button">Message</button> --}}
         <div class="border-dashed-bottom my-4 d-lg-none"></div>
      </div>
   </div>
</div>
@else
@foreach ($users as $employeeData)
@endforeach
<div class="card-header position-relative min-vh-25 mb-8">
   <div class="cover-image">
      <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(/public/assets/img/generic/4.jpg);">
      </div>
      <!--/.bg-holder-->
      <input class="d-none" id="upload-cover-image" type="file" />
      <label class="cover-image-file-input" for="upload-cover-image"><span class="fas fa-camera me-2"></span><span>Change cover photo</span></label>
      <div class="clock d-flex flex-column py-3 px-4 justify-content-center align-items-end">
        {{-- clock data --}}
        <div class="clockdiv">
           <div id="clockContainer">
              <div id="hour"></div>
              <div id="minute"></div>
              <div id="second"></div>
           </div>
        </div>
        {{--  --}}
        {{-- <div class="digitalClock">
           <h5 id="time">
              hello
           </h5>
        </div> --}}
        {{--  --}}
        @if (isset($item->login_time))
            @if ($item->late_status == 1)
               <p class="clock-message">
                    You have late clocked in today!
                </p>
            @else
            <p class="clock-message">
                You have on time clocked in today!
            </p>
            @endif
        @else
            <p class="clock-message">
                You have not clocked in today!
            </p>
        @endif
        {{--  --}}
        <div class="workwithhome d-flex justify-content-center align-items-center text-white">
           <form action="{{ route('hrcheckIn') }}" method="post">
            {{-- <form id="checkInForm" method="POST"> --}}
              @csrf
              <div class="d-flex justify-content-center align-items-center text-white message">
                 <p class="clock-message eData">
                    Work:
                 </p>
                 {{--  --}}
                 <select class="optionWidth form-control px-2" name="workType" id="workType">
                    <option value="0">Office</option>
                    <option value="1">Home</option>
                 </select>
                 {{--  --}}
              </div>
              {{--  --}}
              @if (!isset($item->logout_time))
              <div class="sign-in-button py-3">
                <button class="bg-warning btn w-100"><a href="{{ route('hrcheckOut',$item->id) }}" class="text-white text-decoration-none">Check Out</a></button>
             </div>
              @else
              <div class="sign-in-button w-100 py-3">
                <button type="submit" class="bg-danger btn text-white w-100">Check In</button>
             </div>
              @endif

           </form>
        </div>
        {{--  --}}
     </div>
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
<div class="card-body">
   <div class="row">
      <div class="col-lg-8">
         <h4 class="mb-1">{{ Auth::guard('employee')->user()->employee_name }}
            @if ($employeeData->active_status == 1)
            <span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified">
                <small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small>
            </span>
            @endif
         </h4>
         <h5 class="fs-0 fw-normal">{{ $employeeData->employee_category_name }} at {{ $employeeData->company_name }}</h5>
         <p class="text-500">{{ $employeeData->company_address }}</p>
         {{-- <button class="btn btn-falcon-primary btn-sm px-3" type="button">Following</button>
         <button class="btn btn-falcon-default btn-sm px-3 ms-2" type="button">Message</button> --}}
         <div class="border-dashed-bottom my-4 d-lg-none"></div>
      </div>
   </div>
</div>
@endif
@endif
@else
{{-- only for basic users --}}
@if ($checkInData->isEmpty())
@if ($users->isEmpty())

<div class="card-header position-relative min-vh-25 mb-8">
   <div class="cover-image">
      <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(/public/assets/img/generic/4.jpg);">
      </div>
      <!--/.bg-holder-->
      <input class="d-none" id="upload-cover-image" type="file" />
      <label class="cover-image-file-input" for="upload-cover-image"><span class="fas fa-camera me-2"></span><span>Change cover photo</span></label>
      <div class="clock d-flex flex-column py-3 px-4 justify-content-center align-items-end">
        {{-- clock data --}}
        <div class="clockdiv">
           <div id="clockContainer">
              <div id="hour"></div>
              <div id="minute"></div>
              <div id="second"></div>
           </div>
        </div>
        {{--  --}}
        {{-- <div class="digitalClock">
           <h5 id="time">
              hello
           </h5>
        </div> --}}
        {{--  --}}
        <p class="clock-message">You have not clocked in today!</p>
        {{--  --}}
        <div class="workwithhome d-flex justify-content-center align-items-center text-white">
           <form action="{{ route('checkIn') }}" method="post">
            {{-- <form id="checkInForm" method="POST"> --}}
              @csrf
              <div class="d-flex justify-content-center align-items-center text-white message">
                 <p class="clock-message">
                    Work:
                 </p>
                 {{--  --}}
                 <select class="optionWidth form-control px-2" name="workType" id="workType">
                    <option value="0">Office</option>
                    <option value="1">Home</option>
                 </select>
                 {{--  --}}
              </div>
              {{--  --}}
              <div class="sign-in-button py-3">
                 <button type="submit" class="bg-danger btn text-white w-100">Check In</button>
              </div>
           </form>
        </div>
        {{--  --}}
     </div>
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
<div class="card-body">
   <div class="row">
      <div class="col-lg-8">
         <h4 class="mb-1">{{ Auth::guard('employee')->user()->employee_name }}<span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
         </h4>
         <h5 class="fs-0 fw-normal">employee designation at company name</h5>
         <p class="text-500">New York, USA</p>
         <button class="btn btn-falcon-primary btn-sm px-3" type="button">Following</button>
         <button class="btn btn-falcon-default btn-sm px-3 ms-2" type="button">Message</button>
         <div class="border-dashed-bottom my-4 d-lg-none"></div>
      </div>
   </div>
</div>
@else
@foreach ($users as $employeeData)
@endforeach
<div class="card-header position-relative min-vh-25 mb-8">
   <div class="cover-image">
      <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(/public/assets/img/generic/4.jpg);">
      </div>
      <!--/.bg-holder-->
      <input class="d-none" id="upload-cover-image" type="file" />
      <label class="cover-image-file-input" for="upload-cover-image"><span class="fas fa-camera me-2"></span><span>Change cover photo</span></label>
      {{--  --}}
      <div class="clock d-flex flex-column py-3 px-4 justify-content-center align-items-end">
        {{-- clock data --}}
        <div class="clockdiv">
           <div id="clockContainer">
              <div id="hour"></div>
              <div id="minute"></div>
              <div id="second"></div>
           </div>
        </div>
        {{--  --}}
        {{-- <div class="digitalClock">
           <h5 id="time">
              hello
           </h5>
        </div> --}}
        {{--  --}}
        <p class="clock-message">You have not clocked in today!</p>
        {{--  --}}
        <div class="workwithhome d-flex justify-content-center align-items-center text-white">
           <form action="{{ route('checkIn') }}" method="post">
            {{-- <form id="checkInForm" method="POST"> --}}
              @csrf
              <div class="d-flex justify-content-center align-items-center text-white message">
                 <p class="clock-message">
                    Work:
                 </p>
                 {{--  --}}
                 <select class="optionWidth form-control px-2" name="workType" id="workType">
                    <option value="0">Office</option>
                    <option value="1">Home</option>
                 </select>
                 {{--  --}}
              </div>
              {{--  --}}
              <div class="sign-in-button py-3">
                 <button type="submit" class="bg-danger btn text-white w-100">Check In</button>
              </div>
           </form>
        </div>
        {{--  --}}
     </div>
        {{--  --}}

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
<div class="card-body">
   <div class="row">
      <div class="col-lg-8">
         <h4 class="mb-1">{{ Auth::guard('employee')->user()->employee_name }}<span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
         </h4>
         <h5 class="fs-0 fw-normal">{{ $employeeData->employee_category_name }} at {{ $employeeData->company_name }}</h5>
         <p class="text-500">{{ $employeeData->company_address }}</p>
         <button class="btn btn-falcon-primary btn-sm px-3" type="button">Following</button>
         <button class="btn btn-falcon-default btn-sm px-3 ms-2" type="button">Message</button>
         <div class="border-dashed-bottom my-4 d-lg-none"></div>
      </div>
   </div>
</div>
@endif
@else
@foreach ($checkInData as $item)
@endforeach
@if ($users->isEmpty())
<div class="card-header position-relative min-vh-25 mb-8">
   <div class="cover-image">
      <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(/public/assets/img/generic/4.jpg);">
      </div>
      <!--/.bg-holder-->
      <input class="d-none" id="upload-cover-image" type="file" />
      <label class="cover-image-file-input" for="upload-cover-image"><span class="fas fa-camera me-2"></span><span>Change cover photo</span></label>
      <div class="clock d-flex flex-column py-3 px-4 justify-content-center align-items-end">
        {{-- clock data --}}
        <div class="clockdiv">
           <div id="clockContainer">
              <div id="hour"></div>
              <div id="minute"></div>
              <div id="second"></div>
           </div>
        </div>
        {{--  --}}
        {{-- <div class="digitalClock">
           <h5 id="time">
              hello
           </h5>
        </div> --}}
        {{--  --}}
        @if (!isset($item->logout_time))
            @if ($item->late_status == 1)
               <p class="clock-message">
                    You have late clocked in today!
                </p>
            @else
            <p class="clock-message">
                You have on time clocked in today!
            </p>
            @endif
        @else
            <p class="clock-message">
                You have not clocked in today!
            </p>
        @endif
        {{--  --}}
        <div class="workwithhome d-flex justify-content-center align-items-center text-white">
           <form action="{{ route('checkIn') }}" method="post">
            {{-- <form id="checkInForm" method="POST"> --}}
              @csrf
              <div class="d-flex justify-content-center align-items-center text-white message">
                 <p class="pawork">
                    Work:
                 </p>
                 {{--  --}}
                 <select class="optionWidth form-control px-2" name="workType" id="workType">
                    <option value="0">Office</option>
                    <option value="1">Home</option>
                 </select>
                 {{--  --}}
              </div>
              {{--  --}}
              @if (!isset($item->logout_time))
              <div class="sign-in-button py-3">
                <button class="bg-warning btn w-100"><a href="{{ route('checkOut',$item->id) }}" class="text-white text-decoration-none">Check Out</a></button>
             </div>
              @else
              <div class="sign-in-button w-100 py-3">
                <button type="submit" class="bg-danger btn text-white w-100">Check In</button>
             </div>
              @endif
           </form>
        </div>
        {{--  --}}
     </div>
   </div>
   <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle">
      <div class="h-100 w-100 rounded-circle overflow-hidden position-relative">
         @if (!empty(Auth::guard('employee')->user()->image))
         <img src="{{asset(Auth::guard('employee')->user()->image)}}" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail">
         @else
         <img src="/admin/dist/img/avators.jpg" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail">
         @endif
         <input class="d-none" id="profile-image" type="file" />
         <label class="mb-0 overlay-icon d-flex flex-center" for="profile-image"><span class="bg-holder overlay overlay-0"></span><span class="z-index-1 text-white dark__text-white text-center fs--1"><span class="fas fa-camera"></span><span class="d-block">Update</span></span></label>
      </div>
   </div>
</div>
<div class="card-body">
   <div class="row">
      <div class="col-lg-8">
         <h4 class="mb-1">{{ Auth::guard('employee')->user()->employee_name }}<span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
         </h4>
         <h5 class="fs-0 fw-normal">employee designation at company name</h5>
         <p class="text-500">New York, USA</p>
         <button class="btn btn-falcon-primary btn-sm px-3" type="button">Following</button>
         <button class="btn btn-falcon-default btn-sm px-3 ms-2" type="button">Message</button>
         <div class="border-dashed-bottom my-4 d-lg-none"></div>
      </div>
   </div>
</div>
@else
@foreach ($users as $employeeData)
@endforeach
<div class="card-header position-relative min-vh-25 mb-8">
   <div class="cover-image">
      <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(/public/assets/img/generic/4.jpg);">
      </div>
      <!--/.bg-holder-->
      <input class="d-none" id="upload-cover-image" type="file" />
      <label class="cover-image-file-input" for="upload-cover-image"><span class="fas fa-camera me-2"></span><span>Change cover photo</span></label>
      <div class="clock d-flex flex-column py-3 px-4 justify-content-center align-items-end">
        {{-- clock data --}}
        <div class="clockdiv">
           <div id="clockContainer">
              <div id="hour"></div>
              <div id="minute"></div>
              <div id="second"></div>
           </div>
        </div>
        {{--  --}}
        {{-- <div class="digitalClock">
           <h5 id="time">
              hello
           </h5>
        </div> --}}
        {{--  --}}
        @if (isset($item->login_time))
            @if ($item->late_status == 1)
               <p class="clock-message">
                    You have late clocked in today!
                </p>
            @else
            <p class="clock-message">
                You have on time clocked in today!
            </p>
            @endif
        @else
            <p class="clock-message">
                You have not clocked in today!
            </p>
        @endif
        {{--  --}}
        <div class="workwithhome d-flex justify-content-center align-items-center text-white">
           <form action="{{ route('checkIn') }}" method="post">
            {{-- <form id="checkInForm" method="POST"> --}}
              @csrf
              <div class="d-flex justify-content-center align-items-center text-white message">
                 <p class="clock-message">
                    Work:
                 </p>
                 {{--  --}}
                 <select class="optionWidth form-control px-2" name="workType" id="workType">
                    <option value="0">Office</option>
                    <option value="1">Home</option>
                 </select>
                 {{--  --}}
              </div>
              {{--  --}}
              @if (!isset($item->logout_time))
              <div class="sign-in-button py-3">
                <button class="bg-warning btn w-100"><a href="{{ route('checkOut',$item->id) }}" class="text-white text-decoration-none">Check Out</a></button>
             </div>
              @else
              <div class="sign-in-button w-100 py-3">
                <button type="submit" class="bg-danger btn text-white w-100">Check In</button>
             </div>
              @endif

           </form>
        </div>
        {{--  --}}
     </div>
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
<div class="card-body">
   <div class="row">
      <div class="col-lg-8">
         <h4 class="mb-1">{{ Auth::guard('employee')->user()->employee_name }}
            @if ($employeeData->active_status == 1)
            <span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified">
                <small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small>
            </span>
            @endif
         </h4>
         <h5 class="fs-0 fw-normal">{{ $employeeData->employee_category_name }} at {{ $employeeData->company_name }}</h5>
         <p class="text-500">{{ $employeeData->company_address }}</p>
         <button class="btn btn-falcon-primary btn-sm px-3" type="button">Following</button>
         <button class="btn btn-falcon-default btn-sm px-3 ms-2" type="button">Message</button>
         <div class="border-dashed-bottom my-4 d-lg-none"></div>
      </div>
   </div>
</div>
@endif
@endif
@endif
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
    <div class="col-lg-8 pe-lg-2">
      <div class="card mb-3 mb-lg-0">
         <div class="card-header bg-light d-flex justify-content-between">
             <h5 class="mb-0">Posts Create</h5>
         </div>
         <div class="card-body scrollbar-overlay">
            <div class="border-data py-2 px-4">
               <form action="{{ route('postSubmitted') }}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="d-flex py-3 mb-2 align-items-center">
                  <div class="userImage">
                     <img src="admin/dist/img/photo4.jpg" alt="">
                  </div>
                  {{--  --}}
                  {{--  --}}
                  <div class="userNameAgo px-3 py-1">
                     <h5 class="mb-1">{{ Auth::guard('employee')->user()->employee_name }}</h5>
                  </div>
                  
               </div>
               {{--  --}}
               <textarea name="postmessage" placeholder="What's on your mind?" spellcheck="false" required></textarea>
               {{--  --}}
                <div class="options d-flex justify-content-between align-items-center">
                  <p class="mt-2">Add to Your Post</p>
                  <input class="form-control" type="file" name="postmedia" style="width: 50%">
                </div>
                <button type="submit">Post</button>
               </form>
            </div>
         </div>
       </div>
      {{--  --}}
      <br>
      {{--  --}}
      @if (Auth::guard('employee')->user()->roll_status == 5)
      <div class="card mb-3 mb-lg-0">
         <div class="card-header bg-light d-flex justify-content-between">
             <h5 class="mb-0">Posts</h5>
         </div>
         @if ($posts->isEmpty())
           
         @else
         @foreach ($posts as $postsData)
         <div class="card-body scrollbar-overlay">
          <div class="row g-0">
            <div class="card mb-3 mb-lg-0">
               <div class="card-body">
                  {{--  --}}
                  <div class="border-data py-2 px-3">
                     {{-- user name and time ago --}}
                     <div class="d-flex py-3 mb-2">
                        <div class="userImage">
                           <img src="admin/dist/img/photo4.jpg" alt="">
                        </div>
                        {{--  --}}
                        <div class="userNameAgo px-2 py-1">
                           <h5 class="mb-1">{{ $postsData->employee_name }}</h5>
                           <h6 class="mb-1">{{ $postsData->relative_time }}</h6>
                        </div>
                     </div>
                     {{-- post media --}}
                     <div class="media">
                        <img src="{{ $postsData->post_media }}" alt="">
                     </div>
                     {{-- post message --}}
                     <p class="mb-0 mt-2 text-1000">
                      {{ $postsData->post_message }}
                     </p>
                  </div>
                  <hr>
                  {{-- you and others like and comment sections --}}
                  <div class="row px-3">
                     <div class="col-md-6 text-center">
                        You And 9 others
                     </div>
                     <div class="col-md-6 text-center">
                        <p>
                           1 Comments
                        </p>
                     </div>
                  </div>
                  <hr>
                  {{-- like,comment,shair --}}
                  <div class="row px-3">
                           <div class="col-lg-4 text-center btn-like">
                              <a href="{{ route('postLike',$postsData->id) }}" class="btn"><i class="fas fa-thumbs-up"></i>
                                 <span class="px-2">Like</span>
                              </a>
                           </div>
                           <div class="col-lg-4 text-center btn-like">
                              <a href="" class="btn"><i class="fas fa-comment"></i>
                                 <span class="px-2">Comment</span>
                              </a>
                           </div>
                           <div class="col-lg-4 text-center btn-like">
                              <a href="" class="btn"><i class="fas fa-share"></i>
                                 <span class="px-2">Share</span>
                              </a>
                           </div>
                  </div>
                  <hr>
                  {{-- comment div --}}
                  {{-- <div class="row px-3">
                     <div class="col-12 text-end">
                        <p>
                           All Comments
                        </p>
                        <div class="border-data">
                           <div class="d-flex p-3">
                              <div class="userImage">
                                 <img src="admin/dist/img/photo4.jpg" alt="">
                              </div>
                              <div class="userNameAgo px-3 py-3 bg-light text-start px-2 py-2 mx-3" style="min-width:200px;max-width:500px;border-radius:30px">
                                 <h6 class="mb-1">UserName</h6>
                                 <p class="mb-0 mt-2 text-1000">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur dicta cum odio corporis optio eos cupiditate qui dolores fuga esse?</p>
                                 <div class="links d-flex pt-2">
                                    <a href="" class="pe-3">Like</a>
                                    <a href="" class="px-3">Reply</a>
                                    <a href="" class="px-3">Share</a>
                                    <p class="ps-2">2m ago</p>
                                 </div>
                              </div>
                           </div> --}}
                           {{-- reply div --}}
                           {{-- <div class="d-flex p-3 justify-content-center">
                              <div class="userImage">
                                 <img src="admin/dist/img/photo4.jpg" alt="">
                              </div>
                              <div class="userNameAgo px-3 py-3 bg-light text-start px-2 py-2 mx-3" style="min-width:100px;max-width:300px;border-radius:30px">
                                 <h6 class="mb-1">UserName</h6>
                                 <p class="mb-0 mt-2 text-1000">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                 <div class="links d-flex pt-2">
                                    <a href="" class="pe-3">Like</a>
                                    <a href="" class="px-3">Reply</a>
                                    <a href="" class="px-3">Share</a>
                                    <p class="ps-2">2m ago</p>
                                 </div>
                              </div>
                           </div> --}}
                            {{-- reply div --}}
                            {{-- <div class="d-flex p-3 justify-content-center">
                              <div class="userImage">
                                 <img src="admin/dist/img/photo4.jpg" alt="">
                              </div>
                              <div class="userNameAgo px-3 py-3 bg-light text-start px-2 py-2 mx-3" style="min-width:100px;max-width:300px;border-radius:30px">
                                 <h6 class="mb-1">UserName</h6>
                                 <p class="mb-0 mt-2 text-1000">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                 <div class="links d-flex pt-2">
                                    <a href="" class="pe-3">Like</a>
                                    <a href="" class="px-3">Reply</a>
                                    <a href="" class="px-3">Share</a>
                                    <p class="ps-2">2m ago</p>
                                 </div>
                              </div>
                           </div>
 
                           
                        </div>
                     </div> --}}
                  {{-- </div> --}}
                  
               </div>
            </div>
          </div>
         </div>
         <br>
         @endforeach
         @endif
       </div>
      @else
          
      @endif
    </div>
    <div class="col-lg-4 ps-lg-2">
      <div class="sticky-sidebar">
        @if ($userQualification->isEmpty())
        @else
        <div class="card mb-3">
          <div class="card-header bg-light">
            <h5 class="mb-0">Education Informations</h5>
          </div>
          <div class="card-body fs--1">
         @if ($userQualification->isEmpty())
            <h6 class="text-center text-danger">Not Data Founded</h6>
          @else
          @foreach ($userQualification as $item)
            <div class="d-flex">
            <div class="flex-1 position-relative ps-3">
              <h6 class="fs-0 mb-0" style="text-transform: capitalize">{{ $item->degree }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
              </h6>
              <p class="mb-1">{{ $item->subject }}</p>
              <p class="text-1000 mb-0">{{ $item->duration }}</p>
              <p class="text-1000 mb-0">{{ $item->country }}</p>
              <div class="border-dashed-bottom my-3"></div>
            </div>

            </div>
          @endforeach
          @endif
          </div>
        </div>
        @endif
        <div class="card mb-3 mb-lg-0">
          <div class="card-header bg-light">
            <h5 class="mb-0">Events</h5>
          </div>
          <div class="card-body fs--1">
            <div class="d-flex btn-reveal-trigger">
              <div class="calendar"><span class="calendar-month">Feb</span><span class="calendar-day">21</span></div>
              <div class="flex-1 position-relative ps-3">
                <h6 class="fs-0 mb-0"><a href="../../app/events/event-detail.html">Newmarket Nights</a></h6>
                <p class="mb-1">Organized by <a href="#!" class="text-700">University of Oxford</a></p>
                <p class="text-1000 mb-0">Time: 6:00AM</p>
                <p class="text-1000 mb-0">Duration: 6:00AM - 5:00PM</p>Place: Cambridge Boat Club, Cambridge
                <div class="border-dashed-bottom my-3"></div>
              </div>
            </div>
            <div class="d-flex btn-reveal-trigger">
              <div class="calendar"><span class="calendar-month">Dec</span><span class="calendar-day">31</span></div>
              <div class="flex-1 position-relative ps-3">
                <h6 class="fs-0 mb-0"><a href="../../app/events/event-detail.html">31st Night Celebration</a></h6>
                <p class="mb-1">Organized by <a href="#!" class="text-700">Chamber Music Society</a></p>
                <p class="text-1000 mb-0">Time: 11:00PM</p>
                <p class="text-1000 mb-0">280 people interested</p>Place: Tavern on the Greend, New York
                <div class="border-dashed-bottom my-3"></div>
              </div>
            </div>
            <div class="d-flex btn-reveal-trigger">
              <div class="calendar"><span class="calendar-month">Dec</span><span class="calendar-day">16</span></div>
              <div class="flex-1 position-relative ps-3">
                <h6 class="fs-0 mb-0"><a href="../../app/events/event-detail.html">Folk Festival</a></h6>
                <p class="mb-1">Organized by <a href="#!" class="text-700">Harvard University</a></p>
                <p class="text-1000 mb-0">Time: 9:00AM</p>
                <p class="text-1000 mb-0">Location: Cambridge Masonic Hall Association</p>Place: Porter Square, North Cambridge
              </div>
            </div>
          </div>
          <div class="card-footer bg-light p-0 border-top"><a class="btn btn-link d-block w-100" href="../../app/events/event-list.html">All Events<span class="fas fa-chevron-right ms-1 fs--2"></span></a></div>
        </div>
        {{--  --}}
        <br>
        {{--  --}}
        @if (Auth::guard('employee')->user()->roll_status == ['1','2','3','4'])
        {{-- add it not working other departments --}}
        @else
        {{-- add it work only hr departments --}}
        {{-- <div class="card">
            <div class="card-header d-flex flex-between-center bg-light py-2">
              <h6 class="mb-0">Users</h6>
              <div class="dropdown font-sans-serif btn-reveal-trigger">
                <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-active-user" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--2"></span></button>
                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-active-user"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                  <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                </div>
              </div>
            </div>


            </div>
            <div class="card-footer bg-light p-0"><a class="btn btn-sm btn-link d-block w-100 py-2" href="">All users<span class="fas fa-chevron-right ms-1 fs--2"></span></a></div>
          </div> --}}
        @endif


      </div>
    </div>
  </div>
{{-- <div class="card mt-3">
    <div class="card-header bg-light">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0" id="followers">My Team <span class="d-none d-sm-inline-block">(0)</span></h5>
        </div>
        <div class="col text-end"><a class="font-sans-serif" href="../../app/social/followers.html">All Members</a>
        </div>
      </div>
    </div>
    <div class="card-body bg-light px-1 py-0">
      <div class="row g-0 text-center fs--1">
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
          <div class="bg-white dark__bg-1100 p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="../../assets/img/team/1.jpg" alt="" width="100" /></a>
            <h6 class="mb-1"><a href="../../pages/user/profile.html">Emilia Clarke</a>
            </h6>
            <p class="fs--2 mb-1"><a class="text-700" href="#!">Technext limited</a></p>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
          <div class="bg-white dark__bg-1100 p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="../../assets/img/team/2.jpg" alt="" width="100" /></a>
            <h6 class="mb-1"><a href="../../pages/user/profile.html">Kit Harington</a>
            </h6>
            <p class="fs--2 mb-1"><a class="text-700" href="#!">Harvard Korea Society</a></p>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
          <div class="bg-white dark__bg-1100 p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="../../assets/img/team/3.jpg" alt="" width="100" /></a>
            <h6 class="mb-1"><a href="../../pages/user/profile.html">Sophie Turner</a>
            </h6>
            <p class="fs--2 mb-1"><a class="text-700" href="#!">Graduate Student Council</a></p>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
          <div class="bg-white dark__bg-1100 p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="../../assets/img/team/4.jpg" alt="" width="100" /></a>
            <h6 class="mb-1"><a href="../../pages/user/profile.html">Peter Dinklage</a>
            </h6>
            <p class="fs--2 mb-1"><a class="text-700" href="#!">Art Club, MIT</a></p>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
          <div class="bg-white dark__bg-1100 p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="../../assets/img/team/5.jpg" alt="" width="100" /></a>
            <h6 class="mb-1"><a href="../../pages/user/profile.html">Nikolaj Coster</a>
            </h6>
            <p class="fs--2 mb-1"><a class="text-700" href="#!">Archery Club, MIT</a></p>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
          <div class="bg-white dark__bg-1100 p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="../../assets/img/team/6.jpg" alt="" width="100" /></a>
            <h6 class="mb-1"><a href="../../pages/user/profile.html">Isaac Hempstead</a>
            </h6>
            <p class="fs--2 mb-1"><a class="text-700" href="#!">Asymptones</a></p>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
          <div class="bg-white dark__bg-1100 p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="../../assets/img/team/7.jpg" alt="" width="100" /></a>
            <h6 class="mb-1"><a href="../../pages/user/profile.html">Alfie Allen</a>
            </h6>
            <p class="fs--2 mb-1"><a class="text-700" href="#!">Brain Trust</a></p>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
          <div class="bg-white dark__bg-1100 p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="../../assets/img/team/8.jpg" alt="" width="100" /></a>
            <h6 class="mb-1"><a href="../../pages/user/profile.html">Iain Glen</a>
            </h6>
            <p class="fs--2 mb-1"><a class="text-700" href="#!">GSAS Action Coalition</a></p>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
          <div class="bg-white dark__bg-1100 p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="../../assets/img/team/9.jpg" alt="" width="100" /></a>
            <h6 class="mb-1"><a href="../../pages/user/profile.html">Liam Cunningham</a>
            </h6>
            <p class="fs--2 mb-1"><a class="text-700" href="#!">Caving Club, MIT</a></p>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
          <div class="bg-white dark__bg-1100 p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="../../assets/img/team/10.jpg" alt="" width="100" /></a>
            <h6 class="mb-1"><a href="../../pages/user/profile.html">John Bradley</a>
            </h6>
            <p class="fs--2 mb-1"><a class="text-700" href="#!">Chess Club</a></p>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
          <div class="bg-white dark__bg-1100 p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="../../assets/img/team/11.jpg" alt="" width="100" /></a>
            <h6 class="mb-1"><a href="../../pages/user/profile.html">Rory McCann</a>
            </h6>
            <p class="fs--2 mb-1"><a class="text-700" href="#!">Chamber Music Society</a></p>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
          <div class="bg-white dark__bg-1100 p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="../../assets/img/team/12.jpg" alt="" width="100" /></a>
            <h6 class="mb-1"><a href="../../pages/user/profile.html">Joe Dempsie</a>
            </h6>
            <p class="fs--2 mb-1"><a class="text-700" href="#!">Clubchem</a></p>
          </div>
        </div>
      </div>
    </div>
</div> --}}
@endsection
