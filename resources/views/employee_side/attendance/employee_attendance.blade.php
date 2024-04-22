@extends('employee_side.dashboard-layout.layout')
@section('employee_attendances')
<div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header p-3">
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
					
					<!-- Search Filter -->
					<form method="POST" action="" class="row filter-row">
                  @csrf
						<div class="col-sm-6 col-md-3">  
							<div class="form-group form-focus">
								<input type="text" name="searchEmployeeName" class="form-control floating">
								<label class="focus-label">Employee Name</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3"> 
							<div class="form-group form-focus select-focus">
								<select class="select floating" name="searchMonthsData"> 
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
                  <div class="col-sm-6 col-md-3"> 
							<div class="form-group form-focus select-focus">
								<select class="select floating" name="searchYearsData"> 
									<option>-</option>
									<option>Jan</option>
								</select>
								<label class="focus-label">Select Year</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">   
                     <button class="btn btn-success btn-block" type="submit"> Search </button>
						</div>     
               </form>
					<!-- /Search Filter -->
					
                    <div class="row mt-4">
                        <div class="col-lg-12">
							<div class="table-responsive" style="height: 640px;overflow-y:scroll">
								<table class="table table-striped custom-table table-nowrap mb-0">
									<thead>
										<tr>
											<th>Employee</th>
											<th>1</th>
											<th>2</th>
											<th>3</th>
											<th>4</th>
											<th>5</th>
											<th>6</th>
											<th>7</th>
											<th>8</th>
											<th>9</th>
											<th>10</th>
											<th>11</th>
											<th>12</th>
											<th>13</th>
											<th>14</th>
											<th>15</th>
											<th>16</th>
											<th>17</th>
											<th>18</th>
											<th>19</th>
											<th>20</th>
											<th>22</th>
											<th>23</th>
											<th>24</th>
											<th>25</th>
											<th>26</th>
											<th>27</th>
											<th>28</th>
											<th>29</th>
											<th>30</th>
											<th>31</th>
                                 <th>Details</th>
										</tr>
									</thead>
									<tbody>
                              @if ($selectEmployee->isEmpty())
                                  
                              @else
                                  @foreach ($selectEmployee as $employeeAttendance)
                                    <tr>
                                    <td>
                                       <h2 class="table-avatar">
                                          @if (empty($employeeAttendance->image))
                                             <a class="avatar avatar-xs" href="{{ route('searchPersonProfile',$employeeAttendance->id) }}"><img alt="" src="admin/dist/img/avators.jpg"></a>
                                          @else
                                             <a class="avatar avatar-xs" href="{{ route('searchPersonProfile',$employeeAttendance->id) }}"><img alt="" src="{{ $employeeAttendance->image }}"></a>
                                          @endif
                                          <a href="{{ route('searchPersonProfile',$employeeAttendance->id) }}">{{ $employeeAttendance->employee_name }}</a>
                                       </h2>
                                    </td>
                                    @if ($employeeAttendanc->isEmpty())
                                        
                                    @else
                                        @foreach ($employeeAttendanc as $attendancEmployee)
                                        <td>
                                             @if ( $attendancEmployee->employee_attendance_status == '0' )
                                               <i class="fas fa-xmark text-danger"></i> 
                                             @elseif ( $attendancEmployee->employee_attendance_status == '1' )
                                               <i class="fas fa-check text-success"></i>
                                             @elseif ( $attendancEmployee->employee_attendance_status == '2' )
                                               <i class="fas fa-clock text-warning"></i>
                                             @elseif ( $attendancEmployee->employee_attendance_status == '3' )
                                               <i class="fas fa-user-clock text-warning"></i>
                                             @endif
                                        </td>  
                                        @endforeach
                                    @endif
                                    <td>
                                       <a href="{{ route('employeeSalaryDetails',$employeeAttendance->id ) }}">View</a>
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
@endsection




