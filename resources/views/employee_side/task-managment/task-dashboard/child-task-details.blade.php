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
      <link rel="stylesheet" href="/abcd.css">
      <title>Document</title>
   </head>
   <body>
      <div class="container px-1 py-5 mx-auto">
      <div class="row d-flex justify-content-center">
         {{--
         <div class="text-center col-xl-7 col-lg-8 col-md-9 col-11">
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
            <div class="px-4 alert alert-danger alert-dismissible fade show" role="alert">
               @foreach ($errors->all() as $item)
               <li style="list-style: none">{{ $item }}</li>
               @endforeach
            </div>
            @endif
            {{--  --}}
            <div class="card">
               @foreach ($selectTasks as $item)
               <div class="card-body">
                  <div class="row">
                     <div class="col-lg-8">
                        <div class="mb-3 input-block">
                           <b>{{ $item->child_task_name }}</b>
                        </div>
                        {{--  --}}
                           {{-- <div class="d-flex"> --}}
                              {{--  --}}
                              {{-- <a class="px-2 mx-2 btn bg-light" href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="px-1 fas fa-project-diagram"></i>Add a child issue</a> --}}
                              {{--  --}}
                              {{-- <div class="d-flex">
                                 <a class="px-2 btn bg-light" href=""><i class="px-1 fas fa-link"></i>Link issue <span><i class="px-1 fas fa-angle-down"></i></span></a>
                              </div> --}}
                              {{--  --}}
                           {{-- </div> --}}
                           {{--  --}}
                        {{--  --}}
                        <div class="mb-3 mt-3 input-block">
                           <!-- DIRECT CHAT -->
                           {{-- 
                           <div class="flexbox">
                              --}}
                              <div class="chat-box w-100">
                                 <div id="chat_box_body" class="chat-box-body" style="overflow-y: scroll;height: 64vh;">
                                   @if ($detailtask->isEmpty())

                                   @else

                                   @foreach ($detailtask as $comments)
                                       <div id="chat_messages">
                                          @if (Auth::guard('employee')->user()->id)
                                          <div class="profile my-profile px-3 py-1 bg-light" style="border-radius: 20px">
                                             <span>You</span>
                                          </div>
                                          {{--  --}}
                                          <div class="text-start message my-message demomsg p-1">
                                             @if (empty($comments->task_media))
                                                <p class="py-2 px-2">{{ $comments->task_relatedcomment }}</p>
                                                {{--  --}}
                                                
                                             @else
                                             <div class="d-flex flex-column p-1">
                                                <img src="{{ $comments->task_media }}" alt="" style="border-radius:15px;width: 230px;">
                                                {{--  --}}
                                                <p class="py-2 px-2">{{ $comments->task_relatedcomment }}</p>
                                                {{--  --}}
                                             </div>
                                             @endif
                                             
                                          </div>
                                          <div class="profile my-profile">
                                             <span class="py-1 px-3 bg-light mt-2" style="border-radius: 50px !important">{{ $comments->relative_time }}</span>
                                          </div>
                                          @else
                                          <div class="profile other-profile">
                                             <span class="py-1 px-3 bg-light mt-2" style="border-radius: 50px !important">{{ Auth::guard('employee')->user()->employee_name }}</span>
                                          </div>
                                          {{--  --}}
                                          <div class="text-start message other-message demomsg px-2 py-1">
                                             @if (empty($comments->task_media))
                                                <p class="py-2 px-2">{{ $comments->task_relatedcomment }}</p>
                                             @else
                                             <div class="d-flex flex-column p-1">
                                                <img src="{{ $comments->task_media }}" alt="" style="border-radius:15px;width: 230px;">
                                                {{--  --}}
                                                <p class="py-2 px-2">{{ $comments->task_relatedcomment }}</p>
                                             </div>
                                             @endif
                                          </div>
                                          {{--  --}}
                                          <div class="profile other-profile">
                                             <span class="py-1 px-3 bg-light mt-2" style="border-radius: 50px !important">{{ $comments->relative_time }}</span>
                                          </div>
                                          {{--  --}}
                                          @endif
                                       </div>
                                   @endforeach

                                   @endif
                                 </div>
                                 <div class="px-3 pt-3 chat-box-footer">
                                    {{--  --}}
                                    <form action="{{ route('childsendMsg') }}" method="post" enctype="multipart/form-data" class="d-flex">
                                       @csrf
                                       {{--  --}}
                                       <input type="text" class="form-control d-none" name="taskid" value="{{ $item->id }}">
                                       {{-- <input type="text" class="form-control d-none" name="taskid" value="{{ $item->id }}"> --}}
                                       <div class="d-flex ms-3">
                                          @if (empty('chat_input'))
                                          <input class="form-control text-message" id="chat_input" name="chat_input" placeholder="Enter your message here...">
                                          <a class="text-black" href="">
                                          <input class="d-none" id="attachment" name="attachment" type="file" />
                                          <label class="btn btn-light attachment me-2" for="attachment"><span class="fas fa-paperclip"></span></label>
                                          </a>
                                          @else
                                          <input class="form-control text-message" id="chat_input" name="chat_input" placeholder="Enter your message here...">
                                          <div class="d-flex ms-2">
                                             <a class="text-black" href="">
                                             <input class="d-none" id="attachment" name="attachment" type="file" />
                                             <label class="btn btn-light attachment me-2" for="attachment"><span class="fas fa-paperclip"></span></label>
                                             </a>
                                             <button class="bg-light sened" id="send" type="submit" disabled>
                                             <i class="fas fa-paper-plane" style="color: black !important"></i>
                                             </button>
                                          </div>
                                          <script>
                                             document.getElementById('chat_input').addEventListener('input', function () {
                                                 var sendButton = document.getElementById('send');
                                                 sendButton.disabled = this.value.trim() === ''; // Disable button if input is empty
                                             });
                                          </script>
                                          @endif
                                       </div>
                                       {{--  --}}
                                    </form>
                                    {{--  --}}
                                 </div>
                              </div>
                              {{-- 
                           </div>
                           --}}
                           <!-- /.card-footer-->
                        </div>
                     </div>
                     {{--  --}}
                     <div class="col-lg-4">
                        {{--  --}}
                        
                        
                        <form action="{{ route('changesChildProjects',$item->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mt-3">
                           {{--  --}}
                           {{-- <div class="col-6">
                              <select name="boardlist" id="boardlist" class="form-control text-center">
                                 @foreach ($taskBoard as $board)
                                    <option value="{{ $board->id }}">{{ $board->task_list_name }}</option>
                                 @endforeach
                              </select>
                           </div> --}}
                           {{-- <div class="col-6">
                              <select name="boardlist" id="boardlist" class="form-control text-center">
                                  @foreach ($taskBoard as $board)
                                      <option value="{{ $board->id }}">{{ $board->task_list_name }}</option>
                                  @endforeach
                              </select>
                          </div> --}}
                          
                           <div class="text-start      col-12" >
                              <div class="dropdown kanban-action form-control" style="border-style: none;">
                                 <a class="justify-content-between text-black text-decoration-none align-items-center" href="" data-bs-toggle="dropdown" >
                                 <span class="text-black text-decoration-none">Actions</span> <i class="fas fa-angle-down text-black"></i>
                                 </a>
                                 <div class="dropdown-menu dropdown-menu-right">
                                    <div class="px-1 d-flex align-items-center">
                                       <i class="mx-2 fas fa-plus"></i>
                                       <a class="dropdown-item" href="">Create automation</a>
                                    </div>
                                    {{--  --}}
                                    <div class="px-1 d-flex align-items-center">
                                       <i class="mx-2 fas fa-copy"></i>
                                       <a class="dropdown-item" href="">Manage automation</a>
                                    </div>
                                    {{--  --}}
                                    <div class="px-1 d-flex align-items-center">
                                       <i class="mx-2 fas fa-circle-check"></i>
                                       <a class="dropdown-item" href="">Audit log</a>
                                    </div>
                                    {{--  --}}
                                 </div>
                              </div>
                           </div>
                        </div>
                        {{--  --}}
                        <div class="p-3 mt-3 col-12 d-flex flex-column" style="border: 0.5px solid lightgray;border-radius:5px;">
                           <b>Details</b>
                           <hr>
                           <div class="px-2 py-2 d-flex">
                              <p class="mt-2 w-50 text-start">Assignee</p>
                              
                                 @if (empty($item->assignee_id))
                                 <select name="assigneeperson" id="assigneeperson" class="form-control text-center" style="border-style: none">
                                     <option value="0">Unassign</option>
                                     @foreach ($users as $assignee)
                                       <option value="{{ $assignee->id }}">{{ $assignee->employee_name }}</option>
                                     @endforeach
                                 </select>
                                 @else
                                 @foreach ($users as $assignee)
                                 @endforeach
                                     <p class="form-control py-2 text-center" style="border-style: none">{{ $assignee->employee_name }}</p>
                                 @endif
                                 
                              
                           </div>
                           {{--  --}}
                           <div class="px-2 pt-1 pb-1 d-flex">
                              @if ($item->task_added == Auth::guard('employee')->user()->id)
                                  
                              @else
                              <a class="text-end" href="" style="border-style:none;width:77%">assign me</a>
                              @endif
                           </div>
                           {{--  --}}
                           <div class="px-2 py-2 d-flex">
                              <p class="mt-2 text-start w-50">Label</p>
                              <p class="form-control text-center" style="border-style: none">labelname</p>
                           </div>
                           {{--  --}}
                           <div class="px-2 py-2 d-flex">
                              <p class="mt-2 text-start w-50">Due date</p>
                              <p class="mt-1 form-control text-center" style="border-style: none">{{ $item->due_date }}</p>
                           </div>
                           {{--  --}}
                           <div class="px-2 py-2 d-flex">
                              <p class="mt-2 text-start w-50">Start date</p>
                              @if (empty($item->project_starting_date))
                                  
                              @else
                              <p class="mt-1 form-control text-center" style="border-style: none">{{ \Carbon\Carbon::parse($item->project_starting_date)->format('M,d Y') }}</p>
                              @endif
                           </div>
                           {{--  --}}
                           <div class="px-2 py-2 d-flex">
                              <p class="mt-2 text-start w-50">Reporter</p>
                              <p class="mt-1 text-center form-control" style="border-style: none;">{{ Auth::guard('employee')->user()->employee_name }}</p>
                           </div>
                        </div>
                        {{--  --}}
                        <button class="btn btn-primary mt-1" type="submit">Save Changes</button>
                        {{--  --}}
                        </form>
                        {{--  --}}
                        <div class="p-3 mt-3" style="border: 0.5px solid lightgray;border-radius:5px">
                           {{--  --}}
                           <b class="pt-3">Attachments:</b>
                           <div class="py-3 px-2 mt-1 col-12 d-flex flex-column">
                              <div class="d-flex py-3 w-100vw" style="overflow-x: scroll;">
                                @foreach ($detailtask as $attachments)
                        
                                @if(empty($attachments->task_media))

                                @else
                        
                               {{--  --}}
                               {{--  --}}
                        
                              <div class="imageAttachment mx-2" style="">
                                 <img src="{{ $attachments->task_media }}" alt="">
                              </div>
                              {{--  --}}
                           
                               {{--  --}}
                        
                               {{--  --}}
                                @endif
                               {{--  --}}
                                @endforeach
                               {{--  --}}
                     </div>
                     {{--  --}}
                     
                  </div>
                     </div>
                     </div>
                     {{--  --}}
                     <div class="col-12 mt-3">
                        <div class="mb-3 input-block">
                           <div class="card">
                              <div class="card-header">
                                 <ul class="ml-auto nav nav-pills">
                                    {{-- <li class="nav-item">
                                       <a class="nav-link active" href="#comments" data-toggle="tab">Comments</a>
                                    </li> --}}
                                    <li class="nav-item">
                                       <a class="nav-link active" href="#activities" data-toggle="tab">Activities</a>
                                    </li>
                                 </ul>
                              </div>
                              <div class="card-body" style="overflow-y: scroll;">
                                 <div class="tab-content">
                                    {{-- <div class="chart tab-pane active" id="comments"
                                       style="position: relative; height: 150px;">
                                       comments
                                    </div> --}}
                                    {{--  --}}
                                    <div class="chart tab-pane active" id="activities"
                                       style="position: relative; height: 150px;">

                                       @if($commentData->isEmpty())

                                       @else
                                       @foreach ($commentData as $activitiess)
                                         {{--  --}}
                                         <div class="d-flex">
                                         {{--  --}}
                                         {{-- <img class="mt-2" src="{{ Auth::guard('employee')->user()->image }}" alt="" style="width:35px;height:35px;border-radius:50%"> --}}
                                         {{--  --}}
                                         <p class="mx-2" style="margin: 12px 0px 0px 0px;font-size:12px">{{ Auth::guard('employee')->user()->employee_name }}:</p>
                                         {{--  --}}
                                         <div class="d-flex align-items-center py-3 bg-light px-2 mt-2" style="border-radius: 20px;">
                                            @foreach ($selectTasks as $userimages)
                                               <div class="d-flex flex-column align-items-center">
                                                  <p class="date-and-time">
                                                  {{ \Carbon\Carbon::parse($activitiess->created_at)->format('M,d Y') }} at {{ \Carbon\Carbon::parse($activitiess->created_at)->format('h:i:s') }} <span class="px-1 history-block">History</span>
                                                  </p>
                                                  <p class="py-2 mx-3" style="font-size:12px">{{ $activitiess->activity_message }}</p>
                                               </div>
                                              
                                            @endforeach 
                                            
                                         </div>
                                         {{--  --}}
                                         </div>
                                         {{--  --}}
                                       @endforeach
                                       @endif
                                    </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  {{--  --}}
               </div>
               @endforeach
               {{--
            </div>
            --}}
            <!-- Button trigger modal --> 
          <!-- Modal -->
          @foreach ($selectTasks as $projectDatasss)
          @endforeach
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $projectDatasss->child_task_name }} | Child task</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('createChildNewTask') }}" method="post" enctype="multipart/form-data">
                     @csrf
                     <div class="input-block mb-3">
                       <label class="col-form-label">Task Name</label>
                       <input type="text" class="form-control d-none" name="taskid" id="taskid" value="{{ $projectDatasss->id }}">
                       {{-- <input type="text" class="form-control d-none" name="taskboardid" id="taskboardid" value="{{ $projectDatasss->taskboard_id }}"> --}}
                       <input type="text" class="form-control d-none" name="projectid" id="projectid" value="{{ $projectDatasss->project_id}}">
                       <input type="text" class="form-control" name="taskname" id="taskname" placeholder="task name ..">
                     </div>
                     <div class="input-block mb-3">
                       <label class="col-form-label">Task Priority</label>
                       <select class="form-control select" name="priority">
                         <option>Select</option>
                         <option value="high">High</option>
                         <option value="medium">Medium</option>
                         <option value="low">Low</option>
                       </select>
                     </div>
                     <div class="input-block mb-3">
                       <label class="col-form-label">Task Type</label>
                       <select class="form-control select" name="tasktype">
                         <option>Select</option>
                         <option value="bug">Bug</option>
                         <option value="task">Task</option>
                         <option value="story">Story</option>
                       </select>
                     </div>
                     <div class="input-block mb-3">
                       <label class="col-form-label">Due Date</label>
                       <div class="cal-icon"><input class="form-control datetimepicker" type="date" name="duedate" id="duedate"></div>
                     </div>
                     <div class="input-block mb-3">
                       <label class="col-form-label">Task image</label>
                       <input type="file" id="projectmediaimages" name="projectmediaimages" class="form-control">
                     </div>
                     <div class="input-block mb-3">
                       <label class="col-form-label">Task detail</label>
                       <textarea id="projectdetails" name="projectdetails" cols="30" rows="5" class="form-control" placeholder="project details .. "></textarea>
                     </div>
                     <div class="submit-section text-center">
                       <button class="btn btn-primary submit-btn">Create task</button>
                     </div>
                   </form>
                </div>
              </div>
            </div>
          </div>
         </div>
      </div>
   </body>
</html>
