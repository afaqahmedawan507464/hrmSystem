@extends('employee_side.dashboard-layout.layout')
@section('taskcreateprojects')
<div class="card mb-3">
    <div class="card-header">
      <h5 class="mb-0">Create a new projects</h5>
    </div>
    <div class="card-body bg-light">
        <div class="row">
         <div class="col-md-6">
              <a href="{{ route('createProjectsPages') }}" class="text-black">
                 <div class="card mb-3 px-3 py-3">
                    <div class="card-body">
                       <div class="d-flex align-items-center justify-content-between">
                          <div class="d-flex flex-column justify-content-center mt-3">
                             <h4>Blank Projects</h4>
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
         <div class="col-md-6">
              <a href="" class="text-black">
                 <div class="card mb-3 px-3 py-3">
                    <div class="card-body">
                       <div class="d-flex align-items-center justify-content-between">
                          <div class="d-flex flex-column justify-content-center mt-3">
                             <h4>Web design process</h4>
                             <p class="textparagraph">For designers and developers to track web design tasks and stay aligned
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
         {{--  --}}
         <div class="col-md-6">
            <a href="" class="text-black">
               <div class="card mb-3 px-3 py-3">
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column justify-content-center mt-3">
                           <h4>Document approval</h4>
                           <p class="textparagraph">Manage documents from creation to approval.</p>
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
         <div class="col-md-6">
            <a href="" class="text-black">
               <div class="card mb-3 px-3 py-3">
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column justify-content-center mt-3">
                           <h4>Campaign management</h4>
                           <p class="textparagraph">Drive a marketing campaign from idea to execution</p>
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
         <div class="col-md-6">
            <a href="" class="text-black">
               <div class="card mb-3 px-3 py-3">
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column justify-content-center mt-3">
                           <h4>Recruitment</h4>
                           <p class="textparagraph">Monitor candidates and potential hires from application to offer</p>
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
         <div class="col-md-6">
            <a href="" class="text-black">
               <div class="card mb-3 px-3 py-3">
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column justify-content-center mt-3">
                           <h4>Sales pipeline</h4>
                           <p class="textparagraph">Track your sales pipeline from lead to converted customer all in one place</p>
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
         <div class="col-md-6">
            <a href="" class="text-black">
               <div class="card mb-3 px-3 py-3">
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column justify-content-center mt-3">
                           <h4>Go-to-Market</h4>
                           <p class="textparagraph">Coordinate a go-to-market launch for your produc or business</p>
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
         <div class="col-md-6">
            <a href="" class="text-black">
               <div class="card mb-3 px-3 py-3">
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column justify-content-center mt-3">
                           <h4>Budget creation</h4>
                           <p class="textparagraph">Get everyone on the same page during the budget creation process</p>
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
         <div class="col-md-6">
            <a href="" class="text-black">
               <div class="card mb-3 px-3 py-3">
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column justify-content-center mt-3">
                           <h4>Procurement</h4>
                           <p class="textparagraph">Standardize your procurement process and track all purchases from request to receipt</p>
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
         <div class="col-md-6">
            <a href="" class="text-black">
               <div class="card mb-3 px-3 py-3">
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column justify-content-center mt-3">
                           <h4>Content management</h4>
                           <p class="textparagraph">Manage the content lifecycle from prioritization throught to drafth and delivery</p>
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
         <div class="col-md-6">
            <a href="" class="text-black">
               <div class="card mb-3 px-3 py-3">
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column justify-content-center mt-3">
                           <h4>Personal task planner</h4>
                           <p class="textparagraph">Stay organized and tackle your personal tasks easily</p>
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
         <div class="col-md-6">
            <a href="" class="text-black">
               <div class="card mb-3 px-3 py-3">
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column justify-content-center mt-3">
                           <h4>Month-end clode</h4>
                           <p class="textparagraph">Streamline and simplify your month-end close process</p>
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
         <div class="col-md-6">
            <a href="" class="text-black">
               <div class="card mb-3 px-3 py-3">
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column justify-content-center mt-3">
                           <h4>Policy management</h4>
                           <p class="textparagraph">Track the moving parts involved in managing policies policies and procedures</p>
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
         <div class="col-md-6">
            <a href="" class="text-black">
               <div class="card mb-3 px-3 py-3">
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column justify-content-center mt-3">
                           <h4>Asset creation</h4>
                           <p class="textparagraph">Streamline the process of managing incoming asset creation requests</p>
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
         <div class="col-md-6">
            <a href="" class="text-black">
               <div class="card mb-3 px-3 py-3">
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column justify-content-center mt-3">
                           <h4>Event planning</h4>
                           <p class="textparagraph">Perfect for teams planning their next event big or small</p>
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
         <div class="col-md-6">
            <a href="" class="text-black">
               <div class="card mb-3 px-3 py-3">
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column justify-content-center mt-3">
                           <h4>RFP process</h4>
                           <p class="textparagraph">Standardize your RFP process so you can select the right vendor for the right job</p>
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
         <div class="col-md-6">
            <a href="" class="text-black">
               <div class="card mb-3 px-3 py-3">
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column justify-content-center mt-3">
                           <h4>Email campaign</h4>
                           <p class="textparagraph">Plan and execute email campaigns</p>
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
         <div class="col-md-6">
            <a href="" class="text-black">
               <div class="card mb-3 px-3 py-3">
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column justify-content-center mt-3">
                           <h4>Lead tracking</h4>
                           <p class="textparagraph">Track sales leads from opportunity through to close</p>
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
         <div class="col-md-6">
            <a href="" class="text-black">
               <div class="card mb-3 px-3 py-3">
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column justify-content-center mt-3">
                           <h4>IP infringement</h4>
                           <p class="textparagraph">Protect your organization and employees from IP infringement</p>
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
         <div class="col-md-6">
            <a href="" class="text-black">
               <div class="card mb-3 px-3 py-3">
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column justify-content-center mt-3">
                           <h4>Performance review</h4>
                           <p class="textparagraph">Standardize your employees' performance evaluations and peer review process</p>
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
         <div class="col-md-6">
            <a href="" class="text-black">
               <div class="card mb-3 px-3 py-3">
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column justify-content-center mt-3">
                           <h4>Grant funding management</h4>
                           <p class="textparagraph">Manage applications and delivery for funding partnerships and awards</p>
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
         <div class="col-md-6">
            <a href="" class="text-black">
               <div class="card mb-3 px-3 py-3">
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column justify-content-center mt-3">
                           <h4>Nonprofit program management</h4>
                           <p class="textparagraph">Manage social impact programs benefitting communities people and planet</p>
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
         <div class="col-12">
            <a href="" class="text-black">
               <div class="card mb-3 px-3 py-3">
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column justify-content-center mt-3">
                           <h4>Community program management</h4>
                           <p class="textparagraph">Manage social impact programs with a community-centered apprach</p>
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
        </div>
     </div>
     
    <br>
  </div>
@endsection