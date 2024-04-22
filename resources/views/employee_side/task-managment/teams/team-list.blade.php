@extends('employee_side.dashboard-layout.layout')
@section('teamlist')
<div class="card mb-3">
    <div class="card-header">
      <h5 class="mb-0">Team Member</h5>
    </div>
    <div class="card-body bg-light">
        <div class="row">
         <table class="table">
            <thead>
              <tr>
                <th scope="col" style="width: 20%;text-align:center;">Id</th>
                <th scope="col" style="width: 20%;text-align:center;">Image</th>
                <th scope="col" style="width: 20%;text-align:center;">Employee name</th>
                <th scope="col" style="width: 20%;text-align:center;">Role</th>
                @foreach ($employeeList as $employees)
                @endforeach
                @if ($assigneeList->isEmpty() || $assigneeList->where('user_id', $employees->id)->isEmpty())
                <th scope="col" style="width: 20%;text-align:center;">Operation</th>
                  @else
                  
                  @endif
              </tr>
            </thead>
            @if ($employeeList->isEmpty())
             
            @else
               <tbody>
                  @foreach ($employeeList as $employees)
                  <tr>
                  <th scope="row" style="width: 20%;text-align:center;">{{ $employees->id }}</th>
                  <td style="width: 20%;text-align:center;">
                     <img src="/admin/dist/img/avators.jpg" alt="" height="50" width="50" style="border-radius: 50%">
                  </td>
                  <td style="width: 20%;text-align:center;">{{ $employees->employee_name }}</td>
                  <form action="{{ route('addTeamMember',$employees->id) }}" method="post">
                  @csrf
                  @if ($assigneeList->isEmpty() || $assigneeList->where('user_id', $employees->id)->isEmpty())
                  <td style="width: 20%;text-align:center;">
                     <select name="userRoll" id="userRoll" class="form-control">
                        <option value="">Select Role</option>
                        <option value="1">Adminstrator</option>
                        <option value="2">Basic Role</option>
                     </select>
                  </td>
                  <td style="width: 20%;text-align:center;">
                     <button class="btn btn-danger" type="submit">Add</button>
                  </td>
                  @else
                  <td style="width: 20%;text-align:center;">
                     @foreach ($assigneeList as $assigneeData)
                        @if ($assigneeData->role_user == 1)
                           <p>Administrator</p>
                        @elseif ($assigneeData->role_user == 2)
                           <p>Basic</p>
                        @endif
                     @endforeach
                  </td>
                  @endif
                  </form>
                  </tr>
                  @endforeach  
               </tbody>
            @endif
         </table>
        </div>
     </div>
     
    <br>
  </div>
@endsection