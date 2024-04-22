@extends('employee_side.dashboard-layout.layout')
@section('userList')
<div class="card p-4">
  <div class="card-header bg-light">
    <div class="row align-items-center">
      <div class="col-6">
        <h5 class="mb-0" id="followers">Users <span class="d-none d-sm-inline-block">({{ $userCountes }})</span></h5>
      </div>
      <div class="col-6">
          {{--  --}}
            <div class="row">
              <form action="{{ route('searchData') }}" method="post" class="row">
                @csrf
                {{--  --}}
                <div class="col-6">
                   <input type="text" name="searchEmployeeNameList" class="form-control py-2" placeholder="Employee name">
                </div>
                {{--  --}}
                <div class="col-6">
                   <div class="row">
                      <div class="col-10">
                         <select name="searchEmployeeDesignation" id="searchEmployeeDesignationList" class="form-control py-2">
                            <option value="">Select Department</option>
                            @if ($departments->isEmpty())
                            @else
                            @foreach ($departments as $designation)
                            <option value="{{ $designation->id }}">{{ $designation->department_name }}</option>
                            @endforeach
                            @endif
                         </select>
                      </div>
                      {{--  --}}
                      <div class="col-2">
                         <button class="btn btn-danger" type="submit"><i class="fas fa-search"></i></button>
                      </div>
                   </div>
                </div>
                {{--  --}}
             </form>             
            </div>
         </div>
      </div>
    </div>
  <div class="card-body bg-light px-1 py-0">
    <div class="row g-0 text-center fs--1 d-flex justify-content-center align-center-center">
      @if ($users->isEmpty())

      @else
      @foreach ($users as $uData)
      <div class="col-6 col-md-4 col-lg-3 col-xl-2 col-xxl-1 mb-1">
          <div class="bg-white dark__bg-1100 p-3 h-100">
              @if (empty($uData->image))
              <img class="img-thumbnail rounded-circle mb-3" src="{{ $uData->image }}" alt="" width="100"/>
              @else
              <img class="img-thumbnail rounded-circle mb-3" src="/admin/dist/img/avators.jpg" alt="" width="100"/>
              @endif
            <h6 class="mb-1">{{ $uData->employee_name }}
            </h6>
          </div>
      </div>
      @endforeach
      @endif
      {{--  --}}
      <div class="py-3 px-1">
        <a href="{{ route('hrDashboard') }}" class="btn btn-danger text-white">Back</a>
      </div>
    </div>
  </div>
</div>
@endsection