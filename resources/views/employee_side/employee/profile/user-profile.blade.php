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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
    <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="/admin/hrsm_admin_dashboard-main/assets/css/bootstrap.min.css">
    
    <!-- Fontawesome CSS -->
      <link rel="stylesheet" href="/admin/hrsm_admin_dashboard-main/assets/css/font-awesome.min.css">
    
    <!-- Lineawesome CSS -->
      <link rel="stylesheet" href="/admin/hrsm_admin_dashboard-main/assets/css/line-awesome.min.css">
    
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="/admin/hrsm_admin_dashboard-main/assets/css/select2.min.css">
    
    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="/admin/hrsm_admin_dashboard-main/assets/css/bootstrap-datetimepicker.min.css">
    
    <!-- Tagsinput CSS -->
    <link rel="stylesheet" href="/admin/hrsm_admin_dashboard-main/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
    
    <!-- Main CSS -->
      <link rel="stylesheet" href="/admin/hrsm_admin_dashboard-main/assets/css/style.css">
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
   @if ($dataEmployee->isEmpty())
       
   @else

   @foreach ($dataEmployee as $employeeData)
   @endforeach
   <div class="card mb-0">
   <div class="card-body">
      <div class="row">
         <div class="col-md-12">
            <div class="profile-view">
               <div class="profile-img-wrap">
                  <div class="profile-img">
                     @if (empty($employeeData->image))
                         <a href="#"><img alt="" src="admin/dist/img/avators.jpg"></a>
                     @else
                         <a href="#"><img alt="" src="{{ $employeeData->image }}"></a>
                     @endif
                  </div>
               </div>
               <div class="profile-basic">
                  <div class="row">
                     <div class="col-md-5">
                        <div class="profile-info-left mt-3">
                           <h3 class="user-name m-t-0 mb-0">{{ $employeeData->employee_name }}</h3>
                           <h6 class="text-muted">{{ $employeeData->department_name }}</h6>
                           <div class="staff-id">Employee ID : {{ $employeeData->id }}</div>
                           <div class="small doj text-muted">Date of Join : {{ \Carbon\Carbon::parse($employeeData->created_at )->format('M,d Y') }}</div>
                           {{-- <div class="staff-msg"><a class="btn btn-custom" href="chat.html">Send Message</a></div> --}}
                        </div>
                     </div>
                     <div class="col-md-7">
                        <ul class="personal-info">
                           <li>
                              <div class="title">Phone:</div>
                              <div class="text"><p>{{ $employeeData->mobile_number }}</p></div>
                           </li>
                           <li>
                              <div class="title">Email:</div>
                              <div class="text"><p>{{ $employeeData->email_address }}</p></div>
                           </li>
                           <li>
                              <div class="title">Birthday:</div>
                              <div class="text">{{ \Carbon\Carbon::parse($employeeData->date_of_birth )->format('M,d Y') }}</div>
                           </li>
                           <li>
                              <div class="title">Address:</div>
                              <div class="text">{{ $employeeData->address }}</div>
                           </li>
                           <li>
                              <div class="title">City:</div>
                              <div class="text">{{ $employeeData->city }}</div>
                           </li>
                           <li>
                              <div class="title">Gender:</div>
                              <div class="text">{{ $employeeData->salutation }}</div>
                           </li>
                           {{-- <li>
                              <div class="title">Reports to:</div>
                              <div class="text">
                                 <div class="avatar-box">
                                   <div class="avatar avatar-xs">
                                     <img src="assets/img/profiles/avatar-16.jpg" alt="">
                                   </div>
                                 </div>
                                 <a href="">
                                    {{ $employeeData->add_id }}
                                 </a>
                              </div>
                           </li> --}}
                        </ul>
                     </div>
                  </div>
               </div>
               {{-- <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div> --}}
            </div>
         </div>
         <div class="col-12">
            <a href="{{ route('employeeAteendancesPage') }}" class="btn btn-sm btn-primary">Back</a>
         </div>
      </div>
   </div>
   </div>

   <div class="card tab-box">
   <div class="row user-tabs">
      <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
         <ul class="nav nav-tabs nav-tabs-bottom">
            <li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active">Profile</a></li>
            <li class="nav-item"><a href="#emp_projects" data-toggle="tab" class="nav-link">Projects</a></li>
         </ul>
      </div>
   </div>
   </div>

   <div class="tab-content">

   <!-- Profile Info Tab -->
   <div id="emp_profile" class="pro-overview tab-pane fade show active">
      <div class="row">
         <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
               <div class="card-body">
                  <h3 class="card-title">Personal Informations</h3>
                  <ul class="personal-info">
                     <li>
                        <div class="title">Mobile/Phone Number</div>
                        <div class="text"><p>{{ $employeeData->mobile_number }}</p></div>
                     </li>
                     <li>
                        <div class="title">Nationality</div>
                        <div class="text">{{ $employeeData->nationality }}</div>
                     </li>
                     <li>
                        <div class="title">Cnic Number</div>
                        <div class="text">{{ $employeeData->cnic_number }}</div>
                     </li>
                     <li>
                        <div class="title">Marital status</div>
                        <div class="text">{{ $employeeData->marred_status }}</div>
                     </li>
                     <li>
                        <div class="title">Blood_group</div>
                        <div class="text">
                           <p>{{ $employeeData->blood_group }}</p>
                        </div>
                     </li>
                     <li>
                        <div class="title">Father name</div>
                        <div class="text">{{ $employeeData->father_name }}</div>
                     </li>
                     <li>
                        <div class="title">Postal Code</div>
                        <div class="text">{{ $employeeData->postal_code }}</div>
                     </li>
                     <li>
                        <div class="title">Country</div>
                        <div class="text">{{ $employeeData->country }}</div>
                     </li>
                     <li>
                        <div class="title">Place Of Birthdate</div>
                        <div class="text">{{ $employeeData->place_of_birth }}</div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
               <div class="card-body">
                  <h3 class="card-title">Emergency Contact </h3>
                  <ul class="personal-info">
                     <li>
                        <div class="title">Name</div>
                        <div class="text">{{ $employeeData->father_name }}</div>
                     </li>
                     <li>
                        <div class="title">Relationship</div>
                        <div class="text">{{ $employeeData->relationship }}</div>
                     </li>
                     <li>
                        <div class="title">Phone </div>
                        <div class="text">{{ $employeeData->emergency_contact_person }}</div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
               <div class="card-body">
                  <h3 class="card-title">Bank information</h3>
                  <ul class="personal-info">
                     <li>
                        <div class="title">Bank name</div>
                        <div class="text">{{ $employeeData->bank_name }}</div>
                     </li>
                     <li>
                        <div class="title">Bank account No.</div>
                        <div class="text">{{ $employeeData->account_number }}</div>
                     </li>
                     <li>
                        <div class="title">Bank account Title.</div>
                        <div class="text">{{ $employeeData->account_title }}</div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
               <div class="card-body">
                  <h3 class="card-title">Education Informations <a href="#" class="edit-icon"></a></h3>
                  <div class="experience-box">
                     <ul class="experience-list">
                        <li>
                           <div class="experience-content">
                              @if ($qualification->isEmpty())
                                  
                              @else
                                  @foreach ($qualification as $quo)
                                  <div class="timeline-content">
                                    <p class="name">{{ $quo->degree }}</p>
                                    <div>{{ $quo->subject }}</div>
                                    <span class="time">{{ $quo->gradution_year }}</span>
                                  </div>  
                                  @endforeach
                              @endif
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- /Profile Info Tab -->
   
   <!-- Projects Tab -->
   <div class="tab-pane fade" id="emp_projects">
      <div class="row">
         @if ($projects->isEmpty())
             
         @else
             @foreach ($projects as $project)
             <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
               <div class="card">
                  <div class="card-body">
                     <h4 class="project-title"><a href="project-view.html">{{ $project->project_name }}</a></h4>
                  </div>
               </div>
            </div>  
             @endforeach
         @endif
      </div>
   </div>
   <!-- /Projects Tab -->
   
   </div>
   @endif
</div>
<script src="assets/js/jquery-3.5.1.min.js"></script>

		<!-- Bootstrap Core JS -->
        <script src="/admin/hrsm_admin_dashboard-main/assets/js/popper.min.js"></script>
        <script src="/admin/hrsm_admin_dashboard-main/assets/js/bootstrap.min.js"></script>

		<!-- Slimscroll JS -->
		<script src="/admin/hrsm_admin_dashboard-main/assets/js/jquery.slimscroll.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="/admin/hrsm_admin_dashboard-main/assets/js/select2.min.js"></script>
		
		<!-- Datetimepicker JS -->
		<script src="/admin/hrsm_admin_dashboard-main/assets/js/moment.min.js"></script>
		<script src="/admin/hrsm_admin_dashboard-main/assets/js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Tagsinput JS -->
		<script src="/admin/hrsm_admin_dashboard-main/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

		<!-- Custom JS -->
		<script src="/admin/hrsm_admin_dashboard-main/assets/js/app.js"></script>
</body>
</html>

