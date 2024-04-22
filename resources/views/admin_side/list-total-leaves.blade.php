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
    <title>Document</title>
</head>
<body>
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
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
                <div class="card p-5">
                    {{-- <h5 class="text-center mb-4">Add Your Bank Accounts Details.</h5> --}}
                        <div class="row justify-content-between text-start">
                            <div class="tab-pane show fade justify-content-center px-5" id="bank-tab">
                                <h4 class="text-center my-3">Leave List</h4>
                                <hr>
                                <table class="table">
                                   <thead class="bg-primary text-white">
                                      <tr>
                                         <th scope="col" style="width: 7%;text-align:center">Id</th>
                                         <th scope="col" style="width: 10%;text-align:center">Emp Id</th>
                                         <th scope="col" style="width: 25%;text-align:center">Title Leave</th>
                                         <th scope="col" style="width: 10%;text-align:center">Starting Date</th>
                                         <th scope="col" style="width: 10%;text-align:center">Ending Date</th>
                                         <th scope="col" style="width: 10%;text-align:center">Leave Status</th>
                                         <th scope="col" style="width: 28%;text-align:center">Operation</th>
                                      </tr>
                                   </thead>
                                   <tbody>
                                    @foreach ($totalleaves as $item)

                                      <tr>
                                         <th scope="col" style="width: 7%;text-align:center;padding:10px 20px">{{ $item->id }}</th>
                                         <td style="width: 10%;text-align:center">{{ $item->employee_id }}</td>
                                         <td style="width: 25%;text-align:center;padding:10px 20px">{{ $item->subject_leave }}</td>
                                         <td style="width: 10%;text-align:center;padding:10px 20px">{{ $item->start_leave_date }}</td>
                                         <td style="width: 15%;text-align:center;padding:10px 20px">{{ $item->end_leave_date }}</td>
                                         <td style="width: 10%;text-align:center;padding:10px 20px">
                                            @if($item->active_status == 1)
                                              Leave Approved
                                            @else
                                              Approve Pending
                                            @endif
                                         </td>
                                         @if (Auth::guard('employee')->user())
                                         <td scope="col" style="width: 28%;text-align:center;">
                                            <a class="px-1 btn btn-primary btn-sm text-white text-decoration-none" href="{{ route('hrleaveInformation',$item->id) }}"><i class="fas fa-info p-2"></i></a>
                                            <a class="px-1 btn btn-danger btn-sm text-white text-decoration-none" href="{{ route('hrleaveRemove',$item->id)  }}"><i class="fas fa-trash p-2"></i></a>
                                         </td>
                                         @else
                                         <td scope="col" style="width: 28%;text-align:center;">
                                            {{-- <a class="px-1 btn btn-primary btn-sm text-white text-decoration-none" href="{{ route('companyDetails',$item->id) }}"><i class="fas fa-info p-2"></i></a>
                                            <a class="px-1 btn btn-danger btn-sm text-white text-decoration-none" href="{{ route('removeCompany',$item->id)  }}"><i class="fas fa-trash p-2"></i></a> --}}
                                         </td>
                                         @endif

                                      </tr>

                                    @endforeach
                                   </tbody>
                                </table>
                             </div>
                        </div>

                    <div class="col-12 d-flex align-items-center">
                        <div class="py-2">
                           <button class="btn btn-danger"><a class="text-white text-decoration-none" href="{{ route('employeeDashboard') }}">Back</a></button>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>



