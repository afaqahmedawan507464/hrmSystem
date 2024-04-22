<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Employee Attendance</title>
		
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
		
		<!-- Main Stylesheet -->
        <link rel="stylesheet" href="/admin/hrsm_admin_dashboard-main/assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
		<!-- Main Wrapper -->
		@if ($selectEmployeeees->isEmpty())
			
		@else
		<div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
				
				<a id="toggle_btn" href="javascript:void(0);">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</a>
				
				<!-- Header Title -->
                @foreach ($selectEmployeeees as $employeeDetails)
                    
                @endforeach
                <div class="page-title-box">
					<h3 style="text-transform: capitalize"> {{ $employeeDetails->employee_name }} Attendance Details</h3>
                </div>
				<!-- /Header Title -->
				
				<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
				
            </div>
			<!-- /Header -->
			
			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li class="submenu">
								<a href="{{ route('employeeAteendancesPage') }}"> Back </a>
							</li>
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Attendance</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Attendance</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-6">
							<div class="card punch-status">
								<div class="card-body">
									<h5 class="card-title">Timesheet </h5>
									
									<div class="punch-info">
										<div class="punch-hours">
											<span>{{ $sumTotalTime }} hrs</span>
										</div>
									</div>
									<div class="statistics">
										<div class="row">
											<div class="col-12 text-center py-1">
												<div class="stats-box">
													<p>Break</p>
													<h6>1.21 hrs</h6>
												</div>
											</div>
											<div class="col-12 text-center mt-3 py-1">
												<div class="stats-box">
													<p>Overtime</p>
													<h6>{{ $sumOvertime }} hrs</h6>
												</div>
											</div>
                                            <div class="col-12 text-center mt-3 py-1">
												<div class="stats-box">
													<p>Late time</p>
													<h6>{{ $lateSumTotalLate }} hrs</h6>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card recent-activity">
								<div class="card-body">
									<h5 class="card-title">Today Activity</h5>
									<ul class="res-activity-list">
                                        @foreach ($selectEmployeeees as $employeeDetails)
                                            <li>
											    <p class="mb-0">Punch In at</p>
											    <p class="res-activity-time">
												    <i class="fa fa-clock-o"></i>
                                                    {{ \Carbon\Carbon::parse($employeeDetails->login_time)->format('h:m:i A') }} <span class="mx-2">{{  \Carbon\Carbon::parse($employeeDetails->workingdate)->format('M,d Y')  }}</span>
											    </p>
										    </li>
                                            @if (empty($employeeDetails->logout_time))
                                                
                                            @else
                                            <li>
											    <p class="mb-0">Punch Out at</p>
											    <p class="res-activity-time">
												    <i class="fa fa-clock-o"></i>
                                                    {{ \Carbon\Carbon::parse($employeeDetails->logout_time)->format('h:m:i A') }} <span class="mx-2">{{  \Carbon\Carbon::parse($employeeDetails->workingdate)->format('M,d Y')  }}</span>
											    </p>
										    </li>
                                            @endif
                                        @endforeach
									</ul>
								</div>
							</div>
						</div>
					</div>

					<!-- Search Filter -->
					{{-- <div class="row filter-row">
						<div class="col-sm-3">  
							<div class="form-group form-focus">
								<div class="cal-icon">
									<input type="text" class="form-control floating datetimepicker">
								</div>
								<label class="focus-label">Date</label>
							</div>
						</div>
						<div class="col-sm-3"> 
							<div class="form-group form-focus select-focus">
								<select class="select floating"> 
									<option>-</option>
									<option>Jan</option>
									<option>Feb</option>
									<option>Mar</option>
									<option>Apr</option>
									<option>May</option>
									<option>Jun</option>
									<option>Jul</option>
									<option>Aug</option>
									<option>Sep</option>
									<option>Oct</option>
									<option>Nov</option>
									<option>Dec</option>
								</select>
								<label class="focus-label">Select Month</label>
							</div>
						</div>
						<div class="col-sm-3"> 
							<div class="form-group form-focus select-focus">
								<select class="select floating"> 
									<option>-</option>
									<option>2019</option>
									<option>2018</option>
									<option>2017</option>
									<option>2016</option>
									<option>2015</option>
								</select>
								<label class="focus-label">Select Year</label>
							</div>
						</div>
						<div class="col-sm-3">  
							<a href="#" class="btn btn-success btn-block"> Search </a>  
						</div>     
                    </div> --}}
					<!-- /Search Filter -->
					
                    <div class="row">
                        <div class="col-lg-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table mb-0">
									<thead>
										<tr>
											<th style="text-center">Date </th>
											<th style="text-center">Punch In</th>
											<th style="text-center">Punch Out</th>
											<th style="text-center">Break</th>
											<th style="text-center">Overtime</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($selectEmployeeees as $employeeDetails)
                                        <tr>
											<td style="text-center">{{  \Carbon\Carbon::parse($employeeDetails->workingdate)->format('M,d Y')  }}</td>
											<td style="text-center">{{ \Carbon\Carbon::parse($employeeDetails->login_time)->format('h:m:i A') }}</td>
											<td style="text-center">{{ \Carbon\Carbon::parse($employeeDetails->logout_time)->format('h:m:i A') }}</td>
											<td style="text-center">{{ $employeeDetails->overtime }}</td>
											<td style="text-center">{{ $employeeDetails->overtime }}</td>
										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
                        </div>
                    </div>
                </div>
				<!-- /Page Content -->
				
            </div>
			<!-- Page Wrapper -->
			
        </div>
		@endif
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="/admin/hrsm_admin_dashboard-main/assets/js/jquery-3.5.1.min.js"></script>
		
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
		
		<!-- Custom JS -->
		<script src="/admin/hrsm_admin_dashboard-main/assets/js/app.js"></script>
		
    </body>
</html>