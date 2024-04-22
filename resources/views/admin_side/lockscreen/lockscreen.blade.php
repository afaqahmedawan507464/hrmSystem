<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Old Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body class="hold-transition lockscreen">

<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
    @if (Session::has('error_message'))

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error</strong> {{ Session::get('error_message'); }}
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
  <div class="lockscreen-logo">
    <p><b>Multi Vender</b><br>Ecommerce Site</p>
  </div>


  <!-- User name -->
  <div class="lockscreen-name">{{ Auth::guard('admin')->user()->admin_name }}</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <!-- /.lockscreen-image -->
    <div class="lockscreen-image" style="border:0px solid white">
        {{-- <img src="admin/dist/img/user1-128x128.jpg" alt="User Image"> --}}
        @if (!empty(Auth::guard('admin')->user()->image))
        <img src="{{asset(Auth::guard('admin')->user()->image)}}" class="img-circle elevation-2" alt="" style="width: 75px;height:75px">
      @else
        <img src="admin/dist/img/avators.jpg" class="img-circle elevation-2" alt="User Image"style="width: 75px;height:75px">
      @endif
      </div>
    <!-- lockscreen credentials (contains the form) -->
    <form action="{{ route('lockScreenLogin') }}" method="post" class="lockscreen-credentials">
        @csrf
      <div class="input-group">
        <input type="password" class="form-control" placeholder="Type Old Password" name="password" id="password">

        <div class="input-group-append">
          <button type="submit" class="btn">
            <i class="fas fa-arrow-right text-muted"></i>
          </button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->
  </div>
  <!-- /.lockscreen-item -->
  {{-- <div class="lockscreen-footer text-center">
    <strong>Copyright &copy; 2023-2033 Afaq Ahmed Awan</strong>
    All rights reserved.

  </div> --}}
</div>
<!-- /.center -->

<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
