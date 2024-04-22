@extends('employee_side.dashboard-layout.layout')
@section('salary_list')
    <div class="container-fluid px-1 py-5 mx-auto">
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
                <div class="card p-5">
                    {{-- <h5 class="text-center mb-4">Add Your Bank Accounts Details.</h5> --}}
                    <div class="tab-pane show fade justify-content-center px-5" id="bank-tab">
                    <h4 class="text-center my-3">Employee Salaries</h4>
                     @if ($allUserSalary->isEmpty())
                     @else

                    @foreach ($allUserSalary as $item)

                    <div class="col-sm-6 col-md-3 d-flex align-items-stretch flex-column px-2 py-2">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-body">
                            <div class="row py-2">
                                <div class="col-12" style="padding-left: 80%;">
                                    <a href="#" class="action-icon dropdown-toggle text-black" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                    <div class="dropdown-menu dropdown-menu-right" style="">
                                        <a class="dropdown-item" href="{{ route('salaryDetails',$item->id) }}"> Details</a>
                                    </div>
                                </div>
                             <div class="col-12 text-center d-flex flex-column justify-content-center align-items-center">
                                 @if (empty($item->image))
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
                                <div class="d-flex justify-content-center">
                                <p class="text-center mt-1" style="font-size: 12px;"><i class="fas fa-user me-3"></i><span>{{ $item->employee_category_name }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    @endforeach
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection


