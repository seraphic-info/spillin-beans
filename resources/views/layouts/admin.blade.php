<!DOCTYPE html>
<html dir="ltr" lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="keywords"
         content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, AdminWrap lite admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, Xtreme admin lite design, Xtreme admin lite dashboard bootstrap 4 dashboard template">
      <meta name="description"
         content="Xtreme Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
      <meta name="robots" content="noindex,nofollow">
      <title>Xtreme Admin Lite Template by WrapPixel</title>
      <link rel="canonical" href="https://www.wrappixel.com/templates/xtreme-admin-lite/" />
      <link rel="icon" type="image/png" sizes="16x16" href="/admin/assets/images/favicon.png">
      <link href="/admin/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
      <link href="/admin/dist/css/style.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
      <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet">
   </head>
   <body>
      <div class="preloader">
         <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
         </div>
      </div>
      <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
         data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
         <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
               <div class="navbar-header" data-logobg="skin5">
                  <a class="navbar-brand" href="/admin/cards">
                  <span class="logo-text">
                      Dashboard
                  </span>
                  </a>
                  <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                     class="ti-menu ti-close"></i></a>
               </div>
               <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                  <ul class="navbar-nav float-left mr-auto">
                     <li class="nav-item search-box">
                        <a class="nav-link waves-effect waves-dark"
                           href="javascript:void(0)"><i class="ti-search"></i></a>
                        <form class="app-search position-absolute" method="get" action="/admin/cards">
                           <input type="text" class="form-control" placeholder="Search &amp; enter" name="search"> <a
                              class="srh-btn"><i class="ti-close"></i></a>
                        </form>
                     </li>
                  </ul>
                  <ul class="navbar-nav float-right">
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href=""
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <img
                           src="/admin/assets/images/users/1.jpg" alt="user" class="rounded-circle"
                           width="31"> </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                           {{ __('Logout') }}
                           </a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                           </form>
                          <a class="dropdown-item" href="/admin/users/change-password"> Change Password</a>
                       </div>
                     </li>
                  </ul>
               </div>
            </nav>
         </header>
         <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar">
               <nav class="sidebar-nav">
                  <ul id="sidebarnav">
                     <li>
                        <div class="user-profile d-flex no-block dropdown m-t-20">
                           <div class="user-pic"><img src="/admin/assets/images/users/1.jpg" alt="users"
                              class="rounded-circle" width="40" /></div>
                           <div class="user-content hide-menu m-l-10">
                              <a href="javascript:void(0)" class="" id="Userdd" role="button"
                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <h5 class="m-b-0 user-name font-medium">{{ Auth::user()->name }} <i
                                    class="fa fa-angle-down"></i></h5>
                                 <span class="op-5 user-email">{{ Auth::user()->email }}</span>
                              </a>
                           </div>
                        </div>
                     </li>
                     <li class="p-15 m-t-10">
                        <a href="/admin/cards"
                           class="btn btn-block create-btn text-white no-block d-flex align-items-center">
                        <i class="mdi mdi-view-dashboard"></i> <span class="hide-menu m-l-5">Card Management</span> </a>
                     </li>
                  </ul>
               </nav>
            </div>
         </aside>
         @yield('content')
         <footer class="footer text-center">
            All Rights Reserved by Spilling Beans. Designed and Developed by <a
               href="https://seraphic.io/">Seraphic</a>.
         </footer>
      </div>
      <script src="/admin/assets/libs/jquery/dist/jquery.min.js"></script>
      <script src="/admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
      <script src="/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="/admin/dist/js/app-style-switcher.js"></script>
      <script src="/admin/dist/js/waves.js"></script>
      <script src="/admin/dist/js/sidebarmenu.js"></script>
      <script src="/admin/dist/js/custom.js"></script>
      <script src="/admin/assets/libs/chartist/dist/chartist.min.js"></script>
      <script src="/admin/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
      <script src="/admin/dist/js/pages/dashboards/dashboard1.js"></script>
      <script type="text/javascript">
         $(document).ready(function() {
             $('select[name=type]').on('change', function() {
                 var type = $(this).val();
                 if (type == 'action') {
                     $('.action').show();
                     $('.wild').hide();
                     $('.big-bean').hide();
                 } else if (type == 'wild') {
                     $('.action').hide();
                     $('.wild').show();
                     $('.big-bean').hide();
                 } else if (type == 'big bean') {
                     $('.action').hide();
                     $('.wild').hide();
                     $('.big-bean').show();
                 }
             })
             $('select[name=type]').change(function() {
                 var type = $(this).val();
                 if (type == 'action') {
                     $('.action').show();
                     $('.wild').hide();
                     $('.big-bean').hide();
                 } else if (type == 'wild') {
                     $('.action').hide();
                     $('.wild').show();
                     $('.big-bean').hide();
                 } else if (type == 'big bean') {
                     $('.action').hide();
                     $('.wild').hide();
                     $('.big-bean').show();
                 }
             }).change();
         })
      </script>
   </body>
</html>
