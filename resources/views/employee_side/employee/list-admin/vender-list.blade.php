@extends('employee_side.dashboard-layout.layout')

@section('venderlists')
    <div class="content-wrapper">
         <!-- Default box -->
         <div class="py-3">
         <a class="btn btn-primary" href="{{ route('employeeRegisterationPage') }}">Add</a>
         </div>
         <div class="card card-solid mt-2">
            <div class="card-body">
               <div class="row px-3 py-2">
                  <div class="col-12">
                     <div class="row">
                        <form action="{{ route('searchData') }}" method="post" class="row">
                           @csrf
                           {{--  --}}
                           <div class="col-6">
                              <input type="text" name="searchEmployeeName" class="form-control py-1" placeholder="Employee name">
                           </div>
                           {{--  --}}
                           <div class="col-6">
                           <div class="row">
                           <div class="col-10">
                              <select name="searchEmployeeDesignation" id="searchEmployeeDesignation" class="form-control py-1">
                                 <option value="">Select Department</option>
                                 @if ($designations->isEmpty())
                                 @else
                                     @foreach ($designations as $designation)
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
                  <div class="row">
                  @foreach ($userList as $item)
                  <div class="col-sm-6 col-md-3 d-flex align-items-stretch flex-column px-2 py-2">
                     <div class="card bg-light d-flex flex-fill">
                        <div class="card-body">
                           <div class="row py-2">
                              <div class="col-12" style="padding-left: 80%;">
                                  <a href="#" class="action-icon dropdown-toggle text-black" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                  @if ( $item->active_status == '1' )
                                  <div class="dropdown-menu dropdown-menu-right" style="">
                                    <a class="dropdown-item" href="{{ route('hrdetailEmployee',$item->id) }}"> View Profile</a>
                                    <a class="dropdown-item" href="{{ route('removeEmployeeData',$item->id) }}"> Delete</a>
                                  </div>
                                  @else
                                  <div class="dropdown-menu dropdown-menu-right" style="">
                                    <a class="dropdown-item" href="{{ route('hraccountApprove',$item->id) }}"> Approved</a>
                                    <a class="dropdown-item" href="{{ route('hrdetailEmployee',$item->id) }}"> View Profile</a>
                                    <a class="dropdown-item" href="{{ route('removeEmployeeData',$item->id) }}"> Delete</a>
                                  </div>
                                  @endif
                              </div>
                              <div class="col-12 text-center d-flex flex-column justify-content-center align-items-center">
                                 @if (!empty($item->image))
                                 <div class="userImages">
                                    <img src="admin/dist/img/avators.jpg" alt="user-avatar">
                                 </div>
                                 @else
                                 <div class="userImages">
                                    <img src="{{ $item->image }}" alt="user-avatar" class="img-circle img-fluid">
                                 </div>
                                 @endif
                              </div>
                              <div class="col-12">
                                 <p class="text-center mt-3" style="font-size: 16px;"><b>{{ $item->employee_name }}</b></p>
                                 @if(empty($item->department))
                                          
                                 @else
                                 <p class="text-center">{{ $item->department_name }}</p>
                                 @endif
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
                  </div>
               </div>
            </div>
         </div>
    </div>
@endsection


