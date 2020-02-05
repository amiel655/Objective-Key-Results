<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
                <!-- CSRF Token -->
                <meta name="csrf-token" content="{{ csrf_token() }}">
            
                <title>{{ config('app.name', 'Laravel') }}</title>
    <title>Trendmedia INC. </title>
<!-- jQuery -->
<script src="/js/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="/css/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/css/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- NProgress -->
    <link href="/css/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/css/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-users"></i> <span>Trendmedia INC.</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ asset('images/blank-profile-picture.jpg') }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2> @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                      @else{{ Auth::user()->firstname.' '.Auth::user()->lastname }}</h2>
                      @endif
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <ul class="nav side-menu">
                        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
                        </li>
                      </ul>
                        @hasrole('super-administrator')
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-group"></i> User Management <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                <li><a href="/admin/user">User</a></li>
                                <li><a href="/admin/role">Role</a></li>
                                <li><a href="/admin/permission">Permission</a></li>
                              </ul>
                            </li>
                          </ul>
                          @endhasrole
                                              <ul class="nav side-menu">
                        <li><a><i class="fa fa-table"></i>Objective Key Results<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="/okr">All OKR</a></li>
                            <li><a href="/today">Today</a></li>
                            <li><a href="/week">Week</a></li>
                          </ul>
                        </li>
                      </ul>
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right"> @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                  <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <img src="images/img.jpg" alt="">{{ Auth::user()->firstname }}
                      <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                      <li>
                        <a href="/changePassword">
                          <span>Change Password</span>
                          <i class="fa fa-lock pull-right"></i>
                        </a>
                      </li>
                      </li>
                      <li>
                          <a href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                              Logout
                              <i class="fa fa-sign-out pull-right"></i>
                          </a>
                          
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </li>
                    </ul>
                  </li>
    @endif

                
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
                @yield('content')
</div>
</div>
</div>
<!-- /page content -->

<!-- footer content -->
<footer>
<div class="pull-right">
 Objective Key Results System by <strong>Trendmedia INC.</strong></a>
</div>
<div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>


<!-- Bootstrap -->
<script src="/js/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/js/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="/js/vendors/nprogress/nprogress.js"></script>

<!-- Custom Theme Scripts -->
<script src="/js/build/js/custom.min.js"></script>
</body>
</html>
