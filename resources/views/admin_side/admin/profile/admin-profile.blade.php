{{-- included profile layout file --}}
@extends('admin_side.dashboard-layout.layout')
@section('adminprofile')
<div class="card mb-3">
    <div class="card-header position-relative min-vh-25 mb-8">
       <div class="cover-image">
          <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(/public/assets/img/generic/4.jpg);">
          </div>
          <!--/.bg-holder-->
          <input class="d-none" id="upload-cover-image" type="file" />
          <label class="cover-image-file-input" for="upload-cover-image"><span class="fas fa-camera me-2"></span><span>Change cover photo</span></label>
          <div class="clock d-flex flex-column py-3 px-4 justify-content-center align-items-end">
            {{-- clock data --}}
            <div class="clockdiv">
               <div id="clockContainer">
                  <div id="hour"></div>
                  <div id="minute"></div>
                  <div id="second"></div>
               </div>
            </div>
            <div class="digitalClock">
               <h5 id="time">
                  hello
               </h5>
            </div>
         </div>
       </div>
       <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle">
        <div class="h-100 w-100 rounded-circle overflow-hidden position-relative">
            @if (!empty(Auth::guard('admin')->user()->image))
            <img src="{{asset(Auth::guard('admin')->user()->image)}}" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail">
            @else
            <img src="/admin/dist/img/avators.jpg" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail">
            @endif
         </div>
       </div>
    </div>
    <div class="card-body">
       <div class="row">
          <div class="col-lg-8">
             <h4 class="py-2">{{ Auth::guard('admin')->user()->admin_name }}
                @if (Auth::guard('admin')->user()->active_status == 1)
                <span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified">
                    <small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small>
                </span>
                @endif
             </h4>
             <div class="border-dashed-bottom my-4 d-lg-none"></div>
          </div>
       </div>
    </div>
    </div>
<div class="row g-0">
    <div class="col-lg-8 pe-lg-2">
      <div class="card mb-3">
        <div class="card-header bg-light">
          <h5 class="mb-0">Intro</h5>
        </div>
        <div class="card-body text-justify">
          <p class="mb-0 text-1000">Dedicated, passionate, and accomplished Full Stack Developer with 9+ years of progressive experience working as an Independent Contractor for Google and developing and growing my educational social network that helps others learn programming, web design, game development, networking.</p>
          <div class="collapse show" id="profile-intro">
            <p class="mt-3 text-1000">I’ve acquired a wide depth of knowledge and expertise in using my technical skills in programming, computer science, software development, and mobile app development to developing solutions to help organizations increase productivity, and accelerate business performance. </p>
            <p class="text-1000">It’s great that we live in an age where we can share so much with technology but I’m but I’m ready for the next phase of my career, with a healthy balance between the virtual world and a workplace where I help others face-to-face.</p>
            <p class="text-1000 mb-0">There’s always something new to learn, especially in IT-related fields. People like working with me because I can explain technology to everyone, from staff to executives who need me to tie together the details and the big picture. I can also implement the technologies that successful projects need.</p>
          </div>
        </div>
        <div class="card-footer bg-light p-0 border-top">
          <button class="btn btn-link d-block w-100 btn-intro-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#profile-intro" aria-expanded="true" aria-controls="profile-intro">Show <span class="less">less<span class="fas fa-chevron-up ms-2 fs--2"></span></span><span class="full">full<span class="fas fa-chevron-down ms-2 fs--2"></span></span></button>
        </div>
      </div>
      <div class="card mb-3">
        <div class="card-header bg-light d-flex justify-content-between">
          <h5 class="mb-0">Notifications</h5><a class="font-sans-serif" href="../../app/social/activity-log.html">See More</a>
        </div>
        <div class="card-body fs--1 p-0">
          <a class="border-bottom-0 notification rounded-0 border-x-0 border border-300" href="#!">
            <div class="notification-avatar">
              <div class="avatar avatar-xl me-3">
                <div class="avatar-emoji rounded-circle "><span role="img" aria-label="Emoji">🎁</span></div>
              </div>
            </div>
            <div class="notification-body">
              <p class="mb-1"><strong>Jennifer Kent</strong> Congratulated <strong>Anthony Hopkins</strong></p>
              <span class="notification-time">November 13, 5:00 Am</span>

            </div>
          </a>

          <a class="border-bottom-0 notification rounded-0 border-x-0 border border-300" href="#!">
            <div class="notification-avatar">
              <div class="avatar avatar-xl me-3">
                <div class="avatar-emoji rounded-circle "><span role="img" aria-label="Emoji">🏷️</span></div>
              </div>
            </div>
            <div class="notification-body">
              <p class="mb-1"><strong>California Institute of Technology</strong> tagged <strong>Anthony Hopkins</strong> in a post.</p>
              <span class="notification-time">November 8, 5:00 PM</span>

            </div>
          </a>

          <a class="border-bottom-0 notification rounded-0 border-x-0 border border-300" href="#!">
            <div class="notification-avatar">
              <div class="avatar avatar-xl me-3">
                <div class="avatar-emoji rounded-circle "><span role="img" aria-label="Emoji">📋️</span></div>
              </div>
            </div>
            <div class="notification-body">
              <p class="mb-1"><strong>Anthony Hopkins</strong> joined <strong>Victory day cultural Program</strong> with <strong>Tony Stark</strong></p>
              <span class="notification-time">November 01, 11:30 AM</span>

            </div>
          </a>

          <a class="notification border-x-0 border-bottom-0 border-300 rounded-top-0" href="#!">
            <div class="notification-avatar">
              <div class="avatar avatar-xl me-3">
                <div class="avatar-emoji rounded-circle "><span role="img" aria-label="Emoji">📅️</span></div>
              </div>
            </div>
            <div class="notification-body">
              <p class="mb-1"><strong>Massachusetts Institute of Technology</strong> invited <strong>Anthony Hopkin</strong> to an event</p>
              <span class="notification-time">October 28, 12:00 PM</span>

            </div>
          </a>

        </div>
      </div>
      <div class="card mb-3 mb-lg-0">
        <div class="card-header bg-light d-flex justify-content-between">
            <h5 class="mb-0">Stories</h5><a class="font-sans-serif" href="../../pages/miscellaneous/associations.html">More Stories</a>
          </div>
        <div class="card-body overflow-hidden">
          <div class="row g-0">
            <div class="col-6 p-1"><a class="glightbox" href="/public/assets/img/generic/4.jpg" data-gallery="gallery1" data-glightbox="data-glightbox"><img class="img-fluid rounded" src="/public/assets/img/generic/4.jpg" alt="..." /></a></div>
            <div class="col-6 p-1"><a class="glightbox" href="/public/assets/img/generic/5.jpg" data-gallery="gallery1" data-glightbox="data-glightbox"><img class="img-fluid rounded" src="/public/assets/img/generic/5.jpg" alt="..." /></a></div>
            <div class="col-4 p-1"><a class="glightbox" href="/public/assets/img/gallery/4.jpg" data-gallery="gallery1" data-glightbox="data-glightbox"><img class="img-fluid rounded" src="/public/assets/img/gallery/4.jpg" alt="..." /></a></div>
            <div class="col-4 p-1"><a class="glightbox" href="/public/assets/img/gallery/5.jpg" data-gallery="gallery1" data-glightbox="data-glightbox"><img class="img-fluid rounded" src="/public/assets/img/gallery/5.jpg" alt="..." /></a></div>
            <div class="col-4 p-1"><a class="glightbox" href="/public/assets/img/gallery/3.jpg" data-gallery="gallery1" data-glightbox="data-glightbox"><img class="img-fluid rounded" src="/public/assets/img/gallery/3.jpg" alt="..." /></a></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 ps-lg-2">
      <div class="sticky-sidebar">
        <div class="card mb-3 mb-lg-0">
          <div class="card-header bg-light">
            <h5 class="mb-0">Events</h5>
          </div>
          <div class="card-body fs--1">
            <div class="d-flex btn-reveal-trigger">
              <div class="calendar"><span class="calendar-month">Feb</span><span class="calendar-day">21</span></div>
              <div class="flex-1 position-relative ps-3">
                <h6 class="fs-0 mb-0"><a href="../../app/events/event-detail.html">Newmarket Nights</a></h6>
                <p class="mb-1">Organized by <a href="#!" class="text-700">University of Oxford</a></p>
                <p class="text-1000 mb-0">Time: 6:00AM</p>
                <p class="text-1000 mb-0">Duration: 6:00AM - 5:00PM</p>Place: Cambridge Boat Club, Cambridge
                <div class="border-dashed-bottom my-3"></div>
              </div>
            </div>
            <div class="d-flex btn-reveal-trigger">
              <div class="calendar"><span class="calendar-month">Dec</span><span class="calendar-day">31</span></div>
              <div class="flex-1 position-relative ps-3">
                <h6 class="fs-0 mb-0"><a href="../../app/events/event-detail.html">31st Night Celebration</a></h6>
                <p class="mb-1">Organized by <a href="#!" class="text-700">Chamber Music Society</a></p>
                <p class="text-1000 mb-0">Time: 11:00PM</p>
                <p class="text-1000 mb-0">280 people interested</p>Place: Tavern on the Greend, New York
                <div class="border-dashed-bottom my-3"></div>
              </div>
            </div>
            <div class="d-flex btn-reveal-trigger">
              <div class="calendar"><span class="calendar-month">Dec</span><span class="calendar-day">16</span></div>
              <div class="flex-1 position-relative ps-3">
                <h6 class="fs-0 mb-0"><a href="../../app/events/event-detail.html">Folk Festival</a></h6>
                <p class="mb-1">Organized by <a href="#!" class="text-700">Harvard University</a></p>
                <p class="text-1000 mb-0">Time: 9:00AM</p>
                <p class="text-1000 mb-0">Location: Cambridge Masonic Hall Association</p>Place: Porter Square, North Cambridge
              </div>
            </div>
          </div>
          <div class="card-footer bg-light p-0 border-top"><a class="btn btn-link d-block w-100" href="../../app/events/event-list.html">All Events<span class="fas fa-chevron-right ms-1 fs--2"></span></a></div>
        </div>
      </div>
    </div>
  </div>
<div class="card mt-3">
    <div class="card-header bg-light">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0" id="followers">My Team <span class="d-none d-sm-inline-block">(0)</span></h5>
        </div>
        <div class="col text-end"><a class="font-sans-serif" href="../../app/social/followers.html">All Members</a>
        </div>
      </div>
    </div>
    <div class="card-body bg-light px-1 py-0">
      <div class="row g-0 text-center fs--1">
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
          <div class="bg-white dark__bg-1100 p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="../../assets/img/team/1.jpg" alt="" width="100" /></a>
            <h6 class="mb-1"><a href="../../pages/user/profile.html">Emilia Clarke</a>
            </h6>
            <p class="fs--2 mb-1"><a class="text-700" href="#!">Technext limited</a></p>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
          <div class="bg-white dark__bg-1100 p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="../../assets/img/team/2.jpg" alt="" width="100" /></a>
            <h6 class="mb-1"><a href="../../pages/user/profile.html">Kit Harington</a>
            </h6>
            <p class="fs--2 mb-1"><a class="text-700" href="#!">Harvard Korea Society</a></p>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
          <div class="bg-white dark__bg-1100 p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="../../assets/img/team/3.jpg" alt="" width="100" /></a>
            <h6 class="mb-1"><a href="../../pages/user/profile.html">Sophie Turner</a>
            </h6>
            <p class="fs--2 mb-1"><a class="text-700" href="#!">Graduate Student Council</a></p>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
          <div class="bg-white dark__bg-1100 p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="../../assets/img/team/4.jpg" alt="" width="100" /></a>
            <h6 class="mb-1"><a href="../../pages/user/profile.html">Peter Dinklage</a>
            </h6>
            <p class="fs--2 mb-1"><a class="text-700" href="#!">Art Club, MIT</a></p>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
          <div class="bg-white dark__bg-1100 p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="../../assets/img/team/5.jpg" alt="" width="100" /></a>
            <h6 class="mb-1"><a href="../../pages/user/profile.html">Nikolaj Coster</a>
            </h6>
            <p class="fs--2 mb-1"><a class="text-700" href="#!">Archery Club, MIT</a></p>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
          <div class="bg-white dark__bg-1100 p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="../../assets/img/team/6.jpg" alt="" width="100" /></a>
            <h6 class="mb-1"><a href="../../pages/user/profile.html">Isaac Hempstead</a>
            </h6>
            <p class="fs--2 mb-1"><a class="text-700" href="#!">Asymptones</a></p>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
          <div class="bg-white dark__bg-1100 p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="../../assets/img/team/7.jpg" alt="" width="100" /></a>
            <h6 class="mb-1"><a href="../../pages/user/profile.html">Alfie Allen</a>
            </h6>
            <p class="fs--2 mb-1"><a class="text-700" href="#!">Brain Trust</a></p>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
          <div class="bg-white dark__bg-1100 p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="../../assets/img/team/8.jpg" alt="" width="100" /></a>
            <h6 class="mb-1"><a href="../../pages/user/profile.html">Iain Glen</a>
            </h6>
            <p class="fs--2 mb-1"><a class="text-700" href="#!">GSAS Action Coalition</a></p>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
          <div class="bg-white dark__bg-1100 p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="../../assets/img/team/9.jpg" alt="" width="100" /></a>
            <h6 class="mb-1"><a href="../../pages/user/profile.html">Liam Cunningham</a>
            </h6>
            <p class="fs--2 mb-1"><a class="text-700" href="#!">Caving Club, MIT</a></p>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
          <div class="bg-white dark__bg-1100 p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="../../assets/img/team/10.jpg" alt="" width="100" /></a>
            <h6 class="mb-1"><a href="../../pages/user/profile.html">John Bradley</a>
            </h6>
            <p class="fs--2 mb-1"><a class="text-700" href="#!">Chess Club</a></p>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
          <div class="bg-white dark__bg-1100 p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="../../assets/img/team/11.jpg" alt="" width="100" /></a>
            <h6 class="mb-1"><a href="../../pages/user/profile.html">Rory McCann</a>
            </h6>
            <p class="fs--2 mb-1"><a class="text-700" href="#!">Chamber Music Society</a></p>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
          <div class="bg-white dark__bg-1100 p-3 h-100"><a href="../../pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="../../assets/img/team/12.jpg" alt="" width="100" /></a>
            <h6 class="mb-1"><a href="../../pages/user/profile.html">Joe Dempsie</a>
            </h6>
            <p class="fs--2 mb-1"><a class="text-700" href="#!">Clubchem</a></p>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
