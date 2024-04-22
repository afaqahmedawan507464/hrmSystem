<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="admin/input_forms/index.css">
    <link rel="stylesheet" href="/cusstom-css.css">
    <script src="admin/task-management-system/assets/js/app.js"></script>
    <link rel="stylesheet" href="admin/task-management-system/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="admin/task-management-system/assets/css/style.css">
    <link rel="stylesheet" href="abcd.css">
    <title>Document</title>
</head>
<body>
    <div class="container px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
           {{-- 
           <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
              --}}
              
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
              {{--  --}}
              <div class="card"> 
                 <div class="card-body">
                    <div class="row">
                     
                     <div class="col-2">
                        {{-- @foreach ($employeess as $typeTasksDetailss)
                        @endforeach
                        <a class="text-decoration-none btn btn-primary p-3" href="{{ route('projectDashboard',$typeTasksDetailss->project_id) }}">Back</a> --}}
                     </div>
                     <div class="col-10">
                        @foreach ($employeess as $typeTasksDetails)
                        @endforeach
                        <h3 class="w-100" style="text-transform:capitalize">{{ $typeTasksDetails->employee_name }}</h3>
                     </div>
                     <table class="table">
                        <thead>
                          <tr>
                            <th>Parent Tasks Prograss</th>
                            <th>Child Tasks Prograss</th>
                            <th>P.Task Count</th>
                            <th>C.Task Count</th>
                         </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>
                                 <div class="col-12">
                                    <div class="pro-progress-bar d-flex align-items-center" style="width: 160px;">
                                       <div class="progress" style="width:100px !important">
                                          <div class="progress-bar bg-success w-{{ ($selectEmployeeCount/$totalselectEmployeeCount) * 100 }}" role="progressbar"></div>
                                       </div>
                                       <span class="ms-3">{{ ($selectEmployeeCount/$totalselectEmployeeCount) * 100 }}%</span>
                                    </div>
                                 </div>
                              </td>
                              <td>
                                 <div class="col-12">
                                    <div class="pro-progress-bar d-flex align-items-center"  style="width: 160px;">
                                       <div class="progress" style="width:100px !important">
                                          <div class="progress-bar bg-success w-{{ ($selectChildEmployeeCount/$totalselectChildEmployeeCount) * 100 }}" role="progressbar"></div>
                                       </div>
                                       <span class="ms-3">{{ ($selectChildEmployeeCount/$totalselectChildEmployeeCount) * 100 }}%</span>
                                    </div>
                                 </div>
                              </td>
                              <td class="ps-5">{{ $selectEmployeeCount }}</td>
                              <td class="ps-5">{{ $selectChildEmployeeCount }}</td>
                           </tr>
                           
                        </tbody>
                     </table>
                        <div class="col-12 p-3">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col" style="text-align:center;width:10%;">Task name</th>
                                    <th scope="col" style="text-align:center;width:10%;">Parent Task</th>
                                    <th scope="col" style="text-align:center;width:10%;">Assignee</th>
                                    <th scope="col" style="text-align:center;width:10%;">Assignee Date</th>
                                    <th scope="col" style="text-align:center;width:10%;">Status</th>
                                    <th scope="col" style="text-align:center;width:10%;">Task type</th>
                                    <th scope="col" style="text-align:center;width:10%;">Task priority</th>
                                    <th scope="col" style="text-align:center;width:10%;">Task last date</th>
                                    <th scope="col" style="text-align:center;width:25%;">Task summary</th>
                                  </tr>
                                </thead>
                                <tbody>
                                   @if ($listTitleTasks->isEmpty())
                                       
                                   @else
                                       @foreach ($listTitleTasks as $typeTasksDetails)
                                        <tr>
                                           <td style="text-align:center;width:10%;">{{ $typeTasksDetails->task_name }}</td>
                                           <td style="text-align:center;width:10%;"></td>
                                           <td style="text-align:center;width:10%;">{{ $typeTasksDetails->employee_name }}</td>
                                           <td style="text-align:center;width:10%;">{{ \Carbon\Carbon::parse($typeTasksDetails->project_starting_date )->format('M,d Y') }}</td>
                                           <td style="text-align:center;width:10%;">{{ $typeTasksDetails->task_list_name }}</td>
                                           <td style="text-align:center;width:10%;">{{ $typeTasksDetails->tasks_type_name }}</td>
                                           <td style="text-align:center;width:10%;">{{ $typeTasksDetails->task_priority }}</td>
                                           <td style="text-align:center;width:10%;">{{ \Carbon\Carbon::parse($typeTasksDetails->due_date )->format('M,d Y') }}</td>
                                           <td style="text-align:center;width:25%;">{{ $typeTasksDetails->task_details }}</td>
                                        </tr>
                                       @endforeach
                                   @endif
                                   {{--  --}}
                                   @if ($childListTitleTasks->isEmpty())
                                       
                                   @else
                                       @foreach ($childListTitleTasks as $typeTasksDetails)
                                        <tr>
                                           <td style="text-align:center;width:10%;">{{ $typeTasksDetails->child_task_name }}</td>
                                           <td style="text-align:center;width:10%;">{{ $typeTasksDetails->task_name }}</td>
                                           <td style="text-align:center;width:10%;">{{ $typeTasksDetails->employee_name }}</td>
                                           <td style="text-align:center;width:10%;">{{ \Carbon\Carbon::parse($typeTasksDetails->project_starting_date )->format('M,d Y') }}</td>
                                           <td style="text-align:center;width:10%;"></td>
                                           <td style="text-align:center;width:10%;">{{ $typeTasksDetails->tasks_type_name }}</td>
                                           <td style="text-align:center;width:10%;">{{ $typeTasksDetails->task_priority }}</td>
                                           <td style="text-align:center;width:10%;">{{ \Carbon\Carbon::parse($typeTasksDetails->due_date )->format('M,d Y') }}</td>
                                           <td style="text-align:center;width:25%;">{{ $typeTasksDetails->task_details }}</td>
                                        </tr>
                                       @endforeach
                                   @endif
                                   {{--  --}}
                                 </tbody>
                              </table>
                        </div>
                    </div>
                 </div>
              </div>
        
</body>
</html>
