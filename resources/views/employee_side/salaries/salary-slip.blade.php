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
    <title>Salary slip</title>
</head>
<body>
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <div class="card p-3">
                    @if ($salaryDetails->isEmpty())
                    <b>Not Data founded</b>
                    @else
                    @foreach ($salaryDetails as $item)
                    @endforeach
                    <div class="row">
                        <div class="col-md-6 px-2 text-start">
                            <div class="row">
                                <div class="col-3">
                                    <div style="border-radius: 50%;">
                                        @if (empty($item->company_logo))
                                           <img class="h-100 w-100" src="admin/dist/img/AdminLTELogo.png" alt="">
                                        @else
                                           <img class="h-100 w-100" src="{{ $item->company_logo }}" alt="">
                                        @endif
                                </div>
                            </div>
                                <div class="col-9 text-start pt-4"><p><span style="font-size: 30px;text-transform: capitalize;">{{ $item->company_name }}<br></span>{{ $item->company_address }}</p></div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <hr>
                    <div class="row py-4">
                        <div class="col-md-8 px-5">
                            <p class="text-secondary text-start" style="text-transform: uppercase;">Employee summary</p>
                            <div class="row">
                                <div class="col-6 text-start"><p class="text-secondary text-start">Employee Name</p></div>
                                <div class="col-6 text-start"><p>: <span class="px-2"></span>{{ $item->employee_name }}</p></div>
                            </div>
                            <!--  -->
                            <div class="row">
                                <div class="col-6 text-start"><p class="text-secondary text-start">Employee ID</p></div>
                                <div class="col-6 text-start"><p>: <span class="px-2"></span>{{ $item->id }}</p></div>
                            </div>
                            <!--  -->
                            <div class="row">
                                <div class="col-6 text-start"><p class="text-secondary text-start">Pay Date</p></div>
                                <div class="col-6 text-start"><p>: <span class="px-2"></span>{{ $item->salary_date }}</p></div>
                            </div>
                        </div>
                        <div class="col-md-3 p-3" style="border: 0.5px solid gray;border-radius: 10px;">
                            <div class="row text-start">
                                <p><span style="font-size: 30px;"><b>Rs:{{ $item->grand_total_amount }}/=</b><br></span>Employee Net Pay</p>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6 text-start text-secondary"><p>Paid Days</p></div>
                                <div class="col-6 text-start">: <span>{{ $item->total_days }}</span></div>
                            </div>
                            <div class="row">
                                <div class="col-6 text-start text-secondary"><p>LOP Days</p></div>
                                <div class="col-6 text-start">: <span>0</span></div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row py-4">
                        <div class="col-md-6 px-5">
                            <div class="row">
                                <div class="col-6 text-start"><p class="text-secondary text-start">Designation</p></div>
                                <div class="col-6 text-start"><p>: <span class="px-2"></span>{{ $item->employee_category_name }}</p></div>
                            </div>
                            <!--  -->

                        </div>
                        <!--  -->
                        <div class="col-md-6 px-5">
                            <div class="row">
                                <div class="col-6 text-start"><p class="text-secondary text-start">Invoice No</p></div>
                                <div class="col-6 text-start"><p>: <span class="px-2"></span>{{ $item->invoice_number }}</p></div>
                            </div>
                            <!--  -->

                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="ms-5 col-11">
                            <div class="row bg-light" style="border:1px solid gray;border-radius: 10px;">
                                <div class="col-md-6 px-3 text-start">
                                    <div class="row pt-3">
                                        <div class="col-6"><p class="text-start" style="text-transform: uppercase;font-size: 20px;"><b>Earnings</b></p></div>
                                        <div class="col-6 text-end" style="text-transform: uppercase;font-size: 20px;"><p><b>Amount</b></p></div>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col-6"><p class="text-start">Basic Salary</p></div>
                                        <div class="col-6 text-end"><p><b>Rs:{{ $item->pay_scale/22/8 }}/=</b></p></div>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col-6"><p class="text-start">House Rent Allownace</p></div>
                                        <div class="col-6 text-end"><p><b>Rs:{{ $item->house_rent_allownace }}/=</b></p></div>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col-6"><p class="text-start">Other Allownace</p></div>
                                        <div class="col-6 text-end"><p><b>Rs:{{ $item->other_allownace }}/=</b></p></div>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col-6"><p class="text-start"><b>Gross Earnings</b></p></div>
                                        <div class="col-6 text-end"><p><b>Rs:{{ $item->gross_earning }}/=</b></p></div>
                                    </div>
                                    <!--  -->

                                </div>
                                <!--  -->
                                <div class="col-md-6 px-3 text-start">
                                    <div class="row pt-3">
                                        <div class="col-6"><p class="text-start" style="text-transform: uppercase;font-size: 20px;"><b>Deductions</b></p></div>
                                        <div class="col-6 text-end" style="text-transform: uppercase;font-size: 20px;"><p><b>Amount</b></p></div>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col-6"><p class="text-start">Incoming Tax</p></div>
                                        <div class="col-6 text-end"><p><b>Rs:{{ $item->text_amount }}/=</b></p></div>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col-6"><p class="text-start">Provident Fund</p></div>
                                        <div class="col-6 text-end"><p><b>Rs:{{ $item->provident_fund }}/=</b></p></div>
                                    </div>
                                    <div class="row pt-3" style="visibility: hidden;">
                                        <div class="col-6"><p class="text-start">Provident Fund</p></div>
                                        <div class="col-6 text-end"><p><b>Rs:{{ $item->created_at }}/=</b></p></div>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col-6"><p class="text-start"><b>Total Deductions</b></p></div>
                                        <div class="col-6 text-end"><p><b>Rs:{{ $item->total_deductions }}/=</b></p></div>
                                    </div>
                                    <!--  -->

                                </div>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="row py-4">
                        <div class="ms-5 col-11">
                            <div class="row pt-2" style="border:1px solid gray;border-radius: 10px;">
                                <div class="col-md-9 px-3 text-start">
                                        <p class="text-start" style="text-transform: uppercase;font-size: 20px;"><b>TOTAL net payable</b></p>
                                    <!--  -->
                                </div>
                                <!--  -->
                                <div class="col-md-3 pe-3 text-end">
                                        <div class="text-end" style="text-transform: uppercase;font-size: 20px;"><p><b>Rs:{{ $item->grand_total_amount }}.00/=</b></p>
                                    <!--  -->

                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    @endif
        </div>
    </div>
</body>
</html>

