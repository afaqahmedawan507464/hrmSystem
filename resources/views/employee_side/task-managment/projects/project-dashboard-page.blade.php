<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Smarthr - Bootstrap Admin Template">
      <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
      <meta name="author" content="Dreamguys - Bootstrap Admin Template">
      <title>Task Board - HRMS admin template</title>
      <!-- Favicon -->
      <link rel="shortcut icon" type="image/x-icon" href="/admin/task-management-system/assets/img/favicon.png">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="/admin/task-management-system/assets/css/bootstrap.min.css">
      <!-- Fontawesome CSS -->
      <link rel="stylesheet" href="/admin/task-management-system/assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="/admin/task-management-system/assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
      <!-- Lineawesome CSS -->
      <link rel="stylesheet" href="/admin/task-management-system/assets/css/line-awesome.min.css">
      <link rel="stylesheet" href="/admin/task-management-system/assets/css/material.css">
      <!-- Select2 CSS -->
      <link rel="stylesheet" href="/admin/task-management-system/assets/css/select2.min.css">
      <!-- Datetimepicker CSS -->
      <link rel="stylesheet" href="/admin/task-management-system/assets/css/bootstrap-datetimepicker.min.css">
      <!-- Main CSS -->
      <link rel="stylesheet" href="/admin/task-management-system/assets/css/style.css">
      <link rel="stylesheet" href="/abcd.css">
      <link rel="stylesheet" href="/cusstom-css.css">
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link
        href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;700&display=swap"
        rel="stylesheet"
      />
   </head>
   <body>
      <!-- Main Wrapper -->
      <div class="main-wrapper">
         <!-- Header -->
         <div class="header">
            <!-- Header Title -->
            @if ($projectsss->isEmpty())
            @else
            @foreach ($projectsss as $protask)
            @endforeach
            <div class="page-title-box">
               <h3>{{ $protask->project_name }}</h3>
            </div>
            @endif
         </div>
         <!-- /Header -->
         <!-- Sidebar -->
         <div class="page-wrapper" style="margin:0px !important">
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
            <!-- Page Content -->
            <div class="content container-fluid">
               <!-- Page Header -->
               {{-- 
               <div class="page-header">
                  <div class="row">
                  </div>
               </div>
               --}}
               <!-- /Page Header -->
               
               <div class="row board-view-header">
                  {{--  --}}
                  <div class="col-12">
					      <div class="text-end">
						      <a href="#" class="btn btn-white float-start my-2 ms-2" data-bs-toggle="modal" data-bs-target="#summary_task_modal"><i class="px-2 fas fa-chart-pie"></i> Summary</a>
					      </div>
					      {{--  --}}
					      <div class="text-end">
						      <a href="#" class="btn btn-white float-start my-2 ms-2" data-bs-toggle="modal" data-bs-target="#list_task_modal"><i class="px-2 fas fa-list"></i> List</a>
					      </div>
					      {{--  --}}
					      <div class="text-end">
						      <a href="#" class="btn btn-white float-start my-2 ms-2" data-bs-toggle="modal" data-bs-target="#calendar_task_modal"><i class="px-2 fas fa-calendar"></i> Calendar</a>
					      </div>
					      {{--  --}}
					      {{-- <div class="text-end">
						      <a href="#" class="btn btn-white float-start my-2 ms-2" data-bs-toggle="modal" data-bs-target="#timeline_task_modal"><i class="px-2 fas fa-clock"></i> Issue</a>
					      </div> --}}
					      {{--  --}}
					      <div class="text-end">
						      <a href="#" class="btn btn-white float-start my-2 ms-2" data-bs-toggle="modal" data-bs-target="#issue_task_modal"><i class="px-2 fas fa-plus"></i> Issues</a>
					      </div>
					      {{--  --}}
					      {{-- <div class="text-end">
						      <a href="#" class="btn btn-white float-start my-2 ms-2" data-bs-toggle="modal" data-bs-target="#report_task_modal"><i class="px-2 fas fa-flag"></i> Report</a>
					      </div> --}}
					      {{--  --}}
					      <div class="text-end">
						      <a href="#" class="btn btn-white float-start my-2 ms-2" data-bs-toggle="modal" data-bs-target="#projectsetting_task_modal"><i class="px-2 fas fa-cog"></i>Setting</a>
					      </div>
                     {{--  --}}
                     <div class="text-end">
						      <a href="#" class="btn btn-white float-start my-2 ms-2" data-bs-toggle="modal" data-bs-target="#add_task_board"><i class="px-2 fas fa-plus"></i>New List</a>
                        {{--  --}}
					      </div>
                     {{--  --}}
                     <div class="text-end">
						      <a href="#" class="btn btn-white float-start my-2 ms-2" data-bs-toggle="modal" data-bs-target="#taskstype"><i class="px-2 fas fa-plus"></i>New task type</a>
                        {{--  --}}
					      </div>
                     {{-- <div class="pro-teams mt-2 mx-2">
                        <div class="pro-team-lead" >
                           <h4>Team Member</h4>
                           <div class="avatar-group">
                              <div class="avatar">
                                 <img class="avatar-img rounded-circle border border-white" alt="User Image" src="/admin/dist/img/avators.jpg">
                              </div>
                              <div class="avatar">
                                 <img class="avatar-img rounded-circle border border-white" alt="User Image" src="/admin/dist/img/avators.jpg">
                              </div>
                              <div class="avatar">
                                 <img class="avatar-img rounded-circle border border-white" alt="User Image" src="/admin/dist/img/avators.jpg">
                              </div>
                              <div class="avatar">
                                 <a href="" class="avatar-title rounded-circle border border-white" data-bs-toggle="modal" data-bs-target="#assign_user"><i class="fas fa-plus"></i></a>
                              </div>
                           </div>
                        </div>
                     </div> --}}
                  </div>
                  {{--  --}}
                  {{--  --}}
               </div>
              
               @if ($projectsss->isEmpty())
               @else
               @foreach ($projectsss as $projectname)
               @endforeach
               @if ($task_list->isEmpty())
               @else
               <div class="kanban-board card mb-0">
                  <div class="card-body">
                     <div class="kanban-cont">
                        @foreach ($task_list as $boardname)
                        <div class="kanban-list bg-light">
                           <div class="kanban-header py-3">
                              <span class="status-title text-black text-center text-uppercase badge bg-inverse-info" style="text-transform: uppercase">{{ $boardname->task_list_name }}</span>
                              <div class="dropdown kanban-action">
                                 <a href="" data-bs-toggle="dropdown">
                                 <i class="fas fa-ellipsis-vertical"></i>
                                 </a>
                                 <div class="dropdown-menu dropdown-menu-right">
                                    {{-- <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#edit_task_board">Edit</a> --}}
                                    <a class="dropdown-item" href="{{ route('projectEditCardBoard',$boardname->id) }}">Edit</a>
                                    <a class="dropdown-item" href="{{ route('removeTaskBoard',$boardname->id) }}">Delete</a>
                                 </div>
                              </div>
                           </div>
                           <div class="kanban-wrap">
                              @if ($tasks->isEmpty())
                              @else
                              @foreach ($tasks->where('task_list_name', $boardname->task_list_name) as $abcde)
                              <div class="card panel">
                                 <div class="kanban-box">
                                    <div class="task-board-header">
                                       <span class="status-title projectTitle" style="width: 200px;"><a href="{{ route('taskdetails',$abcde->id)}}">{{ $abcde->task_name }}</a></span>
                                       <div class="dropdown kanban-task-action">
                                          <a href="" data-bs-toggle="dropdown">
                                          <i class="fas fa-angle-down"></i>
                                          </a>
                                          <div class="dropdown-menu dropdown-menu-right">
                                             <a class="dropdown-item" href="{{ route('editTaskPage',$abcde->id) }}">Edit</a>
                                             <a class="dropdown-item" href="{{ route('removeTask',$abcde->id) }}">Delete</a>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="task-board-body">
                                       <div class="kanban-footer">
                                          @if (empty($abcde->taskmediaimage))
                                          @else
                                          <span class="task-info-cont w-100 py-2">
                                          <img src="{{ $abcde->taskmediaimage }}" alt="">
                                          </span>
                                          @endif
                                       </div>
                                       <div class="kanban-footer">
                                          <span class="task-info-cont w-100 py-2">
                                             <p>Project short details 
                                                <br>
                                                {{ $abcde->task_details }}
                                             </p>
                                          </span>
                                       </div>
                                       <div class="kanban-footer">
                                          <span class="task-info-cont">
                                          <span class="task-date py-2"><i class="px-2 fas fa-clock"></i>{{ \Carbon\Carbon::parse($abcde->due_date)->format('M,d Y') }}</span>
                                          @if ($abcde->task_priority == 'high')
                                          <span class="task-priority badge bg-inverse-warning">High</span>
                                          @elseif($abcde->task_priority == 'medium')
                                          <span class="task-priority badge bg-inverse-warning">Medium</span>
                                          @else 
                                          <span class="task-priority badge bg-inverse-warning">Low</span>
                                          @endif
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              @endforeach  
                              @endif
                           </div>
                           <div class="add-new-task">
                              <a href="{{ route('taskPage',$boardname->id) }}">Add New Task</a>
                           </div>
                        </div>
                        @endforeach  
                        
                     </div>
                     {{--  --}}
                  </div>
               </div>
               @endif
            </div>
            <!-- /Page Content -->
            <div id="add_task_board" class="modal custom-modal fade" role="dialog">
               <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                     <div class="modal-header">
                        @foreach ($projectsss as $projectnamess)
                        @endforeach
                        <h4 class="modal-title">{{ $projectnamess->project_name }} | Add Task Board</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">&times;</button>
                     </div>
                     {{-- add list --}}
                     <div class="modal-body">
                        <form action="{{ route('createTaskList') }}" method="post">
                           @csrf
                           <div class="input-block mb-3">
                              <input type="text" class="form-control d-none" name="projectid" value="{{ $projectnamess->id }}">
                              <label class="col-form-label">Task Board Name</label>
                              <input type="text" class="form-control" name="task_list_name">
                           </div>
                           <div class="m-t-20 text-center">
                              <button class="btn btn-primary btn-lg" type="submit">Create Board</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            @if ($task_list->isEmpty())
            @else
            @foreach ($task_list as $boardnameedit)
            @endforeach
            @endif
            <div id="new_project" class="modal custom-modal fade" role="dialog">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h4 class="modal-title">Create New Task</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">&times;</button>
                     </div>
                     <div class="modal-body">
                        <form>
                           <div class="input-block mb-3">
                              <label class="col-form-label">Project Name</label>
                              <input class="form-control" type="text">
                           </div>
                           <div class="submit-section">
                              <button class="btn btn-primary submit-btn">Create Project</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Assign Leader Modal -->
            <div id="assign_leader" class="modal custom-modal fade" role="dialog">
               <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title">Assign Leader to this project</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">
                        <div class="input-group m-b-30">
                           <input placeholder="Search to add a leader" class="form-control search-input" type="text">
                           <button class="btn btn-primary">Search</button>
                        </div>
                        <div>
                           <ul class="chat-user-list">
                              <li>
                                 <a href="#">
                                    <div class="chat-block d-flex">
                                       <span class="avatar flex-shrink-0"><img src="assets/img/profiles/avatar-09.jpg" alt="User Image"></span>
                                       <div class="media-body align-self-center text-nowrap">
                                          <div class="user-name">Richard Miles</div>
                                          <span class="designation">Web Developer</span>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                    <div class="chat-block d-flex">
                                       <span class="avatar flex-shrink-0"><img src="assets/img/profiles/avatar-10.jpg" alt="User Image"></span>
                                       <div class="media-body align-self-center text-nowrap">
                                          <div class="user-name">John Smith</div>
                                          <span class="designation">Android Developer</span>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                    <div class="chat-block d-flex">
                                       <span class="avatar flex-shrink-0">
                                       <img src="assets/img/profiles/avatar-16.jpg" alt="User Image">
                                       </span>
                                       <div class="media-body align-self-center text-nowrap">
                                          <div class="user-name">Jeffery Lalor</div>
                                          <span class="designation">Team Leader</span>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                           </ul>
                        </div>
                        <div class="submit-section">
                           <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /Assign Leader Modal -->
            <!-- Assign User Modal -->
            <div id="assign_user" class="modal custom-modal fade" role="dialog">
               <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title">Assign the user to this project</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body" style="overflow-y: scroll">
                        <div class="input-group m-b-30">
                           {{-- <form action="" method="post" class="input-group m-b-30">
                              @csrf --}}
                              <input placeholder="Search a user to assign" class="form-control search-input" type="text" name="searchAssignee">
                              <button class="btn btn-primary" type="submit">Search</button>
                           {{-- </form> --}}
                        </div>
                        <div>
                           <ul class="chat-user-list">
                              {{-- @if ($listAsignee->isEmpty())
                                  
                              @else
                                  @foreach ($listAsignee as $asigneeData) --}}
                                  <li>
                                    <a href="#">
                                       <div class="chat-block d-flex">
                                          {{-- @if (empty($asigneeData->image))
                                          <span class="avatar flex-shrink-0"><img src="/admin/dist/img/avators.jpg" alt="User Image"></span>
                                          @else
                                          <span class="avatar flex-shrink-0"><img src="{{ $asigneeData->image }}" alt="User Image"></span>
                                          @endif --}}
                                          <div class="media-body align-self-center text-nowrap">
                                             <div class="user-name"></div>
                                             <span class="designation"></span>
                                             <br>
                                             <span class="my-2"><a class="btn btn-sm btn-primary" href="">Add</a> <a class="btn mx-2 btn-sm btn-secondary" href="">Cancel</a></span>
                                          </div>
                                       </div>
                                    </a>
                                 </li>  
                                  {{-- @endforeach
                              @endif --}}
                           </ul>
                        </div>
                        {{-- <div class="submit-section">
                           <button class="btn btn-primary submit-btn">Submit</button>
                        </div> --}}
                     </div>
                  </div>
               </div>
            </div>
            <!-- /Assign User Modal -->
            <!-- Add Task Modal -->
            <div id="add_task_modal" class="modal custom-modal fade" role="dialog">
               <div class="modal-dialog">
                  <div class="modal-content">
                     @if($projectsss->isEmpty())
                     @else
                     @foreach ($projectsss as $projectdatas)
                     @endforeach
                     <div class="modal-header">
                        <h4 class="modal-title">{{ $projectdatas->project_name }} | Add Task</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">&times;</button>
                     </div>
                     {{--  --}}
                     @if ($task_list->isEmpty())
                     @else
                     {{--  --}}
                     <div class="modal-body">
                        @foreach ($task_list as $boards)
                        @endforeach
                        <form action="{{ route('createNewTask') }}" method="post" enctype="multipart/form-data">
                           @csrf
                           <div class="input-block mb-3">
                              <label class="col-form-label">Task Name</label>
                              <input type="text" class="form-control" name="proid" id="proid" placeholder="task name .." value="{{ $projectdatas->id }}">
                              <input type="text" class="form-control" name="tasklistboard" id="tasklistboard" value="{{ $boards->id }}">
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
                              </select>
                           </div>
                           <div class="input-block mb-3">
                              <label class="col-form-label">Due Date</label>
                              <div class="cal-icon"><input class="form-control datetimepicker" type="text" name="duedate" id="duedate"></div>
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
                     @endif
                     @endif
                  </div>
               </div>
            </div>
            <!-- /Add Task Modal -->
            <!-- Edit Task Modal -->
            <div id="edit_task_modal" class="modal custom-modal fade" role="dialog">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h4 class="modal-title">Edit Task</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">&times;</button>
                     </div>
                     <div class="modal-body">
                        <form>
                           <div class="input-block mb-3">
                              <label class="col-form-label">Task Name</label>
                              <input type="text" class="form-control" value="Website Redesign">
                           </div>
                           <div class="input-block mb-3">
                              <label class="col-form-label">Task Priority</label>
                              <select class="form-control select">
                                 <option>Select</option>
                                 <option selected>High</option>
                                 <option>Normal</option>
                                 <option>Low</option>
                              </select>
                           </div>
                           <div class="input-block mb-3">
                              <label class="col-form-label">Due Date</label>
                              <div class="cal-icon">
                                 <input class="form-control datetimepicker" type="text" value="20/08/2019">
                              </div>
                           </div>
                           <div class="input-block mb-3">
                              <label class="col-form-label">Task Followers</label>
                              <input type="text" class="form-control" placeholder="Search to add">
                              <div class="task-follower-list">
                                 <span data-bs-toggle="tooltip" title="John Doe">
                                 <img src="assets/img/profiles/avatar-02.jpg" class="avatar" alt="John Doe" width="20" height="20">
                                 <i class="fa-solid fa-xmark"></i>
                                 </span>
                                 <span data-bs-toggle="tooltip" title="Richard Miles">
                                 <img src="assets/img/profiles/avatar-09.jpg" class="avatar" alt="Richard Miles" width="20" height="20">
                                 <i class="fa-solid fa-xmark"></i>
                                 </span>
                                 <span data-bs-toggle="tooltip" title="John Smith">
                                 <img src="assets/img/profiles/avatar-10.jpg" class="avatar" alt="John Smith" width="20" height="20">
                                 <i class="fa-solid fa-xmark"></i>
                                 </span>
                                 <span data-bs-toggle="tooltip" title="Mike Litorus">
                                 <img src="assets/img/profiles/avatar-05.jpg" class="avatar" alt="Mike Litorus" width="20" height="20">
                                 <i class="fa-solid fa-xmark"></i>
                                 </span>
                              </div>
                           </div>
                           <div class="submit-section text-center">
                              <button class="btn btn-primary submit-btn">Submit</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /Edit Task Modal -->
			<!-- Other Options -->
            <!-- Summary -->
			<div id="summary_task_modal" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h4 class="modal-title me-2">Project Summary</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">&times;</button>
                     </div>
                              @foreach ($projectsss as $projectInformations)
                              @endforeach
                              <b class="text-center mb-2">Project Details: <span>{{ $projectInformations->employee_name }} at {{ \Carbon\Carbon::parse($projectInformations->created_at)->format('M,d Y') }} at {{ \Carbon\Carbon::parse($projectInformations->created_at)->format('h:i:s') }}</span></b> 
                     <div class="modal-body">
                         <div class="row">
                             {{--  --}}
							        <div class="col-12 p-3">
							           <div class="p-3" style="border: 1px solid lightgray;border-radius:15px;margin-top:-15px;">
                                 <b>Status overview</b>
                                 <p>Get a snapshot of the status of your items. <span><a href="">View all items</a></span></p>
                                 <hr>
                                 <div class="programming-stats w-100" style="margin-top:10px;height:228px;">
                                   <div class="chart-container">
                                     <canvas class="my-chart"></canvas>
                                   </div>
                             
                                   <div class="details">
                                     <ul></ul>
                                   </div>
                                 </div>
                                </div>
							        </div>
                             {{--  --}}
							        <div class="col-12 px-3">
								         @if ($recentActivity->isEmpty())
								         @else
                        
                                 <div class="p-3" style="border: 1px solid lightgray;border-radius:15px;">
                                    <b>Recent Activities</b>
                                    <hr>
                                    <div style="overflow-y:scroll;height:250px;margin-top:10px;"> 
									         @foreach ($recentActivity as $recentActivities)
                           
									         <div class="d-flex">
										         {{--  --}}
										         {{-- <img class="mt-2" src="{{ Auth::guard('employee')->user()->image }}" alt="" style="width:35px;height:35px;border-radius:50%"> --}}
										         {{--  --}}
										         <p class="mx-2" style="margin: 12px 0px 0px 0px;font-size:12px">{{ Auth::guard('employee')->user()->employee_name }}:</p>
										         {{--  --}}
										         <div class="d-flex align-items-center py-3 bg-light px-2 mt-2" style="border-radius: 10px;max-width:300px;">
											            <div class="d-flex flex-column align-items-center">
												         <p class="date-and-time">
												          {{ \Carbon\Carbon::parse($recentActivities->created_at)->format('M,d Y') }} at {{ \Carbon\Carbon::parse($recentActivities->created_at)->format('h:i:s') }} <span class="px-1 history-block">History</span>
												         </p>
												         <p class="py-2 mx-3" style="font-size:12px"><a href="{{ route('taskdetails',$recentActivities->id) }}">{{           $recentActivities->task_name }}</a> {{ $recentActivities->activity_message }}</p>
											            </div>
										         </div>
										         {{--  --}}
									         </div>
                           
									         @endforeach
                                    {{-- child activities --}}
                                    @if ($childRecentActivity->isEmpty())                               
                                    @else
                                    @foreach ($childRecentActivity as $childRecentActivities)
                           
									         <div class="d-flex">
										         {{--  --}}
										         {{-- <img class="mt-2" src="{{ Auth::guard('employee')->user()->image }}" alt="" style="width:35px;height:35px;border-radius:50%"> --}}
										         {{--  --}}
										         <p class="mx-2" style="margin: 12px 0px 0px 0px;font-size:12px">{{ Auth::guard('employee')->user()->employee_name }}:</p>
										         {{--  --}}
										         <div class="d-flex align-items-center py-3 bg-light px-2 mt-2" style="border-radius: 10px;max-width:300px;">
											            <div class="d-flex flex-column align-items-center">
												          <p class="date-and-time">
												          {{ \Carbon\Carbon::parse($childRecentActivities->created_at)->format('M,d Y') }} at {{ \Carbon\Carbon::parse          ($childRecentActivities->created_at)->format('h:i:s') }} <span class="px-1 history-block">History</span>
												          </p>
												          <p class="py-2 mx-3" style="font-size:12px"><a href="{{ route('taskChilddetails',$childRecentActivities->id) }}">{{           $childRecentActivities->child_task_name }}</a> {{ $childRecentActivities->activity_message }}</p>
											            </div>
										         </div>
										         {{--  --}}
									         </div>
                           
									         @endforeach
                                    @endif
                                 </div>
                                 </div>
								         @endif
                             </div>
                             {{--  --}}
                             <div class="col-12 p-3">
                              <div class="p-3 mt-2" style="border: 1px solid lightgray;border-radius:15px;margin-top:-15px;">
                               <b>Team workload</b>
                               <p>Oversee the capacity of your team.</p>
                               <hr>
                               <div class="d-flex" style="height: 250px;overflow-y:scroll">
                                 <table class="table">
                                 <thead>
                                   <tr>
                                     <th scope="col" style="text-align:center;">id</th>
                                     <th scope="col" style="text-align:center;"><span class="mx-2">Assignee</th>
                                     <th scope="col" style="text-align:center;">Operations</th>
                                   </tr>
                                 </thead>
                                 <tbody>
                                    @if ($listAsignee->isEmpty())
                                        
                                    @else
                                    @foreach ($listAsignee as $assigeees)
                                    <tr>
                                       <td style="text-align:center;">{{ $assigeees->id }}</td>
                                       <td style="text-align:center;">{{ $assigeees->employee_name }}</td>
                                       <td style="text-align:center;">
                                          <a href="{{ route('pageUserTaskDetails',$assigeees->id) }}">Details</a>
                                       </td>
                                    </tr>
                                    @endforeach
                                    
                                    @endif
                                  </tbody>
                                 </table>
                               </div>
                              </div>
                             </div>
                             {{--  --}}
                             @if ($taskType->isEmpty())
                                 
                             @else
                             <div class="col-12 p-3">
                              <div class="p-3" style="border: 1px solid lightgray;border-radius:15px;margin-top:-15px;">
                               <b>Types of work</b>
                               <p>Get a breakdown of items by their types. <span><a href="">View all items</a></span></p>
                               <hr>
                               <div class="d-flex" style="height: 250px;overflow-y:scroll">
                                 <table class="table">
                                 <thead>
                                   <tr>
                                     <th scope="col" style="text-align:center;">id</th>
                                     <th scope="col" style="text-align:center;"><span class="mx-2">Tasks Type</th>
                                     <th scope="col" style="text-align:center;">Operations</th>
                                   </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($taskType as $typeTasks)
                                    <tr>
                                       <td style="text-align:center;">{{ $typeTasks->id }}</td>
                                       <td style="text-align:center;">{{ $typeTasks->tasks_type_name }}</td>
                                       <td style="text-align:center;">
                                          <a href="{{ route('pageTaskDetails',$typeTasks->id) }}">Details</a>
                                       </td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                 </table>
                               </div>
                              </div>
                             </div>
                             @endif
                             {{--  --}}
							    </div>
                     </div>
                  </div>
               </div>
			</div>
			<!-- /Summary -->
			<!-- list -->
			<div id="list_task_modal" class="modal custom-modal fade p-3" role="dialog" style="--bs-modal-width: 1200px !important;">
				<div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h4 class="modal-title">List Projects</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">&times;</button>
                     </div>
                     <div class="modal-body">
                        <table class="table">
                           <thead>
                             <tr>
                               <th scope="col" style="width: 10%;text-align:center;"><span class="mx-2"><i class="fas fa-hashtag"></i></span>id</th>
                               <th scope="col" style="width: 20%;text-align:center;"><span class="mx-2"><i class="fas fa-circle-info"></i></span>Summary</th>
                               <th scope="col" style="width: 10%;text-align:center;"><span class="mx-2"><i class="far fa-arrow-alt-circle-right"></i></span>Status</th>
                               <th scope="col" style="width: 10%;text-align:center;"><span class="mx-2"><i class="fas fa-user"></i></span>Assignee</th>
                               <th scope="col" style="width: 10%;text-align:center;"><span class="mx-2"><i class="fas fa-calendar"></i></span>Due date</th>
                               <th scope="col" style="width: 10%;text-align:center;"><span class="mx-2"><i class="far fa-arrow-alt-circle-up"></i></span>Priority</th>
                               <th scope="col" style="width: 10%;text-align:center;"><span class="mx-2"><i class="fas fa-calendar"></i></span>Created</th>
                               <th scope="col" style="width: 10%;text-align:center;"><span class="mx-2"><i class="fas fa-calendar"></i></span>Updated</th>
                               <th scope="col" style="width: 10%;text-align:center;"><span class="mx-2"><i class="fas fa-user"></i></span>Reporter</th>
                             </tr>
                           </thead>
                           @if ($parentProjects->isEmpty())
                               
                           @else
                           <tbody>
                              @foreach ($parentProjects as $parentProject)
                              <tr>
                                <th scope="row" style="width: 10%;text-align:center;">{{ $parentProject->id }}</th>
                                <td style="width: 20%;text-align:center;overflow-x:scroll">{{ $parentProject->task_details }}</td>
                                <td style="width: 10%;text-align:center;"><span class="px-3 py-1 bg-inverse-warning" style="border-radius: 4px">{{ $parentProject->task_list_name }}</span></td>
                                <td style="width: 10%;text-align:center;">{{ $parentProject->employee_name }}</td>
                                <td style="width: 20%;text-align:center;"><span class="px-3 py-1 bg-inverse-danger" style="border-radius: 4px">{{ \Carbon\Carbon::parse($parentProject->due_date)->format('M,d Y') }}</span></td>
                                <td style="width: 10%;text-align:center;"><span class="px-3 py-1 bg-inverse-warning" style="border-radius: 4px">
                                 @if ($parentProject->task_priority == 'high')
                                   <i class="fas fa-angle-up text-primary"></i>
                                 @elseif ($parentProject->task_priority == 'medium')
                                   <i class="fas fa-grip-lines text-warning"></i>
                                 @else
                                   <i class="fas fa-angle-down text-primary"></i>
                                 @endif
                                </td>
                                <td style="width: 10%;text-align:center;"><span class="px-3 py-1 bg-inverse-warning" style="border-radius: 4px">{{ \Carbon\Carbon::parse($parentProject->created_at)->format('M,d Y') }}</span></td>
                                <td style="width: 20%;text-align:center;"><span class="px-3 py-1 bg-inverse-warning" style="border-radius: 4px">{{ \Carbon\Carbon::parse($parentProject->updated_at)->format('M,d Y') }}</span></td>
                                <td style="width: 10%;text-align:center;">{{ $parentProject->employee_name }}</td>
                              </tr>
                              
                              @endforeach
                            </tbody>
                           @endif
                        </table>
                     </div>
                  </div>
               </div>
			</div>
			<!-- /list -->
			<!-- calendar -->
			<div id="calendar_task_modal" class="modal custom-modal fade" role="dialog" style="--bs-modal-width: 1200px !important;">
				<div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h4 class="modal-title">Calendar</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">&times;</button>
                     </div>
                     <div class="modal-body">
                     </div>
                  </div>
               </div>
			</div>
			<!-- /calendar -->
			<!-- timeline -->
			{{-- <div id="timeline_task_modal" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h4 class="modal-title">Timeline</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">&times;</button>
                     </div>
                     <div class="modal-body">
                        
                     </div>
                  </div>
               </div>
			</div> --}}
			<!-- /timeline -->
			<!-- issue -->
			<div id="issue_task_modal" class="modal custom-modal fade" role="dialog" style="--bs-modal-width: 800px !important;">
				<div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h4 class="modal-title">Issues</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">&times;</button>
                     </div>
                     <div class="modal-body">
                           <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col" style="text-align:center;">Child task name</th>
                                  <th scope="col" style="text-align:center;">Parent task name</th>
                                  <th scope="col" style="text-align:center;">Operation</th>
                                </tr>
                              </thead>
                              <tbody>
                                 @if ($childTaskes->isEmpty())
                                     
                                 @else
                                     @foreach ($childTaskes as $childTasksss)
                                     <tr>
                                       <td style="text-align:center;">{{ $childTasksss->child_task_name }}</td>
                                       <td style="text-align:center;">{{ $childTasksss->task_name }}</td>
                                       <td style="text-align:center;">
                                          <a href="{{ route('taskChilddetails',$childTasksss->id) }}">Details</a>
                                       </td>
                                     </tr>  
                                     @endforeach
                                 @endif
                               </tbody>
                           </table>
                     </div>
                  </div>
               </div>
			</div>
			<!-- /issue -->
			<!-- report -->
			{{-- <div id="report_task_modal" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h4 class="modal-title">Report</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">&times;</button>
                     </div>
                     <div class="modal-body">
                        
                     </div>
                  </div>
               </div>
			</div> --}}
			<!-- /report -->
			<!-- projectsetting -->
			<div id="projectsetting_task_modal" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h4 class="modal-title">Project Setting</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">&times;</button>
                     </div>
                     <div class="modal-body mt-2">
                        <div class="row">
                           <div class="col-12 p-3">
                              <div class="p-3" style="border: 1px solid lightgray;border-radius:15px;margin-top:-15px;">
                               <b>Details</b>
                               <hr>
                                  <div class="p-3 mt-2 row">
                                     <div class="col-md-6">
                                        <label class="text-center" for="">Name:</label>
                                        @foreach ($selectProjects as $projectLeader)
                                        @endforeach
                                        <input name="updateprojectname" class="form-control" type="text" value="{{ $projectLeader->project_name }}" disabled>
                                     </div>
                                     {{--  --}}
                                     <div class="col-md-6">
                                       <label class="text-center" for="">Project lead</label>
                                          @foreach ($selectProjects as $projectLeader)
                                          @endforeach
                                          <input class="form-control" type="text" value="{{ $projectLeader->employee_name }}" disabled>
                                     </div>
                                     {{--  --}}
                                  </div>
                                </form>
                              </div>
                           </div>
                           {{--  --}}
                           <div class="col-12 p-3">
                              <div class="p-3" style="border: 1px solid lightgray;border-radius:15px;margin-top:-15px;">
                               <div class="row">
                                 <div class="col-6">
                                    <b>Access User List</b>
                                 </div>
                               </div>
                               <hr>
                                 <div class="row mt-2" style="overflow-y: scroll;height:175px;">
                                    <table class="table px-3 mt-2">
                                       <thead>
                                         <tr>
                                           <th scope="col" style="width: 30%;text-align:center;">Name</th>
                                           <th scope="col" style="width: 35%;text-align:center;">Email Address</th>
                                           <th scope="col" style="width: 35%;text-align:center;">User Roll</th> 
                                         </tr>
                                       </thead>
                                       <tbody>
                                          @if ($listAsignee->isEmpty())
                                              
                                          @else
                                              @foreach ($listAsignee as $users)
                                              <tr>
                                                <th scope="row" style="width: 30%;text-align:center;">{{ $users->employee_name }}</th>
                                                <td style="width: 35%;text-align:center;">{{ $users->email }}</td>
                                                <td style="width: 35%;text-align:center;">
                                                   @if ($users->role_user == 1)
                                                       <p>Administrator</p>
                                                   @elseif ($users->role_user == 2)
                                                       <p>Basic</p>
                                                   @endif
                                                </td>
                                              </tr>
                                              @endforeach
                                          @endif
                                        </tbody>
                                    </table>
                                 </div>
                               </div>
                           </div>
                           {{--  --}}
                           <div class="col-12 p-3">
                              <div class="p-3" style="border: 1px solid lightgray;border-radius:15px;margin-top:-15px;">
                               <div class="row">
                                 <div class="col-6">
                                    <b>Tasks Type List</b>
                                 </div>
                               </div>
                               <hr>
                                 <div class="row mt-2" style="overflow-y: scroll;height:175px;">
                                    <table class="table px-3 mt-2">
                                       <thead>
                                         <tr>
                                           <th scope="col" style="width: 10%;">Task id</th>
                                           <th scope="col" style="width: 80%;">Tasks type name</th>
                                           <th scope="col" style="width: 10%;">operation</th> 
                                         </tr>
                                       </thead>
                                       <tbody>
                                          @if ($taskType->isEmpty())
                                              
                                          @else
                                              @foreach ($taskType as $users)
                                              <tr>
                                                <th scope="row" style="width: 10%;">{{ $users->id }}</th>
                                                <td style="width: 80%;">{{ $users->tasks_type_name }}</td>
                                                <td style="width: 10%;">
                                                   <a href="{{ route('editTasksPage',$users->id) }}">Edit</a> <span class="mx-3">
                                                   <a href="{{ route('removeTaskType',$users->id) }}">Delete</a> </span>
                                                </td>
                                              </tr>
                                              @endforeach
                                          @endif
                                        </tbody>
                                    </table>
                                 </div>
                               </div>
                           </div>
                           {{--  --}}
                        </div>
                           {{--  --}}
                       </div>
                     </div>
                  </div>
               </div>
			</div>
			<!-- /projectsetting -->
         <!-- Assign Leader Modal -->
         <div id="taskstype" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     @foreach ($projectsss as $projectdatas)
                     @endforeach
                     <h5 class="modal-title"> {{ $projectdatas->project_name }} | Create a new tasks type</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  {{--  --}}
                  <div class="modal-body">
                     @if ($projectsss->isEmpty())
                         
                     @else
                     <form action="{{ route('addTaskType') }}" method="post">
                        @csrf
                        @foreach ($projectsss as $projectdatas)
                        @endforeach
                        <div class="input-block mb-3">
                           <label class="col-form-label">Task type name</label>
                           <input name="taskstypename" class="form-control" type="text" placeholder="tasks type name">
                           <input name="taskstypeprojectid" class="form-control d-none" type="text" value="{{ $projectdatas->id }}">
                        </div>
                        <div class="submit-section">
                           <button type="submit" class="btn btn-primary submit-btn">Create Project</button>
                        </div>
                     </form>
                     @endif
                  </div>
               </div>
            </div>
         </div>
         <!-- /Assign Leader Modal -->
         @endif
         </div>
         {{-- 
      </div>
      --}}
      <!-- /Main Wrapper -->
      <!-- jQuery -->
      <script src="/admin/task-management-system/assets/js/jquery-3.7.0.min.js"></script>
      <script src="/admin/task-management-system/assets/js/jquery-ui.min.js"></script>
      <script src="/admin/task-management-system/assets/js/jquery.ui.touch-punch.min.js"></script>
      <!-- Bootstrap Core JS -->
      <script src="/admin/task-management-system/assets/js/bootstrap.bundle.min.js"></script>
      <!-- Slimscroll JS -->
      <script src="/admin/task-management-system/assets/js/jquery.slimscroll.min.js"></script>
      <!-- Select2 JS -->
      <script src="/admin/task-management-system/assets/js/select2.min.js"></script>
      <!-- Datetimepicker JS -->
      <script src="/admin/task-management-system/assets/js/moment.min.js"></script>
      <script src="/admin/task-management-system/assets/js/bootstrap-datetimepicker.min.js"></script>
      <!-- Theme Settings JS -->
      <script src="/admin/task-management-system/assets/js/layout.js"></script>
      <script src="/admin/task-management-system/assets/js/theme-settings.js"></script>
      <script src="/admin/task-management-system/assets/js/greedynav.js"></script>
      	
      <!-- Custom JS -->
      <script src="/admin/task-management-system/assets/js/app.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      
      <script src="/jkanban.js"></script>

      

   </body>
</html>