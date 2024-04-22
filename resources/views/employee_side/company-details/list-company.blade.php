@extends('employee_side.dashboard-layout.layout')
@section('compony_list')
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
                        <div class="row justify-content-between text-start">
                                <h4 class="text-center my-3">Companies List</h4>
                                @if ($companyList->isEmpty())
                                @else
                                @foreach ($companyList as $item)
                                <div class="col-sm-6 col-md-3 d-flex align-items-stretch flex-column px-2 py-2">
                                       <div class="card bg-light d-flex flex-fill">
                                          <div class="card-body">
                                             <div class="row py-2">
                                                <div class="col-12" style="padding-left: 80%;">
                                                    <a href="#" class="action-icon dropdown-toggle text-black" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                                    <div class="dropdown-menu dropdown-menu-right" style="">
                                                      <a class="dropdown-item" href="{{ route('hrcompanyDetails',$item->id) }}"> Details</a>
                                                      <a class="dropdown-item" href="{{ route('hrupdateCompanyPage',$item->id) }}"> Update</a>
                                                      <a class="dropdown-item" href="{{ route('hrremoveCompany',$item->id) }}"> Delete</a>
                                                    </div>
                                                </div>
                                                <div class="col-12 text-center d-flex flex-column justify-content-center align-items-center">
                                                   @if (empty($item->company_logo))
                                                   <div class="userImages">
                                                      <img src="admin/dist/img/avators.jpg" alt="user-avatar">
                                                   </div>
                                                   @else
                                                   <div class="userImages">
                                                      <img src="{{ $item->company_logo }}" alt="user-avatar" class="img-circle img-fluid">
                                                   </div>
                                                   @endif
                                                </div>
                                                <div class="col-12">
                                                   <p class="text-center mt-3" style="font-size: 16px;"><b>{{ $item->company_name }}</b></p>
                                                   <div class="d-flex justify-content-center">
                                                   <p class="text-center mt-1" style="font-size: 12px;"><i class="fas fa-user me-3"></i><span>{{ $item->company_owner_name }}</span></p>
                                                   <p class="text-center mt-1 mx-3" style="font-size: 12px;"><i class="fas fa-phone me-3"></i><span>{{ $item->company_number }}</span></p>
                                                   </div>
                                                   <p class="text-center mt-1 w-100" style="font-size: 12px;"><i class="fas fa-map me-3"></i><span>{{ $item->company_address }}</span></p>
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



