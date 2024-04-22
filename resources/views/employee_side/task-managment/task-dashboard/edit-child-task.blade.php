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
                    @if ($selectTask->isEmpty())
                        
                    @else
                        @foreach ($selectTask as $task)
                        @endforeach
                            <div class="row px-3 py-3">
                                <form action="{{ route('editChildTask',$task->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-block mb-3">
                                      <label class="col-form-label">Task Name</label>
                                      <input type="text" class="form-control" name="taskname" id="taskname" placeholder="task name .." value="{{ $task->task_name }}">
                                    </div>
                                    <div class="input-block mb-3">
                                      <label class="col-form-label">Task Priority</label>
                                      <select class="form-control select" name="priority">
                                        @if ($task->task_priority == 'high')
                                          <option value="high">High</option>
                                          <option value="medium">Medium</option>
                                          <option value="low">Low</option>
                                        @elseif ($task->task_priority == 'medium')
                                          <option value="medium">Medium</option>
                                          <option value="high">High</option>
                                          <option value="low">Low</option>
                                        @else
                                          <option value="low">Low</option>
                                          <option value="high">High</option>
                                          <option value="medium">Medium</option>
                                        @endif
                                      </select>
                                    </div>
                                    <div class="input-block mb-3">
                                      <label class="col-form-label">Task Type</label>
                                      <select class="form-control select" name="tasktype">
                                        @foreach ($taskType as $typeTasks)
                                          @if ($task->task_type == $typeTasks->id)
                                            <option value="{{ $typeTasks->id }}">{{ $typeTasks->tasks_type_name }}</option>
                                            @foreach ($taskType as $typeTasksss)
                                              <option value="{{ $typeTasksss->id }}">{{ $typeTasksss->tasks_type_name }}</option>
                                            @endforeach
                                          @endif
                                         @endforeach
                                      </select>
                                    </div>
                                    <div class="input-block mb-3">
                                      <label class="col-form-label">Due Date</label>
                                      <div class="cal-icon"><input class="form-control datetimepicker" type="date" name="duedate" id="duedate" value="{{ $task->due_date }}"></div>
                                    </div>
                                    <div class="input-block mb-3">
                                      <img src="{{ $task->taskmediaimage }}" alt="" width="150" height="150">
                                    </div>
                                    <div class="input-block mb-3">
                                      <label class="col-form-label">Task image</label>
                                      <input type="file" id="projectmediaimages" name="projectmediaimages" class="form-control">
                                    </div>
                                    <div class="input-block mb-3">
                                      <label class="col-form-label">Task detail</label>
                                      <textarea id="projectdetails" name="projectdetails" cols="30" rows="5" class="form-control" placeholder="project details .. ">{{ $task->task_details }}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-6">
                                            <div class="submit-section text-center">
                                                <button class="btn btn-danger">
                                                    <a class="text-white py-2 px-3 text-decoration-none" href="{{ route('projectDashboard',$task->project_id) }}"><i class="fas fa-angle-left"></i> <span class="mx-2 text-white">Back</span></a>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-6">
                                            <div class="submit-section text-center">
                                                <button class="btn btn-primary">Create task</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                  </form>
                                </div>
                            </div>
                    @endif
                 </div>
        </div>
        
</body>
</html>
