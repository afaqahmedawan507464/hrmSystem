@extends('admin_side.dashboard-layout.layout')

@section('venderlists')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <div class="container-fluid">
              <div class="row mb-0">
                 <div class="col-sm-6">
                    <h1>Employy List</h1>
                 </div>
              </div>
           </div>
           <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
           <!-- Default box -->
           <div class="card card-solid">
              <div class="card-body pb-0">
                 <div class="row">
                    @foreach ($userList as $item)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                       <div class="card bg-light d-flex flex-fill">
                          <div class="card-body py-2 px-5">
                             <div class="row">
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
                                   <h4 class="lead names"><b>{{ $item->employee_name }}</b></h4>
                                   {{--
                                   <p class="text-muted text-sm text-start"><b>Email Address:</b>email address</p>
                                   --}}
                                   <ul>
                                      <div class="ml-4 mb-0 fa-ul text-muted d-flex flex-column justify-content-center align-items-center">
                                         <div class="d-flex justify-content-center">
                                            <div class="icon">
                                               <i class="fonta fas fa-lg fa-envelope"></i>
                                            </div>
                                            <div class="text">
                                               <p class="emailaddress">{{ $item->email }}</p>
                                            </div>
                                         </div>
                                         <div class="d-flex justify-content-center">
                                            <div class="icon">
                                               <i class="fonta fas fa-lg fa-phone"></i>
                                            </div>
                                            <div class="text">
                                               <p class="emailaddress">{{ $item->mobile }}</p>
                                            </div>
                                         </div>
                                      </div>
                                   </ul>
                                </div>
                             </div>
                          </div>
                          @if (Auth::guard('employee')->user())
                          <div class="card-footer">
                            <div class="text-right">
                               {{-- <a href="#" class="btn btn-sm bg-danger text-white">
                               Removed User
                               </a> --}}
                               <a href="{{ route('hrdetailEmployee',$item->id) }}" class="btn btn-sm btn-primary">
                               <i class="fas fa-user"></i> View Profile
                               </a>
                            </div>
                         </div>
                          @else
                          <div class="card-footer">
                            <div class="text-right">
                               {{-- <a href="#" class="btn btn-sm bg-danger text-white">
                               Removed User
                               </a> --}}
                               <a href="{{ route('detailEmployee',$item->id) }}" class="btn btn-sm btn-primary">
                               <i class="fas fa-user"></i> View Profile
                               </a>
                            </div>
                         </div>
                          @endif

                       </div>
                    </div>
                    @endforeach
                 </div>
              </div>
           </div>
        </section>
        <!-- /.content -->
    </div>
@endsection


