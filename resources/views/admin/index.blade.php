<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keyword" content="Amy Club">
    <link rel="shortcut icon" href="/favicon.ico">

    <title>Focus Club</title>

    <!--external css-->
    <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="/assets/data-tables/DT_bootstrap.css" />

      <!--right slidebar-->
      <link href="/css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/style-responsive.css" rel="stylesheet" />

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-reset.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="/js/html5shiv.js"></script>
      <script src="/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!--header start-->
      <header class="header white-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="/dashboard" class="logo">Focus<span>Club</span></a>
            <!--logo end-->
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="/img/avatar1_small.jpg">
                            <span class="username">{{ Auth::user()->name }}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="#"><i class="fa fa-cog"></i> 设置</a></li>
                            <li><a href="/auth/logout"><i class="fa fa-key"></i> 登出</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a class="{{ $view == 'dashboard' ? 'active' : '' }}" href="/dashboard">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="{{ $view == 'user' ? 'active' : '' }}" href="/user" >
                          <i class="fa fa-user"></i>
                          <span>会员管理</span>
                      </a>
                  </li>
                  @if (Auth::user()->role == 1)
                  <li class="sub-menu">
                      <a class="{{ $view == 'admin' ? 'active' : '' }}" href="/admin" >
                          <i class="fa fa-cogs"></i>
                          <span>管理员</span>
                      </a>
                  </li>
                  @endif
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          @yield('content')
      </section>
      <!--main content end-->

  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/js/jquery.scrollTo.min.js"></script>
    <script src="/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="/js/owl.carousel.js" ></script>
    <script src="/js/jquery.customSelect.min.js" ></script>
    <script src="/js/respond.min.js" ></script>

    <!--right slidebar-->
    <script src="/js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="/js/sparkline-chart.js"></script>
    <script src="/js/easy-pie-chart.js"></script>

  <script>

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="/js/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="/js/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="/assets/data-tables/jquery.dataTables.js"></script>
  <script type="text/javascript" src="/assets/data-tables/DT_bootstrap.js"></script>

  <script type="text/javascript" src="/assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>

    <!--script for this page only-->

    @yield('js')
    <!-- END JAVASCRIPTS -->

  </body>
</html>
