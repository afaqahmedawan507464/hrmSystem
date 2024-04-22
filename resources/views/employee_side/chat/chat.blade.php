<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Falcon | Dashboard &amp; Web App Template</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="/public/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/public/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/public/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="/public/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="/public/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="/public/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="/public/assets/js/config.js"></script>
    <script src="/public/vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="/public/vendors/glightbox/glightbox.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="/public/vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
    <link href="/public/assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="/public/assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="/public/assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="/public/assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <script>
      var isRTL = JSON.parse(localStorage.getItem('isRTL'));
      if (isRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>
  </head>


  <body class="overflow-hidden">

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container" data-layout="container">
        <script>
          var isFluid = JSON.parse(localStorage.getItem('isFluid'));
          if (isFluid) {
            var container = document.querySelector('[data-layout]');
            container.classList.remove('container');
            container.classList.add('container-fluid');
          }
        </script>
        <nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
          <script>
            var navbarStyle = localStorage.getItem("navbarStyle");
            if (navbarStyle && navbarStyle !== 'transparent') {
              document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
            }
          </script>
          <div class="d-flex align-items-center">
            <div class="toggle-icon-wrapper">

              <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

            </div><a class="navbar-brand" href="../index.html">
                <div class="d-flex align-items-center py-3"><span class="font-sans-serif">Codemindz</span>
                </div>
            </a>
          </div>
          <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content scrollbar">
              <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">
                  <!-- parent pages--><a class="nav-link dropdown-indicator" href="#dashboard" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Dashboard</span>
                    </div>
                  </a>
                  <ul class="nav collapse show" id="dashboard">
                    <li class="nav-item"><a class="nav-link active" href="index.html" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Default</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                  </ul>
                </li>
                {{--  --}}
                {{--  --}}
                <li class="nav-item">
                    <!-- parent pages--><a class="nav-link dropdown-indicator" href="#dashboard" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard">
                      <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-envelope"></span></span><span class="nav-link-text ps-1">Leaves</span>
                      </div>
                    </a>
                    <ul class="nav collapse show" id="dashboard">
                      <li class="nav-item"><a class="nav-link active" href="/employeeLeave/leaveForm" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create Leave</span>
                          </div>
                        </a></li>
                        <!-- more inner pages-->
                        <li class="nav-item"><a class="nav-link active" href="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Leaves Status</span>
                            </div>
                          </a></li>
                            <!-- more inner pages-->
                    </ul>
                </li>

                <li class="nav-item">
                    <!-- parent pages--><a class="nav-link dropdown-indicator" href="" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard">
                      <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-comment"></span></span><span class="nav-link-text ps-1">Chat</span>
                      </div>
                    </a>
                    <ul class="nav collapse show" id="dashboard">
                      <li class="nav-item"><a class="nav-link active" href="{{ route('chatPage') }}" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Chat</span>
                          </div>
                        </a></li>
                        <!-- more inner pages-->
                        <!-- more inner pages-->
                    </ul>
                </li>

            </div>
          </div>
        </nav>
        <div class="content">
          <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">

            <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3" href="../index.html">
              <div class="d-flex align-items-center"><img class="me-2" src="../assets/img/icons/spot-illustrations/falcon.png" alt="" width="40" /><span class="font-sans-serif">falcon</span>
              </div>
            </a>
            <ul class="navbar-nav align-items-center d-none d-lg-block">
              <li class="nav-item">
                <div class="search-box" data-list='{"valueNames":["title"]}'>
                  <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                    <input class="form-control search-input fuzzy-search" type="search" placeholder="Search..." aria-label="Search" />
                    <span class="fas fa-search search-box-icon"></span>

                  </form>
                  <div class="btn-close-falcon-container position-absolute end-0 top-50 translate-middle shadow-none" data-bs-dismiss="search">
                    <div class="btn-close-falcon" aria-label="Close"></div>
                  </div>
                  <div class="dropdown-menu border font-base start-0 mt-2 py-0 overflow-hidden w-100">
                    <div class="scrollbar list py-3" style="max-height: 24rem;">
                      <h6 class="dropdown-header fw-medium text-uppercase px-card fs--2 pt-0 pb-2">Recently Browsed</h6><a class="dropdown-item fs--1 px-card py-1 hover-primary" href="../app/events/event-detail.html">
                        <div class="d-flex align-items-center">
                          <span class="fas fa-circle me-2 text-300 fs--2"></span>

                          <div class="fw-normal title">Pages <span class="fas fa-chevron-right mx-1 text-500 fs--2" data-fa-transform="shrink-2"></span> Events</div>
                        </div>
                      </a>
                      <a class="dropdown-item fs--1 px-card py-1 hover-primary" href="../app/e-commerce/customers.html">
                        <div class="d-flex align-items-center">
                          <span class="fas fa-circle me-2 text-300 fs--2"></span>

                          <div class="fw-normal title">E-commerce <span class="fas fa-chevron-right mx-1 text-500 fs--2" data-fa-transform="shrink-2"></span> Customers</div>
                        </div>
                      </a>

                      <hr class="bg-200 dark__bg-900" />
                      <h6 class="dropdown-header fw-medium text-uppercase px-card fs--2 pt-0 pb-2">Suggested Filter</h6><a class="dropdown-item px-card py-1 fs-0" href="../app/e-commerce/customers.html">
                        <div class="d-flex align-items-center"><span class="badge fw-medium text-decoration-none me-2 badge-soft-warning">customers:</span>
                          <div class="flex-1 fs--1 title">All customers list</div>
                        </div>
                      </a>
                      <a class="dropdown-item px-card py-1 fs-0" href="../app/events/event-detail.html">
                        <div class="d-flex align-items-center"><span class="badge fw-medium text-decoration-none me-2 badge-soft-success">events:</span>
                          <div class="flex-1 fs--1 title">Latest events in current month</div>
                        </div>
                      </a>
                      <a class="dropdown-item px-card py-1 fs-0" href="../app/e-commerce/product/product-grid.html">
                        <div class="d-flex align-items-center"><span class="badge fw-medium text-decoration-none me-2 badge-soft-info">products:</span>
                          <div class="flex-1 fs--1 title">Most popular products</div>
                        </div>
                      </a>

                      <hr class="bg-200 dark__bg-900" />
                      <h6 class="dropdown-header fw-medium text-uppercase px-card fs--2 pt-0 pb-2">Files</h6><a class="dropdown-item px-card py-2" href="#!">
                        <div class="d-flex align-items-center">
                          <div class="file-thumbnail me-2"><img class="border h-100 w-100 fit-cover rounded-3" src="../assets/img/products/3-thumb.png" alt="" /></div>
                          <div class="flex-1">
                            <h6 class="mb-0 title">iPhone</h6>
                            <p class="fs--2 mb-0 d-flex"><span class="fw-semi-bold">Antony</span><span class="fw-medium text-600 ms-2">27 Sep at 10:30 AM</span></p>
                          </div>
                        </div>
                      </a>
                      <a class="dropdown-item px-card py-2" href="#!">
                        <div class="d-flex align-items-center">
                          <div class="file-thumbnail me-2"><img class="img-fluid" src="../assets/img/icons/zip.png" alt="" /></div>
                          <div class="flex-1">
                            <h6 class="mb-0 title">Falcon v1.8.2</h6>
                            <p class="fs--2 mb-0 d-flex"><span class="fw-semi-bold">John</span><span class="fw-medium text-600 ms-2">30 Sep at 12:30 PM</span></p>
                          </div>
                        </div>
                      </a>

                      <hr class="bg-200 dark__bg-900" />
                      <h6 class="dropdown-header fw-medium text-uppercase px-card fs--2 pt-0 pb-2">Members</h6><a class="dropdown-item px-card py-2" href="../pages/user/profile.html">
                        <div class="d-flex align-items-center">
                          <div class="avatar avatar-l status-online me-2">
                            <img class="rounded-circle" src="../assets/img/team/1.jpg" alt="" />

                          </div>
                          <div class="flex-1">
                            <h6 class="mb-0 title">Anna Karinina</h6>
                            <p class="fs--2 mb-0 d-flex">Technext Limited</p>
                          </div>
                        </div>
                      </a>
                      <a class="dropdown-item px-card py-2" href="../pages/user/profile.html">
                        <div class="d-flex align-items-center">
                          <div class="avatar avatar-l me-2">
                            <img class="rounded-circle" src="../assets/img/team/2.jpg" alt="" />

                          </div>
                          <div class="flex-1">
                            <h6 class="mb-0 title">Antony Hopkins</h6>
                            <p class="fs--2 mb-0 d-flex">Brain Trust</p>
                          </div>
                        </div>
                      </a>
                      <a class="dropdown-item px-card py-2" href="../pages/user/profile.html">
                        <div class="d-flex align-items-center">
                          <div class="avatar avatar-l me-2">
                            <img class="rounded-circle" src="../assets/img/team/3.jpg" alt="" />

                          </div>
                          <div class="flex-1">
                            <h6 class="mb-0 title">Emma Watson</h6>
                            <p class="fs--2 mb-0 d-flex">Google</p>
                          </div>
                        </div>
                      </a>

                    </div>
                    <div class="text-center mt-n3">
                      <p class="fallback fw-bold fs-1 d-none">No Result Found.</p>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
              <li class="nav-item">
                <div class="theme-control-toggle fa-icon-wait px-2">
                  <input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="theme" value="dark" />
                  <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to light theme"><span class="fas fa-sun fs-0"></span></label>
                  <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to dark theme"><span class="fas fa-moon fs-0"></span></label>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link px-0 notification-indicator notification-indicator-warning notification-indicator-fill fa-icon-wait" href="../app/e-commerce/shopping-cart.html"><span class="fas fa-shopping-cart" data-fa-transform="shrink-7" style="font-size: 33px;"></span><span class="notification-indicator-number">1</span></a>

              </li>
              <li class="nav-item dropdown">
                <a class="nav-link notification-indicator notification-indicator-primary px-0 fa-icon-wait" id="navbarDropdownNotification" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-bell" data-fa-transform="shrink-6" style="font-size: 33px;"></span></a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-card dropdown-menu-notification" aria-labelledby="navbarDropdownNotification">
                  <div class="card card-notification shadow-none">
                    <div class="card-header">
                      <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                          <h6 class="card-header-title mb-0">Notifications</h6>
                        </div>
                        <div class="col-auto ps-0 ps-sm-3"><a class="card-link fw-normal" href="#">Mark all as read</a></div>
                      </div>
                    </div>
                    <div class="scrollbar-overlay" style="max-height:19rem">
                      <div class="list-group list-group-flush fw-normal fs--1">
                        <div class="list-group-title border-bottom">NEW</div>
                        <div class="list-group-item">
                          <a class="notification notification-flush notification-unread" href="#!">
                            <div class="notification-avatar">
                              <div class="avatar avatar-2xl me-3">
                                <img class="rounded-circle" src="../assets/img/team/1-thumb.png" alt="" />

                              </div>
                            </div>
                            <div class="notification-body">
                              <p class="mb-1"><strong>Emma Watson</strong> replied to your comment : "Hello world 😍"</p>
                              <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">💬</span>Just now</span>

                            </div>
                          </a>

                        </div>
                        <div class="list-group-item">
                          <a class="notification notification-flush notification-unread" href="#!">
                            <div class="notification-avatar">
                              <div class="avatar avatar-2xl me-3">
                                <div class="avatar-name rounded-circle"><span>AB</span></div>
                              </div>
                            </div>
                            <div class="notification-body">
                              <p class="mb-1"><strong>Albert Brooks</strong> reacted to <strong>Mia Khalifa's</strong> status</p>
                              <span class="notification-time"><span class="me-2 fab fa-gratipay text-danger"></span>9hr</span>

                            </div>
                          </a>

                        </div>
                        <div class="list-group-title border-bottom">EARLIER</div>
                        <div class="list-group-item">
                          <a class="notification notification-flush" href="#!">
                            <div class="notification-avatar">
                              <div class="avatar avatar-2xl me-3">
                                <img class="rounded-circle" src="../assets/img/icons/weather-sm.jpg" alt="" />

                              </div>
                            </div>
                            <div class="notification-body">
                              <p class="mb-1">The forecast today shows a low of 20&#8451; in California. See today's weather.</p>
                              <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">🌤️</span>1d</span>

                            </div>
                          </a>

                        </div>
                        <div class="list-group-item">
                          <a class="border-bottom-0 notification-unread  notification notification-flush" href="#!">
                            <div class="notification-avatar">
                              <div class="avatar avatar-xl me-3">
                                <img class="rounded-circle" src="../assets/img/logos/oxford.png" alt="" />

                              </div>
                            </div>
                            <div class="notification-body">
                              <p class="mb-1"><strong>University of Oxford</strong> created an event : "Causal Inference Hilary 2019"</p>
                              <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">✌️</span>1w</span>

                            </div>
                          </a>

                        </div>
                        <div class="list-group-item">
                          <a class="border-bottom-0 notification notification-flush" href="#!">
                            <div class="notification-avatar">
                              <div class="avatar avatar-xl me-3">
                                <img class="rounded-circle" src="../assets/img/team/10.jpg" alt="" />

                              </div>
                            </div>
                            <div class="notification-body">
                              <p class="mb-1"><strong>James Cameron</strong> invited to join the group: United Nations International Children's Fund</p>
                              <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">🙋‍</span>2d</span>

                            </div>
                          </a>

                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-center border-top"><a class="card-link d-block" href="../app/social/notifications.html">View all</a></div>
                  </div>
                </div>

              </li>
              <li class="nav-item dropdown"><a class="nav-link pe-0" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-xl">
                  {{-- <img class="rounded-circle" src="assets/img/team/3-thumb.png" alt="" /> --}}
                  @if (!empty(Auth::guard('employee')->user()->image))
                  <img src="{{asset(Auth::guard('employee')->user()->image)}}" class="rounded-circle">
                  @else
                  <img src="/admin/dist/img/avators.jpg" class="rounded-circle">
                  @endif

                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                <div class="bg-white dark__bg-1000 rounded-2 py-2">
                  <a class="dropdown-item fw-bold text-warning" href="#!"><span class="fas fa-crown me-1"></a>

                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#!">Set status</a>
                  <a class="dropdown-item" href="{{ route('employeeAccountSetting') }}">Profile &amp; account</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('lockScreen') }}">Settings</a>
                  <a class="dropdown-item" href="{{ route('editPersonalInformationPage') }}">Edit Details</a>
                  <a class="dropdown-item" href="{{ route('employeeLogout') }}">Logout</a>
                </div>
              </div>
            </li>
            </ul>
          </nav>
          <div class="card card-chat overflow-hidden">
            <div class="card-body d-flex p-0 h-100">
              <div class="chat-sidebar">
                <div class="contacts-list scrollbar-overlay">
                  <div class="nav nav-tabs border-0 flex-column" role="tablist" aria-orientation="vertical">

                    <div class="hover-actions-trigger chat-contact nav-item active" role="tab" id="chat-link-0" data-bs-toggle="tab" data-bs-target="#chat-0" aria-controls="chat-0" aria-selected="true">
                      <div class="d-md-none d-lg-block">
                        <div class="dropdown dropdown-active-trigger dropdown-chat">
                          <button class="hover-actions btn btn-link btn-sm text-400 dropdown-caret-none dropdown-toggle end-0 fs-0 mt-4 me-1 z-index-1 pb-2 mb-n2" type="button" data-boundary="viewport" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-cog" data-fa-transform="shrink-3 down-4"></span></button>
                          <div class="dropdown-menu dropdown-menu-end border py-2 rounded-2"><a class="dropdown-item" href="#!">Mute</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#!">Mark as Unread</a><a class="dropdown-item" href="#!">Something's Wrong</a><a class="dropdown-item" href="#!">Ignore Messsages</a><a class="dropdown-item" href="#!">Block Messages</a>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="avatar avatar-xl status-online">
                          <img class="rounded-circle" src="../assets/img/team/2.jpg" alt="" />

                        </div>
                        <div class="flex-1 chat-contact-body ms-2 d-md-none d-lg-block">
                          <div class="d-flex justify-content-between">
                            <h6 class="mb-0 chat-contact-title">follower name</h6><span class="message-time fs--2">weekly day</span>
                          </div>
                          <div class="min-w-0">
                            <div class="chat-contact-content pe-3">follower name
                              sent
                              1 files
                            </div>
                            <div class="position-absolute bottom-0 end-0 hover-hide">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="hover-actions-trigger chat-contact nav-item" role="tab" id="chat-link-1" data-bs-toggle="tab" data-bs-target="#chat-1" aria-controls="chat-1" aria-selected="false">
                      <div class="d-md-none d-lg-block">
                        <div class="dropdown dropdown-active-trigger dropdown-chat">
                          <button class="hover-actions btn btn-link btn-sm text-400 dropdown-caret-none dropdown-toggle end-0 fs-0 mt-4 me-1 z-index-1 pb-2 mb-n2" type="button" data-boundary="viewport" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-cog" data-fa-transform="shrink-3 down-4"></span></button>
                          <div class="dropdown-menu dropdown-menu-end border py-2 rounded-2"><a class="dropdown-item" href="#!">Mute</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#!">Mark as Unread</a><a class="dropdown-item" href="#!">Something's Wrong</a><a class="dropdown-item" href="#!">Ignore Messsages</a><a class="dropdown-item" href="#!">Block Messages</a>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="avatar avatar-xl">
                          <div class="rounded-circle overflow-hidden h-100 d-flex">
                            <div class="w-50 border-end"><img src="/public/assets/img/team/1.jpg" alt="" /></div>
                            <div class="w-50 d-flex flex-column"><img class="h-50 border-bottom" src="/public/assets/img/team/2.jpg" alt="" /><img class="h-50" src="../assets/img/team/3.jpg" alt="" /></div>
                          </div>
                        </div>
                        <div class="flex-1 chat-contact-body ms-2 d-md-none d-lg-block">
                          <div class="d-flex justify-content-between">
                            <h6 class="mb-0 chat-contact-title">group username</h6><span class="message-time fs--2">Sun</span>
                          </div>
                          <div class="min-w-0">
                            <div class="chat-contact-content pe-3">username: <a href="#!" class="text-primary">@username</a> What do you think about the plan?
                            </div>
                            <div class="position-absolute bottom-0 end-0 hover-hide"><span class="fas fa-check text-success" data-fa-transform="shrink-5 down-4"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <form class="contacts-search-wrapper">
                  <div class="form-group mb-0 position-relative d-md-none d-lg-block w-100 h-100">
                    <input class="form-control form-control-sm chat-contacts-search border-0 h-100" type="text" placeholder="Search contacts ..." /><span class="fas fa-search contacts-search-icon"></span>
                  </div>
                  <button class="btn btn-sm btn-transparent d-none d-md-inline-block d-lg-none"><span class="fas fa-search fs--1"></span></button>
                </form>
              </div>
              <div class="tab-content card-chat-content">
                <div class="tab-pane card-chat-pane active" id="chat-0" role="tabpanel" aria-labelledby="chat-link-0">
                  <div class="chat-content-header">
                    <div class="row flex-between-center">
                      <div class="col-6 col-sm-8 d-flex align-items-center"><a class="pe-3 text-700 d-md-none contacts-list-show" href="#!">
                          <div class="fas fa-chevron-left"></div>
                        </a>
                        <div class="min-w-0">
                          <h5 class="mb-0 text-truncate fs-0">Username</h5>
                          <div class="fs--2 text-400">Active On Chat
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <button class="btn btn-sm btn-falcon-primary me-2" type="button" data-index="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Start a Call"><span class="fas fa-phone"></span></button>
                        <button class="btn btn-sm btn-falcon-primary me-2" type="button" data-index="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Start a Video Call"><span class="fas fa-video"></span></button>
                        <button class="btn btn-sm btn-falcon-primary btn-info" type="button" data-index="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Conversation Information"><span class="fas fa-info"></span></button>
                      </div>
                    </div>
                  </div>
                  <div class="chat-content-body" style="display: inherit;">
                    <div class="conversation-info" data-index="0">
                      <div class="h-100 overflow-auto scrollbar">
                        <div class="d-flex position-relative align-items-center p-3 border-bottom">
                          <div class="avatar avatar-xl status-online">
                            <img class="rounded-circle" src="../assets/img/team/2.jpg" alt="" />

                          </div>
                          <div class="flex-1 ms-2 d-flex flex-between-center">
                            <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700" href="../pages/user/profile.html">Antony Hopkins</a></h6>
                            <div class="dropdown z-index-1">
                              <button class="btn btn-link btn-sm text-400 dropdown-toggle dropdown-caret-none me-n3" type="button" id="profile-dropdown-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-cog"></span></button>
                              <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="profile-dropdown-0"><a class="dropdown-item" href="#!">Mute</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="px-3 pt-2">
                          <div class="nav flex-column font-sans-serif fw-medium"><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-search me-1" data-fa-transform="shrink-1 down-3"></span></span>Search in Conversation</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-pencil-alt me-1" data-fa-transform="shrink-1"></span></span>Edit Nicknames</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-palette me-1" data-fa-transform="shrink-1"></span></span><span>Change Color</span></a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-thumbs-up me-1" data-fa-transform="shrink-1"></span></span>Change Emoji</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-bell me-1" data-fa-transform="shrink-1"></span></span>Notifications</a></div>
                        </div>
                        <hr class="my-2" />
                        <div class="px-3" id="others-info-0">
                          <div class="title" id="shared-media-title-0"><a class="btn btn-link btn-accordion hover-text-decoration-none dropdown-indicator" href="#shared-media-0" data-bs-toggle="collapse" aria-expanded="false" aria-controls="shared-media-0">Shared media</a></div>
                          <div class="collapse" id="shared-media-0" aria-labelledby="shared-media-title-0" data-parent="#others-info-0">
                            {{-- <div class="row mx-n1">
                              <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/1.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/1.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/2.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/2.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/3.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/3.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/4.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/4.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/5.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/5.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/6.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/6.jpg" alt="" /></a></div>
                            </div> --}}
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="chat-content-scroll-area scrollbar">
                      <div class="d-flex position-relative p-3 border-bottom mb-3 align-items-center">
                        <div class="avatar avatar-2xl status-online me-3">
                          <img class="rounded-circle" src="../assets/img/team/2.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700" href="../pages/user/profile.html">Antony Hopkins</a></h6>
                          <p class="mb-0">You friends with Antony Hopkins. Say hi to start the conversation
                          </p>
                        </div>
                      </div>
                      <div class="text-center fs--2 text-500"><span>May 5, 2019, 11:54 am</span></div>
                      <div class="d-flex p-3">
                        <div class="avatar avatar-l me-2">
                          <img class="rounded-circle" src="../assets/img/team/2.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <div class="w-xxl-75">
                            <div class="hover-actions-trigger d-flex align-items-center">
                              <div class="chat-message bg-200 p-2 rounded-2">Yes, in an organization stature, this is a must. Besides, we need to quickly establish all other professional appearances, e.g., having a website where members’ profile will be displayed along with additional organizational information. Providing services to existing members is more important than attracting new members at this moment, in my opinion..</div>
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                            </div>
                            <div class="text-400 fs--2"><span>11:54 am</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="avatar avatar-l me-2">
                          <img class="rounded-circle" src="../assets/img/team/2.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <div class="w-xxl-75">
                            <div class="hover-actions-trigger d-flex align-items-center">
                              <div class="chat-message bg-200 p-2 rounded-2">What are you doing?</div>
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                            </div>
                            <div class="text-400 fs--2"><span>11:54 am</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="flex-1 d-flex justify-content-end">
                          <div class="w-100 w-xxl-75">
                            <div class="hover-actions-trigger d-flex flex-end-center">
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 me-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                              <div class="bg-primary text-white p-2 rounded-2 chat-message light">
                                <p class="mb-0">I took this pic </p>
                                <a href="../assets/img/chat/1.jpg" data-gallery="gallery-3">
                                  <img class="rounded" src="../assets/img/chat/1.jpg" alt="" width="150">
                                </a>

                              </div>
                            </div>
                            <div class="text-400 fs--2 text-end">11:54 am<span class="fas fa-check ms-2 text-success"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="flex-1 d-flex justify-content-end">
                          <div class="w-100 w-xxl-75">
                            <div class="hover-actions-trigger d-flex flex-end-center">
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 me-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                              <div class="bg-primary text-white p-2 rounded-2 chat-message light">Nothing!
                              </div>
                            </div>
                            <div class="text-400 fs--2 text-end">11:54 am<span class="fas fa-check ms-2 text-success"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="text-center fs--2 text-500"><span>May 6, 2019, 11:54 am</span></div>
                      <div class="d-flex p-3">
                        <div class="avatar avatar-l me-2">
                          <img class="rounded-circle" src="../assets/img/team/2.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <div class="w-xxl-75">
                            <div class="hover-actions-trigger d-flex align-items-center">
                              <div class="chat-message bg-200 p-2 rounded-2">How are you?</div>
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                            </div>
                            <div class="text-400 fs--2"><span>11:54 am</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="flex-1 d-flex justify-content-end">
                          <div class="w-100 w-xxl-75">
                            <div class="hover-actions-trigger d-flex flex-end-center">
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 me-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                              <div class="bg-primary text-white p-2 rounded-2 chat-message light">Fine
                              </div>
                            </div>
                            <div class="text-400 fs--2 text-end">11:54 am<span class="fas fa-check-double ms-2"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="text-center fs--2 text-500"><span>May 7, 2019, 11:54 am</span></div>
                      <div class="d-flex p-3">
                        <div class="flex-1 d-flex justify-content-end">
                          <div class="w-100 w-xxl-75">
                            <div class="hover-actions-trigger d-flex flex-end-center">
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 me-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                              <div class="chat-message chat-gallery">
                                <div class="row mx-n1">
                                  <div class="col-6 col-md-4 px-1" style="min-width: 50px;">
                                    <a href="../assets/img/chat/7.jpg" data-gallery="gallery-1"><img src="../assets/img/chat/7.jpg" alt="" class="img-fluid rounded mb-2"></a>
                                  </div>
                                  <div class="col-6 col-md-4 px-1" style="min-width: 50px;">
                                    <a href="../assets/img/chat/8.jpg" data-gallery="gallery-1"><img src="../assets/img/chat/8.jpg" alt="" class="img-fluid rounded mb-2"></a>
                                  </div>
                                  <div class="col-6 col-md-4 px-1" style="min-width: 50px;">
                                    <a href="../assets/img/chat/9.jpg" data-gallery="gallery-1"><img src="../assets/img/chat/9.jpg" alt="" class="img-fluid rounded mb-2"></a>
                                  </div>
                                  <div class="col-6 col-md-4 px-1" style="min-width: 50px;">
                                    <a href="../assets/img/chat/10.jpg" data-gallery="gallery-1"><img src="../assets/img/chat/10.jpg" alt="" class="img-fluid rounded mb-2 mb-lg-0"></a>
                                  </div>
                                  <div class="col-6 col-md-4 px-1" style="min-width: 50px;">
                                    <a href="../assets/img/chat/11.jpg" data-gallery="gallery-1"><img src="../assets/img/chat/11.jpg" alt="" class="img-fluid rounded mb-2 mb-lg-0"></a>
                                  </div>
                                  <div class="col-6 col-md-4 px-1" style="min-width: 50px;">
                                    <a href="../assets/img/chat/12.jpg" data-gallery="gallery-1"><img src="../assets/img/chat/12.jpg" alt="" class="img-fluid rounded"></a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="text-400 fs--2 text-end">11:54 am<span class="fas fa-check ms-2"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="avatar avatar-l me-2">
                          <img class="rounded-circle" src="../assets/img/team/2.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <div class="w-xxl-75">
                            <div class="hover-actions-trigger d-flex align-items-center">
                              <div class="chat-message bg-200 p-2 rounded-2">I took some excellent images yesterday.</div>
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                            </div>
                            <div class="text-400 fs--2"><span>11:54 am</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="text-center fs--2 text-500"><span>May 8, 2019, 11:54 am</span></div>
                      <div class="d-flex p-3">
                        <div class="flex-1 d-flex justify-content-end">
                          <div class="w-100 w-xxl-75">
                            <div class="hover-actions-trigger d-flex flex-end-center">
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 me-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                              <div class="bg-primary text-white p-2 rounded-2 chat-message light">Give me the images.
                              </div>
                            </div>
                            <div class="text-400 fs--2 text-end">11:54 am
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="avatar avatar-l me-2">
                          <img class="rounded-circle" src="../assets/img/team/2.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <div class="w-xxl-75">
                            <div class="hover-actions-trigger d-flex align-items-center">
                              <div class="chat-message chat-gallery">
                                <div class="row mx-n1">
                                  <div class="col-6 col-md-4 px-1" style="min-width: 50px;">
                                    <a href="../assets/img/chat/1.jpg" data-gallery="gallery-2"><img src="../assets/img/chat/1.jpg" alt="" class="img-fluid rounded mb-2"></a>
                                  </div>
                                  <div class="col-6 col-md-4 px-1" style="min-width: 50px;">
                                    <a href="../assets/img/chat/2.jpg" data-gallery="gallery-2"><img src="../assets/img/chat/2.jpg" alt="" class="img-fluid rounded mb-2"></a>
                                  </div>
                                  <div class="col-6 col-md-4 px-1" style="min-width: 50px;">
                                    <a href="../assets/img/chat/3.jpg" data-gallery="gallery-2"><img src="../assets/img/chat/3.jpg" alt="" class="img-fluid rounded mb-2"></a>
                                  </div>
                                  <div class="col-6 col-md-4 px-1" style="min-width: 50px;">
                                    <a href="../assets/img/chat/4.jpg" data-gallery="gallery-2"><img src="../assets/img/chat/4.jpg" alt="" class="img-fluid rounded mb-2 mb-lg-0"></a>
                                  </div>
                                  <div class="col-6 col-md-4 px-1" style="min-width: 50px;">
                                    <a href="../assets/img/chat/5.jpg" data-gallery="gallery-2"><img src="../assets/img/chat/5.jpg" alt="" class="img-fluid rounded mb-2 mb-lg-0"></a>
                                  </div>
                                  <div class="col-6 col-md-4 px-1" style="min-width: 50px;">
                                    <a href="../assets/img/chat/6.jpg" data-gallery="gallery-2"><img src="../assets/img/chat/6.jpg" alt="" class="img-fluid rounded"></a>
                                  </div>
                                </div>
                              </div>
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                            </div>
                            <div class="text-400 fs--2"><span>11:54 am</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane card-chat-pane" id="chat-1" role="tabpanel" aria-labelledby="chat-link-1">
                  <div class="chat-content-header">
                    <div class="row flex-between-center">
                      <div class="col-6 col-sm-8 d-flex align-items-center"><a class="pe-3 text-700 d-md-none contacts-list-show" href="#!">
                          <div class="fas fa-chevron-left"></div>
                        </a>
                        <div class="min-w-0">
                          <h5 class="mb-0 text-truncate fs-0">Avengers</h5>
                          <div class="fs--2 text-400">Active 7h ago
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <button class="btn btn-sm btn-falcon-primary me-2" type="button" data-index="1" data-bs-toggle="tooltip" data-bs-placement="top" title="Start a Call"><span class="fas fa-phone"></span></button>
                        <button class="btn btn-sm btn-falcon-primary me-2" type="button" data-index="1" data-bs-toggle="tooltip" data-bs-placement="top" title="Start a Video Call"><span class="fas fa-video"></span></button>
                        <button class="btn btn-sm btn-falcon-primary btn-info" type="button" data-index="1" data-bs-toggle="tooltip" data-bs-placement="top" title="Conversation Information"><span class="fas fa-info"></span></button>
                      </div>
                    </div>
                  </div>
                  <div class="chat-content-body" style="display: inherit;">
                    <div class="conversation-info" data-index="1">
                      <div class="h-100 overflow-auto scrollbar">
                        <div class="d-flex position-relative align-items-center p-3 border-bottom">
                          <div class="avatar avatar-xl">
                            <div class="rounded-circle overflow-hidden h-100 d-flex">
                              <div class="w-50 border-end"><img src="../assets/img/team/1.jpg" alt="" /></div>
                              <div class="w-50 d-flex flex-column"><img class="h-50 border-bottom" src="../assets/img/team/2.jpg" alt="" /><img class="h-50" src="../assets/img/team/3.jpg" alt="" /></div>
                            </div>
                          </div>
                          <div class="flex-1 ms-2 d-flex flex-between-center">
                            <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700" href="../pages/user/profile.html">Avengers</a></h6>
                            <div class="dropdown z-index-1">
                              <button class="btn btn-link btn-sm text-400 dropdown-toggle dropdown-caret-none me-n3" type="button" id="profile-dropdown-1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-cog"></span></button>
                              <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="profile-dropdown-1"><a class="dropdown-item" href="#!">Mute</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="px-3 pt-2">
                          <div class="nav flex-column font-sans-serif fw-medium"><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-search me-1" data-fa-transform="shrink-1 down-3"></span></span>Search in Conversation</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-pencil-alt me-1" data-fa-transform="shrink-1"></span></span>Edit Nicknames</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-palette me-1" data-fa-transform="shrink-1"></span></span><span>Change Color</span></a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-thumbs-up me-1" data-fa-transform="shrink-1"></span></span>Change Emoji</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-bell me-1" data-fa-transform="shrink-1"></span></span>Notifications</a></div>
                        </div>
                        <hr class="my-2" />
                        <div class="px-3" id="others-info-1">
                          <div class="title" id="member-title-1"><a class="btn btn-link btn-accordion hover-text-decoration-none dropdown-indicator" href="#members-1" data-bs-toggle="collapse" aria-expanded="false" aria-controls="members-1">Members</a></div>
                          <div class="collapse" id="members-1" aria-labelledby="member-title-1" data-parent="#others-info-1">
                            <div class="d-flex align-items-center py-2 hover-actions-trigger">
                              <div class="avatar avatar-xl status-online">
                                <img class="rounded-circle" src="../assets/img/team/2.jpg" alt="" />

                              </div>
                              <div class="flex-1 ms-2 d-flex justify-content-between">
                                <div>
                                  <h6 class="mb-0"><a class="text-700" href="../pages/user/profile.html">Antony Hopkins</a></h6>
                                  <div class="fs--2 text-400">Admin</div>
                                </div>
                                <div class="dropdown hover-actions position-relative dropdown-active-trigger z-index-1">
                                  <button class="btn btn-link btn-sm text-400 dropdown-toggle dropdown-caret-none" type="button" id="user-settings-dropdown-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h"></span></button>
                                  <div class="dropdown-menu dropdown-menu-end py-2 border" aria-labelledby="user-settings-dropdown-0"><a class="dropdown-item" href="#!">Message</a><a class="dropdown-item" href="#!">View Profile</a></div>
                                </div>
                              </div>
                            </div>
                            <div class="d-flex align-items-center py-2 hover-actions-trigger">
                              <div class="avatar avatar-xl">
                                <img class="rounded-circle" src="../assets/img/team/1.jpg" alt="" />

                              </div>
                              <div class="flex-1 ms-2 d-flex justify-content-between">
                                <div>
                                  <h6 class="mb-0"><a class="text-700" href="../pages/user/profile.html">Emma Watson</a></h6>
                                  <div class="fs--2 text-400">Member</div>
                                </div>
                                <div class="dropdown hover-actions position-relative dropdown-active-trigger z-index-1">
                                  <button class="btn btn-link btn-sm text-400 dropdown-toggle dropdown-caret-none" type="button" id="user-settings-dropdown-1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h"></span></button>
                                  <div class="dropdown-menu dropdown-menu-end py-2 border" aria-labelledby="user-settings-dropdown-1"><a class="dropdown-item" href="#!">Message</a><a class="dropdown-item" href="#!">View Profile</a></div>
                                </div>
                              </div>
                            </div>
                            <div class="d-flex align-items-center py-2 hover-actions-trigger">
                              <div class="avatar avatar-xl status-online">
                                <img class="rounded-circle" src="../assets/img/team/3.jpg" alt="" />

                              </div>
                              <div class="flex-1 ms-2 d-flex justify-content-between">
                                <div>
                                  <h6 class="mb-0"><a class="text-700" href="../pages/user/profile.html">Anna Karinina</a></h6>
                                  <div class="fs--2 text-400">Member</div>
                                </div>
                                <div class="dropdown hover-actions position-relative dropdown-active-trigger z-index-1">
                                  <button class="btn btn-link btn-sm text-400 dropdown-toggle dropdown-caret-none" type="button" id="user-settings-dropdown-2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h"></span></button>
                                  <div class="dropdown-menu dropdown-menu-end py-2 border" aria-labelledby="user-settings-dropdown-2"><a class="dropdown-item" href="#!">Message</a><a class="dropdown-item" href="#!">View Profile</a></div>
                                </div>
                              </div>
                            </div>
                            <div class="d-flex align-items-center py-2 hover-actions-trigger">
                              <div class="avatar avatar-xl status-online">
                                <img class="rounded-circle" src="../assets/img/team/4.jpg" alt="" />

                              </div>
                              <div class="flex-1 ms-2 d-flex justify-content-between">
                                <div>
                                  <h6 class="mb-0"><a class="text-700" href="../pages/user/profile.html">John Lee</a></h6>
                                  <div class="fs--2 text-400">Member</div>
                                </div>
                                <div class="dropdown hover-actions position-relative dropdown-active-trigger z-index-1">
                                  <button class="btn btn-link btn-sm text-400 dropdown-toggle dropdown-caret-none" type="button" id="user-settings-dropdown-3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h"></span></button>
                                  <div class="dropdown-menu dropdown-menu-end py-2 border" aria-labelledby="user-settings-dropdown-3"><a class="dropdown-item" href="#!">Message</a><a class="dropdown-item" href="#!">View Profile</a></div>
                                </div>
                              </div>
                            </div>
                            <div class="d-flex align-items-center py-2 hover-actions-trigger">
                              <div class="avatar avatar-xl">
                                <img class="rounded-circle" src="../assets/img/team/5.jpg" alt="" />

                              </div>
                              <div class="flex-1 ms-2 d-flex justify-content-between">
                                <div>
                                  <h6 class="mb-0"><a class="text-700" href="../pages/user/profile.html">Bucky Robert</a></h6>
                                  <div class="fs--2 text-400">Member</div>
                                </div>
                                <div class="dropdown hover-actions position-relative dropdown-active-trigger z-index-1">
                                  <button class="btn btn-link btn-sm text-400 dropdown-toggle dropdown-caret-none" type="button" id="user-settings-dropdown-4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h"></span></button>
                                  <div class="dropdown-menu dropdown-menu-end py-2 border" aria-labelledby="user-settings-dropdown-4"><a class="dropdown-item" href="#!">Message</a><a class="dropdown-item" href="#!">View Profile</a></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="title" id="shared-media-title-1"><a class="btn btn-link btn-accordion hover-text-decoration-none dropdown-indicator" href="#shared-media-1" data-bs-toggle="collapse" aria-expanded="false" aria-controls="shared-media-1">Shared media</a></div>
                          <div class="collapse" id="shared-media-1" aria-labelledby="shared-media-title-1" data-parent="#others-info-1">
                            <div class="row mx-n1">
                              <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/1.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/1.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/2.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/2.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/3.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/3.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/4.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/4.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/5.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/5.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/6.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/6.jpg" alt="" /></a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="chat-content-scroll-area scrollbar">
                      <div class="d-flex position-relative p-3 border-bottom mb-3 align-items-center">
                        <div class="avatar avatar-2xl me-3">
                          <div class="rounded-circle overflow-hidden h-100 d-flex">
                            <div class="w-50 border-end"><img src="../assets/img/team/1.jpg" alt="" /></div>
                            <div class="w-50 d-flex flex-column"><img class="h-50 border-bottom" src="../assets/img/team/2.jpg" alt="" /><img class="h-50" src="../assets/img/team/3.jpg" alt="" /></div>
                          </div>
                        </div>
                        <div class="flex-1">
                          <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700" href="../pages/user/profile.html">Avengers</a></h6>
                          <p class="mb-0">You are a member of Avengers. Say hi to start conversation to the group.
                          </p>
                        </div>
                      </div>
                      <div class="text-center fs--2 text-500"><span>May 5, 2019, 11:54 am</span></div>
                      <div class="d-flex p-3">
                        <div class="avatar avatar-l me-2">
                          <img class="rounded-circle" src="../assets/img/team/13.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <div class="w-xxl-75">
                            <div class="hover-actions-trigger d-flex align-items-center">
                              <div class="chat-message bg-200 p-2 rounded-2">In an organisation stature, this is a must. Besides, we need to quickly establish all other professional appearances, e.g. having a website where members’ profile will be displayed along with other organisational information. Providing services to existing members is more important than attracting new members at this moment, in my opinion.</div>
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                            </div>
                            <div class="text-400 fs--2"><span class="fw-semi-bold me-2">Anna</span><span>11:54 am</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="flex-1 d-flex justify-content-end">
                          <div class="w-100 w-xxl-75">
                            <div class="hover-actions-trigger d-flex flex-end-center">
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 me-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                              <div class="bg-primary text-white p-2 rounded-2 chat-message light">Your are right 👍
                              </div>
                            </div>
                            <div class="text-400 fs--2 text-end">11:54 am<span class="fas fa-check ms-2 text-success"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="avatar avatar-l me-2">
                          <img class="rounded-circle" src="../assets/img/team/2.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <div class="w-xxl-75">
                            <div class="hover-actions-trigger d-flex align-items-center">
                              <div class="chat-message bg-200 p-2 rounded-2">We should divide the tasks among all other members.</div>
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                            </div>
                            <div class="text-400 fs--2"><span class="fw-semi-bold me-2">Antony</span><span>11:54 am</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="avatar avatar-l me-2">
                          <img class="rounded-circle" src="../assets/img/team/4.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <div class="w-xxl-75">
                            <div class="hover-actions-trigger d-flex align-items-center">
                              <div class="chat-message bg-200 p-2 rounded-2">I will make a list of all the tasks.</div>
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                            </div>
                            <div class="text-400 fs--2"><span class="fw-semi-bold me-2">John</span><span>11:54 am</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="text-center fs--2 text-500"><span>May 7, 2019, 11:54 am</span></div>
                      <div class="d-flex p-3">
                        <div class="flex-1 d-flex justify-content-end">
                          <div class="w-100 w-xxl-75">
                            <div class="hover-actions-trigger d-flex flex-end-center">
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 me-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                              <div class="bg-primary text-white p-2 rounded-2 chat-message light">I can help you to do this.
                              </div>
                            </div>
                            <div class="text-400 fs--2 text-end">11:54 am<span class="fas fa-check ms-2 text-success"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="avatar avatar-l me-2">
                          <img class="rounded-circle" src="../assets/img/team/1.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <div class="w-xxl-75">
                            <div class="hover-actions-trigger d-flex align-items-center">
                              <div class="chat-message bg-200 p-2 rounded-2">It will be a great opportunity if I can contribute to this task 😊</div>
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                            </div>
                            <div class="text-400 fs--2"><span class="fw-semi-bold me-2">Emma</span><span>11:54 am</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="avatar avatar-l me-2">
                          <img class="rounded-circle" src="../assets/img/team/5.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <div class="w-xxl-75">
                            <div class="hover-actions-trigger d-flex align-items-center">
                              <div class="chat-message bg-200 p-2 rounded-2">Wow, it will be great!</div>
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                            </div>
                            <div class="text-400 fs--2"><span class="fw-semi-bold me-2">Bucky</span><span>11:54 am</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="avatar avatar-l me-2">
                          <img class="rounded-circle" src="../assets/img/team/5.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <div class="w-xxl-75">
                            <div class="hover-actions-trigger d-flex align-items-center">
                              <div class="chat-message bg-200 p-2 rounded-2"><a href="#!" class="text-primary">@Emma</a> What do you think about the plan?</div>
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                            </div>
                            <div class="text-400 fs--2"><span class="fw-semi-bold me-2">Bucky</span><span>11:54 am</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane card-chat-pane" id="chat-2" role="tabpanel" aria-labelledby="chat-link-2">
                  <div class="chat-content-header">
                    <div class="row flex-between-center">
                      <div class="col-6 col-sm-8 d-flex align-items-center"><a class="pe-3 text-700 d-md-none contacts-list-show" href="#!">
                          <div class="fas fa-chevron-left"></div>
                        </a>
                        <div class="min-w-0">
                          <h5 class="mb-0 text-truncate fs-0">Emma Watson</h5>
                          <div class="fs--2 text-400">Active 7h ago
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <button class="btn btn-sm btn-falcon-primary me-2" type="button" data-index="2" data-bs-toggle="tooltip" data-bs-placement="top" title="Start a Call"><span class="fas fa-phone"></span></button>
                        <button class="btn btn-sm btn-falcon-primary me-2" type="button" data-index="2" data-bs-toggle="tooltip" data-bs-placement="top" title="Start a Video Call"><span class="fas fa-video"></span></button>
                        <button class="btn btn-sm btn-falcon-primary btn-info" type="button" data-index="2" data-bs-toggle="tooltip" data-bs-placement="top" title="Conversation Information"><span class="fas fa-info"></span></button>
                      </div>
                    </div>
                  </div>
                  <div class="chat-content-body" style="display: inherit;">
                    <div class="conversation-info" data-index="2">
                      <div class="h-100 overflow-auto scrollbar">
                        <div class="d-flex position-relative align-items-center p-3 border-bottom">
                          <div class="avatar avatar-xl">
                            <img class="rounded-circle" src="../assets/img/team/1.jpg" alt="" />

                          </div>
                          <div class="flex-1 ms-2 d-flex flex-between-center">
                            <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700" href="../pages/user/profile.html">Emma Watson</a></h6>
                            <div class="dropdown z-index-1">
                              <button class="btn btn-link btn-sm text-400 dropdown-toggle dropdown-caret-none me-n3" type="button" id="profile-dropdown-2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-cog"></span></button>
                              <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="profile-dropdown-2"><a class="dropdown-item" href="#!">Mute</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="px-3 pt-2">
                          <div class="nav flex-column font-sans-serif fw-medium"><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-search me-1" data-fa-transform="shrink-1 down-3"></span></span>Search in Conversation</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-pencil-alt me-1" data-fa-transform="shrink-1"></span></span>Edit Nicknames</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-palette me-1" data-fa-transform="shrink-1"></span></span><span>Change Color</span></a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-thumbs-up me-1" data-fa-transform="shrink-1"></span></span>Change Emoji</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-bell me-1" data-fa-transform="shrink-1"></span></span>Notifications</a></div>
                        </div>
                        <hr class="my-2" />
                        <div class="px-3" id="others-info-2">
                          <div class="title" id="shared-media-title-2"><a class="btn btn-link btn-accordion hover-text-decoration-none dropdown-indicator" href="#shared-media-2" data-bs-toggle="collapse" aria-expanded="false" aria-controls="shared-media-2">Shared media</a></div>
                          <div class="collapse" id="shared-media-2" aria-labelledby="shared-media-title-2" data-parent="#others-info-2">
                            <div class="row mx-n1">
                              <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/1.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/1.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/2.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/2.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/3.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/3.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/4.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/4.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/5.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/5.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/6.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/6.jpg" alt="" /></a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="chat-content-scroll-area scrollbar">
                      <div class="d-flex position-relative p-3 border-bottom mb-3 align-items-center">
                        <div class="avatar avatar-2xl me-3">
                          <img class="rounded-circle" src="../assets/img/team/1.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700" href="../pages/user/profile.html">Emma Watson</a></h6>
                          <p class="mb-0">You friends with Emma Watson. Say hi to start the conversation
                          </p>
                        </div>
                      </div>
                      <div class="text-center fs--2 text-500"><span>May 5, 2019, 11:54 am</span></div>
                      <div class="d-flex p-3">
                        <div class="flex-1 d-flex justify-content-end">
                          <div class="w-100 w-xxl-75">
                            <div class="hover-actions-trigger d-flex flex-end-center">
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 me-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                              <div class="bg-primary text-white p-2 rounded-2 chat-message light">Hello
                              </div>
                            </div>
                            <div class="text-400 fs--2 text-end">11:54 am<span class="fas fa-check ms-2 text-success"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="flex-1 d-flex justify-content-end">
                          <div class="w-100 w-xxl-75">
                            <div class="hover-actions-trigger d-flex flex-end-center">
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 me-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                              <div class="bg-primary text-white p-2 rounded-2 chat-message light">🙂
                              </div>
                            </div>
                            <div class="text-400 fs--2 text-end">11:54 am<span class="fas fa-check ms-2 text-success"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane card-chat-pane" id="chat-3" role="tabpanel" aria-labelledby="chat-link-3">
                  <div class="chat-content-header">
                    <div class="row flex-between-center">
                      <div class="col-6 col-sm-8 d-flex align-items-center"><a class="pe-3 text-700 d-md-none contacts-list-show" href="#!">
                          <div class="fas fa-chevron-left"></div>
                        </a>
                        <div class="min-w-0">
                          <h5 class="mb-0 text-truncate fs-0">Anna Karinina</h5>
                          <div class="fs--2 text-400">Active On Chat
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <button class="btn btn-sm btn-falcon-primary me-2" type="button" data-index="3" data-bs-toggle="tooltip" data-bs-placement="top" title="Start a Call"><span class="fas fa-phone"></span></button>
                        <button class="btn btn-sm btn-falcon-primary me-2" type="button" data-index="3" data-bs-toggle="tooltip" data-bs-placement="top" title="Start a Video Call"><span class="fas fa-video"></span></button>
                        <button class="btn btn-sm btn-falcon-primary btn-info" type="button" data-index="3" data-bs-toggle="tooltip" data-bs-placement="top" title="Conversation Information"><span class="fas fa-info"></span></button>
                      </div>
                    </div>
                  </div>
                  <div class="chat-content-body" style="display: inherit;">
                    <div class="conversation-info" data-index="3">
                      <div class="h-100 overflow-auto scrollbar">
                        <div class="d-flex position-relative align-items-center p-3 border-bottom">
                          <div class="avatar avatar-xl status-online">
                            <img class="rounded-circle" src="../assets/img/team/13.jpg" alt="" />

                          </div>
                          <div class="flex-1 ms-2 d-flex flex-between-center">
                            <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700" href="../pages/user/profile.html">Anna Karinina</a></h6>
                            <div class="dropdown z-index-1">
                              <button class="btn btn-link btn-sm text-400 dropdown-toggle dropdown-caret-none me-n3" type="button" id="profile-dropdown-3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-cog"></span></button>
                              <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="profile-dropdown-3"><a class="dropdown-item" href="#!">Mute</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="px-3 pt-2">
                          <div class="nav flex-column font-sans-serif fw-medium"><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-search me-1" data-fa-transform="shrink-1 down-3"></span></span>Search in Conversation</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-pencil-alt me-1" data-fa-transform="shrink-1"></span></span>Edit Nicknames</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-palette me-1" data-fa-transform="shrink-1"></span></span><span>Change Color</span></a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-thumbs-up me-1" data-fa-transform="shrink-1"></span></span>Change Emoji</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-bell me-1" data-fa-transform="shrink-1"></span></span>Notifications</a></div>
                        </div>
                        <hr class="my-2" />
                        <div class="px-3" id="others-info-3">
                          <div class="title" id="shared-media-title-3"><a class="btn btn-link btn-accordion hover-text-decoration-none dropdown-indicator" href="#shared-media-3" data-bs-toggle="collapse" aria-expanded="false" aria-controls="shared-media-3">Shared media</a></div>
                          <div class="collapse" id="shared-media-3" aria-labelledby="shared-media-title-3" data-parent="#others-info-3">
                            <div class="row mx-n1">
                              <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/1.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/1.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/2.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/2.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/3.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/3.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/4.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/4.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/5.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/5.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/6.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/6.jpg" alt="" /></a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="chat-content-scroll-area scrollbar">
                      <div class="d-flex position-relative p-3 border-bottom mb-3 align-items-center">
                        <div class="avatar avatar-2xl status-online me-3">
                          <img class="rounded-circle" src="../assets/img/team/13.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700" href="../pages/user/profile.html">Anna Karinina</a></h6>
                          <p class="mb-0">You friends with Anna Karinina. Say hi to start the conversation
                          </p>
                        </div>
                      </div>
                      <div class="text-center fs--2 text-500"><span>May 5, 2019, 11:54 am</span></div>
                      <div class="d-flex p-3">
                        <div class="flex-1 d-flex justify-content-end">
                          <div class="w-100 w-xxl-75">
                            <div class="hover-actions-trigger d-flex flex-end-center">
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 me-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                              <div class="bg-primary text-white p-2 rounded-2 chat-message light">Hello
                              </div>
                            </div>
                            <div class="text-400 fs--2 text-end">11:54 am<span class="fas fa-check ms-2"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="avatar avatar-l me-2">
                          <img class="rounded-circle" src="../assets/img/team/13.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <div class="w-xxl-75">
                            <div class="hover-actions-trigger d-flex align-items-center">
                              <div class="chat-message bg-200 p-2 rounded-2">What are you doing?</div>
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                            </div>
                            <div class="text-400 fs--2"><span>11:54 am</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane card-chat-pane" id="chat-4" role="tabpanel" aria-labelledby="chat-link-4">
                  <div class="chat-content-header">
                    <div class="row flex-between-center">
                      <div class="col-6 col-sm-8 d-flex align-items-center"><a class="pe-3 text-700 d-md-none contacts-list-show" href="#!">
                          <div class="fas fa-chevron-left"></div>
                        </a>
                        <div class="min-w-0">
                          <h5 class="mb-0 text-truncate fs-0">John Lee</h5>
                          <div class="fs--2 text-400">Active On Chat
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <button class="btn btn-sm btn-falcon-primary me-2" type="button" data-index="4" data-bs-toggle="tooltip" data-bs-placement="top" title="Start a Call"><span class="fas fa-phone"></span></button>
                        <button class="btn btn-sm btn-falcon-primary me-2" type="button" data-index="4" data-bs-toggle="tooltip" data-bs-placement="top" title="Start a Video Call"><span class="fas fa-video"></span></button>
                        <button class="btn btn-sm btn-falcon-primary btn-info" type="button" data-index="4" data-bs-toggle="tooltip" data-bs-placement="top" title="Conversation Information"><span class="fas fa-info"></span></button>
                      </div>
                    </div>
                  </div>
                  <div class="chat-content-body" style="display: inherit;">
                    <div class="conversation-info" data-index="4">
                      <div class="h-100 overflow-auto scrollbar">
                        <div class="d-flex position-relative align-items-center p-3 border-bottom">
                          <div class="avatar avatar-xl status-online">
                            <img class="rounded-circle" src="../assets/img/team/4.jpg" alt="" />

                          </div>
                          <div class="flex-1 ms-2 d-flex flex-between-center">
                            <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700" href="../pages/user/profile.html">John Lee</a></h6>
                            <div class="dropdown z-index-1">
                              <button class="btn btn-link btn-sm text-400 dropdown-toggle dropdown-caret-none me-n3" type="button" id="profile-dropdown-4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-cog"></span></button>
                              <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="profile-dropdown-4"><a class="dropdown-item" href="#!">Mute</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="px-3 pt-2">
                          <div class="nav flex-column font-sans-serif fw-medium"><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-search me-1" data-fa-transform="shrink-1 down-3"></span></span>Search in Conversation</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-pencil-alt me-1" data-fa-transform="shrink-1"></span></span>Edit Nicknames</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-palette me-1" data-fa-transform="shrink-1"></span></span><span>Change Color</span></a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-thumbs-up me-1" data-fa-transform="shrink-1"></span></span>Change Emoji</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-bell me-1" data-fa-transform="shrink-1"></span></span>Notifications</a></div>
                        </div>
                        <hr class="my-2" />
                        <div class="px-3" id="others-info-4">
                          <div class="title" id="shared-media-title-4"><a class="btn btn-link btn-accordion hover-text-decoration-none dropdown-indicator" href="#shared-media-4" data-bs-toggle="collapse" aria-expanded="false" aria-controls="shared-media-4">Shared media</a></div>
                          <div class="collapse" id="shared-media-4" aria-labelledby="shared-media-title-4" data-parent="#others-info-4">
                            <div class="row mx-n1">
                              <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/1.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/1.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/2.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/2.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/3.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/3.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/4.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/4.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/5.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/5.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/6.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/6.jpg" alt="" /></a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="chat-content-scroll-area scrollbar">
                      <div class="d-flex position-relative p-3 border-bottom mb-3 align-items-center">
                        <div class="avatar avatar-2xl status-online me-3">
                          <img class="rounded-circle" src="../assets/img/team/4.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700" href="../pages/user/profile.html">John Lee</a></h6>
                          <p class="mb-0">You friends with John Lee. Say hi to start the conversation
                          </p>
                        </div>
                      </div>
                      <div class="text-center fs--2 text-500"><span>May 5, 2019, 11:54 am</span></div>
                      <div class="d-flex p-3">
                        <div class="avatar avatar-l me-2">
                          <img class="rounded-circle" src="../assets/img/team/4.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <div class="w-xxl-75">
                            <div class="hover-actions-trigger d-flex align-items-center">
                              <div class="chat-message bg-200 p-2 rounded-2">What's Up!</div>
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                            </div>
                            <div class="text-400 fs--2"><span>11:54 am</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="flex-1 d-flex justify-content-end">
                          <div class="w-100 w-xxl-75">
                            <div class="hover-actions-trigger d-flex flex-end-center">
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 me-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                              <div class="bg-primary text-white p-2 rounded-2 chat-message light">Hey!
                              </div>
                            </div>
                            <div class="text-400 fs--2 text-end">11:54 am<span class="fas fa-check ms-2"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="avatar avatar-l me-2">
                          <img class="rounded-circle" src="../assets/img/team/4.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <div class="w-xxl-75">
                            <div class="hover-actions-trigger d-flex align-items-center">
                              <div class="chat-message bg-200 p-2 rounded-2">How are you?</div>
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                            </div>
                            <div class="text-400 fs--2"><span>11:54 am</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane card-chat-pane" id="chat-5" role="tabpanel" aria-labelledby="chat-link-5">
                  <div class="chat-content-header">
                    <div class="row flex-between-center">
                      <div class="col-6 col-sm-8 d-flex align-items-center"><a class="pe-3 text-700 d-md-none contacts-list-show" href="#!">
                          <div class="fas fa-chevron-left"></div>
                        </a>
                        <div class="min-w-0">
                          <h5 class="mb-0 text-truncate fs-0">Bucky Robert</h5>
                          <div class="fs--2 text-400">Active On Chat
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <button class="btn btn-sm btn-falcon-primary me-2" type="button" data-index="5" data-bs-toggle="tooltip" data-bs-placement="top" title="Start a Call"><span class="fas fa-phone"></span></button>
                        <button class="btn btn-sm btn-falcon-primary me-2" type="button" data-index="5" data-bs-toggle="tooltip" data-bs-placement="top" title="Start a Video Call"><span class="fas fa-video"></span></button>
                        <button class="btn btn-sm btn-falcon-primary btn-info" type="button" data-index="5" data-bs-toggle="tooltip" data-bs-placement="top" title="Conversation Information"><span class="fas fa-info"></span></button>
                      </div>
                    </div>
                  </div>
                  <div class="chat-content-body" style="display: inherit;">
                    <div class="conversation-info" data-index="5">
                      <div class="h-100 overflow-auto scrollbar">
                        <div class="d-flex position-relative align-items-center p-3 border-bottom">
                          <div class="avatar avatar-xl status-online">
                            <div class="avatar-name rounded-circle"><span>BR</span></div>
                          </div>
                          <div class="flex-1 ms-2 d-flex flex-between-center">
                            <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700" href="../pages/user/profile.html">Bucky Robert</a></h6>
                            <div class="dropdown z-index-1">
                              <button class="btn btn-link btn-sm text-400 dropdown-toggle dropdown-caret-none me-n3" type="button" id="profile-dropdown-5" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-cog"></span></button>
                              <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="profile-dropdown-5"><a class="dropdown-item" href="#!">Mute</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="px-3 pt-2">
                          <div class="nav flex-column font-sans-serif fw-medium"><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-search me-1" data-fa-transform="shrink-1 down-3"></span></span>Search in Conversation</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-pencil-alt me-1" data-fa-transform="shrink-1"></span></span>Edit Nicknames</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-palette me-1" data-fa-transform="shrink-1"></span></span><span>Change Color</span></a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-thumbs-up me-1" data-fa-transform="shrink-1"></span></span>Change Emoji</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-bell me-1" data-fa-transform="shrink-1"></span></span>Notifications</a></div>
                        </div>
                        <hr class="my-2" />
                        <div class="px-3" id="others-info-5">
                          <div class="title" id="shared-media-title-5"><a class="btn btn-link btn-accordion hover-text-decoration-none dropdown-indicator" href="#shared-media-5" data-bs-toggle="collapse" aria-expanded="false" aria-controls="shared-media-5">Shared media</a></div>
                          <div class="collapse" id="shared-media-5" aria-labelledby="shared-media-title-5" data-parent="#others-info-5">
                            <div class="row mx-n1">
                              <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/1.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/1.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/2.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/2.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/3.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/3.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/4.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/4.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/5.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/5.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/6.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/6.jpg" alt="" /></a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="chat-content-scroll-area scrollbar">
                      <div class="d-flex position-relative p-3 border-bottom mb-3 align-items-center">
                        <div class="avatar avatar-2xl status-online me-3">
                          <div class="avatar-name rounded-circle"><span>BR</span></div>
                        </div>
                        <div class="flex-1">
                          <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700" href="../pages/user/profile.html">Bucky Robert</a></h6>
                          <p class="mb-0">You friends with Bucky Robert. Say hi to start the conversation
                          </p>
                        </div>
                      </div>
                      <div class="text-center fs--2 text-500"><span>May 5, 2019, 11:54 am</span></div>
                      <div class="d-flex p-3">
                        <div class="avatar avatar-l me-2">
                          <img class="rounded-circle" src="../assets/img/team/5.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <div class="w-xxl-75">
                            <div class="hover-actions-trigger d-flex align-items-center">
                              <div class="chat-message bg-200 p-2 rounded-2">What's Up!</div>
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                            </div>
                            <div class="text-400 fs--2"><span>11:54 am</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="flex-1 d-flex justify-content-end">
                          <div class="w-100 w-xxl-75">
                            <div class="hover-actions-trigger d-flex flex-end-center">
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 me-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                              <div class="bg-primary text-white p-2 rounded-2 chat-message light">Hey!
                              </div>
                            </div>
                            <div class="text-400 fs--2 text-end">11:54 am<span class="fas fa-check ms-2"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="flex-1 d-flex justify-content-end">
                          <div class="w-100 w-xxl-75">
                            <div class="hover-actions-trigger d-flex flex-end-center">
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 me-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                              <div class="bg-primary text-white p-2 rounded-2 chat-message light">👋
                              </div>
                            </div>
                            <div class="text-400 fs--2 text-end">11:54 am<span class="fas fa-check ms-2"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane card-chat-pane" id="chat-6" role="tabpanel" aria-labelledby="chat-link-6">
                  <div class="chat-content-header">
                    <div class="row flex-between-center">
                      <div class="col-6 col-sm-8 d-flex align-items-center"><a class="pe-3 text-700 d-md-none contacts-list-show" href="#!">
                          <div class="fas fa-chevron-left"></div>
                        </a>
                        <div class="min-w-0">
                          <h5 class="mb-0 text-truncate fs-0">John Bradley</h5>
                          <div class="fs--2 text-400">Active On Chat
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <button class="btn btn-sm btn-falcon-primary me-2" type="button" data-index="6" data-bs-toggle="tooltip" data-bs-placement="top" title="Start a Call"><span class="fas fa-phone"></span></button>
                        <button class="btn btn-sm btn-falcon-primary me-2" type="button" data-index="6" data-bs-toggle="tooltip" data-bs-placement="top" title="Start a Video Call"><span class="fas fa-video"></span></button>
                        <button class="btn btn-sm btn-falcon-primary btn-info" type="button" data-index="6" data-bs-toggle="tooltip" data-bs-placement="top" title="Conversation Information"><span class="fas fa-info"></span></button>
                      </div>
                    </div>
                  </div>
                  <div class="chat-content-body" style="display: inherit;">
                    <div class="conversation-info" data-index="6">
                      <div class="h-100 overflow-auto scrollbar">
                        <div class="d-flex position-relative align-items-center p-3 border-bottom">
                          <div class="avatar avatar-xl status-online">
                            <img class="rounded-circle" src="../assets/img/team/10.jpg" alt="" />

                          </div>
                          <div class="flex-1 ms-2 d-flex flex-between-center">
                            <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700" href="../pages/user/profile.html">John Bradley</a></h6>
                            <div class="dropdown z-index-1">
                              <button class="btn btn-link btn-sm text-400 dropdown-toggle dropdown-caret-none me-n3" type="button" id="profile-dropdown-6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-cog"></span></button>
                              <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="profile-dropdown-6"><a class="dropdown-item" href="#!">Mute</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="px-3 pt-2">
                          <div class="nav flex-column font-sans-serif fw-medium"><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-search me-1" data-fa-transform="shrink-1 down-3"></span></span>Search in Conversation</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-pencil-alt me-1" data-fa-transform="shrink-1"></span></span>Edit Nicknames</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-palette me-1" data-fa-transform="shrink-1"></span></span><span>Change Color</span></a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-thumbs-up me-1" data-fa-transform="shrink-1"></span></span>Change Emoji</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-bell me-1" data-fa-transform="shrink-1"></span></span>Notifications</a></div>
                        </div>
                        <hr class="my-2" />
                        <div class="px-3" id="others-info-6">
                          <div class="title" id="shared-media-title-6"><a class="btn btn-link btn-accordion hover-text-decoration-none dropdown-indicator" href="#shared-media-6" data-bs-toggle="collapse" aria-expanded="false" aria-controls="shared-media-6">Shared media</a></div>
                          <div class="collapse" id="shared-media-6" aria-labelledby="shared-media-title-6" data-parent="#others-info-6">
                            <div class="row mx-n1">
                              <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/1.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/1.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/2.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/2.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/3.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/3.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/4.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/4.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/5.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/5.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/6.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/6.jpg" alt="" /></a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="chat-content-scroll-area scrollbar">
                      <div class="d-flex position-relative p-3 border-bottom mb-3 align-items-center">
                        <div class="avatar avatar-2xl status-online me-3">
                          <img class="rounded-circle" src="../assets/img/team/10.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700" href="../pages/user/profile.html">John Bradley</a></h6>
                          <p class="mb-0">You friends with John Bradley. Say hi to start the conversation
                          </p>
                        </div>
                      </div>
                      <div class="text-center fs--2 text-500"><span>May 5, 2019, 11:54 am</span></div>
                      <div class="d-flex p-3">
                        <div class="avatar avatar-l me-2">
                          <img class="rounded-circle" src="../assets/img/team/10.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <div class="w-xxl-75">
                            <div class="hover-actions-trigger d-flex align-items-center">
                              <div class="chat-message bg-200 p-2 rounded-2">What's Up!</div>
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                            </div>
                            <div class="text-400 fs--2"><span>11:54 am</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="flex-1 d-flex justify-content-end">
                          <div class="w-100 w-xxl-75">
                            <div class="hover-actions-trigger d-flex flex-end-center">
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 me-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                              <div class="bg-primary text-white p-2 rounded-2 chat-message light">Hey!
                              </div>
                            </div>
                            <div class="text-400 fs--2 text-end">11:54 am<span class="fas fa-check ms-2"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="avatar avatar-l me-2">
                          <img class="rounded-circle" src="../assets/img/team/10.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <div class="w-xxl-75">
                            <div class="hover-actions-trigger d-flex align-items-center">
                              <div class="chat-message bg-200 p-2 rounded-2">Hello!</div>
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                            </div>
                            <div class="text-400 fs--2"><span>11:54 am</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane card-chat-pane" id="chat-7" role="tabpanel" aria-labelledby="chat-link-7">
                  <div class="chat-content-header">
                    <div class="row flex-between-center">
                      <div class="col-6 col-sm-8 d-flex align-items-center"><a class="pe-3 text-700 d-md-none contacts-list-show" href="#!">
                          <div class="fas fa-chevron-left"></div>
                        </a>
                        <div class="min-w-0">
                          <h5 class="mb-0 text-truncate fs-0">Rory McCann</h5>
                          <div class="fs--2 text-400">Active On Chat
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <button class="btn btn-sm btn-falcon-primary me-2" type="button" data-index="7" data-bs-toggle="tooltip" data-bs-placement="top" title="Start a Call"><span class="fas fa-phone"></span></button>
                        <button class="btn btn-sm btn-falcon-primary me-2" type="button" data-index="7" data-bs-toggle="tooltip" data-bs-placement="top" title="Start a Video Call"><span class="fas fa-video"></span></button>
                        <button class="btn btn-sm btn-falcon-primary btn-info" type="button" data-index="7" data-bs-toggle="tooltip" data-bs-placement="top" title="Conversation Information"><span class="fas fa-info"></span></button>
                      </div>
                    </div>
                  </div>
                  <div class="chat-content-body" style="display: inherit;">
                    <div class="conversation-info" data-index="7">
                      <div class="h-100 overflow-auto scrollbar">
                        <div class="d-flex position-relative align-items-center p-3 border-bottom">
                          <div class="avatar avatar-xl status-online">
                            <img class="rounded-circle" src="../assets/img/team/11.jpg" alt="" />

                          </div>
                          <div class="flex-1 ms-2 d-flex flex-between-center">
                            <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700" href="../pages/user/profile.html">Rory McCann</a></h6>
                            <div class="dropdown z-index-1">
                              <button class="btn btn-link btn-sm text-400 dropdown-toggle dropdown-caret-none me-n3" type="button" id="profile-dropdown-7" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-cog"></span></button>
                              <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="profile-dropdown-7"><a class="dropdown-item" href="#!">Mute</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="px-3 pt-2">
                          <div class="nav flex-column font-sans-serif fw-medium"><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-search me-1" data-fa-transform="shrink-1 down-3"></span></span>Search in Conversation</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-pencil-alt me-1" data-fa-transform="shrink-1"></span></span>Edit Nicknames</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-palette me-1" data-fa-transform="shrink-1"></span></span><span>Change Color</span></a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-thumbs-up me-1" data-fa-transform="shrink-1"></span></span>Change Emoji</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-bell me-1" data-fa-transform="shrink-1"></span></span>Notifications</a></div>
                        </div>
                        <hr class="my-2" />
                        <div class="px-3" id="others-info-7">
                          <div class="title" id="shared-media-title-7"><a class="btn btn-link btn-accordion hover-text-decoration-none dropdown-indicator" href="#shared-media-7" data-bs-toggle="collapse" aria-expanded="false" aria-controls="shared-media-7">Shared media</a></div>
                          <div class="collapse" id="shared-media-7" aria-labelledby="shared-media-title-7" data-parent="#others-info-7">
                            <div class="row mx-n1">
                              <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/1.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/1.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/2.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/2.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/3.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/3.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/4.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/4.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/5.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/5.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/6.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/6.jpg" alt="" /></a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="chat-content-scroll-area scrollbar">
                      <div class="d-flex position-relative p-3 border-bottom mb-3 align-items-center">
                        <div class="avatar avatar-2xl status-online me-3">
                          <img class="rounded-circle" src="../assets/img/team/11.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700" href="../pages/user/profile.html">Rory McCann</a></h6>
                          <p class="mb-0">You friends with Rory McCann. Say hi to start the conversation
                          </p>
                        </div>
                      </div>
                      <div class="text-center fs--2 text-500"><span>May 5, 2019, 11:54 am</span></div>
                      <div class="d-flex p-3">
                        <div class="avatar avatar-l me-2">
                          <img class="rounded-circle" src="../assets/img/team/11.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <div class="w-xxl-75">
                            <div class="hover-actions-trigger d-flex align-items-center">
                              <div class="chat-message bg-200 p-2 rounded-2">I got my visa</div>
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                            </div>
                            <div class="text-400 fs--2"><span>11:54 am</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="avatar avatar-l me-2">
                          <img class="rounded-circle" src="../assets/img/team/11.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <div class="w-xxl-75">
                            <div class="hover-actions-trigger d-flex align-items-center">
                              <div class="chat-message bg-200 p-2 rounded-2">Let's have fun</div>
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                            </div>
                            <div class="text-400 fs--2"><span>11:54 am</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="flex-1 d-flex justify-content-end">
                          <div class="w-100 w-xxl-75">
                            <div class="hover-actions-trigger d-flex flex-end-center">
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 me-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                              <div class="bg-primary text-white p-2 rounded-2 chat-message light">😮
                              </div>
                            </div>
                            <div class="text-400 fs--2 text-end">11:54 am<span class="fas fa-check ms-2"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane card-chat-pane" id="chat-8" role="tabpanel" aria-labelledby="chat-link-8">
                  <div class="chat-content-header">
                    <div class="row flex-between-center">
                      <div class="col-6 col-sm-8 d-flex align-items-center"><a class="pe-3 text-700 d-md-none contacts-list-show" href="#!">
                          <div class="fas fa-chevron-left"></div>
                        </a>
                        <div class="min-w-0">
                          <h5 class="mb-0 text-truncate fs-0">Joe Bempsie</h5>
                          <div class="fs--2 text-400">Active 7h ago
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <button class="btn btn-sm btn-falcon-primary me-2" type="button" data-index="8" data-bs-toggle="tooltip" data-bs-placement="top" title="Start a Call"><span class="fas fa-phone"></span></button>
                        <button class="btn btn-sm btn-falcon-primary me-2" type="button" data-index="8" data-bs-toggle="tooltip" data-bs-placement="top" title="Start a Video Call"><span class="fas fa-video"></span></button>
                        <button class="btn btn-sm btn-falcon-primary btn-info" type="button" data-index="8" data-bs-toggle="tooltip" data-bs-placement="top" title="Conversation Information"><span class="fas fa-info"></span></button>
                      </div>
                    </div>
                  </div>
                  <div class="chat-content-body" style="display: inherit;">
                    <div class="conversation-info" data-index="8">
                      <div class="h-100 overflow-auto scrollbar">
                        <div class="d-flex position-relative align-items-center p-3 border-bottom">
                          <div class="avatar avatar-xl">
                            <img class="rounded-circle" src="../assets/img/team/12.jpg" alt="" />

                          </div>
                          <div class="flex-1 ms-2 d-flex flex-between-center">
                            <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700" href="../pages/user/profile.html">Joe Bempsie</a></h6>
                            <div class="dropdown z-index-1">
                              <button class="btn btn-link btn-sm text-400 dropdown-toggle dropdown-caret-none me-n3" type="button" id="profile-dropdown-8" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-cog"></span></button>
                              <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="profile-dropdown-8"><a class="dropdown-item" href="#!">Mute</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="px-3 pt-2">
                          <div class="nav flex-column font-sans-serif fw-medium"><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-search me-1" data-fa-transform="shrink-1 down-3"></span></span>Search in Conversation</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-pencil-alt me-1" data-fa-transform="shrink-1"></span></span>Edit Nicknames</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-palette me-1" data-fa-transform="shrink-1"></span></span><span>Change Color</span></a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-thumbs-up me-1" data-fa-transform="shrink-1"></span></span>Change Emoji</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-bell me-1" data-fa-transform="shrink-1"></span></span>Notifications</a></div>
                        </div>
                        <hr class="my-2" />
                        <div class="px-3" id="others-info-8">
                          <div class="title" id="shared-media-title-8"><a class="btn btn-link btn-accordion hover-text-decoration-none dropdown-indicator" href="#shared-media-8" data-bs-toggle="collapse" aria-expanded="false" aria-controls="shared-media-8">Shared media</a></div>
                          <div class="collapse" id="shared-media-8" aria-labelledby="shared-media-title-8" data-parent="#others-info-8">
                            <div class="row mx-n1">
                              <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/1.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/1.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/2.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/2.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/3.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/3.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/4.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/4.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/5.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/5.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/6.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/6.jpg" alt="" /></a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="chat-content-scroll-area scrollbar">
                      <div class="d-flex position-relative p-3 border-bottom mb-3 align-items-center">
                        <div class="avatar avatar-2xl me-3">
                          <img class="rounded-circle" src="../assets/img/team/12.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700" href="../pages/user/profile.html">Joe Bempsie</a></h6>
                          <p class="mb-0">You friends with Joe Bempsie. Say hi to start the conversation
                          </p>
                        </div>
                      </div>
                      <div class="text-center fs--2 text-500"><span>May 5, 2019, 11:54 am</span></div>
                      <div class="d-flex p-3">
                        <div class="avatar avatar-l me-2">
                          <img class="rounded-circle" src="../assets/img/team/12.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <div class="w-xxl-75">
                            <div class="hover-actions-trigger d-flex align-items-center">
                              <div class="chat-message bg-200 p-2 rounded-2">What's Up!</div>
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                            </div>
                            <div class="text-400 fs--2"><span>11:54 am</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="flex-1 d-flex justify-content-end">
                          <div class="w-100 w-xxl-75">
                            <div class="hover-actions-trigger d-flex flex-end-center">
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 me-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                              <div class="bg-primary text-white p-2 rounded-2 chat-message light">Hey!
                              </div>
                            </div>
                            <div class="text-400 fs--2 text-end">11:54 am<span class="fas fa-check ms-2"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="avatar avatar-l me-2">
                          <img class="rounded-circle" src="../assets/img/team/12.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <div class="w-xxl-75">
                            <div class="hover-actions-trigger d-flex align-items-center">
                              <div class="chat-message bg-200 p-2 rounded-2">Hello!</div>
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                            </div>
                            <div class="text-400 fs--2"><span>11:54 am</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane card-chat-pane" id="chat-9" role="tabpanel" aria-labelledby="chat-link-9">
                  <div class="chat-content-header">
                    <div class="row flex-between-center">
                      <div class="col-6 col-sm-8 d-flex align-items-center"><a class="pe-3 text-700 d-md-none contacts-list-show" href="#!">
                          <div class="fas fa-chevron-left"></div>
                        </a>
                        <div class="min-w-0">
                          <h5 class="mb-0 text-truncate fs-0">Diana Rigg</h5>
                          <div class="fs--2 text-400">Active 7h ago
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <button class="btn btn-sm btn-falcon-primary me-2" type="button" data-index="9" data-bs-toggle="tooltip" data-bs-placement="top" title="Start a Call"><span class="fas fa-phone"></span></button>
                        <button class="btn btn-sm btn-falcon-primary me-2" type="button" data-index="9" data-bs-toggle="tooltip" data-bs-placement="top" title="Start a Video Call"><span class="fas fa-video"></span></button>
                        <button class="btn btn-sm btn-falcon-primary btn-info" type="button" data-index="9" data-bs-toggle="tooltip" data-bs-placement="top" title="Conversation Information"><span class="fas fa-info"></span></button>
                      </div>
                    </div>
                  </div>
                  <div class="chat-content-body" style="display: inherit;">
                    <div class="conversation-info" data-index="9">
                      <div class="h-100 overflow-auto scrollbar">
                        <div class="d-flex position-relative align-items-center p-3 border-bottom">
                          <div class="avatar avatar-xl">
                            <img class="rounded-circle" src="../assets/img/team/22.jpg" alt="" />

                          </div>
                          <div class="flex-1 ms-2 d-flex flex-between-center">
                            <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700" href="../pages/user/profile.html">Diana Rigg</a></h6>
                            <div class="dropdown z-index-1">
                              <button class="btn btn-link btn-sm text-400 dropdown-toggle dropdown-caret-none me-n3" type="button" id="profile-dropdown-9" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-cog"></span></button>
                              <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="profile-dropdown-9"><a class="dropdown-item" href="#!">Mute</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="px-3 pt-2">
                          <div class="nav flex-column font-sans-serif fw-medium"><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-search me-1" data-fa-transform="shrink-1 down-3"></span></span>Search in Conversation</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-pencil-alt me-1" data-fa-transform="shrink-1"></span></span>Edit Nicknames</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-palette me-1" data-fa-transform="shrink-1"></span></span><span>Change Color</span></a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-thumbs-up me-1" data-fa-transform="shrink-1"></span></span>Change Emoji</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-bell me-1" data-fa-transform="shrink-1"></span></span>Notifications</a></div>
                        </div>
                        <hr class="my-2" />
                        <div class="px-3" id="others-info-9">
                          <div class="title" id="shared-media-title-9"><a class="btn btn-link btn-accordion hover-text-decoration-none dropdown-indicator" href="#shared-media-9" data-bs-toggle="collapse" aria-expanded="false" aria-controls="shared-media-9">Shared media</a></div>
                          <div class="collapse" id="shared-media-9" aria-labelledby="shared-media-title-9" data-parent="#others-info-9">
                            <div class="row mx-n1">
                              <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/1.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/1.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/2.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/2.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/3.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/3.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/4.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/4.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/5.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/5.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/6.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/6.jpg" alt="" /></a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="chat-content-scroll-area scrollbar">
                      <div class="d-flex position-relative p-3 border-bottom mb-3 align-items-center">
                        <div class="avatar avatar-2xl me-3">
                          <img class="rounded-circle" src="../assets/img/team/22.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700" href="../pages/user/profile.html">Diana Rigg</a></h6>
                          <p class="mb-0">You friends with Diana Rigg. Say hi to start the conversation
                          </p>
                        </div>
                      </div>
                      <div class="text-center fs--2 text-500"><span>May 5, 2019, 11:54 am</span></div>
                      <div class="d-flex p-3">
                        <div class="avatar avatar-l me-2">
                          <img class="rounded-circle" src="../assets/img/team/22.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <div class="w-xxl-75">
                            <div class="hover-actions-trigger d-flex align-items-center">
                              <div class="chat-message bg-200 p-2 rounded-2">What's Up!</div>
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 ms-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                            </div>
                            <div class="text-400 fs--2"><span>11:54 am</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="flex-1 d-flex justify-content-end">
                          <div class="w-100 w-xxl-75">
                            <div class="hover-actions-trigger d-flex flex-end-center">
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 me-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                              <div class="bg-primary text-white p-2 rounded-2 chat-message light">Hey!
                              </div>
                            </div>
                            <div class="text-400 fs--2 text-end">11:54 am<span class="fas fa-check ms-2"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex p-3">
                        <div class="flex-1 d-flex justify-content-end">
                          <div class="w-100 w-xxl-75">
                            <div class="hover-actions-trigger d-flex flex-end-center">
                              <ul class="hover-actions position-relative list-inline mb-0 text-400 me-2">
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Forward"><span class="fas fa-share"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Archive"><span class="fas fa-archive"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a></li>
                                <li class="list-inline-item"><a class="chat-option" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><span class="fas fa-trash-alt"></span></a></li>
                              </ul>
                              <div class="bg-primary text-white p-2 rounded-2 chat-message light">Yes, in an organization stature, this is a must. Besides, we need to quickly establish all other professional appearances, e.g., having a website where members’ profile will be displayed along with additional organizational information. Providing services to existing members is more important than attracting new members at this moment, in my opinion..
                              </div>
                            </div>
                            <div class="text-400 fs--2 text-end">11:54 am<span class="fas fa-check ms-2"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane card-chat-pane" id="chat-10" role="tabpanel" aria-labelledby="chat-link-10">
                  <div class="chat-content-header">
                    <div class="row flex-between-center">
                      <div class="col-6 col-sm-8 d-flex align-items-center"><a class="pe-3 text-700 d-md-none contacts-list-show" href="#!">
                          <div class="fas fa-chevron-left"></div>
                        </a>
                        <div class="min-w-0">
                          <h5 class="mb-0 text-truncate fs-0">Gemma Whelan</h5>
                          <div class="fs--2 text-400">Active 7h ago
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <button class="btn btn-sm btn-falcon-primary me-2" type="button" data-index="10" data-bs-toggle="tooltip" data-bs-placement="top" title="Start a Call"><span class="fas fa-phone"></span></button>
                        <button class="btn btn-sm btn-falcon-primary me-2" type="button" data-index="10" data-bs-toggle="tooltip" data-bs-placement="top" title="Start a Video Call"><span class="fas fa-video"></span></button>
                        <button class="btn btn-sm btn-falcon-primary btn-info" type="button" data-index="10" data-bs-toggle="tooltip" data-bs-placement="top" title="Conversation Information"><span class="fas fa-info"></span></button>
                      </div>
                    </div>
                  </div>
                  <div class="chat-content-body" style="display: inherit;">
                    <div class="conversation-info" data-index="10">
                      <div class="h-100 overflow-auto scrollbar">
                        <div class="d-flex position-relative align-items-center p-3 border-bottom">
                          <div class="avatar avatar-xl">
                            <img class="rounded-circle" src="../assets/img/team/23.jpg" alt="" />

                          </div>
                          <div class="flex-1 ms-2 d-flex flex-between-center">
                            <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700" href="../pages/user/profile.html">Gemma Whelan</a></h6>
                            <div class="dropdown z-index-1">
                              <button class="btn btn-link btn-sm text-400 dropdown-toggle dropdown-caret-none me-n3" type="button" id="profile-dropdown-10" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-cog"></span></button>
                              <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="profile-dropdown-10"><a class="dropdown-item" href="#!">Mute</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="px-3 pt-2">
                          <div class="nav flex-column font-sans-serif fw-medium"><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-search me-1" data-fa-transform="shrink-1 down-3"></span></span>Search in Conversation</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-pencil-alt me-1" data-fa-transform="shrink-1"></span></span>Edit Nicknames</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-palette me-1" data-fa-transform="shrink-1"></span></span><span>Change Color</span></a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-thumbs-up me-1" data-fa-transform="shrink-1"></span></span>Change Emoji</a><a class="nav-link d-flex align-items-center py-1 px-0 text-600" href="#!"><span class="conversation-info-icon"><span class="fas fa-bell me-1" data-fa-transform="shrink-1"></span></span>Notifications</a></div>
                        </div>
                        <hr class="my-2" />
                        <div class="px-3" id="others-info-10">
                          <div class="title" id="shared-media-title-10"><a class="btn btn-link btn-accordion hover-text-decoration-none dropdown-indicator" href="#shared-media-10" data-bs-toggle="collapse" aria-expanded="false" aria-controls="shared-media-10">Shared media</a></div>
                          <div class="collapse" id="shared-media-10" aria-labelledby="shared-media-title-10" data-parent="#others-info-10">
                            <div class="row mx-n1">
                              <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/1.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/1.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"><a href="../assets/img/chat/2.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/2.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/3.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/3.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/4.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/4.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/5.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/5.jpg" alt="" /></a></div>
                              <div class="col-6 col-md-4 px-1"> <a href="../assets/img/chat/6.jpg" data-gallery="images-1"><img class="img-fluid rounded-1 mb-2" src="../assets/img/chat/6.jpg" alt="" /></a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="chat-content-scroll-area scrollbar">
                      <div class="d-flex position-relative p-3 border-bottom mb-3 align-items-center">
                        <div class="avatar avatar-2xl me-3">
                          <img class="rounded-circle" src="../assets/img/team/23.jpg" alt="" />

                        </div>
                        <div class="flex-1">
                          <h6 class="mb-0"><a class="text-decoration-none stretched-link text-700" href="../pages/user/profile.html">Gemma Whelan</a></h6>
                          <p class="mb-0">You friends with Gemma Whelan. Say hi to start the conversation
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <form class="chat-editor-area">
                  <div class="emojiarea-editor outline-none scrollbar" contenteditable="true"></div>
                  <input class="d-none" type="file" id="chat-file-upload" />
                  <label class="chat-file-upload cursor-pointer" for="chat-file-upload"><span class="fas fa-paperclip"></span></label>
                  <div class="btn btn-link emoji-icon" data-emoji-button="data-emoji-button"><span class="far fa-laugh-beam"></span></div>
                  <button class="btn btn-sm btn-send" type="submit">Send</button>
                </form>
              </div>
            </div>
          </div>
          <footer class="footer">
            <div class="row g-0 justify-content-between fs--1 mt-4 mb-3">
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600">Thank you for creating with Falcon <span class="d-none d-sm-inline-block">| </span><br class="d-sm-none" /> 2021 &copy; <a href="https://themewagon.com">Themewagon</a></p>
              </div>
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600">v3.4.0</p>
              </div>
            </div>
          </footer>
        </div>
        <div class="modal fade" id="authentication-modal" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label" aria-hidden="true">
          <div class="modal-dialog mt-6" role="document">
            <div class="modal-content border-0">
              <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                <div class="position-relative z-index-1 light">
                  <h4 class="mb-0 text-white" id="authentication-modal-label">Register</h4>
                  <p class="fs--1 mb-0 text-white">Please create your free Falcon account</p>
                </div>
                <button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body py-4 px-5">
                <form>
                  <div class="mb-3">
                    <label class="form-label" for="modal-auth-name">Name</label>
                    <input class="form-control" type="text" autocomplete="on" id="modal-auth-name" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="modal-auth-email">Email address</label>
                    <input class="form-control" type="email" autocomplete="on" id="modal-auth-email" />
                  </div>
                  <div class="row gx-2">
                    <div class="mb-3 col-sm-6">
                      <label class="form-label" for="modal-auth-password">Password</label>
                      <input class="form-control" type="password" autocomplete="on" id="modal-auth-password" />
                    </div>
                    <div class="mb-3 col-sm-6">
                      <label class="form-label" for="modal-auth-confirm-password">Confirm Password</label>
                      <input class="form-control" type="password" autocomplete="on" id="modal-auth-confirm-password" />
                    </div>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="modal-auth-register-checkbox" />
                    <label class="form-label" for="modal-auth-register-checkbox">I accept the <a href="#!">terms </a>and <a href="#!">privacy policy</a></label>
                  </div>
                  <div class="mb-3">
                    <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Register</button>
                  </div>
                </form>
                <div class="position-relative mt-5">
                  <hr class="bg-300" />
                  <div class="divider-content-center">or register with</div>
                </div>
                <div class="row g-2 mt-2">
                  <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> google</a></div>
                  <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" href="#"><span class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> facebook</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    <div class="offcanvas offcanvas-end settings-panel border-0" id="settings-offcanvas" tabindex="-1" aria-labelledby="settings-offcanvas">
      <div class="offcanvas-header settings-panel-header bg-shape">
        <div class="z-index-1 py-1 light">
          <h5 class="text-white"> <span class="fas fa-palette me-2 fs-0"></span>Settings</h5>
          <p class="mb-0 fs--1 text-white opacity-75"> Set your own customized style</p>
        </div>
        <button class="btn-close btn-close-white z-index-1 mt-0" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body scrollbar-overlay px-card" id="themeController">
        <h5 class="fs-0">Color Scheme</h5>
        <p class="fs--1">Choose the perfect color mode for your app.</p>
        <div class="btn-group d-block w-100 btn-group-navbar-style">
          <div class="row gx-2">
            <div class="col-6">
              <input class="btn-check" id="themeSwitcherLight" name="theme-color" type="radio" value="light" data-theme-control="theme" />
              <label class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherLight"> <span class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="../assets/img/generic/falcon-mode-default.jpg" alt=""/></span><span class="label-text">Light</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="themeSwitcherDark" name="theme-color" type="radio" value="dark" data-theme-control="theme" />
              <label class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherDark"> <span class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="../assets/img/generic/falcon-mode-dark.jpg" alt=""/></span><span class="label-text"> Dark</span></label>
            </div>
          </div>
        </div>
        <hr />
        <div class="d-flex justify-content-between">
          <div class="d-flex align-items-start"><img class="me-2" src="../assets/img/icons/left-arrow-from-left.svg" width="20" alt="" />
            <div class="flex-1">
              <h5 class="fs-0">RTL Mode</h5>
              <p class="fs--1 mb-0">Switch your language direction </p><a class="fs--1" href="../documentation/customization/configuration.html">RTL Documentation</a>
            </div>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input ms-0" id="mode-rtl" type="checkbox" data-theme-control="isRTL" />
          </div>
        </div>
        <hr />
        <div class="d-flex justify-content-between">
          <div class="d-flex align-items-start"><img class="me-2" src="../assets/img/icons/arrows-h.svg" width="20" alt="" />
            <div class="flex-1">
              <h5 class="fs-0">Fluid Layout</h5>
              <p class="fs--1 mb-0">Toggle container layout system </p><a class="fs--1" href="../documentation/customization/configuration.html">Fluid Documentation</a>
            </div>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input ms-0" id="mode-fluid" type="checkbox" data-theme-control="isFluid" />
          </div>
        </div>
        <hr />
        <div class="d-flex align-items-start"><img class="me-2" src="../assets/img/icons/paragraph.svg" width="20" alt="" />
          <div class="flex-1">
            <h5 class="fs-0 d-flex align-items-center">Navigation Position </h5>
            <p class="fs--1 mb-2">Select a suitable navigation system for your web application </p>
            <div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="option-navbar-vertical" type="radio" name="navbar" value="vertical" data-page-url="../modules/components/navs-and-tabs/vertical-navbar.html" data-theme-control="navbarPosition" />
                <label class="form-check-label" for="option-navbar-vertical">Vertical</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="option-navbar-top" type="radio" name="navbar" value="top" data-page-url="../modules/components/navs-and-tabs/top-navbar.html" data-theme-control="navbarPosition" />
                <label class="form-check-label" for="option-navbar-top">Top</label>
              </div>
              <div class="form-check form-check-inline me-0">
                <input class="form-check-input" id="option-navbar-combo" type="radio" name="navbar" value="combo" data-page-url="../modules/components/navs-and-tabs/combo-navbar.html" data-theme-control="navbarPosition" />
                <label class="form-check-label" for="option-navbar-combo">Combo</label>
              </div>
            </div>
          </div>
        </div>
        <hr />
        <h5 class="fs-0 d-flex align-items-center">Vertical Navbar Style</h5>
        <p class="fs--1 mb-0">Switch between styles for your vertical navbar </p>
        <p> <a class="fs--1" href="../modules/components/navs-and-tabs/vertical-navbar.html#navbar-styles">See Documentation</a></p>
        <div class="btn-group d-block w-100 btn-group-navbar-style">
          <div class="row gx-2">
            <div class="col-6">
              <input class="btn-check" id="navbar-style-transparent" type="radio" name="navbarStyle" value="transparent" data-theme-control="navbarStyle" />
              <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-transparent"> <img class="img-fluid img-prototype" src="../assets/img/generic/default.png" alt="" /><span class="label-text"> Transparent</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="navbar-style-inverted" type="radio" name="navbarStyle" value="inverted" data-theme-control="navbarStyle" />
              <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-inverted"> <img class="img-fluid img-prototype" src="../assets/img/generic/inverted.png" alt="" /><span class="label-text"> Inverted</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="navbar-style-card" type="radio" name="navbarStyle" value="card" data-theme-control="navbarStyle" />
              <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-card"> <img class="img-fluid img-prototype" src="../assets/img/generic/card.png" alt="" /><span class="label-text"> Card</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="navbar-style-vibrant" type="radio" name="navbarStyle" value="vibrant" data-theme-control="navbarStyle" />
              <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-vibrant"> <img class="img-fluid img-prototype" src="../assets/img/generic/vibrant.png" alt="" /><span class="label-text"> Vibrant</span></label>
            </div>
          </div>
        </div>
        <div class="text-center mt-5"><img class="mb-4" src="../assets/img/icons/spot-illustrations/47.png" alt="" width="120" />
          <h5>Like What You See?</h5>
          <p class="fs--1">Get Falcon now and create beautiful dashboards with hundreds of widgets.</p><a class="mb-3 btn btn-primary" href="https://themes.getbootstrap.com/product/falcon-admin-dashboard-webapp-template/" target="_blank">Purchase</a>
        </div>
      </div>
    </div><a class="card setting-toggle" href="#settings-offcanvas" data-bs-toggle="offcanvas">
      <div class="card-body d-flex align-items-center py-md-2 px-2 py-1">
        <div class="bg-soft-primary position-relative rounded-start" style="height:34px;width:28px">
          <div class="settings-popover"><span class="ripple"><span class="fa-spin position-absolute all-0 d-flex flex-center"><span class="icon-spin position-absolute all-0 d-flex flex-center">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.7369 12.3941L19.1989 12.1065C18.4459 11.7041 18.0843 10.8487 18.0843 9.99495C18.0843 9.14118 18.4459 8.28582 19.1989 7.88336L19.7369 7.59581C19.9474 7.47484 20.0316 7.23291 19.9474 7.03131C19.4842 5.57973 18.6843 4.28943 17.6738 3.20075C17.5053 3.03946 17.2527 2.99914 17.0422 3.12011L16.393 3.46714C15.6883 3.84379 14.8377 3.74529 14.1476 3.3427C14.0988 3.31422 14.0496 3.28621 14.0002 3.25868C13.2568 2.84453 12.7055 2.10629 12.7055 1.25525V0.70081C12.7055 0.499202 12.5371 0.297594 12.2845 0.257272C10.7266 -0.105622 9.16879 -0.0653007 7.69516 0.257272C7.44254 0.297594 7.31623 0.499202 7.31623 0.70081V1.23474C7.31623 2.09575 6.74999 2.8362 5.99824 3.25599C5.95774 3.27861 5.91747 3.30159 5.87744 3.32493C5.15643 3.74527 4.26453 3.85902 3.53534 3.45302L2.93743 3.12011C2.72691 2.99914 2.47429 3.03946 2.30587 3.20075C1.29538 4.28943 0.495411 5.57973 0.0322686 7.03131C-0.051939 7.23291 0.0322686 7.47484 0.242788 7.59581L0.784376 7.8853C1.54166 8.29007 1.92694 9.13627 1.92694 9.99495C1.92694 10.8536 1.54166 11.6998 0.784375 12.1046L0.242788 12.3941C0.0322686 12.515 -0.051939 12.757 0.0322686 12.9586C0.495411 14.4102 1.29538 15.7005 2.30587 16.7891C2.47429 16.9504 2.72691 16.9907 2.93743 16.8698L3.58669 16.5227C4.29133 16.1461 5.14131 16.2457 5.8331 16.6455C5.88713 16.6767 5.94159 16.7074 5.99648 16.7375C6.75162 17.1511 7.31623 17.8941 7.31623 18.7552V19.2891C7.31623 19.4425 7.41373 19.5959 7.55309 19.696C7.64066 19.7589 7.74815 19.7843 7.85406 19.8046C9.35884 20.0925 10.8609 20.0456 12.2845 19.7729C12.5371 19.6923 12.7055 19.4907 12.7055 19.2891V18.7346C12.7055 17.8836 13.2568 17.1454 14.0002 16.7312C14.0496 16.7037 14.0988 16.6757 14.1476 16.6472C14.8377 16.2446 15.6883 16.1461 16.393 16.5227L17.0422 16.8698C17.2527 16.9907 17.5053 16.9504 17.6738 16.7891C18.7264 15.7005 19.4842 14.4102 19.9895 12.9586C20.0316 12.757 19.9474 12.515 19.7369 12.3941ZM10.0109 13.2005C8.1162 13.2005 6.64257 11.7893 6.64257 9.97478C6.64257 8.20063 8.1162 6.74905 10.0109 6.74905C11.8634 6.74905 13.3792 8.20063 13.3792 9.97478C13.3792 11.7893 11.8634 13.2005 10.0109 13.2005Z" fill="#2A7BE4"></path>
                  </svg></span></span></span></div>
        </div><small class="text-uppercase text-primary fw-bold bg-soft-primary py-2 pe-2 ps-1 rounded-end">customize</small>
      </div>
    </a>


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="/public/vendors/popper/popper.min.js"></script>
    <script src="/public/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="/public/vendors/anchorjs/anchor.min.js"></script>
    <script src="/public/vendors/is/is.min.js"></script>
    <script src="/public/vendors/glightbox/glightbox.min.js"></script>
    <script src="/public/assets/js/emoji-button.js"></script>
    <script src="/public/vendors/fontawesome/all.min.js"></script>
    <script src="/public/vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="/public/vendors/list.js/list.min.js"></script>
    <script src="/public/assets/js/theme.js"></script>

  </body>

</html>
