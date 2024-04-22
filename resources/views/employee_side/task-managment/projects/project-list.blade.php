@extends('employee_side.dashboard-layout.layout')
@section('projectlist')
<div class="card mb-3">
    <div class="card-header">
      <h5 class="mb-0">Projects</h5>
    </div>
    <div class="card-body bg-light">
        <div class="row">
         <div class="col-lg-4 col-md-6">
              <a href="{{ route('createProjectsPages') }}" class="text-black">
                 <div class="card mb-3 px-3 py-3">
                    <div class="card-body">
                       <div class="d-flex align-items-center justify-content-between">
                          <div class="d-flex flex-column justify-content-center mt-3">
                             <h4>New Projects</h4>
                             <p class="textparagraph">Start fresh with a blank business project template</p>
                          </div>
                          <div>
                             <i class="fas fa-arrow-right"></i>
                          </div>
                       </div>
                    </div>
                 </div>
              </a>
         </div>
         {{--  --}}
         @if ($projectsss->isEmpty())
             
         @else
           @foreach ($projectsss as $projects)
           <div class="col-lg-4 col-md-6">
            <a href="{{ route('projectDashboard',$projects->id) }}" class="text-black">
               <div class="card mb-3 px-3 py-3">
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column justify-content-center mt-3">
                           <h4 style="width: 200px;font-size:25px;">{{ $projects->project_name }}</h4>
                           <p class="textparagraph"> Created at: {{ \Carbon\Carbon::parse($projects->created_at)->format('M,d Y') }} at {{ \Carbon\Carbon::parse($projects->created_at)->format('H:i:s') }}
                           </p>
                        </div>
                        <div>
                           <i class="fas fa-arrow-right"></i>
                        </div>
                     </div>
                  </div>
               </div>
            </a>
       </div>
           @endforeach  
         @endif
         
        </div>
     </div>
     
    <br>
  </div>
@endsection