@extends('employee_side.dashboard-layout.layout')

    
@section('leave_approveList')
<!-- Site wrapper -->
<div class="content-wrapper">  
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
    <form action="{{ route('searchLeaveData') }}" method="post">
    @csrf
    <div class="mt-1 row d-flex">
       <div class="col-3 p-3">
          <label for="" class="pt-2 pb-1">Employee name
          </label>
          <input type="text" class="form-control" placeholder ="Employee name" name="searchEmployee">
       </div>
       <div class="col-3 p-3">
          <label for="" class="pt-2 pb-1">Leave Type
          </label>
          <select name="selectLeaveType" id="" class="form-control">
             <option value="">Select Type</option>
             <option value="1">Medical Leave</option>
             <option value="2">Hospitalisation Leave</option>
             <option value="3">Maternity Leave</option>
             <option value="4">Casual Leave</option>
             <option value="5">Paternity Leave</option>
             <option value="6">LOP</option>
          </select>
       </div>
       <div class="col-3 p-3">
        <label for="" class="pt-2 pb-1">Leave Status
        </label>
        <select name="selectAprrovedLeaveType" id="" class="form-control">
           <option value="">Select Status</option>
           <option value="1">Approved</option>
           <option value="0">Rejected</option>
        </select>
       </div>
       <div class="col-3 p-3">
        <div class="row">
          <div class="col-12">
            <label for="" class="pt-2 pb-1">Search Button
            </label>
            <button class="btn btn-success" type="submit">Search</button>
          </div>
        </div>
       </div>
    </div>
    </form>
    <div class="mt-3" style="height: 800px;overflow-y:scroll;"> 
               <table class="table mt-3">
                  <thead>
                    {{-- @foreach ($datas as $item)
                    @endforeach
                    @if ($item->active_status == '1')
                    <tr>
                      <th scope="col" style="text-align:center">Employee name</th>
                      <th scope="col" style="text-align:center">Leave Type</th>
                      <th scope="col" style="text-align:center">Leave Starting Date</th>
                      <th scope="col" style="text-align:center">Leave Ending Date</th>
                   </tr>  
                    @else --}}
                    <tr>
                      <th scope="col" style="text-align:center">Employee name</th>
                      <th scope="col" style="text-align:center">Leave Type</th>
                      <th scope="col" style="text-align:center">Leave Starting Date</th>
                      <th scope="col" style="text-align:center">Leave Ending Date</th>
                      {{-- <th scope="col" style="text-align:center">Status</th> --}}
                      <th scope="col" style="text-align:center">Operation</th>
                   </tr>
                    {{-- @endif --}}
                     
                  </thead>
                  
                @if($datas->isEmpty())
                    <h3 class="text-center text-danger">Not Data Founded</h3>
                @else
                    @foreach ($datas as $item)
                   <tbody>
                      <tr>
                         <td class="text-center">
                           {{ $item->employee_name }}
                         </td>
                         <td class="text-center">
                           @if ($item->leaves_type == '1')
                             <p>Medical Leave</p>
                           @elseif ($item->leaves_type == '2')
                             <p>Hospitalisation Leave</p>
                           @elseif ($item->leaves_type == '3')
                             <p>Maternity Leave</p>
                           @elseif ($item->leaves_type == '4')
                             <p>Casual Leave</p>
                           @elseif ($item->leaves_type == '5')
                             <p>Paternity Leave</p>
                           @elseif ($item->leaves_type == '6')
                             <p>LOP Leaves</p> 
                           @endif
                           
                         </td>
                         <td class="text-center">
                           {{ \Carbon\Carbon::parse($item->start_leave_date )->format('M,d Y') }}
                         </td>
                         <td class="text-center">
                           {{ \Carbon\Carbon::parse($item->end_leave_date )->format('M,d Y') }}
                         </td>
                         <td class="text-center px-5">
                          <div class="d-flex w-100 justify-content-center align-items-center">
                             <a href="{{ route('hrleaveApprove',$item->id) }}" class="px-2 py-1 mx-1 btn-sm btn-success text-white ">
                                Aprroved
                             </a>
                             <a href="{{ route('hrleaveRejected',$item->id) }}" class="px-2 py-1 mx-1 btn-sm btn-primary text-white ">
                                Rejects
                             </a>
                             <a href="{{ route('hrleaveDetails',$item->id) }}" class="px-2 py-1 mx-1 btn-sm btn-warning text-white ">
                                Details
                             </a>
                          </div>
                        </td>
                      </tr>
                   </tbody>
                    @endforeach
                @endif
               </table>
    </div>

    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
@endsection

