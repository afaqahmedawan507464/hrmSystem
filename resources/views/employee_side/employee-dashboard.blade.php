@extends('employee_side.dashboard-layout.layout')
@section('dashboard')
<div class="row g-3 mb-3">
  <div class="col-md-6 col-xxl-3">
    <div class="card h-md-100 ecommerce-card-min-width">
      <div class="card-header pb-0">
        <h6 class="mb-0 mt-2 d-flex align-items-center">Total Employees</h6>
      </div>
      <div class="card-body d-flex flex-column justify-content-end">
        <div class="row">
          <div class="col">
            <p class="font-sans-serif lh-1 fs-4">{{ $totalEmployee }}</p>
          </div>
          <div class="col-auto ps-0">
            {{-- <div class="echart-bar-weekly-sales h-100"></div> --}}
            <i class="fs-5 fw-normal font-sans-serif mb-1 lh-1 fas fa-users"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xxl-3">
    <div class="card h-md-100 ecommerce-card-min-width">
      <div class="card-header pb-0">
        <h6 class="mb-0 mt-2 d-flex align-items-center">Present Employees</h6>
      </div>
      <div class="card-body d-flex flex-column justify-content-end">
        <div class="row">
          <div class="col">
            <p class="font-sans-serif lh-1 fs-4">{{ $onlineStatus }}</p>
          </div>
          <div class="col-auto ps-0">
            <i class="fs-5 fw-normal font-sans-serif mb-1 lh-1 fas fa-user-check"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xxl-3">
    <div class="card h-md-100 ecommerce-card-min-width">
      <div class="card-header pb-0">
        <h6 class="mb-0 mt-2 d-flex align-items-center">Absent Employees</h6>
      </div>
      <div class="card-body d-flex flex-column justify-content-end">
        <div class="row">
          <div class="col">
            <p class="font-sans-serif lh-1 fs-4">{{ $offlineStatus }}</p>
          </div>
          <div class="col-auto ps-0">
            {{-- <div class="echart-bar-weekly-sales h-100"></div> --}}
            <i class="fs-5 fw-normal font-sans-serif mb-1 lh-1 fas fa-user-times"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xxl-3">
    <div class="card h-md-100 ecommerce-card-min-width">
      <div class="card-header pb-0">
        <h6 class="mb-0 mt-2 d-flex align-items-center">Leaves Employees</h6>
      </div>
      <div class="card-body d-flex flex-column justify-content-end">
        <div class="row">
          <div class="col">
            <p class="font-sans-serif lh-1 fs-4">{{ $totalLeaves }}</p>
          </div>
          <div class="col-auto ps-0">
            {{-- <div class="echart-bar-weekly-sales h-100"></div> --}}
            <i class="fs-5 fw-normal font-sans-serif mb-1 lh-1 fas fa-envelope"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xxl-3">
    <div class="card h-md-100 ecommerce-card-min-width">
      <div class="card-header pb-0">
        <h6 class="mb-0 mt-2 d-flex align-items-center">Travel</h6>
      </div>
      <div class="card-body d-flex flex-column justify-content-end">
        <div class="row">
          <div class="col">
            <p class="font-sans-serif lh-1 fs-4">{{ $totalEmployee }}</p>
          </div>
          <div class="col-auto ps-0">
            {{-- <div class="echart-bar-weekly-sales h-100"></div> --}}
            <i class="fs-5 fw-normal font-sans-serif mb-1 lh-1 fas fa-tractor"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xxl-3">
    <div class="card h-md-100 ecommerce-card-min-width">
      <div class="card-header pb-0">
        <h6 class="mb-0 mt-2 d-flex align-items-center">Specific Off</h6>
      </div>
      <div class="card-body d-flex flex-column justify-content-end">
        <div class="row">
          <div class="col">
            <p class="font-sans-serif lh-1 fs-4">{{ $onlineStatus }}</p>
            {{-- <p class="font-sans-serif lh-1 fs-1">Present ({{ ($onlineStatus/$totalEmployee) * 100 }}%)</p> --}}
          </div>
          <div class="col-auto ps-0">
            {{-- <div class="echart-bar-weekly-sales h-100"></div> --}}
            <i class="fs-5 fw-normal font-sans-serif mb-1 lh-1 fas fa-user-injured"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xxl-3">
    <div class="card h-md-100 ecommerce-card-min-width">
      <div class="card-header pb-0">
        <h6 class="mb-0 mt-2 d-flex align-items-center">Departments</h6>
      </div>
      <div class="card-body d-flex flex-column justify-content-end">
        <div class="row">
          <div class="col">
            <p class="font-sans-serif lh-1 fs-4">{{ $departments }}</p>
          </div>
          <div class="col-auto ps-0">
            {{-- <div class="echart-bar-weekly-sales h-100"></div> --}}
            <i class="fs-5 fw-normal font-sans-serif mb-1 lh-1 fas fa-building"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xxl-3">
    <div class="card h-md-100 ecommerce-card-min-width">
      <div class="card-header pb-0">
        <h6 class="mb-0 mt-2 d-flex align-items-center">Companies</h6>
      </div>
      <div class="card-body d-flex flex-column justify-content-end">
        <div class="row">
          <div class="col">
            <p class="font-sans-serif lh-1 fs-4">{{ $companyData }}</p>
          </div>
          <div class="col-auto ps-0">
            {{-- <div class="echart-bar-weekly-sales h-100"></div> --}}
            <i class="fs-5 fw-normal font-sans-serif mb-1 lh-1 fas fa-home"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xxl-3">
    <div class="card h-md-100 ecommerce-card-min-width">
      <div class="card-header pb-0">
        <h6 class="mb-0 mt-2 d-flex align-items-center">Leaves Accepted</h6>
      </div>
      <div class="card-body d-flex flex-column justify-content-end">
        <div class="row">
          <div class="col">
            <p class="font-sans-serif lh-1 fs-4">{{ $leavesApprovedData }}</p>
          </div>
          <div class="col-auto ps-0">
            {{-- <div class="echart-bar-weekly-sales h-100"></div> --}}
            <i class="fs-5 fw-normal font-sans-serif mb-1 lh-1 fas fa-envelope-open"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xxl-3">
    <div class="card h-md-100 ecommerce-card-min-width">
      <div class="card-header pb-0">
        <h6 class="mb-0 mt-2 d-flex align-items-center">Leaves Rejected</h6>
      </div>
      <div class="card-body d-flex flex-column justify-content-end">
        <div class="row">
          <div class="col">
            <p class="font-sans-serif lh-1 fs-4">{{ $leavesRejectedData }}</p>
            {{-- <p class="font-sans-serif lh-1 fs-1">Present ({{ ($onlineStatus/$totalEmployee) * 100 }}%)</p> --}}
          </div>
          <div class="col-auto ps-0">
            {{-- <div class="echart-bar-weekly-sales h-100"></div> --}}
            <i class="fs-5 fw-normal font-sans-serif mb-1 lh-1 fas fa-envelope"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xxl-3">
    <div class="card h-md-100 ecommerce-card-min-width">
      <div class="card-header pb-0">
        <h6 class="mb-0 mt-2 d-flex align-items-center">Account Accepted</h6>
      </div>
      <div class="card-body d-flex flex-column justify-content-end">
        <div class="row">
          <div class="col">
            <p class="font-sans-serif lh-1 fs-4">{{ $accountApproveData }}</p>
          </div>
          <div class="col-auto ps-0">
            {{-- <div class="echart-bar-weekly-sales h-100"></div> --}}
            <i class="fs-5 fw-normal font-sans-serif mb-1 lh-1 fas fa-user-clock"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xxl-3">
    <div class="card h-md-100 ecommerce-card-min-width">
      <div class="card-header pb-0">
        <h6 class="mb-0 mt-2 d-flex align-items-center">Account Rejected</h6>
      </div>
      <div class="card-body d-flex flex-column justify-content-end">
        <div class="row">
          <div class="col">
            <p class="font-sans-serif lh-1 fs-4">{{ $accountRejectData }}</p>
          </div>
          <div class="col-auto ps-0">
            {{-- <div class="echart-bar-weekly-sales h-100"></div> --}}
            <i class="fs-5 fw-normal font-sans-serif mb-1 lh-1 fas fa-user-alt-slash"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row g-0">
  <div class="col-lg-6 pe-lg-2 mb-3">
    <div class="card h-lg-100 overflow-hidden">
      <div class="card-header bg-light">
        <div class="row align-items-center">
          <div class="col">
            <h6 class="mb-0">Present Employee</h6>
          </div>
        </div>
      </div>
      <div class="card-body p-0">
            <div class="tab-content">
              <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-b2b8e3d6-9875-4a87-9af3-b08b85ade1cc" id="dom-b2b8e3d6-9875-4a87-9af3-b08b85ade1cc">
                <!-- Find the JS file for the following chart at: src/js/charts/chartjs/chart-doughnut.js-->
                <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
                <canvas class="max-w-100" id="chartjs-doughnut-chart" width="551" style="display: block; box-sizing: border-box; height: 350px; width: 551px;" height="350"></canvas>
              </div>
              <div class="tab-pane code-tab-pane" role="tabpanel" aria-labelledby="tab-dom-f71f4c8f-88d1-47b9-89d2-4ecbaf207971" id="dom-f71f4c8f-88d1-47b9-89d2-4ecbaf207971">
                <pre class="scrollbar rounded-1 language-html" style="max-height:420px" tabindex="0"><code class=" language-html">
                  <span class="token comment">&lt;!-- Find the JS file for the following chart at: src/js/charts/chartjs/chart-doughnut.js--&gt;</span>

                  <span class="token comment">&lt;!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js--&gt;</span>
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>canvas</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>max-w-100<span class="token punctuation">"</span></span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>chartjs-doughnut-chart<span class="token punctuation">"</span></span> <span class="token attr-name">width</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>350< class="token punctuation">"</                  span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>canvas</span><span class="token punctuation">&gt;</span></span></code></pre>
              </div>
            </div>
          </div>
    </div>
  </div>
  <div class="col-lg-6 ps-lg-2 mb-3">
    <div class="card h-lg-100">
      <div class="card-header bg-light">
        <div class="row flex-between-center">
          <div class="col-auto">
            <h6 class="mb-0">Details</h6>
          </div>
        </div>
      </div>
      <div class="card-body h-100 p-5" style="overflow-y:scroll;height:100%;">
        <div class="row">
          <div class="col-xl-6 col-lg-12 px-2" style="border: 0.5px solid lightgray;border-radius:10px;">
            <div class="mt-3" style="overflow-y:scroll;height:300px;">
              <h4 class="text-center">Present Employee</h4>
              <hr>
              <table class="table">
              <thead>
                 <tr>
                    <th scope="col"><span class="mx-2">Employee Name</th>
                    <th scope="col" style="text-align:center;">Login Time</th>
                 </tr>
              </thead>
              <hr>
              <tbody>
                 @if ($attendance->isEmpty())
                 @else
                 @foreach ($attendance as $assigeees)
                 <tr>
                    <td class="d-flex align-items-center" style="text-align:center;">
                      <span class="mx-3">
                      <div class="avatar avatar-xl">
                      @if (empty($assigeees->image))
                      <img src="/admin/dist/img/avators.jpg" alt="" class="rounded-circle">
                      @else
                      <img src="{{ $assigeees->image }}" alt="" class="rounded-circle">
                      @endif
                      </div>
                    </span>
                    {{ $assigeees->employee_name }}
                    </td>
                    <td style="text-align:center;">{{ \Carbon\Carbon::parse($assigeees->login_time)->format('h:i:s A') }}</td>
                 </tr>
                 @endforeach
                 @endif
              </tbody>
              </table>
            </div>
          </div>
          <div class="col-xl-6 col-lg-12 px-2" style="border: 0.5px solid lightgray;border-radius:10px;">
            @if ($absentEmployee->isEmpty())
            
            @else
            <div class="mt-3" style="overflow-y:scroll;height:300px;">
              <h4 class="text-center">Absent Employee</h4>
              <hr>
                <table class="table">
                  <thead>
                     <tr>
                        <th scope="col"><span class="mx-2">Employee Name</th>
                     </tr>
                  </thead>
                  <hr>
                  <tbody>
                     @if ($absentEmployee->isEmpty())
                     @else
                     @foreach ($absentEmployee as $assigeees)
                     <tr>
                        <td class="d-flex align-items-center" style="text-align:center;">
                          <span class="mx-3">
                            <div class="avatar avatar-xl">
                            @if (empty($assigeees->image))
                            <img src="/admin/dist/img/avators.jpg" alt="" class="rounded-circle">
                            @else
                            <img src="{{ $assigeees->image }}" alt="" class="rounded-circle">
                            @endif
                            </div>
                          </span>
                          {{ $assigeees->employee_name }}
                        </td>
                     </tr>
                     @endforeach
                     @endif
                  </tbody>
                  </table>
            </div>
            @endif
          </div>
          <div class="col-12 p-3">
            @if ($leaveEmployees->isEmpty())
            
            @else
            <div class="mt-3" style="overflow-y:scroll;height:300px;">
              <h4 class="text-center">Employee on leave</h4>
              <hr>
                <table class="table">
                  <thead>
                     <tr>
                        <th scope="col"><span class="mx-2">Employee Name</th>
                     </tr>
                  </thead>
                  <hr>
                  <tbody>
                     @if ($leaveEmployees->isEmpty())
                     @else
                     @foreach ($leaveEmployees as $assigeees)
                     <tr>
                        <td class="d-flex align-items-center" style="text-align:center;">
                          <span class="mx-3">
                            <div class="avatar avatar-xl">
                            @if (empty($assigeees->image))
                            <img src="/admin/dist/img/avators.jpg" alt="" class="rounded-circle">
                            @else
                            <img src="{{ $assigeees->image }}" alt="" class="rounded-circle">
                            @endif
                            </div>
                          </span>
                          {{ $assigeees->employee_name }}
                        </td>
                     </tr>
                     @endforeach
                     @endif
                  </tbody>
                  </table>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- <div class="row g-0">
  <div class="col-lg-6 col-xl-7 col-xxl-8 mb-3 pe-lg-2 mb-3">
    <div class="card h-lg-100">
      <div class="card-body d-flex align-items-center">
        <div class="w-100">
          <h6 class="mb-3 text-800">Using Storage <strong class="text-dark">1775.06 MB </strong>of 2 GB</h6>
          <div class="progress mb-3 rounded-3" style="height: 10px;">
            <div class="progress-bar bg-progress-gradient border-end border-white border-2" role="progressbar" style="width: 43.72%" aria-valuenow="43.72" aria-valuemin="0" aria-valuemax="100"></div>
            <div class="progress-bar bg-info border-end border-white border-2" role="progressbar" style="width: 18.76%" aria-valuenow="18.76" aria-valuemin="0" aria-valuemax="100"></div>
            <div class="progress-bar bg-success border-end border-white border-2" role="progressbar" style="width: 9.38%" aria-valuenow="9.38" aria-valuemin="0" aria-valuemax="100"></div>
            <div class="progress-bar bg-200" role="progressbar" style="width: 28.14%" aria-valuenow="28.14" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="row fs--1 fw-semi-bold text-500 g-0">
            <div class="col-auto d-flex align-items-center pe-3"><span class="dot bg-primary"></span><span>Regular</span><span class="d-none d-md-inline-block d-lg-none d-xxl-inline-block">(895MB)</span></div>
            <div class="col-auto d-flex align-items-center pe-3"><span class="dot bg-info"></span><span>System</span><span class="d-none d-md-inline-block d-lg-none d-xxl-inline-block">(379MB)</span></div>
            <div class="col-auto d-flex align-items-center pe-3"><span class="dot bg-success"></span><span>Shared</span><span class="d-none d-md-inline-block d-lg-none d-xxl-inline-block">(192MB)</span></div>
            <div class="col-auto d-flex align-items-center"><span class="dot bg-200"></span><span>Free</span><span class="d-none d-md-inline-block d-lg-none d-xxl-inline-block">(576MB)</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-xl-5 col-xxl-4 mb-3 ps-lg-2">
    <div class="card h-lg-100">
      <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
      </div>
      <!--/.bg-holder-->

      <div class="card-body position-relative">
        <h5 class="text-warning">Running out of your space?</h5>
        <p class="fs--1 mb-0">Your storage will be running out soon. Get more space and powerful productivity features.</p><a class="btn btn-link fs--1 text-warning mt-lg-3 ps-0" href="#!">Upgrade storage<span class="fas fa-chevron-right ms-1" data-fa-transform="shrink-4 down-1"></span></a>
      </div>
    </div>
  </div>
</div>
<div class="row g-0">
  <div class="col-lg-7 col-xl-8 pe-lg-2 mb-3">
    <div class="card h-lg-100 overflow-hidden">
      <div class="card-body p-0">
        <div class="table-responsive scrollbar">
          <table class="table table-dashboard mb-0 table-borderless fs--1 border-200">
            <thead class="bg-light">
              <tr class="text-900">
                <th>Best Selling Products</th>
                <th class="text-end">Revenue ($3333)</th>
                <th class="pe-card text-end" style="width: 8rem">Revenue (%)</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-bottom border-200">
                <td>
                  <div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="assets/img/products/12.png" width="60" alt="" />
                    <div class="flex-1 ms-3">
                      <h6 class="mb-1 fw-semi-bold"><a class="text-dark stretched-link" href="#!">Raven Pro</a></h6>
                      <p class="fw-semi-bold mb-0 text-500">Landing</p>
                    </div>
                  </div>
                </td>
                <td class="align-middle text-end fw-semi-bold">$1311</td>
                <td class="align-middle pe-card">
                  <div class="d-flex align-items-center">
                    <div class="progress me-3 rounded-3 bg-200" style="height: 5px;width:80px">
                      <div class="progress-bar rounded-pill" role="progressbar" style="width: 39%;" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="fw-semi-bold ms-2">39%</div>
                  </div>
                </td>
              </tr>
              <tr class="border-bottom border-200">
                <td>
                  <div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="assets/img/products/10.png" width="60" alt="" />
                    <div class="flex-1 ms-3">
                      <h6 class="mb-1 fw-semi-bold"><a class="text-dark stretched-link" href="#!">Boots4</a></h6>
                      <p class="fw-semi-bold mb-0 text-500">Portfolio</p>
                    </div>
                  </div>
                </td>
                <td class="align-middle text-end fw-semi-bold">$860</td>
                <td class="align-middle pe-card">
                  <div class="d-flex align-items-center">
                    <div class="progress me-3 rounded-3 bg-200" style="height: 5px;width:80px">
                      <div class="progress-bar rounded-pill" role="progressbar" style="width: 26%;" aria-valuenow="26" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="fw-semi-bold ms-2">26%</div>
                  </div>
                </td>
              </tr>
              <tr class="border-bottom border-200">
                <td>
                  <div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="assets/img/products/11.png" width="60" alt="" />
                    <div class="flex-1 ms-3">
                      <h6 class="mb-1 fw-semi-bold"><a class="text-dark stretched-link" href="#!">Falcon</a></h6>
                      <p class="fw-semi-bold mb-0 text-500">Admin</p>
                    </div>
                  </div>
                </td>
                <td class="align-middle text-end fw-semi-bold">$539</td>
                <td class="align-middle pe-card">
                  <div class="d-flex align-items-center">
                    <div class="progress me-3 rounded-3 bg-200" style="height: 5px;width:80px">
                      <div class="progress-bar rounded-pill" role="progressbar" style="width: 16%;" aria-valuenow="16" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="fw-semi-bold ms-2">16%</div>
                  </div>
                </td>
              </tr>
              <tr class="border-bottom border-200">
                <td>
                  <div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="assets/img/products/14.png" width="60" alt="" />
                    <div class="flex-1 ms-3">
                      <h6 class="mb-1 fw-semi-bold"><a class="text-dark stretched-link" href="#!">Slick</a></h6>
                      <p class="fw-semi-bold mb-0 text-500">Builder</p>
                    </div>
                  </div>
                </td>
                <td class="align-middle text-end fw-semi-bold">$343</td>
                <td class="align-middle pe-card">
                  <div class="d-flex align-items-center">
                    <div class="progress me-3 rounded-3 bg-200" style="height: 5px;width:80px">
                      <div class="progress-bar rounded-pill" role="progressbar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="fw-semi-bold ms-2">10%</div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="assets/img/products/13.png" width="60" alt="" />
                    <div class="flex-1 ms-3">
                      <h6 class="mb-1 fw-semi-bold"><a class="text-dark stretched-link" href="#!">Reign Pro</a></h6>
                      <p class="fw-semi-bold mb-0 text-500">Agency</p>
                    </div>
                  </div>
                </td>
                <td class="align-middle text-end fw-semi-bold">$280</td>
                <td class="align-middle pe-card">
                  <div class="d-flex align-items-center">
                    <div class="progress me-3 rounded-3 bg-200" style="height: 5px;width:80px">
                      <div class="progress-bar rounded-pill" role="progressbar" style="width: 8%;" aria-valuenow="8" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="fw-semi-bold ms-2">8%</div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer bg-light py-2">
        <div class="row flex-between-center">
          <div class="col-auto">
            <select class="form-select form-select-sm">
              <option>Last 7 days</option>
              <option>Last Month</option>
              <option>Last Year</option>
            </select>
          </div>
          <div class="col-auto"><a class="btn btn-sm btn-falcon-default" href="#!">View All</a></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-5 col-xl-4 ps-lg-2 mb-3">
    <div class="card">
      <div class="card-header d-flex flex-between-center bg-light py-2">
        <h6 class="mb-0">Shared Files</h6><a class="py-1 fs--1 font-sans-serif" href="#!">View All</a>
      </div>
      <div class="card-body pb-0">
        <div class="d-flex mb-3 hover-actions-trigger align-items-center">
          <div class="file-thumbnail"><img class="border h-100 w-100 fit-cover rounded-2" src="assets/img/products/5-thumb.png" alt="" />
          </div>
          <div class="ms-3 flex-shrink-1 flex-grow-1">
            <h6 class="mb-1"><a class="stretched-link text-900 fw-semi-bold" href="#!">apple-smart-watch.png</a></h6>
            <div class="fs--1"><span class="fw-semi-bold">Antony</span><span class="fw-medium text-600 ms-2">Just Now</span></div>
            <div class="hover-actions end-0 top-50 translate-middle-y"><a class="btn btn-light border-300 btn-sm me-1 text-600" data-bs-toggle="tooltip" data-bs-placement="top" title="Download" href="assets/img/icons/cloud-download.svg" download="download"><img src="assets/img/icons/cloud-download.svg" alt="" width="15" /></a>
              <button class="btn btn-light border-300 btn-sm me-1 text-600 shadow-none" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><img src="assets/img/icons/edit-alt.svg" alt="" width="15" /></button>
            </div>
          </div>
        </div>
        <hr class="bg-200" />
        <div class="d-flex mb-3 hover-actions-trigger align-items-center">
          <div class="file-thumbnail"><img class="border h-100 w-100 fit-cover rounded-2" src="assets/img/products/3-thumb.png" alt="" />
          </div>
          <div class="ms-3 flex-shrink-1 flex-grow-1">
            <h6 class="mb-1"><a class="stretched-link text-900 fw-semi-bold" href="#!">iphone.jpg</a></h6>
            <div class="fs--1"><span class="fw-semi-bold">Antony</span><span class="fw-medium text-600 ms-2">Yesterday at 1:30 PM</span></div>
            <div class="hover-actions end-0 top-50 translate-middle-y"><a class="btn btn-light border-300 btn-sm me-1 text-600" data-bs-toggle="tooltip" data-bs-placement="top" title="Download" href="assets/img/icons/cloud-download.svg" download="download"><img src="assets/img/icons/cloud-download.svg" alt="" width="15" /></a>
              <button class="btn btn-light border-300 btn-sm me-1 text-600 shadow-none" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><img src="assets/img/icons/edit-alt.svg" alt="" width="15" /></button>
            </div>
          </div>
        </div>
        <hr class="bg-200" />
        <div class="d-flex mb-3 hover-actions-trigger align-items-center">
          <div class="file-thumbnail"><img class="img-fluid" src="assets/img/icons/zip.png" alt="" />
          </div>
          <div class="ms-3 flex-shrink-1 flex-grow-1">
            <h6 class="mb-1"><a class="stretched-link text-900 fw-semi-bold" href="#!">Falcon v1.8.2</a></h6>
            <div class="fs--1"><span class="fw-semi-bold">Jane</span><span class="fw-medium text-600 ms-2">27 Sep at 10:30 AM</span></div>
            <div class="hover-actions end-0 top-50 translate-middle-y"><a class="btn btn-light border-300 btn-sm me-1 text-600" data-bs-toggle="tooltip" data-bs-placement="top" title="Download" href="assets/img/icons/cloud-download.svg" download="download"><img src="assets/img/icons/cloud-download.svg" alt="" width="15" /></a>
              <button class="btn btn-light border-300 btn-sm me-1 text-600 shadow-none" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><img src="assets/img/icons/edit-alt.svg" alt="" width="15" /></button>
            </div>
          </div>
        </div>
        <hr class="bg-200" />
        <div class="d-flex mb-3 hover-actions-trigger align-items-center">
          <div class="file-thumbnail"><img class="border h-100 w-100 fit-cover rounded-2" src="assets/img/products/2-thumb.png" alt="" />
          </div>
          <div class="ms-3 flex-shrink-1 flex-grow-1">
            <h6 class="mb-1"><a class="stretched-link text-900 fw-semi-bold" href="#!">iMac.jpg</a></h6>
            <div class="fs--1"><span class="fw-semi-bold">Rowen</span><span class="fw-medium text-600 ms-2">23 Sep at 6:10 PM</span></div>
            <div class="hover-actions end-0 top-50 translate-middle-y"><a class="btn btn-light border-300 btn-sm me-1 text-600" data-bs-toggle="tooltip" data-bs-placement="top" title="Download" href="assets/img/icons/cloud-download.svg" download="download"><img src="assets/img/icons/cloud-download.svg" alt="" width="15" /></a>
              <button class="btn btn-light border-300 btn-sm me-1 text-600 shadow-none" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><img src="assets/img/icons/edit-alt.svg" alt="" width="15" /></button>
            </div>
          </div>
        </div>
        <hr class="bg-200" />
        <div class="d-flex mb-3 hover-actions-trigger align-items-center">
          <div class="file-thumbnail"><img class="img-fluid" src="assets/img/icons/docs.png" alt="" />
          </div>
          <div class="ms-3 flex-shrink-1 flex-grow-1">
            <h6 class="mb-1"><a class="stretched-link text-900 fw-semi-bold" href="#!">functions.php</a></h6>
            <div class="fs--1"><span class="fw-semi-bold">John</span><span class="fw-medium text-600 ms-2">1 Oct at 4:30 PM</span></div>
            <div class="hover-actions end-0 top-50 translate-middle-y"><a class="btn btn-light border-300 btn-sm me-1 text-600" data-bs-toggle="tooltip" data-bs-placement="top" title="Download" href="assets/img/icons/cloud-download.svg" download="download"><img src="assets/img/icons/cloud-download.svg" alt="" width="15" /></a>
              <button class="btn btn-light border-300 btn-sm me-1 text-600 shadow-none" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><img src="assets/img/icons/edit-alt.svg" alt="" width="15" /></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row g-0">
  <div class="col-sm-6 col-xxl-3 pe-sm-2 mb-3 mb-xxl-0">
    <div class="card">
      <div class="card-header d-flex flex-between-center bg-light py-2">
        <h6 class="mb-0">Active Users</h6>
        <div class="dropdown font-sans-serif btn-reveal-trigger">
          <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-active-user" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--2"></span></button>
          <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-active-user"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
            <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
          </div>
        </div>
      </div>
      <div class="card-body py-2">
        <div class="d-flex align-items-center position-relative mb-3">
          <div class="avatar avatar-2xl status-online">
            <img class="rounded-circle" src="assets/img/team/1.jpg" alt="" />

          </div>
          <div class="flex-1 ms-3">
            <h6 class="mb-0 fw-semi-bold"><a class="stretched-link text-900" href="pages/user/profile.html">Emma Watson</a></h6>
            <p class="text-500 fs--2 mb-0">Admin</p>
          </div>
        </div>
        <div class="d-flex align-items-center position-relative mb-3">
          <div class="avatar avatar-2xl status-online">
            <img class="rounded-circle" src="assets/img/team/2.jpg" alt="" />

          </div>
          <div class="flex-1 ms-3">
            <h6 class="mb-0 fw-semi-bold"><a class="stretched-link text-900" href="pages/user/profile.html">Antony Hopkins</a></h6>
            <p class="text-500 fs--2 mb-0">Moderator</p>
          </div>
        </div>
        <div class="d-flex align-items-center position-relative mb-3">
          <div class="avatar avatar-2xl status-away">
            <img class="rounded-circle" src="assets/img/team/3.jpg" alt="" />

          </div>
          <div class="flex-1 ms-3">
            <h6 class="mb-0 fw-semi-bold"><a class="stretched-link text-900" href="pages/user/profile.html">Anna Karinina</a></h6>
            <p class="text-500 fs--2 mb-0">Editor</p>
          </div>
        </div>
        <div class="d-flex align-items-center position-relative mb-3">
          <div class="avatar avatar-2xl status-offline">
            <img class="rounded-circle" src="assets/img/team/4.jpg" alt="" />

          </div>
          <div class="flex-1 ms-3">
            <h6 class="mb-0 fw-semi-bold"><a class="stretched-link text-900" href="pages/user/profile.html">John Lee</a></h6>
            <p class="text-500 fs--2 mb-0">Admin</p>
          </div>
        </div>
        <div class="d-flex align-items-center position-relative false">
          <div class="avatar avatar-2xl status-offline">
            <img class="rounded-circle" src="assets/img/team/5.jpg" alt="" />

          </div>
          <div class="flex-1 ms-3">
            <h6 class="mb-0 fw-semi-bold"><a class="stretched-link text-900" href="pages/user/profile.html">Rowen Atkinson</a></h6>
            <p class="text-500 fs--2 mb-0">Editor</p>
          </div>
        </div>
      </div>
      <div class="card-footer bg-light p-0"><a class="btn btn-sm btn-link d-block w-100 py-2" href="app/social/followers.html">All active users<span class="fas fa-chevron-right ms-1 fs--2"></span></a></div>
    </div>
  </div>
  <div class="col-sm-6 col-xxl-3 ps-sm-2 order-xxl-1 mb-3 mb-xxl-0">
    <div class="card h-100">
      <div class="card-header bg-light d-flex flex-between-center py-2">
        <h6 class="mb-0">Bandwidth Saved</h6>
        <div class="dropdown font-sans-serif btn-reveal-trigger">
          <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-bandwidth-saved" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--2"></span></button>
          <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-bandwidth-saved"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
            <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
          </div>
        </div>
      </div>
      <div class="card-body d-flex flex-center flex-column">
        <!-- Find the JS file for the following chart at: src/js/charts/echarts/bandwidth-saved.js-->
        <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
        <div class="echart-bandwidth-saved" data-echart-responsive="true"></div>
        <div class="text-center mt-3">
          <h6 class="fs-0 mb-1"><span class="fas fa-check text-success me-1" data-fa-transform="shrink-2"></span>35.75 GB saved</h6>
          <p class="fs--1 mb-0">38.44 GB total bandwidth</p>
        </div>
      </div>
      <div class="card-footer bg-light py-2">
        <div class="row flex-between-center">
          <div class="col-auto">
            <select class="form-select form-select-sm">
              <option>Last 6 Months</option>
              <option>Last Year</option>
              <option>Last 2 Year</option>
            </select>
          </div>
          <div class="col-auto"><a class="fs--1 font-sans-serif" href="#!">Help</a></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xxl-6 px-xxl-2">
    <div class="card h-100">
      <div class="card-header bg-light py-2">
        <div class="row flex-between-center">
          <div class="col-auto">
            <h6 class="mb-0">Top Products</h6>
          </div>
          <div class="col-auto d-flex"><a class="btn btn-link btn-sm me-2" href="#!">View Details</a>
            <div class="dropdown font-sans-serif btn-reveal-trigger">
              <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-top-products" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--2"></span></button>
              <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-top-products"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body h-100">
        <!-- Find the JS file for the following chart at: src/js/charts/echarts/top-products.js-->
        <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
        <div class="echart-bar-top-products h-100" data-echart-responsive="true"></div>
      </div>
    </div>
  </div>
</div> --}}
@endsection
