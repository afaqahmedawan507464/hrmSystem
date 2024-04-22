@extends('employee_side.dashboard-layout.layout')
@section('department_list')
    <div class="container-fluid px-5 py-2 mx-auto">
      <div class="row d-flex justify-content-center">
          <div class="col-12 text-center">
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
              <div class="card px-5 py-2">
                  {{-- <h5 class="text-center mb-4">Add Your Bank Accounts Details.</h5> --}}
                      <div class="row">
                          <h4 class="text-center my-3">Department List</h4>
                          @foreach ($departmentsElect as $item)
                            <div class="col-lg-3 col-sm-6 col-md-4 col-xl-3 px-2 py-2">
                              <div class="card">
                                <div class="card-body">
                                  <div class="dropdown profile-action">
                                    <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                      <a href="{{ route('hrupdateEmployeeCategoryPage',$item->id)  }}" class="dropdown-item"><i class="fas fa-pencil m-r-5"></i> Edit</a>
                                      <a href="{{ route('hrremoveEmployeeCatgory',$item->id)  }}" class="dropdown-item"><i class="fas fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                  </div>
                                  <h3 class="project-title text-start "><a href="">{{ $item->department_name }}</a></h3>
                                  {{-- <p class="text-muted text-start ">{{ $item->department_working_details }}</p> --}}
                                  <div class="pro-deadline m-b-15 text-start d-flex ">
                                    <div class="sub-title me-2 ">
                                      Created Date:
                                    </div>
                                    <div class="text-muted">
                                      {{ \Carbon\Carbon::parse($item->created_at )->format('M,d Y') }}
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




