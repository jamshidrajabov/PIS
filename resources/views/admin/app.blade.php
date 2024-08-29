<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>@yield('title','Asosiy sahifa')</title>
    <link rel="icon" href="{{ asset('admin/logo.png') }}" type="image/x-icon">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{asset('admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="{{asset('admin/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{asset('admin/dist/css/skins/_all-skins.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{asset('admin/admin/plugins/iCheck/flat/blue.css')}}" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="{{asset('admin/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{{asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="{{asset('admin/plugins/datepicker/datepicker3.css')}}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="{{asset('admin/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      
    <![endif]-->  
                  {{-- <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> --}}
                  {{-- <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script> --}}
                  <script src="{{ asset('js/src/respond.js') }}"></script>
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>


  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo"> 
          <i class="ion ion-medkit"></i>
        <b>PI</b>S</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             <!-- Messages: style can be found in dropdown.less-->
             <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">4</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Sizda 4 ta yangi xabar mavjud</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li><!-- start message -->
                      <a href="#">
                        <div class="pull-left">
                          <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image"/>
                        </div>
                        <h4>
                          Doctor
                          <small><i class="fa fa-clock-o"></i> 5 min</small>
                        </h4>
                        <p>Ahvollaringiz yaxshimi?</p>
                      </a>
                    </li><!-- end message -->
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="{{asset('admin/dist/img/user3-128x128.jpg')}}" class="img-circle" alt="user image"/>
                        </div>
                        <h4>
                          User
                          <small><i class="fa fa-clock-o"></i> 2 soat</small>
                        </h4>
                        <p>Dasturlashga qiziqasizmi?</p>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="{{asset('admin/dist/img/user4-128x128.jpg')}}" class="img-circle" alt="user image"/>
                        </div>
                        <h4>
                          Laylo
                          <small><i class="fa fa-clock-o"></i> Bugun</small>
                        </h4>
                        <p>Front-End bilasizmi?</p>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="pull-left">
                          <img src="{{asset('admin/dist/img/user3-128x128.jpg')}}" class="img-circle" alt="user image"/>
                        </div>
                        <h4>
                          Foydalanuvchi
                          <small><i class="fa fa-clock-o"></i> Kecha</small>
                        </h4>
                        <p>Nima ish bilan bandsiz?</p>
                      </a>
                    </li>
                   
                  </ul>
                </li>
                <li class="footer"><a href="#">Hammasini ko'rsat</a></li>
              </ul>
            </li>
            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Sizda 10 ta bildirishnoma mavjud</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> Bugun 5 ta kasal qo'shildi
                      </a>
                    </li><li>
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> Bugun 5 ta kasal qo'shildi
                      </a>
                    </li><li>
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> Bugun 5 ta kasal qo'shildi
                      </a>
                    </li><li>
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> Bugun 5 ta kasal qo'shildi
                      </a>
                    </li><li>
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> Bugun 5 ta kasal qo'shildi
                      </a>
                    </li>
                   
                  </ul>
                </li>
                <li class="footer"><a href="#">Hammasini ko'rsat</a></li>
              </ul>
            </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">{{auth()->user()->name}}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                    <p>
                      {{auth()->user()->name}}
                      
                      <small>Siz {{auth()->user()->created_at->format('d-m-Y')}} dan beri platforma foydalanuvchisisiz</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-6 text-center">
                      <a href="{{route('admin.users')}}">Foydalanuvchilar</a>
                    </div>  
                    <div class="col-xs-4 text-center">
                      <a href="{{route('hospital.index')}}">Kasalxonalar</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-left">
                      <a href="{{route('dashboard')}}" class="btn btn-default btn-flat">Bosh sahifa</a>
                    </div>
                    <div class="pull-right">
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            <div class="btn btn-default btn-flat">
                                Chiqish
                            </div>
                        </x-dropdown-link>
                    </form>
                     
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>{{auth()->user()->name}}</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Qidirish..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Umumiy</li>
            {{-- <li>
              <a href="{{asset('admin/pages/widgets.html')}}">
                <i class="fa fa-th"></i> <span>Jami Bemorlar</span> <small class="label pull-right bg-green">new</small>
              </a>
            </li> --}}
            <li>
              <a href="/">
                <i class="fa fa-home"></i> <span>Bosh sahifa</span> 
              </a>
            </li>
            <li class="header">Foydalanuvchi uchun</li>
            <li>
              <a href="{{route('admin.patient.create')}}">
                <i class="fa ion-person-add"></i> <span>Bemor qo'shish</span> 
              </a>
            </li>
            <li>
              <a href="{{route('mypatients',['user_id'=>auth()->user()->id])}}">
                <i class="fa fa-users"></i> <span>Jami bemorlarim</span> 
              </a>
            </li>
            <li>
              <a href="{{route('mycurrentpatients',['user_id'=>auth()->user()->id])}}">
                <i class="fa fa-medkit"></i> <span>Joriy bemorlarim</span> 
              </a>
            </li>
            <li>
              <a href="{{route('colleagues.index',['user_id'=>auth()->user()])}}">
                <i class="fa fa-user-md"></i> <span>Hamkasblarim</span> 
              </a>
            </li>
            <li>
              <a href="{{route('drugs.index')}}">
                <i class="fa fa fa-th"></i> <span>Dorilar</span> 
              </a>
            </li> 
            <li>
              <a href="{{route('chat')}}">
                <i class="fa fa-comment"></i> <span>Chat</span> 
              </a>
            </li>
            <li class="header">Admin uchun</li>
            <li>
                <a href="#">
                  <i class="fa fa-envelope"></i> <span>Xabarlar</span> <small class="label pull-right bg-green">new</small>
                </a>
              </li>
              <li>
                <a href="{{route('hospital.index')}}">
                  <i class="fa fa-hospital-o"></i> <span>Jami kasalxonalar</span> 
                </a>
              </li>
              <li>
                <a href="{{route('patients')}}">
                  <i class="fa fa-ambulance"></i> <span>Hozir kasalxonada</span> 
                </a>
              </li>
              <li>
                <a href="{{route('admin.users')}}">
                  <i class="fa fa-users"></i> <span>Jami foydalanuvchilar</span> 
                </a>
              </li>
              <li>
                <a href="{{route('register')}}">
                  <i class="fa fa-th"></i> <span>Ro'yxatga olish</span> 
                </a>
              </li>
              <li>
                <a href="{{route('drug.create')}}">
                  <i class="fa fa-th"></i> <span>Dori qo'shish</span> 
                </a>
              </li>
             
           
            
    
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            @yield('page','Asosiy sahifa')
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{route('user.dashboard')}}"><i class="fa fa-dashboard"></i> Asosiy</a></li>
            <li class="active">@yield('page','Asosiy sahifa')</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div style="padding-top:20px" class="small-box bg-aqua">
                <div class="inner">
                  <?php 
                    $distinctPatientCount = App\Models\Hospital::count();
                    ?>
                  <h3>{{$distinctPatientCount}}</h3>
                  <p>Jami kasalxonalar</p>
                </div>
                <div style="margin:15px" class="icon">
                  <i class="fa fa-hospital-o"></i>
                </div>
                <a href="{{route('hospital.index')}}" class="small-box-footer">Ko'proq... <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div style="padding-top:20px" class="small-box bg-green">
                <div class="inner">
                  @php
                  $currentcount = \App\Models\Period::whereNull('date_end')->count();
                  @endphp
                  <h3>{{$currentcount}}</h3>
                  <p>Hozir kasalxonada</p>
                </div>
                <div style="margin:15px" class="icon">
                  <i class="fa fa-ambulance"></i>
                </div>
                <a href="{{route('patients')}}" class="small-box-footer">Ko'proq...<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div style="padding-top:20px" class="small-box bg-yellow">
                <div class="inner">
                  @php
                    // Hozirgi autentifikatsiya qilingan foydalanuvchini olish
                    $user = auth()->user();
                    $usersCount = \App\Models\User::where('role_id', 2)->count();
                    $drugsCount = \App\Models\Drug::all()->count();
                  @endphp
                  <h3>{{$usersCount}}</h3>
                  <p>Jami foydalanuvchilar</p>
                </div>
                <div style="margin:15px" class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="{{route('admin.users')}}" class="small-box-footer">Ko'proq...<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div style="padding-top:20px" class="small-box bg-red">
                <div class="inner">
                  <h3>{{$drugsCount}}</h3>
                  <p>Jami dorilar</p>
                </div>
                <div style="margin:15px" class="icon">
                  <i class="fa fa-th"></i>
                </div>
                <a href="{{route('drugs.index')}}" class="small-box-footer">Ko'proq... <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          




          <div class="row">
            <section class="col-lg-12 connectedSortable">  
              @yield('content')
                  
              
            </section>
          </div>





        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Versiya</b> 1.0
        </div>
        <strong>Copyright &copy; 2024-2025 <a href="#">RJ</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="{{asset('admin/plugins/jQuery/jQuery-2.1.3.min.js')}}"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{asset('admin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{asset('admin/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="{{asset('admin/plugins/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="{{asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('admin/plugins/knob/jquery.knob.js')}}" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="{{asset('admin/plugins/datepicker/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="{{asset('admin/plugins/iCheck/icheck.min.js')}}" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="{{asset('admin/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='{{asset('admin/plugins/fastclick/fastclick.min.js')}}'></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin/dist/js/app.min.js')}}" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('admin/dist/js/pages/dashboard.js')}}" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('admin/dist/js/demo.js')}}" type="text/javascript"></script>
    
  </body>
</html> 