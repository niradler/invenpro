<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'invenpro') }}</title>

    <!-- Styles -->
    {{-- <link href="/css/app.css" rel="stylesheet"> --}}
    <!-- Bootstrap Core CSS -->
    <link href="http://localhost:8088/invenpro/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="http://localhost:8088/invenpro/public/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://localhost:8088/invenpro/public/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="http://localhost:8088/invenpro/public/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://localhost:8088/invenpro/public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
  <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('home') }}">{{ config('app.name', 'invenpro') }}</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

              
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                     @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else

                        <li><a href="{{ url('profile') }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                  {{--       <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li> --}}
                        <li class="divider"></li>
                        <li>
                                       <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out fa-fw"></i>Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                        </li>
                        @endif
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                         <form action="{{ url('home/search')}}" method="GET" class="form-horizontal" role="form">
                         {{ csrf_field() }}
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" name="query" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                             </form>
                            <!-- /input-group -->
                        </li>
                        @if (!Auth::guest())
                        <li>
                            <a href="{{ url('home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ url('inventory') }}"><i class="fa fa-table fa-fw"></i> Inventory</a>
                        </li>
                           <li>
                            <a href="{{ url('create') }}"><i class="fa fa-edit fa-fw"></i> Create</a>
                        </li>
                           <li>
                            <a href="{{ url('manage') }}"><i class="fa fa-wrench fa-fw"></i> Manage</a>
                        </li>
                        @endif
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                          @yield('content')
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
  

    <!-- Scripts -->
    {{-- <script src="/js/app.js"></script> --}}
        <!-- jQuery -->
    <script src="http://localhost:8088/invenpro/public/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="http://localhost:8088/invenpro/public/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="http://localhost:8088/invenpro/public/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="http://localhost:8088/invenpro/public/vendor/raphael/raphael.min.js"></script>
    <script src="http://localhost:8088/invenpro/public/vendor/morrisjs/morris.min.js"></script>
    <script src="http://localhost:8088/invenpro/public/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="http://localhost:8088/invenpro/public/dist/js/sb-admin-2.js"></script>
</body>
</html>
