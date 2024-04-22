<!DOCTYPE html>
<html lang="en-US" dir="ltr">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- ===============================================-->
      <!--    Document Title-->
      <!-- ===============================================-->
      <title>Falcon | Dashboard &amp; Web App Template</title>
      <!-- ===============================================-->
      <!--    Favicons-->
      <!-- ===============================================-->
      <link rel="apple-touch-icon" sizes="180x180" href="/public/assets/img/favicons/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="/public/assets/img/favicons/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="/public/assets/img/favicons/favicon-16x16.png">
      <link rel="shortcut icon" type="image/x-icon" href="/public/assets/img/favicons/favicon.ico">
      <link rel="manifest" href="/public/assets/img/favicons/manifest.json">
      <meta name="msapplication-TileImage" content="/public/assets/img/favicons/mstile-150x150.png">
      <meta name="theme-color" content="#ffffff">
      <script src="/public/assets/js/config.js"></script>
      <script src="/public/vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>
      <script src="/https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
      <!-- ===============================================-->
      <!--    Stylesheets-->
      <!-- ===============================================-->
      <link href="/public/vendors/fullcalendar/main.min.css" rel="stylesheet">
      <link href="/public/vendors/flatpickr/flatpickr.min.css" rel="stylesheet">
      <link href="/public/vendors/glightbox/glightbox.min.css" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
      <link href="/public/vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
      <link href="/public/assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
      <link href="/public/assets/css/theme.min.css" rel="stylesheet" id="style-default">
      <link href="/public/assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
      <link href="/public/assets/css/user.min.css" rel="stylesheet" id="user-style-default">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
      <link rel="stylesheet" href="/admin/clock/index.css">
      {{-- disgital clock --}}
      <link rel="stylesheet" href="/admin/digital-clock.css">
      {{-- custom css file --}}
      <link rel="stylesheet" href="/cusstom-css.css">
      <link rel="stylesheet" href="/abcd.css">
      <script>
         var isRTL = JSON.parse(localStorage.getItem('isRTL'));
         if (isRTL) {
           var linkDefault = document.getElementById('style-default');
           var userLinkDefault = document.getElementById('user-style-default');
           linkDefault.setAttribute('disabled', true);
           userLinkDefault.setAttribute('disabled', true);
           document.querySelector('html').setAttribute('dir', 'rtl');
         } else {
           var linkRTL = document.getElementById('style-rtl');
           var userLinkRTL = document.getElementById('user-style-rtl');
           linkRTL.setAttribute('disabled', true);
           userLinkRTL.setAttribute('disabled', true);
         }
      </script>
   </head>
   <body class="overflow-hidden">
      <!-- ===============================================-->
      <!--    Main Content-->
      <!-- ===============================================-->
      <main class="main" id="top">
         <div class="container-fluid" data-layout="container-fluid">
            <script>
               var isFluid = JSON.parse(localStorage.getItem('isFluid'));
               if (isFluid) {
                 var container = document.querySelector('[data-layout]');
                 container.classList.remove('container');
                 container.classList.add('container-fluid');
               }
            </script>
            <nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
               <script>
                  var navbarStyle = localStorage.getItem("navbarStyle");
                  if (navbarStyle && navbarStyle !== 'transparent') {
                    document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
                  }
               </script>
               {{-- 
               <div class="d-flex align-items-center">
                  <div class="toggle-icon-wrapper">
                     <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
                  </div>
                  <a class="navbar-brand" href="../index.html">
                     <div class="d-flex align-items-center py-3"><img class="me-2" src="../assets/img/icons/spot-illustrations/falcon.png" alt="" width="40" /><span class="font-sans-serif">falcon</span>
                     </div>
                  </a>
               </div>
               --}}
               <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
                  <div class="navbar-vertical-content scrollbar">
                    <div class="p-4">
                     <a href="{{ route('hrDashboard') }}">Back</a>
                    </div>
                  </div>
               </div>
            </nav>
            <div class="content">
               <div class="row">
                  <div class="col-12">
                     @if ($projectsss->isEmpty())
                     @else
                     @foreach ($projectsss as $projectname)
                     @endforeach
                     <div class="mt-4">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                           <li class="nav-item"><a class="nav-link active ps-0" id="board-tab" data-bs-toggle="tab" href="#tab-board" role="tab" aria-controls="tab-board" aria-selected="true">Task board</a></li>
                           <li class="nav-item"><a class="nav-link px-2 px-md-3" id="projectsummary-tab" data-bs-toggle="tab" href="#tab-projectsummary" role="tab" aria-controls="tab-projectsummary" aria-selected="false">Project summary</a></li>
                           <li class="nav-item"><a class="nav-link px-2 px-md-3" id="timeline-tab" data-bs-toggle="tab" href="#tab-timeline" role="tab" aria-controls="tab-timeline" aria-selected="false">Timeline</a></li>
                           <li class="nav-item"><a class="nav-link px-2 px-md-3" id="list-tab" data-bs-toggle="tab" href="#tab-list" role="tab" aria-controls="tab-list" aria-selected="false">List</a></li>
                           <li class="nav-item"><a class="nav-link px-2 px-md-3" id="issue-tab" data-bs-toggle="tab" href="#tab-issue" role="tab" aria-controls="tab-issue" aria-selected="false">Issues</a></li>
                           <li class="nav-item"><a class="nav-link px-2 px-md-3" id="report-tab" data-bs-toggle="tab" href="#tab-report" role="tab" aria-controls="tab-report" aria-selected="false">Reports</a></li>
                           <li class="nav-item"><a class="nav-link px-2 px-md-3" id="projectsetting-tab" data-bs-toggle="tab" href="#tab-projectsetting" role="tab" aria-controls="tab-projectsetting" aria-selected="false">Project setting</a></li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                           <div class="tab-pane fade show active py-3 h-100" id="tab-board" role="tabpanel" aria-labelledby="board-tab">
                              <div class="mt-3 h-100" style="overflow-y:scroll">
                                 <div class="row gx-0 kanban-header rounded-2 px-card py-2 mt-2 mb-3">
                                    <div class="col d-flex align-items-center">
                                       @foreach ($projectsss as $protask)
                                       @endforeach
                                       <h5 class="mb-0">{{ $protask->project_name }}</h5>
                                       {{-- 
                                       <div class="vertical-line vertical-line-400 position-relative h-100 mx-3"></div>
                                       <div class="vertical-line vertical-line-400 position-relative h-100 mx-3 d-none d-md-flex"></div>
                                       --}}
                                    </div>
                                 </div>
                                 <div class="kanban-container scrollbar me-n3">
                                    @if ($task_list->isEmpty())
                                    @else
                                    @foreach ($task_list as $boardname)
                                    <div class="kanban-column">
                                       <div class="kanban-column-header">
                                          <h5 class="fs-0 mb-0">{{ $boardname->task_list_name }}</h5>
                                          <div class="dropdown font-sans-serif btn-reveal-trigger">
                                             <button class="btn btn-sm btn-reveal py-0 px-2" type="button" id="kanbanColumn1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h"></span></button>
                                             <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="kanbanColumn1">
                                                <a class="dropdown-item" href="{{ route('taskPage',$boardname->id) }}">Add Card</a><a class="dropdown-item" href="{{ route('projectEditCardBoard',$boardname->id) }}">Edit</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger" href="{{ route('removeTaskBoard',$boardname->id) }}">Remove</a>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="kanban-items-container scrollbar" style="height: 650px;">
                                          @if ($tasks->isEmpty())
                                          @else
                                          @foreach ($tasks->where('task_list_name', $boardname->task_list_name) as $abcde)
                                          <div class="kanban-item">
                                             <div class="card kanban-item-card hover-actions-trigger">
                                                <div class="card-body">
                                                   <div class="position-relative">
                                                      <div class="dropdown font-sans-serif">
                                                         <button class="btn btn-sm btn-falcon-default kanban-item-dropdown-btn hover-actions" type="button" data-boundary="viewport" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h" data-fa-transform="shrink-2"></span></button>
                                                         <div class="dropdown-menu dropdown-menu-end py-0">
                                                            <a class="dropdown-item" href="{{ route('taskdetails',$abcde->id)}}">Details</a><a class="dropdown-item" href="{{ route('editTaskPage',$abcde->id) }}">Edit</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-danger" href="{{ route('removeTask',$abcde->id) }}">Remove</a>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="mb-2">
                                                      @if ($abcde->task_priority == 'high')
                                                      <span class="badge py-1 me-1 mb-1 badge-soft-danger">High</span>
                                                      @elseif($abcde->task_priority == 'medium')
                                                      <span class="badge py-1 me-1 mb-1 badge-soft-warning">Medium</span>
                                                      @else 
                                                      <span class="badge py-1 me-1 mb-1 badge-soft-success">Low</span>
                                                      @endif
                                                   </div>
                                                   <h5 class="mb-0 fw-medium font-sans-serif stretched-link pe-5">{{ $abcde->task_name }}</h5>
                                                   <p class="mb-3 mt-3 fw-medium font-sans-serif stretched-link pe-5" style="font-size: 10px;">{{ $abcde->task_details }}</p>
                                                   <div class="kanban-item-footer cursor-default">
                                                      <div class="text-500 z-index-2"><span class="me-2" data-bs-toggle="tooltip" title="Attachments"></span><span class="me-2" data-bs-toggle="tooltip" title="Checklist"><span class="fas fa-clock me-1"></span><span>{{ \Carbon\Carbon::parse($abcde->due_date)->format('M,d Y') }}</span></span>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          @endforeach  
                                          @endif
                                       </div>
                                       <div class="kanban-column-footer">
                                          <a href="{{ route('taskPage',$boardname->id) }}" class="btn btn-link btn-sm d-block w-100 btn-add-card text-decoration-none text-600"><span class="fas fa-plus me-2"></span>Add Task</a>
                                       </div>
                                    </div>
                                    {{--  --}}
                                    @endforeach
                                    @endif
                                    <div class="kanban-column">
                                       <div class="collapse bg-100 p-card rounded-lg transition-none" id="addListForm">
                                          @foreach ($projectsss as $projectnamess)
                                          @endforeach
                                          <form action="{{ route('createTaskList') }}" method="post">
                                             @csrf
                                             <textarea class="form-control mb-2" data-input="add-list" name="task_list_name" rows="2" placeholder="Enter list title..."></textarea>
                                             <input type="text" class="form-control d-none" name="projectid" value="{{ $projectnamess->id }}">
                                             <div class="row gx-2">
                                                <div class="col">
                                                   <button class="btn btn-primary btn-sm d-block w-100" type="submit">Add</button>
                                                </div>
                                                <div class="col">
                                                   <button class="btn btn-outline-secondary btn-sm d-block w-100 border-400" type="button" data-dismiss="collapse">Cancel</button>
                                                </div>
                                             </div>
                                          </form>
                                       </div>
                                       <button class="btn d-block w-5 btn-secondary bg-400 border-400" data-bs-toggle="collapse" data-bs-target="#addListForm" aria-expanded="false" aria-controls="addListForm"><span class="fas fa-plus me-1"> </span></button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane fade bg-light py-3 scroll" id="tab-projectsummary" role="tabpanel" aria-labelledby="projectsummary-tab" style="overflow-y:scroll;height:100%;">
                              <div  class="mt-3 h-100" style="overflow-y:scroll">
                                 <p class="text-center mt-4 mb-2" style="font-size: 20px">Wellcome : {{ Auth::guard('employee')->user()->employee_name }}</p>
                                 @foreach ($projectsss as $projectInformations)
                                 @endforeach
                                 <p class="text-center my-2">Here's where you'll view a summary of {{ $projectInformations->project_name }}'s status, priorities, workload, and more.</p>
                                 <p class="text-center my-2">Project Details: <span>{{ $projectInformations->employee_name }} at {{ \Carbon\Carbon::parse($projectInformations->created_at)->format('M,d Y') }} </span></p>
                                 <div class="container">
                                    <div class="row mt-4 px-5 py-2">
                                       <div class="col-lg-6 px-3 mb-4">
                                          <div class="p-3" style="border: 1px solid lightgray;border-radius:15px;margin-top:-15px;">
                                             <b>Status overview</b>
                                             <p>Get a snapshot of the status of your items. <span><a href="">View all items</a></span></p>
                                             <hr>
                                             {{-- 
                                             <div class="programming-stats w-100 px-5" style="margin-top:10px;height:228px;">
                                                <div class="chart-container">
                                                   <canvas class="my-chart"></canvas>
                                                </div>
                                                <div class="details">
                                                   <ul></ul>
                                                </div>
                                             </div>
                                             --}}
                                             {{--  --}}
                                             {{-- 
                                             <div id="container" style="height: 225px;"></div>
                                             --}}
                                          </div>
                                       </div>
                                       <div class="col-lg-6 mb-4">
                                          @if ($recentActivity->isEmpty())
                                          @else
                                          <div class="p-3" style="border: 1px solid lightgray; border-radius: 15px;margin-top:-15px;">
                                             <b>Recent Activities</b>
                                             <hr>
                                             <div style="overflow-y: scroll; height: 250px; margin-top: 10px;">
                                                @foreach ($recentActivity as $recentActivities)
                                                <div class="d-flex">
                                                   {{--  --}}
                                                   <img class="mt-2" src="{{ Auth::guard('employee')->user()->image }}" alt="" style="width:35px;height:35px;border-radius:50%">
                                                   {{--  --}}
                                                   <p class="mx-3" style="margin: 12px 0px 0px 0px; font-size:12px">{{ Auth::guard('employee')->user()->employee_name }}:</p>
                                                   {{--  --}}
                                                   <div class="d-flex align-items-center py-3 px-2 mt-2" style="border-radius: 10px;max-width: 400px;background-color:lightgray">
                                                      <div class="d-flex flex-column align-items-center">
                                                         <p class="date-and-time">
                                                            {{ \Carbon\Carbon::parse($recentActivities->created_at)->format('M,d Y') }} at {{ \Carbon\Carbon::parse($recentActivities->created_at)->format('h:i:s') }} <span class="px-1 history-block">History</span>
                                                         </p>
                                                         <p class="py-2 mx-3" style="font-size:12px"><a href="{{ route('taskdetails',$recentActivities->id) }}">{{ $recentActivities->task_name }}</a> {{ $recentActivities->activity_message }}</p>
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
                                                   <img class="mt-2" src="{{ Auth::guard('employee')->user()->image }}" alt="" style="width:35px;height:35px;border-radius:50%">
                                                   {{--  --}}
                                                   <p class="mx-3max-" style="margin: 12px 0px 0px 0px; font-size:12px">{{ Auth::guard('employee')->user()->employee_name }}:</p>
                                                   {{--  --}}
                                                   <div class="d-flex align-items-center py-3 px-2 mt-2" style="border-radius: 10px; max-width: 400px;background-color:lightgray">
                                                      <div class="d-flex flex-column align-items-center">
                                                         <p class="date-and-time">
                                                            {{ \Carbon\Carbon::parse($childRecentActivities->created_at)->format('M,d Y') }} at {{ \Carbon\Carbon::parse($childRecentActivities->created_at)->format('h:i:s') }} <span class="px-1 history-block">History</span>
                                                         </p>
                                                         <p class="py-2 mx-3" style="font-size:12px"><a href="{{ route('taskChilddetails',$childRecentActivities->id) }}">{{ $childRecentActivities->child_task_name }}</a> {{ $childRecentActivities->activity_message }}</p>
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
                                       <div class="col-lg-6 mb-4">
                                          <div class="p-3" style="border: 1px solid lightgray;border-radius:15px;margin-top:-15px;">
                                             <b>Team workload</b>
                                             <p>Oversee the capacity of your team.</p>
                                             <hr>
                                             <div class="d-flex" style="height: 255px;overflow-y:scroll">
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
                                       @if ($taskType->isEmpty())    
                                       @else
                                       <div class="col-lg-6 mb-4">
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
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane fade" id="tab-timeline" role="tabpanel" aria-labelledby="timeline-tab">
                              <div class="card-body p-0 management-calendar">
                                 <div class="row g-3">
                                    <div class="col-md-7">
                                       <div class="p-card">
                                          <div class="d-flex justify-content-between">
                                             <div class="order-md-1">
                                                <button class="btn btn-sm border me-1 shadow-sm" type="button" data-event="prev" data-bs-toggle="tooltip" title="" data-bs-original-title="Previous" aria-label="Previous">
                                                   <svg class="svg-inline--fa fa-chevron-left fa-w-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                                      <path fill="currentColor" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"></path>
                                                   </svg>
                                                   <!-- <span class="fas fa-chevron-left"></span> Font Awesome fontawesome.com -->
                                                </button>
                                                <button class="btn btn-sm text-secondary border px-sm-4 shadow-sm" type="button" data-event="today">Today</button>
                                                <button class="btn btn-sm border ms-1 shadow-sm" type="button" data-event="next" data-bs-toggle="tooltip" title="" data-bs-original-title="Next" aria-label="Next">
                                                   <svg class="svg-inline--fa fa-chevron-right fa-w-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                                      <path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path>
                                                   </svg>
                                                   <!-- <span class="fas fa-chevron-right"></span> Font Awesome fontawesome.com -->
                                                </button>
                                             </div>
                                             <button class="btn btn-sm text-primary border order-md-0" type="button" data-bs-toggle="modal" data-bs-target="#addEventModal">
                                                <svg class="svg-inline--fa fa-plus fa-w-14 me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                                   <path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                                                </svg>
                                                <!-- <span class="fas fa-plus me-2"></span> Font Awesome fontawesome.com -->New Schedule
                                             </button>
                                          </div>
                                       </div>
                                       <!-- Find the JS file for the following calendar at: src/js/calendar/management-calendar.js-->
                                       <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
                                       <div class="calendar-outline px-3 fc fc-media-screen fc-direction-ltr fc-theme-standard fc-liquid-hack" id="managementAppCalendar" data-calendar-option="{&quot;title&quot;:&quot;management-calendar-title&quot;,&quot;day&quot;:&quot;management-calendar-day&quot;,&quot;events&quot;:&quot;management-calendar-events&quot;}" style="height: 360px;">
                                          <div class="fc-view-harness fc-view-harness-active">
                                             <div class="fc-daygrid fc-dayGridMonth-view fc-view">
                                                <table class="fc-scrollgrid  fc-scrollgrid-liquid">
                                                   <tbody>
                                                      <tr class="fc-scrollgrid-section fc-scrollgrid-section-header ">
                                                         <td>
                                                            <div class="fc-scroller-harness">
                                                               <div class="fc-scroller" style="overflow: hidden;">
                                                                  <table class="fc-col-header " style="width: 423px;">
                                                                     <colgroup></colgroup>
                                                                     <tbody>
                                                                        <tr>
                                                                           <th class="fc-col-header-cell fc-day fc-day-sun">
                                                                              <div class="fc-scrollgrid-sync-inner"><a class="fc-col-header-cell-cushion ">Sun</a></div>
                                                                           </th>
                                                                           <th class="fc-col-header-cell fc-day fc-day-mon">
                                                                              <div class="fc-scrollgrid-sync-inner"><a class="fc-col-header-cell-cushion ">Mon</a></div>
                                                                           </th>
                                                                           <th class="fc-col-header-cell fc-day fc-day-tue">
                                                                              <div class="fc-scrollgrid-sync-inner"><a class="fc-col-header-cell-cushion ">Tue</a></div>
                                                                           </th>
                                                                           <th class="fc-col-header-cell fc-day fc-day-wed">
                                                                              <div class="fc-scrollgrid-sync-inner"><a class="fc-col-header-cell-cushion ">Wed</a></div>
                                                                           </th>
                                                                           <th class="fc-col-header-cell fc-day fc-day-thu">
                                                                              <div class="fc-scrollgrid-sync-inner"><a class="fc-col-header-cell-cushion ">Thu</a></div>
                                                                           </th>
                                                                           <th class="fc-col-header-cell fc-day fc-day-fri">
                                                                              <div class="fc-scrollgrid-sync-inner"><a class="fc-col-header-cell-cushion ">Fri</a></div>
                                                                           </th>
                                                                           <th class="fc-col-header-cell fc-day fc-day-sat">
                                                                              <div class="fc-scrollgrid-sync-inner"><a class="fc-col-header-cell-cushion ">Sat</a></div>
                                                                           </th>
                                                                        </tr>
                                                                     </tbody>
                                                                  </table>
                                                               </div>
                                                            </div>
                                                         </td>
                                                      </tr>
                                                      <tr class="fc-scrollgrid-section fc-scrollgrid-section-body  fc-scrollgrid-section-liquid">
                                                         <td>
                                                            <div class="fc-scroller-harness fc-scroller-harness-liquid">
                                                               <div class="fc-scroller fc-scroller-liquid-absolute" style="overflow: hidden auto;">
                                                                  <div class="fc-daygrid-body fc-daygrid-body-unbalanced " style="width: 423px;">
                                                                     <table class="fc-scrollgrid-sync-table" style="width: 423px; height: 314px;">
                                                                        {{-- <colgroup></colgroup> --}}
                                                                        <tbody>
                                                                           <tr>
                                                                              <td class="fc-daygrid-day fc-day fc-day-sun fc-day-past fc-day-other" data-date="2023-11-26">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">26</a></div>

                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-mon fc-day-past fc-day-other" data-date="2023-11-27">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">27</a></div>

                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-tue fc-day-past fc-day-other" data-date="2023-11-28">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">28</a></div>

                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-wed fc-day-past fc-day-other" data-date="2023-11-29">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">29</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-thu fc-day-past fc-day-other" data-date="2023-11-30">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">30</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-fri fc-day-past" data-date="2023-12-01">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">1</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-sat fc-day-past" data-date="2023-12-02">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">2</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                           </tr>
                                                                           <tr>
                                                                              <td class="fc-daygrid-day fc-day fc-day-sun fc-day-past" data-date="2023-12-03">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">3</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-mon fc-day-today " data-date="2023-12-04">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">4</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-tue fc-day-future" data-date="2023-12-05">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">5</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-wed fc-day-future" data-date="2023-12-06">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">6</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-thu fc-day-future" data-date="2023-12-07">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">7</a></div>   
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-fri fc-day-future" data-date="2023-12-08">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">8</a></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-sat fc-day-future" data-date="2023-12-09">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">9</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                           </tr>
                                                                           <tr>
                                                                              <td class="fc-daygrid-day fc-day fc-day-sun fc-day-future" data-date="2023-12-10">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">10</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-mon fc-day-future" data-date="2023-12-11">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">11</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-tue fc-day-future" data-date="2023-12-12">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">12</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-wed fc-day-future" data-date="2023-12-13">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">13</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-thu fc-day-future" data-date="2023-12-14">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">14</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-fri fc-day-future" data-date="2023-12-15">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">15</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-sat fc-day-future" data-date="2023-12-16">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">16</a></div>
                                                                                    
                                                                                 </div>
                                                                              </td>
                                                                           </tr>
                                                                           <tr>
                                                                              <td class="fc-daygrid-day fc-day fc-day-sun fc-day-future" data-date="2023-12-17">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">17</a></div>
                                                                                    
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-mon fc-day-future" data-date="2023-12-18">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">18</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-tue fc-day-future" data-date="2023-12-19">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">19</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-wed fc-day-future" data-date="2023-12-20">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">20</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-thu fc-day-future" data-date="2023-12-21">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">21</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-fri fc-day-future" data-date="2023-12-22">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">22</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-sat fc-day-future" data-date="2023-12-23">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">23</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                           </tr>
                                                                           <tr>
                                                                              <td class="fc-daygrid-day fc-day fc-day-sun fc-day-future" data-date="2023-12-24">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">24</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-mon fc-day-future" data-date="2023-12-25">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">25</a></div>
                                                                                    
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-tue fc-day-future" data-date="2023-12-26">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">26</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-wed fc-day-future" data-date="2023-12-27">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">27</a></div>
                                                                                  
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-thu fc-day-future" data-date="2023-12-28">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">28</a></div>
                                                                                    
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-fri fc-day-future" data-date="2023-12-29">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">29</a></div>
                                                                                    
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-sat fc-day-future" data-date="2023-12-30">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">30</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                           </tr>
                                                                           <tr>
                                                                              <td class="fc-daygrid-day fc-day fc-day-sun fc-day-future" data-date="2023-12-31">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">31</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-mon fc-day-future fc-day-other" data-date="2024-01-01">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">1</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-tue fc-day-future fc-day-other" data-date="2024-01-02">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">2</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-wed fc-day-future fc-day-other" data-date="2024-01-03">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">3</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-thu fc-day-future fc-day-other" data-date="2024-01-04">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">4</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-fri fc-day-future fc-day-other" data-date="2024-01-05">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">5</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                              <td class="fc-daygrid-day fc-day fc-day-sat fc-day-future fc-day-other" data-date="2024-01-06">
                                                                                 <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                                    <div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">6</a></div>
                                                                                    <div class="fc-daygrid-day-events">
                                                                                       <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                                                                    </div>
                                                                                    <div class="fc-daygrid-day-bg"></div>
                                                                                 </div>
                                                                              </td>
                                                                           </tr>
                                                                        </tbody>
                                                                     </table>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-5 bg-light pt-3">
                                       <div class="px-3">
                                          <h4 class="mb-0 fs-0 fs-sm-1 fs-lg-2" id="management-calendar-title">December 2023</h4>
                                          <p class="text-500 mb-0" id="management-calendar-day">Monday</p>
                                          <ul class="list-unstyled mt-3 scrollbar management-calendar-events" id="management-calendar-events">
                                             <li class="border-top pt-3 mb-3 pb-1 cursor-pointer" data-calendar-events="">
                                                <div class="border-start border-3 border-primary ps-3 mt-1">
                                                   <h6 class="mb-1 fw-semi-bold text-700">Monthly team meeting for Falcon React Project</h6>
                                                   <p class="fs--2 text-600 mb-0">07 Dec, 2023 - 10 Dec, 2023</p>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane fade" id="tab-list" role="tabpanel" aria-labelledby="list-tab">
                              <div class="container p-5">
                                 <h3 class="py-2 px-3">Tasks details</h3>
                                 <hr>
                                 <table class="table">
                                    <thead>
                                       <tr>
                                          <th scope="col" style="text-align:center;">id</th>
                                          <th scope="col" style="text-align:center;">Summary</th>
                                          <th scope="col" style="text-align:center;">Status</th>
                                          <th scope="col" style="text-align:center;">Assignee</th>
                                          <th scope="col" style="text-align:center;">Due date</th>
                                          <th scope="col" style="text-align:center;">Priority</th>
                                          <th scope="col" style="text-align:center;">Created</th>
                                          <th scope="col" style="text-align:center;">Updated</th>
                                          <th scope="col" style="text-align:center;">Reporter</th>
                                       </tr>
                                    </thead>
                                    @if ($parentProjects->isEmpty())
                                    @else
                                    <tbody>
                                       @foreach ($parentProjects as $parentProject)
                                       <tr>
                                          <th scope="row" style="text-align:center;">{{ $parentProject->id }}</th>
                                          <td style="text-align:center;overflow-x:scroll">{{ $parentProject->task_details }}</td>
                                          <td style="text-align:center;"><span class="px-3 py-1 bg-inverse-warning" style="border-radius: 4px">{{ $parentProject->task_list_name }}</span></td>
                                          <td style="text-align:center;">{{ $parentProject->employee_name }}</td>
                                          <td style="text-align:center;"><span class="px-3 py-1 bg-inverse-danger" style="border-radius: 4px">{{ \Carbon\Carbon::parse($parentProject->due_date)->format('M,d Y') }}</span></td>
                                          <td style="text-align:center;"><span class="px-3 py-1 bg-inverse-warning" style="border-radius: 4px">
                                             @if ($parentProject->task_priority == 'high')
                                             <i class="fas fa-angle-up text-primary"></i>
                                             @elseif ($parentProject->task_priority == 'medium')
                                             <i class="fas fa-grip-lines text-warning"></i>
                                             @else
                                             <i class="fas fa-angle-down text-primary"></i>
                                             @endif
                                          </td>
                                          <td style="text-align:center;"><span class="px-3 py-1 bg-inverse-warning" style="border-radius: 4px">{{ \Carbon\Carbon::parse($parentProject->created_at)->format('M,d Y') }}</span></td>
                                          <td style="text-align:center;"><span class="px-3 py-1 bg-inverse-warning" style="border-radius: 4px">{{ \Carbon\Carbon::parse($parentProject->updated_at)->format('M,d Y') }}</span></td>
                                          <td style="text-align:center;">{{ $parentProject->employee_name }}</td>
                                       </tr>
                                       @endforeach
                                    </tbody>
                                    @endif
                                 </table>
                              </div>
                           </div>
                           <div class="tab-pane fade" id="tab-issue" role="tabpanel" aria-labelledby="issue-tab">
                              <div class="container p-5">
                                 <h3 class="py-2 px-3">Tasks Issue/Child Tasks</h3>
                                 <hr>
                                 <table class="table">
                                    <thead>
                                       <tr>
                                          <th scope="col" style="text-align:center;">Issue Id</th>
                                          <th scope="col" style="text-align:center;">Child task name</th>
                                          <th scope="col" style="text-align:center;">Parent task name</th>
                                          <th scope="col" style="text-align:center;">Summary</th>
                                          <th scope="col" style="text-align:center;">Creater name</th>
                                          <th scope="col" style="text-align:center;">Priority</th>
                                          <th scope="col" style="text-align:center;">Created at</th>
                                          <th scope="col" style="text-align:center;">Updated at</th>
                                          <th scope="col" style="text-align:center;">Operation</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @if ($childTaskes->isEmpty())
                                       @else
                                       @foreach ($childTaskes as $childTasksss)
                                       <tr>
                                          <td style="text-align:center;">{{ $childTasksss->id }}</td>
                                          <td style="text-align:center;">{{ $childTasksss->child_task_name }}</td>
                                          <td style="text-align:center;">{{ $childTasksss->task_name }}</td>
                                          <td style="text-align:center;">{{ $childTasksss->task_details }}</td>
                                          <td style="text-align:center;">{{ $childTasksss->employee_name }}</td>
                                          <td style="text-align:center;"><span class="px-3 py-1 bg-inverse-warning" style="border-radius: 4px">
                                             @if ($parentProject->task_priority == 'high')
                                             <i class="fas fa-angle-up text-primary"></i>
                                             @elseif ($parentProject->task_priority == 'medium')
                                             <i class="fas fa-grip-lines text-warning"></i>
                                             @else
                                             <i class="fas fa-angle-down text-primary"></i>
                                             @endif
                                          </td>
                                          <td style="text-align:center;"><span class="px-3 py-1 bg-inverse-warning" style="border-radius: 4px">{{ \Carbon\Carbon::parse($childTasksss->created_at)->format('M,d Y') }}</span></td>
                                          <td style="text-align:center;"><span class="px-3 py-1 bg-inverse-warning" style="border-radius: 4px">{{ \Carbon\Carbon::parse($childTasksss->updated_at)->format('M,d Y') }}</span></td>
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
                           <div class="tab-pane fade" id="tab-report" role="tabpanel" aria-labelledby="report-tab">
                              <h1>Report</h1>
                           </div>
                           <div class="tab-pane fade" id="tab-projectsetting" role="tabpanel" aria-labelledby="projectsetting-tab">
                              <div class="container p-5">
                                 <h3 class="py-2 px-3">Project Setting</h3>
                                 <hr>
                                 <div class="container">
                                    <div class="row">
                                       <div class="col-12 p-3">
                                          <ul class="nav nav-tabs" id="myTabss" role="tablist">
                                             <li class="nav-item"><a class="nav-link active ps-0" id="updateProject-tab" data-bs-toggle="tab" href="#tab-updateProject" role="tab" aria-controls="tab-updateProject" aria-selected="true">Details</a></li>
                                             {{--  --}}
                                             <li class="nav-item"><a class="nav-link ps-0" id="access-tab" data-bs-toggle="tab" href="#tab-access" role="tab" aria-controls="tab-access" aria-selected="true">Members</a></li>
                                             {{--  --}}
                                             <li class="nav-item"><a class="nav-link ps-0" id="issueType-tab" data-bs-toggle="tab" href="#tab-issueType" role="tab" aria-controls="tab-issueType" aria-selected="true">Issue Types</a></li>
                                          </ul>
                                          <div class="tab-content" id="myTabssContent">
                                             <div class="tab-pane fade show active py-3 h-100" id="tab-updateProject" role="tabpanel" aria-labelledby="updateProject-tab">
                                                <div class="container-fluid px-5">
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
                                                   <h3 class="py-5 text-center">Update projects</h3>
                                                   <div class="container">
                                                      @foreach ($selectProjects as $projectss)
                                                      @endforeach
                                                      <form action="{{ route('updateProject',$projectss->id) }}" method="post">
                                                         @csrf
                                                         @method('PUT')
                                                         <div class="row">
                                                            <div class="col-6 py-2 px-3">
                                                               <label class="text-center" for="">Project Name:</label>
                                                               @foreach ($selectProjects as $projectLeader)
                                                               @endforeach
                                                               <input name="updateprojectname" id="updateprojectname" class="form-control" type="text" value="{{ $projectLeader->project_name }}">
                                                               <input name="updateprojectid" class="form-control d-none" type="text" value="{{ $projectLeader->id }}">
                                                            </div>
                                                            <div class="col-6 py-2 px-3">
                                                               <label class="text-center" for="">Project lead:</label>
                                                               <input class="form-control" type="text" value="{{ $projectLeader->employee_name }}" disabled>
                                                            </div>
                                                            <div class="py-2">
                                                               <button class="btn btn-danger" id="changeUpdate" type="submit" disabled>Update Changes</button>
                                                            </div>
                                                            <script>
                                                               document.getElementById('updateprojectname').addEventListener('input', function () {
                                                                   var changeUpdateButton = document.getElementById('changeUpdate');
                                                                   changeUpdateButton.disabled = this.value.trim() === ''; // Disable button if input is empty
                                                               });
                                                            </script>
                                                         </div>
                                                      </form>
                                                   </div>
                                                </div>
                                             </div>
                                             {{--  --}}
                                             <div class="tab-pane fade py-3 h-100" id="tab-access" role="tabpanel" aria-labelledby="access-tab">
                                                <div class="container-fluid px-5">
                                                   <h3 class="py-2 text-center">User List</h3>
                                                   <div class="container">
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
                                             <div class="tab-pane fade py-3 h-100" id="tab-issueType" role="tabpanel" aria-labelledby="issueType-tab">
                                                <div class="container p-5">
                                                   <div>
                                                      <h3 class="py-2 px-3">Tasks Type</h3>
                                                   </div>
                                                   {{--  --}}
                                                   <div>
                                                      <a href="" class="btn d-block w-5 btn-secondary bg-400 border-400" data-bs-toggle="collapse" data-bs-target="#addTasksTypeForm" aria-expanded="false" aria-controls="addTasksTypeForm">
                                                      Add task type
                                                      </a>
                                                      <div class="collapse bg-100 p-card rounded-lg transition-none" id="addTasksTypeForm">
                                                         @foreach ($projectsss as $projectnamess)
                                                         @endforeach
                                                         <form action="{{ route('addTaskType') }}" method="post">
                                                            @csrf
                                                            <label class="col-form-label">Task type name</label>
                                                            <textarea class="form-control mb-2" data-input="add-list" name="taskstypename" rows="2" placeholder="Enter list title..."></textarea>
                                                            <input type="text" class="form-control d-none" name="taskstypeprojectid" value="{{ $projectnamess->id }}">
                                                            <div class="row gx-2">
                                                               <div class="col">
                                                                  <button class="btn btn-primary btn-sm d-block w-100" type="submit">Add</button>
                                                               </div>
                                                               <div class="col">
                                                                  <button class="btn btn-outline-secondary btn-sm d-block w-100 border-400" type="button" data-dismiss="collapse">Cancel</button>
                                                               </div>
                                                            </div>
                                                         </form>
                                                      </div>
                                                   </div>
                                                   {{--  --}}
                                                   <hr>
                                                   <div class="container">
                                                      <table class="table px-3 mt-2">
                                                         <thead>
                                                            <tr>
                                                               <th scope="col" class="text-center">Task id</th>
                                                               <th scope="col" class="text-center">Tasks type name</th>
                                                               <th scope="col" class="text-center">operation</th>
                                                            </tr>
                                                         </thead>
                                                         <tbody>
                                                            @if ($taskType->isEmpty())
                                                            @else
                                                            @foreach ($taskType as $users)
                                                            <tr>
                                                               <th scope="row" class="text-center">{{ $users->id }}</th>
                                                               <td class="text-center">{{ $users->tasks_type_name }}</td>
                                                               <td class="text-center">
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
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        {{-- models --}}
                        <div class="modal fade" id="authentication-modal" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label" aria-hidden="true">
                           <div class="modal-dialog mt-6" role="document">
                              <div class="modal-content border-0">
                                 <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                                    <div class="position-relative z-index-1 light">
                                       <h4 class="mb-0 text-white" id="authentication-modal-label">Register</h4>
                                       <p class="fs--1 mb-0 text-white">Please create your free Falcon account</p>
                                    </div>
                                    <button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
                                 </div>
                                 <div class="modal-body py-4 px-5">
                                    <form>
                                       <div class="mb-3">
                                          <label class="form-label" for="modal-auth-name">Name</label>
                                          <input class="form-control" type="text" autocomplete="on" id="modal-auth-name" />
                                       </div>
                                       <div class="mb-3">
                                          <label class="form-label" for="modal-auth-email">Email address</label>
                                          <input class="form-control" type="email" autocomplete="on" id="modal-auth-email" />
                                       </div>
                                       <div class="row gx-2">
                                          <div class="mb-3 col-sm-6">
                                             <label class="form-label" for="modal-auth-password">Password</label>
                                             <input class="form-control" type="password" autocomplete="on" id="modal-auth-password" />
                                          </div>
                                          <div class="mb-3 col-sm-6">
                                             <label class="form-label" for="modal-auth-confirm-password">Confirm Password</label>
                                             <input class="form-control" type="password" autocomplete="on" id="modal-auth-confirm-password" />
                                          </div>
                                       </div>
                                       <div class="form-check">
                                          <input class="form-check-input" type="checkbox" id="modal-auth-register-checkbox" />
                                          <label class="form-label" for="modal-auth-register-checkbox">I accept the <a href="#!">terms </a>and <a href="#!">privacy policy</a></label>
                                       </div>
                                       <div class="mb-3">
                                          <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Register</button>
                                       </div>
                                    </form>
                                    <div class="position-relative mt-5">
                                       <hr class="bg-300" />
                                       <div class="divider-content-center">or register with</div>
                                    </div>
                                    <div class="row g-2 mt-2">
                                       <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> google</a></div>
                                       <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" href="#"><span class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> facebook</a></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="kanban-modal-label-1" aria-hidden="true" id="kanban-modal-1">
                           <div class="modal-dialog modal-lg mt-6" role="document">
                              <div class="modal-content border-0">
                                 <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                                 </div>
                                 <div class="modal-body p-0">
                                    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                                       <h4 class="mb-1" id="kanban-modal-label-1">Add a new illustration to the landing page</h4>
                                       <p class="fs--2 mb-0">Added by <a class="link-600 fw-semi-bold" href="#!">Antony</a></p>
                                    </div>
                                    <div class="p-4">
                                       <div class="row">
                                          <div class="col-lg-9">
                                             <div class="d-flex">
                                                <span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-user" data-fa-transform="shrink-2"></i></span>
                                                <div class="flex-1">
                                                   <h5 class="mb-2 fs-0">Reviewers</h5>
                                                   <ul class="nav avatar-group mb-0">
                                                      <li class="nav-item dropdown"></li>
                                                      <li class="nav-item dropdown">
                                                         <a class="nav-link p-0 dropdown-toggle dropdown-caret-none" href="#" role="button" data-bs-toggle="dropdown">
                                                            <div class="avatar avatar-xl">
                                                               <img class="rounded-circle" src="../assets/img/team/1.jpg" alt="" />
                                                            </div>
                                                         </a>
                                                         <div class="dropdown-menu dropdown-md px-0 py-3">
                                                            <div class="d-flex align-items-center position-relative px-3">
                                                               <div class="avatar avatar-2xl me-2">
                                                                  <img class="rounded-circle" src="../assets/img/team/1.jpg" alt="" />
                                                               </div>
                                                               <div class="flex-1">
                                                                  <h6 class="mb-0"><a class="stretched-link text-900" href="../pages/user/profile.html">Anna Karinina</a></h6>
                                                                  <p class="mb-0 fs--2">Member</p>
                                                               </div>
                                                            </div>
                                                            <hr class="my-2" />
                                                            <a class="dropdown-item" href="#!">Member Rule</a><a class="dropdown-item text-danger" href="#!">Remove Member</a>
                                                         </div>
                                                      </li>
                                                      <li class="nav-item dropdown">
                                                         <a class="nav-link p-0 dropdown-toggle dropdown-caret-none ms-n1" href="#" role="button" data-bs-toggle="dropdown">
                                                            <div class="avatar avatar-xl">
                                                               <img class="rounded-circle" src="../assets/img/team/2.jpg" alt="" />
                                                            </div>
                                                         </a>
                                                         <div class="dropdown-menu dropdown-md px-0 py-3">
                                                            <div class="d-flex align-items-center position-relative px-3">
                                                               <div class="avatar avatar-2xl me-2">
                                                                  <img class="rounded-circle" src="../assets/img/team/2.jpg" alt="" />
                                                               </div>
                                                               <div class="flex-1">
                                                                  <h6 class="mb-0"><a class="stretched-link text-900" href="../pages/user/profile.html">Antony Hopkins</a></h6>
                                                                  <p class="mb-0 fs--2">Member</p>
                                                               </div>
                                                            </div>
                                                            <hr class="my-2" />
                                                            <a class="dropdown-item" href="#!">Member Rule</a><a class="dropdown-item text-danger" href="#!">Remove Member</a>
                                                         </div>
                                                      </li>
                                                      <li class="nav-item dropdown">
                                                         <a class="nav-link p-0 dropdown-toggle dropdown-caret-none ms-n1" href="#" role="button" data-bs-toggle="dropdown">
                                                            <div class="avatar avatar-xl">
                                                               <img class="rounded-circle" src="../assets/img/team/3.jpg" alt="" />
                                                            </div>
                                                         </a>
                                                         <div class="dropdown-menu dropdown-md px-0 py-3">
                                                            <div class="d-flex align-items-center position-relative px-3">
                                                               <div class="avatar avatar-2xl me-2">
                                                                  <img class="rounded-circle" src="../assets/img/team/3.jpg" alt="" />
                                                               </div>
                                                               <div class="flex-1">
                                                                  <h6 class="mb-0"><a class="stretched-link text-900" href="../pages/user/profile.html">Rowan Atkinson</a></h6>
                                                                  <p class="mb-0 fs--2">Member</p>
                                                               </div>
                                                            </div>
                                                            <hr class="my-2" />
                                                            <a class="dropdown-item" href="#!">Member Rule</a><a class="dropdown-item text-danger" href="#!">Remove Member</a>
                                                         </div>
                                                      </li>
                                                      <li class="nav-item dropdown">
                                                         <a class="nav-link p-0 dropdown-toggle dropdown-caret-none ms-n1" href="#" role="button" data-bs-toggle="dropdown">
                                                            <div class="avatar avatar-xl">
                                                               <img class="rounded-circle" src="../assets/img/team/4.jpg" alt="" />
                                                            </div>
                                                         </a>
                                                         <div class="dropdown-menu dropdown-md px-0 py-3">
                                                            <div class="d-flex align-items-center position-relative px-3">
                                                               <div class="avatar avatar-2xl me-2">
                                                                  <img class="rounded-circle" src="../assets/img/team/4.jpg" alt="" />
                                                               </div>
                                                               <div class="flex-1">
                                                                  <h6 class="mb-0"><a class="stretched-link text-900" href="../pages/user/profile.html">John Doe</a></h6>
                                                                  <p class="mb-0 fs--2">Member</p>
                                                               </div>
                                                            </div>
                                                            <hr class="my-2" />
                                                            <a class="dropdown-item" href="#!">Member Rule</a><a class="dropdown-item text-danger" href="#!">Remove Member</a>
                                                         </div>
                                                      </li>
                                                      <li class="nav-item dropdown">
                                                         <a class="nav-link p-0 dropdown-toggle dropdown-caret-none ms-n1" href="#" role="button" data-bs-toggle="dropdown">
                                                            <div class="avatar avatar-xl">
                                                               <img class="rounded-circle" src="../assets/img/team/5.jpg" alt="" />
                                                            </div>
                                                         </a>
                                                         <div class="dropdown-menu dropdown-md px-0 py-3">
                                                            <div class="d-flex align-items-center position-relative px-3">
                                                               <div class="avatar avatar-2xl me-2">
                                                                  <img class="rounded-circle" src="../assets/img/team/5.jpg" alt="" />
                                                               </div>
                                                               <div class="flex-1">
                                                                  <h6 class="mb-0"><a class="stretched-link text-900" href="../pages/user/profile.html">Emily Rose</a></h6>
                                                                  <p class="mb-0 fs--2">Member</p>
                                                               </div>
                                                            </div>
                                                            <hr class="my-2" />
                                                            <a class="dropdown-item" href="#!">Member Rule</a><a class="dropdown-item text-danger" href="#!">Remove Member</a>
                                                         </div>
                                                      </li>
                                                      <li class="nav-item dropdown">
                                                         <a class="nav-link p-0 dropdown-toggle dropdown-caret-none ms-n1" href="#" role="button" data-bs-toggle="dropdown">
                                                            <div class="avatar avatar-xl">
                                                               <img class="rounded-circle" src="../assets/img/team/6.jpg" alt="" />
                                                            </div>
                                                         </a>
                                                         <div class="dropdown-menu dropdown-md px-0 py-3">
                                                            <div class="d-flex align-items-center position-relative px-3">
                                                               <div class="avatar avatar-2xl me-2">
                                                                  <img class="rounded-circle" src="../assets/img/team/6.jpg" alt="" />
                                                               </div>
                                                               <div class="flex-1">
                                                                  <h6 class="mb-0"><a class="stretched-link text-900" href="../pages/user/profile.html">Marry Jane</a></h6>
                                                                  <p class="mb-0 fs--2">Member</p>
                                                               </div>
                                                            </div>
                                                            <hr class="my-2" />
                                                            <a class="dropdown-item" href="#!">Member Rule</a><a class="dropdown-item text-danger" href="#!">Remove Member</a>
                                                         </div>
                                                      </li>
                                                      <li class="nav-item dropdown">
                                                         <a class="nav-link dropdown-toggle dropdown-caret-none p-0 ms-n1" href="#" role="button" data-bs-toggle="dropdown">
                                                            <div class="avatar avatar-xl">
                                                               <div class="avatar-name rounded-circle avatar-button"><span><span class="fas fa-plus" data-fa-trasnsform="grow-2"></span></span></div>
                                                            </div>
                                                         </a>
                                                         <div class="dropdown-menu dropdown-md" data-list='{"valueNames":["name"]}'>
                                                            <h6 class="dropdown-header py-0 px-3 mb-0">Select Member</h6>
                                                            <div class="dropdown-divider"></div>
                                                            <form class="px-3 mb-2">
                                                               <input class="form-control form-control-sm search" type="text" placeholder="Search team member" />
                                                            </form>
                                                            <ul class="list-unstyled list">
                                                               <li>
                                                                  <a class="d-flex align-items-center text-decoration-none py-1 px-3" href="#!">
                                                                     <div class="avatar avatar-xl me-2">
                                                                        <img class="rounded-circle" src="../assets/img/team/1.jpg" alt="" />
                                                                     </div>
                                                                     <div class="flex-1">
                                                                        <h6 class="mb-0 link-900 name">Anna Karinina</h6>
                                                                     </div>
                                                                  </a>
                                                               </li>
                                                               <li>
                                                                  <a class="d-flex align-items-center text-decoration-none py-1 px-3" href="#!">
                                                                     <div class="avatar avatar-xl me-2">
                                                                        <img class="rounded-circle" src="../assets/img/team/2.jpg" alt="" />
                                                                     </div>
                                                                     <div class="flex-1">
                                                                        <h6 class="mb-0 link-900 name">Antony Hopkins</h6>
                                                                     </div>
                                                                  </a>
                                                               </li>
                                                               <li>
                                                                  <a class="d-flex align-items-center text-decoration-none py-1 px-3" href="#!">
                                                                     <div class="avatar avatar-xl me-2">
                                                                        <img class="rounded-circle" src="../assets/img/team/3.jpg" alt="" />
                                                                     </div>
                                                                     <div class="flex-1">
                                                                        <h6 class="mb-0 link-900 name">Rowan Atkinson</h6>
                                                                     </div>
                                                                  </a>
                                                               </li>
                                                               <li>
                                                                  <a class="d-flex align-items-center text-decoration-none py-1 px-3" href="#!">
                                                                     <div class="avatar avatar-xl me-2">
                                                                        <img class="rounded-circle" src="../assets/img/team/4.jpg" alt="" />
                                                                     </div>
                                                                     <div class="flex-1">
                                                                        <h6 class="mb-0 link-900 name">John Doe</h6>
                                                                     </div>
                                                                  </a>
                                                               </li>
                                                               <li>
                                                                  <a class="d-flex align-items-center text-decoration-none py-1 px-3" href="#!">
                                                                     <div class="avatar avatar-xl me-2">
                                                                        <img class="rounded-circle" src="../assets/img/team/5.jpg" alt="" />
                                                                     </div>
                                                                     <div class="flex-1">
                                                                        <h6 class="mb-0 link-900 name">Emily Rose</h6>
                                                                     </div>
                                                                  </a>
                                                               </li>
                                                               <li>
                                                                  <a class="d-flex align-items-center text-decoration-none py-1 px-3" href="#!">
                                                                     <div class="avatar avatar-xl me-2">
                                                                        <img class="rounded-circle" src="../assets/img/team/6.jpg" alt="" />
                                                                     </div>
                                                                     <div class="flex-1">
                                                                        <h6 class="mb-0 link-900 name">Marry Jane</h6>
                                                                     </div>
                                                                  </a>
                                                               </li>
                                                            </ul>
                                                         </div>
                                                      </li>
                                                   </ul>
                                                   <hr class="my-4" />
                                                </div>
                                             </div>
                                             <div class="d-flex">
                                                <span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-tag" data-fa-transform="shrink-2"></i></span>
                                                <div class="flex-1">
                                                   <h5 class="mb-2 fs-0">Labels</h5>
                                                   <div class="d-flex">
                                                      <span class="badge me-1 py-2 badge-soft-success">New</span><span class="badge me-1 py-2 badge-soft-primary">Goal</span><span class="badge me-1 py-2 badge-soft-info">Enhancement</span>
                                                      <div class="dropdown dropend">
                                                         <button class="btn btn-sm btn-secondary px-2 fsp-75 bg-400 border-400 dropdown-toggle dropdown-caret-none" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-plus"></span></button>
                                                         <div class="dropdown-menu">
                                                            <h6 class="dropdown-header py-0 px-3 mb-0">Select Label</h6>
                                                            <div class="dropdown-divider"></div>
                                                            <div class="px-3">
                                                               <button class="badge-soft-success dropdown-item rounded-1 mb-2" type="button">New</button>
                                                               <button class="badge-soft-primary dropdown-item rounded-1 mb-2" type="button">Goal</button>
                                                               <button class="badge-soft-info dropdown-item rounded-1 mb-2" type="button">Enhancement</button>
                                                               <button class="badge-soft-danger dropdown-item rounded-1 mb-2" type="button">Bug</button>
                                                               <button class="badge-soft-secondary dropdown-item rounded-1 mb-2" type="button">Documentation</button>
                                                               <button class="badge-soft-warning dropdown-item rounded-1 mb-2" type="button">Helper</button>
                                                            </div>
                                                            <div class="dropdown-divider"></div>
                                                            <div class="px-3">
                                                               <button class="btn btn-sm d-block w-100 btn-outline-secondary border-400">Create Label</button>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <hr class="my-4" />
                                                </div>
                                             </div>
                                             <div class="d-flex">
                                                <span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-align-left" data-fa-transform="shrink-2"></i></span>
                                                <div class="flex-1">
                                                   <h5 class="mb-2 fs-0">Description</h5>
                                                   <p class="text-word-break fs--1">The illustration must match to the contrast of the theme. The illustraion must described the concept of the design. To know more about the theme visit the page. <a href="https://prium.github.io/falcon/v3.4.0/index.html" target="_blank">https://prium.github.io/falcon/v3.4.0/index.html</a></p>
                                                   <hr class="my-4" />
                                                </div>
                                             </div>
                                             <div class="d-flex">
                                                <span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-paperclip" data-fa-transform="shrink-2"></i></span>
                                                <div class="flex-1">
                                                   <div class="d-flex justify-content-between mb-2">
                                                      <h5 class="mb-0 fs-0">Attachments</h5>
                                                      <div class="dropdown">
                                                         <button class="btn btn-falcon-default btn-sm dropdown-toggle dropdown-caret-none fs--2" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="fas fa-plus"></span></button>
                                                         <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#!">Computer</a><a class="dropdown-item" href="#!">Google Drive</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#!">Attach Link</a>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="d-flex align-items-center mb-3">
                                                      <a class="text-decoration-none me-3" href="../assets/img/kanban/3.jpg" data-gallery="attachment-bg">
                                                         <div class="bg-attachment">
                                                            <div class="bg-holder rounded" style="background-image:url(../assets/img/kanban/3.jpg);">
                                                            </div>
                                                            <!--/.bg-holder-->
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 fs--2">
                                                         <h6 class="mb-1"> <a class="text-decoration-none" href="../assets/img/kanban/3.jpg" data-gallery="attachment-title">final-img.jpg</a>
                                                         </h6>
                                                         <a class="link-600 fw-semi-bold" href="#!">Edit</a><span class="mx-1">|</span><a class="link-600 fw-semi-bold" href="#!">Remove</a>
                                                         <p class="mb-0">Uploaded at 2020-04-18 5:25 pm</p>
                                                      </div>
                                                   </div>
                                                   <div class="d-flex align-items-center mb-3">
                                                      <a class="text-decoration-none me-3" href="../assets/img/kanban/4.jpg" data-gallery="attachment-bg">
                                                         <div class="bg-attachment">
                                                            <div class="bg-holder rounded" style="background-image:url(../assets/img/kanban/4.jpg);">
                                                            </div>
                                                            <!--/.bg-holder-->
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 fs--2">
                                                         <h6 class="mb-1"> <a class="text-decoration-none" href="../assets/img/kanban/4.jpg" data-gallery="attachment-title">picture.png</a>
                                                         </h6>
                                                         <a class="link-600 fw-semi-bold" href="#!">Edit</a><span class="mx-1">|</span><a class="link-600 fw-semi-bold" href="#!">Remove</a>
                                                         <p class="mb-0">Uploaded at 2020-04-20 4:34 pm</p>
                                                      </div>
                                                   </div>
                                                   <div class="d-flex align-items-center mb-3">
                                                      <a class="text-decoration-none me-3" href="#!">
                                                         <div class="bg-attachment"><span class="text-uppercase fw-bold">txt</span>
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 fs--2">
                                                         <h6 class="mb-1"> <a class="text-decoration-none" href="#!">sample.txt</a>
                                                         </h6>
                                                         <a class="link-600 fw-semi-bold" href="#!">Edit</a><span class="mx-1">|</span><a class="link-600 fw-semi-bold" href="#!">Remove</a>
                                                         <p class="mb-0">Uploaded at 2020-04-21 2:10 pm</p>
                                                      </div>
                                                   </div>
                                                   <div class="d-flex align-items-center mb-3">
                                                      <a class="text-decoration-none me-3" href="#!">
                                                         <div class="bg-attachment"><span class="text-uppercase fw-bold">pdf</span>
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 fs--2">
                                                         <h6 class="mb-1"> <a class="text-decoration-none" href="#!">example.pdf</a>
                                                         </h6>
                                                         <a class="link-600 fw-semi-bold" href="#!">Edit</a><span class="mx-1">|</span><a class="link-600 fw-semi-bold" href="#!">Remove</a>
                                                         <p class="mb-0">Uploaded at 2020-05-02 11:34 am</p>
                                                      </div>
                                                   </div>
                                                   <div class="d-flex align-items-center">
                                                      <a class="text-decoration-none me-3" href="../assets/video/beach.mp4" data-gallery="attachment-bg">
                                                         <div class="bg-attachment">
                                                            <div class="bg-holder rounded" style="background-image:url(../assets/video/beach.jpg);">
                                                            </div>
                                                            <!--/.bg-holder-->
                                                            <div class="icon-play"><span class="fas fa-play"></span></div>
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 fs--2">
                                                         <h6 class="mb-1"> <a class="text-decoration-none" href="../assets/video/beach.mp4" data-gallery="attachment-title">beach.mp4</a>
                                                         </h6>
                                                         <a class="link-600 fw-semi-bold" href="#!">Edit</a><span class="mx-1">|</span><a class="link-600 fw-semi-bold" href="#!">Remove</a>
                                                         <p class="mb-0">Uploaded at 2020-05-10 3:40 pm</p>
                                                      </div>
                                                   </div>
                                                   <hr class="my-4" />
                                                </div>
                                             </div>
                                             <div class="d-flex">
                                                <span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary far fa-comment" data-fa-transform="shrink-2"></i></span>
                                                <div class="flex-1">
                                                   <h5 class="mb-3 fs-0">Comments</h5>
                                                   <div class="d-flex">
                                                      <div class="avatar avatar-l me-2">
                                                         <img class="rounded-circle" src="../assets/img/team/4.jpg" alt="" />
                                                      </div>
                                                      <div class="flex-1 fs--1">
                                                         <div class="position-relative border rounded-1 mb-3">
                                                            <form>
                                                               <textarea class="form-control border-0 rounded-bottom-0 resize-none" rows="3" contentEditable="true"></textarea>
                                                               <div class="d-flex flex-between-center bg-light rounded-bottom p-2 mt-1">
                                                                  <button class="btn btn-sm btn-primary" type="submit">Save</button>
                                                                  <ul class="list-inline mb-0">
                                                                     <li class="list-inline-item me-1"><a class="link-600 p-2 transition-base rounded" href="#!"><span class="fas fa-paperclip"></span></a></li>
                                                                     <li class="list-inline-item me-1"><a class="link-600 p-2 transition-base rounded" href="#!"><span class="fas fa-at"></span></a></li>
                                                                     <li class="list-inline-item me-1"><a class="link-600 p-2 transition-base rounded" href="#!"><span class="fas fa-image"></span></a></li>
                                                                  </ul>
                                                               </div>
                                                            </form>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="d-flex mb-3">
                                                      <a href="../pages/user/profile.html">
                                                         <div class="avatar avatar-l">
                                                            <img class="rounded-circle" src="../assets/img/team/4.jpg" alt="" />
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 ms-2 fs--1">
                                                         <p class="mb-1 bg-200 rounded-3 p-2"><a class="fw-semi-bold" href="../pages/user/profile.html">Rowan </a>This time we should finish the task before the deadline</p>
                                                         <a href="#!">Like</a> &bull; <a href="#!">Reply</a> &bull; 23min
                                                      </div>
                                                   </div>
                                                   <div class="d-flex">
                                                      <a href="../pages/user/profile.html">
                                                         <div class="avatar avatar-l">
                                                            <img class="rounded-circle" src="../assets/img/team/1.jpg" alt="" />
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 ms-2 fs--1">
                                                         <p class="mb-1 bg-200 rounded-3 p-2"><a class="fw-semi-bold" href="../pages/user/profile.html">Emma </a>We have more task to do</p>
                                                         <a href="#!">Like</a> &bull; <a href="#!">Reply</a> &bull; 2hour
                                                      </div>
                                                   </div>
                                                   <hr class="my-4" />
                                                </div>
                                             </div>
                                             <div class="d-flex">
                                                <span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-list-ul" data-fa-transform="shrink-2"></i></span>
                                                <div class="flex-1">
                                                   <h5 class="mb-3 fs-0">Activity </h5>
                                                   <div class="d-flex mb-3">
                                                      <a href="../pages/user/profile.html">
                                                         <div class="avatar avatar-l">
                                                            <img class="rounded-circle" src="../assets/img/team/4.jpg" alt="" />
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 ms-2 fs--1">
                                                         <p class="mb-0"><a class="fw-semi-bold" href="../pages/user/profile.html">Rowan </a>Added the card</p>
                                                         <div class="fs--2">6 hours ago</div>
                                                      </div>
                                                   </div>
                                                   <div class="d-flex">
                                                      <a href="../pages/user/profile.html">
                                                         <div class="avatar avatar-l">
                                                            <img class="rounded-circle" src="../assets/img/team/3.jpg" alt="" />
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 ms-2 fs--1">
                                                         <p class="mb-0"><a class="fw-semi-bold" href="../pages/user/profile.html">Anna </a>attached final-pic.png to this card</p>
                                                         <div class="fs--2">4 hours ago</div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-lg-3">
                                             <h6 class="mt-5 mt-lg-0">Add To Card</h6>
                                             <ul class="nav flex-lg-column fs--1">
                                                <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"> <span class="fas fa-user me-2"></span>Members</a></li>
                                                <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"> <span class="fas fa-tag me-2"></span>Label</a></li>
                                                <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"> <span class="fas fa-paperclip me-2"></span>Attachments</a></li>
                                                <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"> <span class="fas fa-check me-2"></span>Checklists</a></li>
                                             </ul>
                                             <h6 class="mt-3">Actions</h6>
                                             <ul class="nav flex-lg-column fs--1">
                                                <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"> <span class="far fa-copy me-2"> </span>Copy</a></li>
                                                <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"> <span class="fas fa-arrow-right me-2"></span>Move</a></li>
                                                <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"><span class="fas fa-trash-alt me-2"></span>Remove</a></li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="kanban-modal-label-2" aria-hidden="true" id="kanban-modal-2">
                           <div class="modal-dialog modal-lg mt-6" role="document">
                              <div class="modal-content border-0">
                                 <div class="position-relative overflow-hidden py-8">
                                    <div class="bg-holder rounded-top-lg" style="background-image:url(../assets/img/kanban/1.jpg);">
                                    </div>
                                    <!--/.bg-holder-->
                                 </div>
                                 <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                                 </div>
                                 <div class="modal-body p-0">
                                    <div class="bg-light rounded-top-lg py-3 px-4">
                                       <h4 class="mb-1" id="kanban-modal-label-2">Add a new illustration to the landing page</h4>
                                       <p class="fs--2 mb-0">Added by <a class="link-600 fw-semi-bold" href="#!">Antony</a></p>
                                    </div>
                                    <div class="p-4">
                                       <div class="row">
                                          <div class="col-lg-9">
                                             <div class="d-flex">
                                                <span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-user" data-fa-transform="shrink-2"></i></span>
                                                <div class="flex-1">
                                                   <h5 class="mb-2 fs-0">Reviewers</h5>
                                                   <ul class="nav avatar-group mb-0">
                                                      <li class="nav-item dropdown"></li>
                                                      <li class="nav-item dropdown">
                                                         <a class="nav-link p-0 dropdown-toggle dropdown-caret-none" href="#" role="button" data-bs-toggle="dropdown">
                                                            <div class="avatar avatar-xl">
                                                               <img class="rounded-circle" src="../assets/img/team/1.jpg" alt="" />
                                                            </div>
                                                         </a>
                                                         <div class="dropdown-menu dropdown-md px-0 py-3">
                                                            <div class="d-flex align-items-center position-relative px-3">
                                                               <div class="avatar avatar-2xl me-2">
                                                                  <img class="rounded-circle" src="../assets/img/team/1.jpg" alt="" />
                                                               </div>
                                                               <div class="flex-1">
                                                                  <h6 class="mb-0"><a class="stretched-link text-900" href="../pages/user/profile.html">Anna Karinina</a></h6>
                                                                  <p class="mb-0 fs--2">Member</p>
                                                               </div>
                                                            </div>
                                                            <hr class="my-2" />
                                                            <a class="dropdown-item" href="#!">Member Rule</a><a class="dropdown-item text-danger" href="#!">Remove Member</a>
                                                         </div>
                                                      </li>
                                                      <li class="nav-item dropdown">
                                                         <a class="nav-link p-0 dropdown-toggle dropdown-caret-none ms-n1" href="#" role="button" data-bs-toggle="dropdown">
                                                            <div class="avatar avatar-xl">
                                                               <img class="rounded-circle" src="../assets/img/team/2.jpg" alt="" />
                                                            </div>
                                                         </a>
                                                         <div class="dropdown-menu dropdown-md px-0 py-3">
                                                            <div class="d-flex align-items-center position-relative px-3">
                                                               <div class="avatar avatar-2xl me-2">
                                                                  <img class="rounded-circle" src="../assets/img/team/2.jpg" alt="" />
                                                               </div>
                                                               <div class="flex-1">
                                                                  <h6 class="mb-0"><a class="stretched-link text-900" href="../pages/user/profile.html">Antony Hopkins</a></h6>
                                                                  <p class="mb-0 fs--2">Member</p>
                                                               </div>
                                                            </div>
                                                            <hr class="my-2" />
                                                            <a class="dropdown-item" href="#!">Member Rule</a><a class="dropdown-item text-danger" href="#!">Remove Member</a>
                                                         </div>
                                                      </li>
                                                      <li class="nav-item dropdown">
                                                         <a class="nav-link p-0 dropdown-toggle dropdown-caret-none ms-n1" href="#" role="button" data-bs-toggle="dropdown">
                                                            <div class="avatar avatar-xl">
                                                               <img class="rounded-circle" src="../assets/img/team/3.jpg" alt="" />
                                                            </div>
                                                         </a>
                                                         <div class="dropdown-menu dropdown-md px-0 py-3">
                                                            <div class="d-flex align-items-center position-relative px-3">
                                                               <div class="avatar avatar-2xl me-2">
                                                                  <img class="rounded-circle" src="../assets/img/team/3.jpg" alt="" />
                                                               </div>
                                                               <div class="flex-1">
                                                                  <h6 class="mb-0"><a class="stretched-link text-900" href="../pages/user/profile.html">Rowan Atkinson</a></h6>
                                                                  <p class="mb-0 fs--2">Member</p>
                                                               </div>
                                                            </div>
                                                            <hr class="my-2" />
                                                            <a class="dropdown-item" href="#!">Member Rule</a><a class="dropdown-item text-danger" href="#!">Remove Member</a>
                                                         </div>
                                                      </li>
                                                      <li class="nav-item dropdown">
                                                         <a class="nav-link p-0 dropdown-toggle dropdown-caret-none ms-n1" href="#" role="button" data-bs-toggle="dropdown">
                                                            <div class="avatar avatar-xl">
                                                               <img class="rounded-circle" src="../assets/img/team/4.jpg" alt="" />
                                                            </div>
                                                         </a>
                                                         <div class="dropdown-menu dropdown-md px-0 py-3">
                                                            <div class="d-flex align-items-center position-relative px-3">
                                                               <div class="avatar avatar-2xl me-2">
                                                                  <img class="rounded-circle" src="../assets/img/team/4.jpg" alt="" />
                                                               </div>
                                                               <div class="flex-1">
                                                                  <h6 class="mb-0"><a class="stretched-link text-900" href="../pages/user/profile.html">John Doe</a></h6>
                                                                  <p class="mb-0 fs--2">Member</p>
                                                               </div>
                                                            </div>
                                                            <hr class="my-2" />
                                                            <a class="dropdown-item" href="#!">Member Rule</a><a class="dropdown-item text-danger" href="#!">Remove Member</a>
                                                         </div>
                                                      </li>
                                                      <li class="nav-item dropdown">
                                                         <a class="nav-link p-0 dropdown-toggle dropdown-caret-none ms-n1" href="#" role="button" data-bs-toggle="dropdown">
                                                            <div class="avatar avatar-xl">
                                                               <img class="rounded-circle" src="../assets/img/team/5.jpg" alt="" />
                                                            </div>
                                                         </a>
                                                         <div class="dropdown-menu dropdown-md px-0 py-3">
                                                            <div class="d-flex align-items-center position-relative px-3">
                                                               <div class="avatar avatar-2xl me-2">
                                                                  <img class="rounded-circle" src="../assets/img/team/5.jpg" alt="" />
                                                               </div>
                                                               <div class="flex-1">
                                                                  <h6 class="mb-0"><a class="stretched-link text-900" href="../pages/user/profile.html">Emily Rose</a></h6>
                                                                  <p class="mb-0 fs--2">Member</p>
                                                               </div>
                                                            </div>
                                                            <hr class="my-2" />
                                                            <a class="dropdown-item" href="#!">Member Rule</a><a class="dropdown-item text-danger" href="#!">Remove Member</a>
                                                         </div>
                                                      </li>
                                                      <li class="nav-item dropdown">
                                                         <a class="nav-link p-0 dropdown-toggle dropdown-caret-none ms-n1" href="#" role="button" data-bs-toggle="dropdown">
                                                            <div class="avatar avatar-xl">
                                                               <img class="rounded-circle" src="../assets/img/team/6.jpg" alt="" />
                                                            </div>
                                                         </a>
                                                         <div class="dropdown-menu dropdown-md px-0 py-3">
                                                            <div class="d-flex align-items-center position-relative px-3">
                                                               <div class="avatar avatar-2xl me-2">
                                                                  <img class="rounded-circle" src="../assets/img/team/6.jpg" alt="" />
                                                               </div>
                                                               <div class="flex-1">
                                                                  <h6 class="mb-0"><a class="stretched-link text-900" href="../pages/user/profile.html">Marry Jane</a></h6>
                                                                  <p class="mb-0 fs--2">Member</p>
                                                               </div>
                                                            </div>
                                                            <hr class="my-2" />
                                                            <a class="dropdown-item" href="#!">Member Rule</a><a class="dropdown-item text-danger" href="#!">Remove Member</a>
                                                         </div>
                                                      </li>
                                                      <li class="nav-item dropdown">
                                                         <a class="nav-link dropdown-toggle dropdown-caret-none p-0 ms-n1" href="#" role="button" data-bs-toggle="dropdown">
                                                            <div class="avatar avatar-xl">
                                                               <div class="avatar-name rounded-circle avatar-button"><span><span class="fas fa-plus" data-fa-trasnsform="grow-2"></span></span></div>
                                                            </div>
                                                         </a>
                                                         <div class="dropdown-menu dropdown-md" data-list='{"valueNames":["name"]}'>
                                                            <h6 class="dropdown-header py-0 px-3 mb-0">Select Member</h6>
                                                            <div class="dropdown-divider"></div>
                                                            <form class="px-3 mb-2">
                                                               <input class="form-control form-control-sm search" type="text" placeholder="Search team member" />
                                                            </form>
                                                            <ul class="list-unstyled list">
                                                               <li>
                                                                  <a class="d-flex align-items-center text-decoration-none py-1 px-3" href="#!">
                                                                     <div class="avatar avatar-xl me-2">
                                                                        <img class="rounded-circle" src="../assets/img/team/1.jpg" alt="" />
                                                                     </div>
                                                                     <div class="flex-1">
                                                                        <h6 class="mb-0 link-900 name">Anna Karinina</h6>
                                                                     </div>
                                                                  </a>
                                                               </li>
                                                               <li>
                                                                  <a class="d-flex align-items-center text-decoration-none py-1 px-3" href="#!">
                                                                     <div class="avatar avatar-xl me-2">
                                                                        <img class="rounded-circle" src="../assets/img/team/2.jpg" alt="" />
                                                                     </div>
                                                                     <div class="flex-1">
                                                                        <h6 class="mb-0 link-900 name">Antony Hopkins</h6>
                                                                     </div>
                                                                  </a>
                                                               </li>
                                                               <li>
                                                                  <a class="d-flex align-items-center text-decoration-none py-1 px-3" href="#!">
                                                                     <div class="avatar avatar-xl me-2">
                                                                        <img class="rounded-circle" src="../assets/img/team/3.jpg" alt="" />
                                                                     </div>
                                                                     <div class="flex-1">
                                                                        <h6 class="mb-0 link-900 name">Rowan Atkinson</h6>
                                                                     </div>
                                                                  </a>
                                                               </li>
                                                               <li>
                                                                  <a class="d-flex align-items-center text-decoration-none py-1 px-3" href="#!">
                                                                     <div class="avatar avatar-xl me-2">
                                                                        <img class="rounded-circle" src="../assets/img/team/4.jpg" alt="" />
                                                                     </div>
                                                                     <div class="flex-1">
                                                                        <h6 class="mb-0 link-900 name">John Doe</h6>
                                                                     </div>
                                                                  </a>
                                                               </li>
                                                               <li>
                                                                  <a class="d-flex align-items-center text-decoration-none py-1 px-3" href="#!">
                                                                     <div class="avatar avatar-xl me-2">
                                                                        <img class="rounded-circle" src="../assets/img/team/5.jpg" alt="" />
                                                                     </div>
                                                                     <div class="flex-1">
                                                                        <h6 class="mb-0 link-900 name">Emily Rose</h6>
                                                                     </div>
                                                                  </a>
                                                               </li>
                                                               <li>
                                                                  <a class="d-flex align-items-center text-decoration-none py-1 px-3" href="#!">
                                                                     <div class="avatar avatar-xl me-2">
                                                                        <img class="rounded-circle" src="../assets/img/team/6.jpg" alt="" />
                                                                     </div>
                                                                     <div class="flex-1">
                                                                        <h6 class="mb-0 link-900 name">Marry Jane</h6>
                                                                     </div>
                                                                  </a>
                                                               </li>
                                                            </ul>
                                                         </div>
                                                      </li>
                                                   </ul>
                                                   <hr class="my-4" />
                                                </div>
                                             </div>
                                             <div class="d-flex">
                                                <span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-tag" data-fa-transform="shrink-2"></i></span>
                                                <div class="flex-1">
                                                   <h5 class="mb-2 fs-0">Labels</h5>
                                                   <div class="d-flex">
                                                      <span class="badge me-1 py-2 badge-soft-success">New</span><span class="badge me-1 py-2 badge-soft-primary">Goal</span><span class="badge me-1 py-2 badge-soft-info">Enhancement</span>
                                                      <div class="dropdown dropend">
                                                         <button class="btn btn-sm btn-secondary px-2 fsp-75 bg-400 border-400 dropdown-toggle dropdown-caret-none" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-plus"></span></button>
                                                         <div class="dropdown-menu">
                                                            <h6 class="dropdown-header py-0 px-3 mb-0">Select Label</h6>
                                                            <div class="dropdown-divider"></div>
                                                            <div class="px-3">
                                                               <button class="badge-soft-success dropdown-item rounded-1 mb-2" type="button">New</button>
                                                               <button class="badge-soft-primary dropdown-item rounded-1 mb-2" type="button">Goal</button>
                                                               <button class="badge-soft-info dropdown-item rounded-1 mb-2" type="button">Enhancement</button>
                                                               <button class="badge-soft-danger dropdown-item rounded-1 mb-2" type="button">Bug</button>
                                                               <button class="badge-soft-secondary dropdown-item rounded-1 mb-2" type="button">Documentation</button>
                                                               <button class="badge-soft-warning dropdown-item rounded-1 mb-2" type="button">Helper</button>
                                                            </div>
                                                            <div class="dropdown-divider"></div>
                                                            <div class="px-3">
                                                               <button class="btn btn-sm d-block w-100 btn-outline-secondary border-400">Create Label</button>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <hr class="my-4" />
                                                </div>
                                             </div>
                                             <div class="d-flex">
                                                <span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-align-left" data-fa-transform="shrink-2"></i></span>
                                                <div class="flex-1">
                                                   <h5 class="mb-2 fs-0">Description</h5>
                                                   <p class="text-word-break fs--1">The illustration must match to the contrast of the theme. The illustraion must described the concept of the design. To know more about the theme visit the page. <a href="https://prium.github.io/falcon/v3.4.0/index.html" target="_blank">https://prium.github.io/falcon/v3.4.0/index.html</a></p>
                                                   <hr class="my-4" />
                                                </div>
                                             </div>
                                             <div class="d-flex">
                                                <span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-paperclip" data-fa-transform="shrink-2"></i></span>
                                                <div class="flex-1">
                                                   <div class="d-flex justify-content-between mb-2">
                                                      <h5 class="mb-0 fs-0">Attachments</h5>
                                                      <div class="dropdown">
                                                         <button class="btn btn-falcon-default btn-sm dropdown-toggle dropdown-caret-none fs--2" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="fas fa-plus"></span></button>
                                                         <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#!">Computer</a><a class="dropdown-item" href="#!">Google Drive</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#!">Attach Link</a>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="d-flex align-items-center mb-3">
                                                      <a class="text-decoration-none me-3" href="../assets/img/kanban/3.jpg" data-gallery="attachment-bg">
                                                         <div class="bg-attachment">
                                                            <div class="bg-holder rounded" style="background-image:url(../assets/img/kanban/3.jpg);">
                                                            </div>
                                                            <!--/.bg-holder-->
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 fs--2">
                                                         <h6 class="mb-1"> <a class="text-decoration-none" href="../assets/img/kanban/3.jpg" data-gallery="attachment-title">final-img.jpg</a>
                                                         </h6>
                                                         <a class="link-600 fw-semi-bold" href="#!">Edit</a><span class="mx-1">|</span><a class="link-600 fw-semi-bold" href="#!">Remove</a>
                                                         <p class="mb-0">Uploaded at 2020-04-18 5:25 pm</p>
                                                      </div>
                                                   </div>
                                                   <div class="d-flex align-items-center mb-3">
                                                      <a class="text-decoration-none me-3" href="../assets/img/kanban/4.jpg" data-gallery="attachment-bg">
                                                         <div class="bg-attachment">
                                                            <div class="bg-holder rounded" style="background-image:url(../assets/img/kanban/4.jpg);">
                                                            </div>
                                                            <!--/.bg-holder-->
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 fs--2">
                                                         <h6 class="mb-1"> <a class="text-decoration-none" href="../assets/img/kanban/4.jpg" data-gallery="attachment-title">picture.png</a>
                                                         </h6>
                                                         <a class="link-600 fw-semi-bold" href="#!">Edit</a><span class="mx-1">|</span><a class="link-600 fw-semi-bold" href="#!">Remove</a>
                                                         <p class="mb-0">Uploaded at 2020-04-20 4:34 pm</p>
                                                      </div>
                                                   </div>
                                                   <div class="d-flex align-items-center mb-3">
                                                      <a class="text-decoration-none me-3" href="#!">
                                                         <div class="bg-attachment"><span class="text-uppercase fw-bold">txt</span>
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 fs--2">
                                                         <h6 class="mb-1"> <a class="text-decoration-none" href="#!">sample.txt</a>
                                                         </h6>
                                                         <a class="link-600 fw-semi-bold" href="#!">Edit</a><span class="mx-1">|</span><a class="link-600 fw-semi-bold" href="#!">Remove</a>
                                                         <p class="mb-0">Uploaded at 2020-04-21 2:10 pm</p>
                                                      </div>
                                                   </div>
                                                   <div class="d-flex align-items-center mb-3">
                                                      <a class="text-decoration-none me-3" href="#!">
                                                         <div class="bg-attachment"><span class="text-uppercase fw-bold">pdf</span>
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 fs--2">
                                                         <h6 class="mb-1"> <a class="text-decoration-none" href="#!">example.pdf</a>
                                                         </h6>
                                                         <a class="link-600 fw-semi-bold" href="#!">Edit</a><span class="mx-1">|</span><a class="link-600 fw-semi-bold" href="#!">Remove</a>
                                                         <p class="mb-0">Uploaded at 2020-05-02 11:34 am</p>
                                                      </div>
                                                   </div>
                                                   <div class="d-flex align-items-center">
                                                      <a class="text-decoration-none me-3" href="../assets/video/beach.mp4" data-gallery="attachment-bg">
                                                         <div class="bg-attachment">
                                                            <div class="bg-holder rounded" style="background-image:url(../assets/video/beach.jpg);">
                                                            </div>
                                                            <!--/.bg-holder-->
                                                            <div class="icon-play"><span class="fas fa-play"></span></div>
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 fs--2">
                                                         <h6 class="mb-1"> <a class="text-decoration-none" href="../assets/video/beach.mp4" data-gallery="attachment-title">beach.mp4</a>
                                                         </h6>
                                                         <a class="link-600 fw-semi-bold" href="#!">Edit</a><span class="mx-1">|</span><a class="link-600 fw-semi-bold" href="#!">Remove</a>
                                                         <p class="mb-0">Uploaded at 2020-05-10 3:40 pm</p>
                                                      </div>
                                                   </div>
                                                   <hr class="my-4" />
                                                </div>
                                             </div>
                                             <div class="d-flex">
                                                <span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary far fa-comment" data-fa-transform="shrink-2"></i></span>
                                                <div class="flex-1">
                                                   <h5 class="mb-3 fs-0">Comments</h5>
                                                   <div class="d-flex">
                                                      <div class="avatar avatar-l me-2">
                                                         <img class="rounded-circle" src="../assets/img/team/4.jpg" alt="" />
                                                      </div>
                                                      <div class="flex-1 fs--1">
                                                         <div class="position-relative border rounded-1 mb-3">
                                                            <form>
                                                               <textarea class="form-control border-0 rounded-bottom-0 resize-none" rows="3" contentEditable="true"></textarea>
                                                               <div class="d-flex flex-between-center bg-light rounded-bottom p-2 mt-1">
                                                                  <button class="btn btn-sm btn-primary" type="submit">Save</button>
                                                                  <ul class="list-inline mb-0">
                                                                     <li class="list-inline-item me-1"><a class="link-600 p-2 transition-base rounded" href="#!"><span class="fas fa-paperclip"></span></a></li>
                                                                     <li class="list-inline-item me-1"><a class="link-600 p-2 transition-base rounded" href="#!"><span class="fas fa-at"></span></a></li>
                                                                     <li class="list-inline-item me-1"><a class="link-600 p-2 transition-base rounded" href="#!"><span class="fas fa-image"></span></a></li>
                                                                  </ul>
                                                               </div>
                                                            </form>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="d-flex mb-3">
                                                      <a href="../pages/user/profile.html">
                                                         <div class="avatar avatar-l">
                                                            <img class="rounded-circle" src="../assets/img/team/4.jpg" alt="" />
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 ms-2 fs--1">
                                                         <p class="mb-1 bg-200 rounded-3 p-2"><a class="fw-semi-bold" href="../pages/user/profile.html">Rowan </a>This time we should finish the task before the deadline</p>
                                                         <a href="#!">Like</a> &bull; <a href="#!">Reply</a> &bull; 23min
                                                      </div>
                                                   </div>
                                                   <div class="d-flex">
                                                      <a href="../pages/user/profile.html">
                                                         <div class="avatar avatar-l">
                                                            <img class="rounded-circle" src="../assets/img/team/1.jpg" alt="" />
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 ms-2 fs--1">
                                                         <p class="mb-1 bg-200 rounded-3 p-2"><a class="fw-semi-bold" href="../pages/user/profile.html">Emma </a>We have more task to do</p>
                                                         <a href="#!">Like</a> &bull; <a href="#!">Reply</a> &bull; 2hour
                                                      </div>
                                                   </div>
                                                   <hr class="my-4" />
                                                </div>
                                             </div>
                                             <div class="d-flex">
                                                <span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-list-ul" data-fa-transform="shrink-2"></i></span>
                                                <div class="flex-1">
                                                   <h5 class="mb-3 fs-0">Activity </h5>
                                                   <div class="d-flex mb-3">
                                                      <a href="../pages/user/profile.html">
                                                         <div class="avatar avatar-l">
                                                            <img class="rounded-circle" src="../assets/img/team/4.jpg" alt="" />
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 ms-2 fs--1">
                                                         <p class="mb-0"><a class="fw-semi-bold" href="../pages/user/profile.html">Rowan </a>Added the card</p>
                                                         <div class="fs--2">6 hours ago</div>
                                                      </div>
                                                   </div>
                                                   <div class="d-flex">
                                                      <a href="../pages/user/profile.html">
                                                         <div class="avatar avatar-l">
                                                            <img class="rounded-circle" src="../assets/img/team/3.jpg" alt="" />
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 ms-2 fs--1">
                                                         <p class="mb-0"><a class="fw-semi-bold" href="../pages/user/profile.html">Anna </a>attached final-pic.png to this card</p>
                                                         <div class="fs--2">4 hours ago</div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-lg-3">
                                             <h6 class="mt-5 mt-lg-0">Add To Card</h6>
                                             <ul class="nav flex-lg-column fs--1">
                                                <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"> <span class="fas fa-user me-2"></span>Members</a></li>
                                                <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"> <span class="fas fa-tag me-2"></span>Label</a></li>
                                                <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"> <span class="fas fa-paperclip me-2"></span>Attachments</a></li>
                                                <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"> <span class="fas fa-check me-2"></span>Checklists</a></li>
                                             </ul>
                                             <h6 class="mt-3">Actions</h6>
                                             <ul class="nav flex-lg-column fs--1">
                                                <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"> <span class="far fa-copy me-2"> </span>Copy</a></li>
                                                <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"> <span class="fas fa-arrow-right me-2"></span>Move</a></li>
                                                <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"><span class="fas fa-trash-alt me-2"></span>Remove</a></li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="kanban-modal-label-3" aria-hidden="true" id="kanban-modal-3">
                           <div class="modal-dialog modal-lg mt-6" role="document">
                              <div class="modal-content border-0">
                                 <div class="position-relative overflow-hidden py-8">
                                    <div class="bg-holder rounded-top-lg" style="background-image:url(../assets/img/kanban/2.jpg);">
                                    </div>
                                    <!--/.bg-holder-->
                                 </div>
                                 <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                                 </div>
                                 <div class="modal-body p-0">
                                    <div class="bg-light rounded-top-lg py-3 px-4">
                                       <h4 class="mb-1" id="kanban-modal-label-3">Add a new illustration to the landing page</h4>
                                       <p class="fs--2 mb-0">Added by <a class="link-600 fw-semi-bold" href="#!">Antony</a></p>
                                    </div>
                                    <div class="p-4">
                                       <div class="row">
                                          <div class="col-lg-9">
                                             <div class="d-flex">
                                                <span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-user" data-fa-transform="shrink-2"></i></span>
                                                <div class="flex-1">
                                                   <h5 class="mb-2 fs-0">Reviewers</h5>
                                                   <ul class="nav avatar-group mb-0">
                                                      <li class="nav-item dropdown"></li>
                                                      <li class="nav-item dropdown">
                                                         <a class="nav-link p-0 dropdown-toggle dropdown-caret-none" href="#" role="button" data-bs-toggle="dropdown">
                                                            <div class="avatar avatar-xl">
                                                               <img class="rounded-circle" src="../assets/img/team/1.jpg" alt="" />
                                                            </div>
                                                         </a>
                                                         <div class="dropdown-menu dropdown-md px-0 py-3">
                                                            <div class="d-flex align-items-center position-relative px-3">
                                                               <div class="avatar avatar-2xl me-2">
                                                                  <img class="rounded-circle" src="../assets/img/team/1.jpg" alt="" />
                                                               </div>
                                                               <div class="flex-1">
                                                                  <h6 class="mb-0"><a class="stretched-link text-900" href="../pages/user/profile.html">Anna Karinina</a></h6>
                                                                  <p class="mb-0 fs--2">Member</p>
                                                               </div>
                                                            </div>
                                                            <hr class="my-2" />
                                                            <a class="dropdown-item" href="#!">Member Rule</a><a class="dropdown-item text-danger" href="#!">Remove Member</a>
                                                         </div>
                                                      </li>
                                                      <li class="nav-item dropdown">
                                                         <a class="nav-link p-0 dropdown-toggle dropdown-caret-none ms-n1" href="#" role="button" data-bs-toggle="dropdown">
                                                            <div class="avatar avatar-xl">
                                                               <img class="rounded-circle" src="../assets/img/team/2.jpg" alt="" />
                                                            </div>
                                                         </a>
                                                         <div class="dropdown-menu dropdown-md px-0 py-3">
                                                            <div class="d-flex align-items-center position-relative px-3">
                                                               <div class="avatar avatar-2xl me-2">
                                                                  <img class="rounded-circle" src="../assets/img/team/2.jpg" alt="" />
                                                               </div>
                                                               <div class="flex-1">
                                                                  <h6 class="mb-0"><a class="stretched-link text-900" href="../pages/user/profile.html">Antony Hopkins</a></h6>
                                                                  <p class="mb-0 fs--2">Member</p>
                                                               </div>
                                                            </div>
                                                            <hr class="my-2" />
                                                            <a class="dropdown-item" href="#!">Member Rule</a><a class="dropdown-item text-danger" href="#!">Remove Member</a>
                                                         </div>
                                                      </li>
                                                      <li class="nav-item dropdown">
                                                         <a class="nav-link p-0 dropdown-toggle dropdown-caret-none ms-n1" href="#" role="button" data-bs-toggle="dropdown">
                                                            <div class="avatar avatar-xl">
                                                               <img class="rounded-circle" src="../assets/img/team/3.jpg" alt="" />
                                                            </div>
                                                         </a>
                                                         <div class="dropdown-menu dropdown-md px-0 py-3">
                                                            <div class="d-flex align-items-center position-relative px-3">
                                                               <div class="avatar avatar-2xl me-2">
                                                                  <img class="rounded-circle" src="../assets/img/team/3.jpg" alt="" />
                                                               </div>
                                                               <div class="flex-1">
                                                                  <h6 class="mb-0"><a class="stretched-link text-900" href="../pages/user/profile.html">Rowan Atkinson</a></h6>
                                                                  <p class="mb-0 fs--2">Member</p>
                                                               </div>
                                                            </div>
                                                            <hr class="my-2" />
                                                            <a class="dropdown-item" href="#!">Member Rule</a><a class="dropdown-item text-danger" href="#!">Remove Member</a>
                                                         </div>
                                                      </li>
                                                      <li class="nav-item dropdown">
                                                         <a class="nav-link p-0 dropdown-toggle dropdown-caret-none ms-n1" href="#" role="button" data-bs-toggle="dropdown">
                                                            <div class="avatar avatar-xl">
                                                               <img class="rounded-circle" src="../assets/img/team/4.jpg" alt="" />
                                                            </div>
                                                         </a>
                                                         <div class="dropdown-menu dropdown-md px-0 py-3">
                                                            <div class="d-flex align-items-center position-relative px-3">
                                                               <div class="avatar avatar-2xl me-2">
                                                                  <img class="rounded-circle" src="../assets/img/team/4.jpg" alt="" />
                                                               </div>
                                                               <div class="flex-1">
                                                                  <h6 class="mb-0"><a class="stretched-link text-900" href="../pages/user/profile.html">John Doe</a></h6>
                                                                  <p class="mb-0 fs--2">Member</p>
                                                               </div>
                                                            </div>
                                                            <hr class="my-2" />
                                                            <a class="dropdown-item" href="#!">Member Rule</a><a class="dropdown-item text-danger" href="#!">Remove Member</a>
                                                         </div>
                                                      </li>
                                                      <li class="nav-item dropdown">
                                                         <a class="nav-link p-0 dropdown-toggle dropdown-caret-none ms-n1" href="#" role="button" data-bs-toggle="dropdown">
                                                            <div class="avatar avatar-xl">
                                                               <img class="rounded-circle" src="../assets/img/team/5.jpg" alt="" />
                                                            </div>
                                                         </a>
                                                         <div class="dropdown-menu dropdown-md px-0 py-3">
                                                            <div class="d-flex align-items-center position-relative px-3">
                                                               <div class="avatar avatar-2xl me-2">
                                                                  <img class="rounded-circle" src="../assets/img/team/5.jpg" alt="" />
                                                               </div>
                                                               <div class="flex-1">
                                                                  <h6 class="mb-0"><a class="stretched-link text-900" href="../pages/user/profile.html">Emily Rose</a></h6>
                                                                  <p class="mb-0 fs--2">Member</p>
                                                               </div>
                                                            </div>
                                                            <hr class="my-2" />
                                                            <a class="dropdown-item" href="#!">Member Rule</a><a class="dropdown-item text-danger" href="#!">Remove Member</a>
                                                         </div>
                                                      </li>
                                                      <li class="nav-item dropdown">
                                                         <a class="nav-link p-0 dropdown-toggle dropdown-caret-none ms-n1" href="#" role="button" data-bs-toggle="dropdown">
                                                            <div class="avatar avatar-xl">
                                                               <img class="rounded-circle" src="../assets/img/team/6.jpg" alt="" />
                                                            </div>
                                                         </a>
                                                         <div class="dropdown-menu dropdown-md px-0 py-3">
                                                            <div class="d-flex align-items-center position-relative px-3">
                                                               <div class="avatar avatar-2xl me-2">
                                                                  <img class="rounded-circle" src="../assets/img/team/6.jpg" alt="" />
                                                               </div>
                                                               <div class="flex-1">
                                                                  <h6 class="mb-0"><a class="stretched-link text-900" href="../pages/user/profile.html">Marry Jane</a></h6>
                                                                  <p class="mb-0 fs--2">Member</p>
                                                               </div>
                                                            </div>
                                                            <hr class="my-2" />
                                                            <a class="dropdown-item" href="#!">Member Rule</a><a class="dropdown-item text-danger" href="#!">Remove Member</a>
                                                         </div>
                                                      </li>
                                                      <li class="nav-item dropdown">
                                                         <a class="nav-link dropdown-toggle dropdown-caret-none p-0 ms-n1" href="#" role="button" data-bs-toggle="dropdown">
                                                            <div class="avatar avatar-xl">
                                                               <div class="avatar-name rounded-circle avatar-button"><span><span class="fas fa-plus" data-fa-trasnsform="grow-2"></span></span></div>
                                                            </div>
                                                         </a>
                                                         <div class="dropdown-menu dropdown-md" data-list='{"valueNames":["name"]}'>
                                                            <h6 class="dropdown-header py-0 px-3 mb-0">Select Member</h6>
                                                            <div class="dropdown-divider"></div>
                                                            <form class="px-3 mb-2">
                                                               <input class="form-control form-control-sm search" type="text" placeholder="Search team member" />
                                                            </form>
                                                            <ul class="list-unstyled list">
                                                               <li>
                                                                  <a class="d-flex align-items-center text-decoration-none py-1 px-3" href="#!">
                                                                     <div class="avatar avatar-xl me-2">
                                                                        <img class="rounded-circle" src="../assets/img/team/1.jpg" alt="" />
                                                                     </div>
                                                                     <div class="flex-1">
                                                                        <h6 class="mb-0 link-900 name">Anna Karinina</h6>
                                                                     </div>
                                                                  </a>
                                                               </li>
                                                               <li>
                                                                  <a class="d-flex align-items-center text-decoration-none py-1 px-3" href="#!">
                                                                     <div class="avatar avatar-xl me-2">
                                                                        <img class="rounded-circle" src="../assets/img/team/2.jpg" alt="" />
                                                                     </div>
                                                                     <div class="flex-1">
                                                                        <h6 class="mb-0 link-900 name">Antony Hopkins</h6>
                                                                     </div>
                                                                  </a>
                                                               </li>
                                                               <li>
                                                                  <a class="d-flex align-items-center text-decoration-none py-1 px-3" href="#!">
                                                                     <div class="avatar avatar-xl me-2">
                                                                        <img class="rounded-circle" src="../assets/img/team/3.jpg" alt="" />
                                                                     </div>
                                                                     <div class="flex-1">
                                                                        <h6 class="mb-0 link-900 name">Rowan Atkinson</h6>
                                                                     </div>
                                                                  </a>
                                                               </li>
                                                               <li>
                                                                  <a class="d-flex align-items-center text-decoration-none py-1 px-3" href="#!">
                                                                     <div class="avatar avatar-xl me-2">
                                                                        <img class="rounded-circle" src="../assets/img/team/4.jpg" alt="" />
                                                                     </div>
                                                                     <div class="flex-1">
                                                                        <h6 class="mb-0 link-900 name">John Doe</h6>
                                                                     </div>
                                                                  </a>
                                                               </li>
                                                               <li>
                                                                  <a class="d-flex align-items-center text-decoration-none py-1 px-3" href="#!">
                                                                     <div class="avatar avatar-xl me-2">
                                                                        <img class="rounded-circle" src="../assets/img/team/5.jpg" alt="" />
                                                                     </div>
                                                                     <div class="flex-1">
                                                                        <h6 class="mb-0 link-900 name">Emily Rose</h6>
                                                                     </div>
                                                                  </a>
                                                               </li>
                                                               <li>
                                                                  <a class="d-flex align-items-center text-decoration-none py-1 px-3" href="#!">
                                                                     <div class="avatar avatar-xl me-2">
                                                                        <img class="rounded-circle" src="../assets/img/team/6.jpg" alt="" />
                                                                     </div>
                                                                     <div class="flex-1">
                                                                        <h6 class="mb-0 link-900 name">Marry Jane</h6>
                                                                     </div>
                                                                  </a>
                                                               </li>
                                                            </ul>
                                                         </div>
                                                      </li>
                                                   </ul>
                                                   <hr class="my-4" />
                                                </div>
                                             </div>
                                             <div class="d-flex">
                                                <span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-tag" data-fa-transform="shrink-2"></i></span>
                                                <div class="flex-1">
                                                   <h5 class="mb-2 fs-0">Labels</h5>
                                                   <div class="d-flex">
                                                      <span class="badge me-1 py-2 badge-soft-success">New</span><span class="badge me-1 py-2 badge-soft-primary">Goal</span><span class="badge me-1 py-2 badge-soft-info">Enhancement</span>
                                                      <div class="dropdown dropend">
                                                         <button class="btn btn-sm btn-secondary px-2 fsp-75 bg-400 border-400 dropdown-toggle dropdown-caret-none" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-plus"></span></button>
                                                         <div class="dropdown-menu">
                                                            <h6 class="dropdown-header py-0 px-3 mb-0">Select Label</h6>
                                                            <div class="dropdown-divider"></div>
                                                            <div class="px-3">
                                                               <button class="badge-soft-success dropdown-item rounded-1 mb-2" type="button">New</button>
                                                               <button class="badge-soft-primary dropdown-item rounded-1 mb-2" type="button">Goal</button>
                                                               <button class="badge-soft-info dropdown-item rounded-1 mb-2" type="button">Enhancement</button>
                                                               <button class="badge-soft-danger dropdown-item rounded-1 mb-2" type="button">Bug</button>
                                                               <button class="badge-soft-secondary dropdown-item rounded-1 mb-2" type="button">Documentation</button>
                                                               <button class="badge-soft-warning dropdown-item rounded-1 mb-2" type="button">Helper</button>
                                                            </div>
                                                            <div class="dropdown-divider"></div>
                                                            <div class="px-3">
                                                               <button class="btn btn-sm d-block w-100 btn-outline-secondary border-400">Create Label</button>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <hr class="my-4" />
                                                </div>
                                             </div>
                                             <div class="d-flex">
                                                <span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-align-left" data-fa-transform="shrink-2"></i></span>
                                                <div class="flex-1">
                                                   <h5 class="mb-2 fs-0">Description</h5>
                                                   <p class="text-word-break fs--1">The illustration must match to the contrast of the theme. The illustraion must described the concept of the design. To know more about the theme visit the page. <a href="https://prium.github.io/falcon/v3.4.0/index.html" target="_blank">https://prium.github.io/falcon/v3.4.0/index.html</a></p>
                                                   <hr class="my-4" />
                                                </div>
                                             </div>
                                             <div class="d-flex">
                                                <span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-paperclip" data-fa-transform="shrink-2"></i></span>
                                                <div class="flex-1">
                                                   <div class="d-flex justify-content-between mb-2">
                                                      <h5 class="mb-0 fs-0">Attachments</h5>
                                                      <div class="dropdown">
                                                         <button class="btn btn-falcon-default btn-sm dropdown-toggle dropdown-caret-none fs--2" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="fas fa-plus"></span></button>
                                                         <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#!">Computer</a><a class="dropdown-item" href="#!">Google Drive</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#!">Attach Link</a>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="d-flex align-items-center mb-3">
                                                      <a class="text-decoration-none me-3" href="../assets/img/kanban/3.jpg" data-gallery="attachment-bg">
                                                         <div class="bg-attachment">
                                                            <div class="bg-holder rounded" style="background-image:url(../assets/img/kanban/3.jpg);">
                                                            </div>
                                                            <!--/.bg-holder-->
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 fs--2">
                                                         <h6 class="mb-1"> <a class="text-decoration-none" href="../assets/img/kanban/3.jpg" data-gallery="attachment-title">final-img.jpg</a>
                                                         </h6>
                                                         <a class="link-600 fw-semi-bold" href="#!">Edit</a><span class="mx-1">|</span><a class="link-600 fw-semi-bold" href="#!">Remove</a>
                                                         <p class="mb-0">Uploaded at 2020-04-18 5:25 pm</p>
                                                      </div>
                                                   </div>
                                                   <div class="d-flex align-items-center mb-3">
                                                      <a class="text-decoration-none me-3" href="../assets/img/kanban/4.jpg" data-gallery="attachment-bg">
                                                         <div class="bg-attachment">
                                                            <div class="bg-holder rounded" style="background-image:url(../assets/img/kanban/4.jpg);">
                                                            </div>
                                                            <!--/.bg-holder-->
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 fs--2">
                                                         <h6 class="mb-1"> <a class="text-decoration-none" href="../assets/img/kanban/4.jpg" data-gallery="attachment-title">picture.png</a>
                                                         </h6>
                                                         <a class="link-600 fw-semi-bold" href="#!">Edit</a><span class="mx-1">|</span><a class="link-600 fw-semi-bold" href="#!">Remove</a>
                                                         <p class="mb-0">Uploaded at 2020-04-20 4:34 pm</p>
                                                      </div>
                                                   </div>
                                                   <div class="d-flex align-items-center mb-3">
                                                      <a class="text-decoration-none me-3" href="#!">
                                                         <div class="bg-attachment"><span class="text-uppercase fw-bold">txt</span>
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 fs--2">
                                                         <h6 class="mb-1"> <a class="text-decoration-none" href="#!">sample.txt</a>
                                                         </h6>
                                                         <a class="link-600 fw-semi-bold" href="#!">Edit</a><span class="mx-1">|</span><a class="link-600 fw-semi-bold" href="#!">Remove</a>
                                                         <p class="mb-0">Uploaded at 2020-04-21 2:10 pm</p>
                                                      </div>
                                                   </div>
                                                   <div class="d-flex align-items-center mb-3">
                                                      <a class="text-decoration-none me-3" href="#!">
                                                         <div class="bg-attachment"><span class="text-uppercase fw-bold">pdf</span>
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 fs--2">
                                                         <h6 class="mb-1"> <a class="text-decoration-none" href="#!">example.pdf</a>
                                                         </h6>
                                                         <a class="link-600 fw-semi-bold" href="#!">Edit</a><span class="mx-1">|</span><a class="link-600 fw-semi-bold" href="#!">Remove</a>
                                                         <p class="mb-0">Uploaded at 2020-05-02 11:34 am</p>
                                                      </div>
                                                   </div>
                                                   <div class="d-flex align-items-center">
                                                      <a class="text-decoration-none me-3" href="../assets/video/beach.mp4" data-gallery="attachment-bg">
                                                         <div class="bg-attachment">
                                                            <div class="bg-holder rounded" style="background-image:url(../assets/video/beach.jpg);">
                                                            </div>
                                                            <!--/.bg-holder-->
                                                            <div class="icon-play"><span class="fas fa-play"></span></div>
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 fs--2">
                                                         <h6 class="mb-1"> <a class="text-decoration-none" href="../assets/video/beach.mp4" data-gallery="attachment-title">beach.mp4</a>
                                                         </h6>
                                                         <a class="link-600 fw-semi-bold" href="#!">Edit</a><span class="mx-1">|</span><a class="link-600 fw-semi-bold" href="#!">Remove</a>
                                                         <p class="mb-0">Uploaded at 2020-05-10 3:40 pm</p>
                                                      </div>
                                                   </div>
                                                   <hr class="my-4" />
                                                </div>
                                             </div>
                                             <div class="d-flex">
                                                <span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary far fa-comment" data-fa-transform="shrink-2"></i></span>
                                                <div class="flex-1">
                                                   <h5 class="mb-3 fs-0">Comments</h5>
                                                   <div class="d-flex">
                                                      <div class="avatar avatar-l me-2">
                                                         <img class="rounded-circle" src="../assets/img/team/4.jpg" alt="" />
                                                      </div>
                                                      <div class="flex-1 fs--1">
                                                         <div class="position-relative border rounded-1 mb-3">
                                                            <form>
                                                               <textarea class="form-control border-0 rounded-bottom-0 resize-none" rows="3" contentEditable="true"></textarea>
                                                               <div class="d-flex flex-between-center bg-light rounded-bottom p-2 mt-1">
                                                                  <button class="btn btn-sm btn-primary" type="submit">Save</button>
                                                                  <ul class="list-inline mb-0">
                                                                     <li class="list-inline-item me-1"><a class="link-600 p-2 transition-base rounded" href="#!"><span class="fas fa-paperclip"></span></a></li>
                                                                     <li class="list-inline-item me-1"><a class="link-600 p-2 transition-base rounded" href="#!"><span class="fas fa-at"></span></a></li>
                                                                     <li class="list-inline-item me-1"><a class="link-600 p-2 transition-base rounded" href="#!"><span class="fas fa-image"></span></a></li>
                                                                  </ul>
                                                               </div>
                                                            </form>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="d-flex mb-3">
                                                      <a href="../pages/user/profile.html">
                                                         <div class="avatar avatar-l">
                                                            <img class="rounded-circle" src="../assets/img/team/4.jpg" alt="" />
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 ms-2 fs--1">
                                                         <p class="mb-1 bg-200 rounded-3 p-2"><a class="fw-semi-bold" href="../pages/user/profile.html">Rowan </a>This time we should finish the task before the deadline</p>
                                                         <a href="#!">Like</a> &bull; <a href="#!">Reply</a> &bull; 23min
                                                      </div>
                                                   </div>
                                                   <div class="d-flex">
                                                      <a href="../pages/user/profile.html">
                                                         <div class="avatar avatar-l">
                                                            <img class="rounded-circle" src="../assets/img/team/1.jpg" alt="" />
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 ms-2 fs--1">
                                                         <p class="mb-1 bg-200 rounded-3 p-2"><a class="fw-semi-bold" href="../pages/user/profile.html">Emma </a>We have more task to do</p>
                                                         <a href="#!">Like</a> &bull; <a href="#!">Reply</a> &bull; 2hour
                                                      </div>
                                                   </div>
                                                   <hr class="my-4" />
                                                </div>
                                             </div>
                                             <div class="d-flex">
                                                <span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-list-ul" data-fa-transform="shrink-2"></i></span>
                                                <div class="flex-1">
                                                   <h5 class="mb-3 fs-0">Activity </h5>
                                                   <div class="d-flex mb-3">
                                                      <a href="../pages/user/profile.html">
                                                         <div class="avatar avatar-l">
                                                            <img class="rounded-circle" src="../assets/img/team/4.jpg" alt="" />
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 ms-2 fs--1">
                                                         <p class="mb-0"><a class="fw-semi-bold" href="../pages/user/profile.html">Rowan </a>Added the card</p>
                                                         <div class="fs--2">6 hours ago</div>
                                                      </div>
                                                   </div>
                                                   <div class="d-flex">
                                                      <a href="../pages/user/profile.html">
                                                         <div class="avatar avatar-l">
                                                            <img class="rounded-circle" src="../assets/img/team/3.jpg" alt="" />
                                                         </div>
                                                      </a>
                                                      <div class="flex-1 ms-2 fs--1">
                                                         <p class="mb-0"><a class="fw-semi-bold" href="../pages/user/profile.html">Anna </a>attached final-pic.png to this card</p>
                                                         <div class="fs--2">4 hours ago</div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-lg-3">
                                             <h6 class="mt-5 mt-lg-0">Add To Card</h6>
                                             <ul class="nav flex-lg-column fs--1">
                                                <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"> <span class="fas fa-user me-2"></span>Members</a></li>
                                                <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"> <span class="fas fa-tag me-2"></span>Label</a></li>
                                                <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"> <span class="fas fa-paperclip me-2"></span>Attachments</a></li>
                                                <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"> <span class="fas fa-check me-2"></span>Checklists</a></li>
                                             </ul>
                                             <h6 class="mt-3">Actions</h6>
                                             <ul class="nav flex-lg-column fs--1">
                                                <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"> <span class="far fa-copy me-2"> </span>Copy</a></li>
                                                <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"> <span class="fas fa-arrow-right me-2"></span>Move</a></li>
                                                <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"><span class="fas fa-trash-alt me-2"></span>Remove</a></li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        {{-- 
                        <div class="collapse bg-100 p-card rounded-lg transition-none" id="addTasksTypeForm">
                           @foreach ($projectsss as $projectnamess)
                           @endforeach
                           <form action="{{ route('addTaskType') }}" method="post">
                              @csrf
                              <label class="col-form-label">Task type name</label>
                              <textarea class="form-control mb-2" data-input="add-list" name="taskstypename" rows="2" placeholder="Enter list title..."></textarea>
                              <input type="text" class="form-control d-none" name="taskstypeprojectid" value="{{ $projectnamess->id }}">
                              <div class="row gx-2">
                                 <div class="col">
                                    <button class="btn btn-primary btn-sm d-block w-100" type="submit">Add</button>
                                 </div>
                                 <div class="col">
                                    <button class="btn btn-outline-secondary btn-sm d-block w-100 border-400" type="button" data-dismiss="collapse">Cancel</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                        <button class="btn d-block w-5 btn-secondary bg-400 border-400" data-bs-toggle="collapse" data-bs-target="#addTasksTypeForm" aria-expanded="false" aria-controls="addTasksTypeForm"><span class="fas fa-plus me-1"> </span></button> --}}
                        <div class="modal fade" id="addEventModal" tabindex="-1">
                           <div class="modal-dialog">
                              <div class="modal-content border">
                                 <form id="addEventForm" autocomplete="off">
                                    <div class="modal-header px-card bg-light border-bottom-0">
                                       <h5 class="modal-title">Create Schedule</h5>
                                       <button class="btn-close me-n1" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-card">
                                       <div class="mb-3">
                                          <label class="fs-0" for="eventTitle">Title</label>
                                          <input class="form-control" id="eventTitle" type="text" name="title" required="required" />
                                       </div>
                                       <div class="mb-3">
                                          <label class="fs-0" for="eventStartDate">Start Date</label>
                                          <input class="form-control datetimepicker" id="eventStartDate" type="text" required="required" name="startDate" placeholder="yyyy/mm/dd hh:mm" data-options='{"static":"true","enableTime":"true","dateFormat":"Y-m-d H:i"}' />
                                       </div>
                                       <div class="mb-3">
                                          <label class="fs-0" for="eventEndDate">End Date</label>
                                          <input class="form-control datetimepicker" id="eventEndDate" type="text" name="endDate" placeholder="yyyy/mm/dd hh:mm" data-options='{"static":"true","enableTime":"true","dateFormat":"Y-m-d H:i"}' />
                                       </div>
                                       <div class="mb-3">
                                          <label class="fs-0" for="eventDescription">Description</label>
                                          <textarea class="form-control" rows="3" name="description" id="eventDescription"></textarea>
                                       </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-end align-items-center bg-light">
                                       <button class="btn btn-primary px-4" type="submit">Save</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                        {{-- models --}}
                     </div>
                     @endif
                  </div>
               </div>
            </div>
         </div>
      </main>
      <!-- ===============================================-->
      <!--    End of Main Content-->
      <!-- ===============================================-->
      <!-- ===============================================-->
      <!--    JavaScripts-->
      <!-- ===============================================-->
      <script src="/public/vendors/popper/popper.min.js"></script>
      <script src="/public/vendors/bootstrap/bootstrap.min.js"></script>
      <script src="/public/vendors/anchorjs/anchor.min.js"></script>
      <script src="/public/vendors/is/is.min.js"></script>
      <script src="/public/vendors/fullcalendar/main.min.js"></script>
      <script src="/public/assets/js/flatpickr.js"></script>
      <script src="/public/vendors/dayjs/dayjs.min.js"></script>
      <script src="/public/vendors/glightbox/glightbox.min.js"> </script>
      <script src="/public/vendors/draggable/draggable.bundle.legacy.js"></script>
      <script src="/public/vendors/echarts/echarts.min.js"></script>
      <script src="/public/vendors/fontawesome/all.min.js"></script>
      <script src="/public/vendors/lodash/lodash.min.js"></script>
      <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
      <script src="/public/vendors/list.js/list.min.js"></script>
      <script src="/public/assets/js/theme.js"></script>
      <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
      <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
      {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script> --}}
      {{-- clock javascript file --}}
      <script src="/admin/clock/index.js"></script>
      {{-- clock javascript file --}}
      <script src="/admin/digital-clock/digital-clock.js"></script>
      {{-- notification --}}
      {{--  --}}
      <script src="/Facebook-post-main/script.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src="/jkanban.js"></script>
      <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
   </body>
</html>
