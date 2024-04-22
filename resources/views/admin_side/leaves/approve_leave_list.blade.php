<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
  {{-- analog clock --}}
  <link rel="stylesheet" href="admin/clock/index.css">
  {{-- disgital clock --}}
  <link rel="stylesheet" href="admin/digital-clock.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="account-setting.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  {{-- custom css file --}}
  <link rel="stylesheet" href="/cusstom-css.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="container-fluid">
          <div class="row mb-2">
             <div class="col-sm-6">
                <h1>Leaves List</h1>
             </div>
          </div>
       </div>
       <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
       <!-- Default box -->
       <div class="card card-solid">
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

          <div class="card-body p-5">

             <div class="row">
                @if($datas->isEmpty())
                    <h3 class="text-center text-danger">Not Data Founded</h3>
                @else
                    @foreach ($datas as $item)
                   <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch flex-column">
                   <div class="card bg-light d-flex flex-fill">
                      <div class="card-body py-2 px-5">
                         <div class="row">
                            <div class="col-12 text-center d-flex flex-column justify-content-center align-items-center">

                            </div>
                            <div class="col-12">
                               <h2 class="lead names"><b>{{ $item->employee_name }}</b></h2>
                               {{--
                               <p class="text-muted text-sm text-start"><b>Email Address:</b>email address</p>
                               --}}
                               <ul>
                                  <div class="ml-4 mb-0 fa-ul text-muted d-flex flex-column justify-content-center align-items-center">
                                     <div class="d-flex justify-content-center">
                                        <div class="text">
                                           <p class="emailaddress">Leave Subject:</p>
                                        </div>
                                        <div class="text">
                                            <p class="emailaddress">{{ $item->subject_leave }}</p>
                                        </div>
                                     </div>
                                     <div class="d-flex justify-content-center">
                                        <div class="text">
                                           <p class="emailaddress">Start Date:</p>
                                        </div>
                                        <div class="text">
                                            <p class="emailaddress">{{ $item->start_leave_date }}</p>
                                        </div>
                                     </div>
                                     <div class="d-flex justify-content-center">
                                        <div class="text">
                                           <p class="emailaddress">End Date:</p>
                                        </div>
                                        <div class="text">
                                            <p class="emailaddress">{{ $item->end_leave_date }}</p>
                                        </div>
                                     </div>
                                     <div class="d-flex justify-content-center">
                                        <div class="text">
                                           <p class="emailaddress">Date:</p>
                                        </div>
                                        <div class="text">
                                            <p class="emailaddress">{{ $item->created_at }}</p>
                                        </div>
                                     </div>
                                  </div>
                               </ul>
                            </div>
                         </div>
                      </div>
                      <div class="card-footer">
                         <div class="text-right">
                            <a href="{{ route('leaveRemove',$item->id) }}" class="btn btn-sm bg-danger text-white">
                            Remove Leave
                            </a>
                            <a href="{{ route('leaveInformation',$item->id) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-user px-1"></i> View Application
                            </a>
                         </div>
                      </div>
                   </div>
                   </div>
                    @endforeach
                @endif
             </div>
             <div class="py-2">
                <button class="btn btn-danger"><a class="text-white text-decoration-none" href="{{ route('adminDashboard') }}">Back</a></button>
             </div>
          </div>

    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->

<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="admin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="admin/plugins/raphael/raphael.min.js"></script>
<script src="admin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="admin/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="admin/plugins/chart.js/Chart.min.js"></script>

{{-- <!-- AdminLTE for demo purposes -->
<script src="admin/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="admin/dist/js/pages/dashboard2.js"></script> --}}

{{-- clock javascript file --}}
<script src="admin/clock/index.js"></script>

{{-- clock javascript file --}}
<script src="admin\digital clock\digital-clock.js"></script>
{{-- profile setting javascript file --}}
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>

