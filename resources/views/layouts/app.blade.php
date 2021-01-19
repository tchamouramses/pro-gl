<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Genie Logiciel</title>



  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ url('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ url('assets/plugins/jqvmap/jqvmap.min.css') }}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('assets/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url('assets/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ url('assets/plugins/summernote/summernote-bs4.min.css') }}">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="{{ url('assets/plugins/ekko-lightbox/ekko-lightbox.css') }}">

  <link rel="stylesheet" href="{{ url('assets/plugins/toastr/toastr.min.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link
    rel="stylesheet"
    href="{{ url('assets/rich-text/summernote.min.css') }}"
  />

  <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">

  <link rel="stylesheet" href="{{ url('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ url('assets/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{ url('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">

  <!-- full calendar* -->


  <link rel="stylesheet" href="{{ url('/assets/plugins/fullcalendar/main.min.css') }}">
  <link rel="stylesheet" href="{{ url('/assets/plugins/fullcalendar-daygrid/main.min.css') }}">
  <link rel="stylesheet" href="{{ url('/assets/plugins/fullcalendar-timegrid/main.min.css') }}">
  <link rel="stylesheet" href="{{ url('/assets/plugins/fullcalendar-bootstrap/main.min.css') }}">


<style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="sidebar-mini layout-fixed" style="height: auto;" >
    <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/home')}}" class="nav-link">Acceuil</a>
      </li>
    </ul>
    @if(null != Auth::user() && (Auth::user()->hasPermission('vente') || Auth::user()->hasRole('administrateur')))
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <ul class="navbar-nav" title="Effectuer une vente">
      <li class="nav-item">
        <a class="nav-link" href="#" role="button"><i class="fas fa-cart-plus" style="color: blue;"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/admin/vente/getvue')}}" class="nav-link"  >Vente</a>
      </li>
    </ul>
    @endif
    @if(null != Auth::user() && (Auth::user()->hasPermission('vommande') || Auth::user()->hasRole('administrateur')))
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <ul class="navbar-nav" title="Effectuer une commande">
      <li class="nav-item">
        <a class="nav-link" href="#" role="button"><i class="fas fa-layer-group" style="color: blue;"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/admin/commande/create')}}" class="nav-link"  >Commande</a>
      </li>
    </ul>
    @endif
    @if(null != Auth::user() && (Auth::user()->hasPermission('stock') || Auth::user()->hasRole('administrateur')))
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <ul class="navbar-nav" title="etat des stocks">
      <li class="nav-item">
        <a class="nav-link" href="#" role="button"><i class="fas fa-clipboard-list" style="color: blue;"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/admin/stock')}}" class="nav-link">Stock</a>
      </li>
    </ul>
    @endif

      






    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-th-large">
          </i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          @if(Auth::check())
                    <a class="dropdown-item" href="{{ url('/admin/calendar') }}">Agenda &nbsp;&nbsp; <i class="fas fa-pen-alt" style="color: blue;" aria-hidden="true"></i></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('/admin/user/profile') }}">Profile &nbsp;&nbsp; <i class="fas fa-user" style="color: blue;" aria-hidden="true"></i></a>
                    <div class="dropdown-divider"></div>
                    @if(null != Auth::user() && (Auth::user()->hasPermission('historique') || Auth::user()->hasRole('administrateur')))
                      <a class="dropdown-item" href="{{ url('/admin/historique') }}">Historique &nbsp;&nbsp; <i class="fas fa-pen-alt" style="color: blue;" aria-hidden="true"></i></a>
                    <div class="dropdown-divider"></div>
                    @endif

                        <a class="dropdown-item" href="{{ url('/logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                            Deconnexion <i class="fas fa-power-off" style="color: red;" aria-hidden="true"></i>
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                @endif
        </div>
      </li>    


    </ul>
  </nav>

<aside class="main-sidebar elevation-4 sidebar-dark-primary">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ url('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">P_G_L</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition"><div class="os-resize-observer-host observed"><div class="os-resize-observer" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" style="margin: 0px -8px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;"><div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
      <!-- Sidebar user panel (optional) -->
      @if(Auth::check())
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url(isset(Auth::user()->photo)? 'storage/'.Auth::user()->photo :'assets/dist/img/ngc.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><b>{{ Auth::user()->name }}</b></a>
        </div>
      </div>
      @endif

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon text-info class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Menu 1
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fas fa-circle text-danger"></i>
                  <p>
                        SM1
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('/admin/demarcheur/create') }}" class="nav-link">
                      <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                      <p>SM11</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>


              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-cart-plus"></i>
                  <p>
                       Gestion Etablissements
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/admin/etablissement/create') }}" class="nav-link">
                    <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                    <p>Ajout</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/etablissement') }}" class="nav-link">
                    <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                    <p>Liste</p>
                  </a>
                </li>
              </ul>
            </li>

            
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-cart-plus"></i>
                  <p>
                       Gestion Entreprise
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/admin/entreprise/create') }}" class="nav-link">
                    <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                    <p>Ajout</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/entreprise') }}" class="nav-link">
                    <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                    <p>Liste</p>
                  </a>
                </li>
              </ul>
            </li>

            
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-cart-plus"></i>
                  <p>
                       Gestion Etudiant
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/admin/etudiant/etudiant/create') }}" class="nav-link">
                    <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                    <p>Ajout</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/etudiant/etudiant') }}" class="nav-link">
                    <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                    <p>Liste</p>
                  </a>
                </li>
              </ul>
            </li>

            
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-cart-plus"></i>
                  <p>
                       Gestion Organisme
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/admin/organisme/create') }}" class="nav-link">
                    <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                    <p>Ajout</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/organisme') }}" class="nav-link">
                    <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                    <p>Liste</p>
                  </a>
                </li>
              </ul>
            </li>

            
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-cart-plus"></i>
                  <p>
                       Gestion Filiere
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/admin/filiere/create') }}" class="nav-link">
                    <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                    <p>Ajout</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/filiere') }}" class="nav-link">
                    <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                    <p>Liste</p>
                  </a>
                </li>
              </ul>
            </li>

            
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-cart-plus"></i>
                  <p>
                       Gestion Partenariat
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/admin/partenariat/create') }}" class="nav-link">
                    <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                    <p>Ajout</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/partenariat') }}" class="nav-link">
                    <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                    <p>Liste</p>
                  </a>
                </li>
              </ul>
            </li>

            
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-cart-plus"></i>
                  <p>
                       Gestion Année Accademique
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/admin/periode-academique/create') }}" class="nav-link">
                    <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                    <p>Ajout</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/periode-academique') }}" class="nav-link">
                    <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                    <p>Liste</p>
                  </a>
                </li>
              </ul>
            </li>

            
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-cart-plus"></i>
                  <p>
                       Gestion Des Groups
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/admin/etudiant/group/create') }}" class="nav-link">
                    <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                    <p>Ajout</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/etudiant/group') }}" class="nav-link">
                    <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                    <p>Liste</p>
                  </a>
                </li>
              </ul>
            </li>

            
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-cart-plus"></i>
                  <p>
                       Gestion Categorie Donnée
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/admin/etudiant/categorie-donnee/create') }}" class="nav-link">
                    <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                    <p>Ajout</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/etudiant/categorie-donnee') }}" class="nav-link">
                    <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                    <p>Liste</p>
                  </a>
                </li>
              </ul>
            </li>

            
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-cart-plus"></i>
                  <p>
                       Gestion Des Données
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/admin/etudiant/donnee/create') }}" class="nav-link">
                    <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                    <p>Ajout</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/etudiant/donnee') }}" class="nav-link">
                    <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                    <p>Liste</p>
                  </a>
                </li>
              </ul>
            </li>

            
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-cart-plus"></i>
                  <p>
                       Gestion Stage
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/admin/stage/create') }}" class="nav-link">
                    <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                    <p>Ajout</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/stage') }}" class="nav-link">
                    <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                    <p>Liste</p>
                  </a>
                </li>
              </ul>
            </li>

            
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-cart-plus"></i>
                  <p>
                       Gestion Postuler
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/admin/etudiant/postuler/create') }}" class="nav-link">
                    <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                    <p>Ajout</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/etudiant/postuler') }}" class="nav-link">
                    <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                    <p>Liste</p>
                  </a>
                </li>
              </ul>
            </li>

            
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-cart-plus"></i>
                  <p>
                       Gestion Statistique
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/admin/statistique-etablissement/create') }}" class="nav-link">
                    <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                    <p>Ajout</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/statistique-etablissement') }}" class="nav-link">
                    <i class="fas fa-dot-circle nav-icon text-info text-info"></i>
                    <p>Liste</p>
                  </a>
                </li>
              </ul>
            </li>


        </ul>
      </li>

      </nav>
      <!-- /.sidebar-menu -->
    </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="height: 14.7854%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
    <!-- /.sidebar -->
  </aside>
    </div>






<div class="content-wrapper" style="min-height: 129px;" data-select2-id="52">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><b>Projet De Genie Logiciel</b></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <div id="app">
            @if(isset($ariane))
                <a href=" {{ url('/home')}} ">Home</a>
                @for ($i = 0; $i < count($ariane)-1; $i++)
                <img src=" {{ url('assets/images/go.png') }} ">  <a href=" {{ url('admin/' .  $ariane[$i]) }} "> {{ $ariane[$i] }} </a>
                @endfor
                @if(count($ariane) > 0)
                  <img src=" {{ url('assets/images/go.png') }} "><b>{{ $ariane[ count($ariane)-1] }}</b>
               @endif
            @endif
            </div>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" data-select2-id="51">
    <div id="app" class="container-fluid" data-select2-id="50">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    </section>
</div>
    <!-- Scripts -->
    <div class="wrapper">
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">

      <p><strong>Version Pro: </strong>1.0.0.1</p>
    </div>
    <strong>Copyright © NGC2020 <a href="#">Reference Et Site</a></strong>
  </footer>

</div>





<script src="{{ asset('js/app.js') }}"></script>
<!-- jQuery -->
<script src="{{ url('/assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ url('/assets/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ url('/assets/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ url('/assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ url('/assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url('/assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ url('/assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ url('/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ url('/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ url('/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('/assets/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('/assets/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('/assets/dist/js/demo.js') }}"></script>

<script src="{{ url('/assets/plugins/toastr/toastr.min.js') }}"></script>

<script src="{{ url('/assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

<script src="{{ url('/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script src="{{ url('/assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ url('/assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ url('/assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<script src="{{ url('/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<!-- pour l'alerte -->
<script src="{{ url('assets/js/script.js') }}"></script>
<!-- toast -->
<script src="{{ url('assets/js/toast.js') }}"></script>
<!-- Ekko Lightbox -->
<script src="{{ url('/assets/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
<script src="{{ url('assets/js/control.js') }}"></script>
<script src="{{ url('assets/js/SaveElements.js') }}"></script>

<script type="text/javascript" src="{{ url('assets/rich-text/summernote.min.js') }}"></script>

<script>
    @if(session('flash_message'))
      toastr.success("{{session('flash_message')}}");
    @endif

    @if(session('error_message'))
      toastr.error("{{session('error_message')}}");
    @endif
</script>


<script src="{{url('/assets/plugins/fullcalendar/main.min.js')}}"></script>
<script src="{{url('/assets/plugins/fullcalendar-daygrid/main.min.js')}}"></script>
<script src="{{url('/assets/plugins/fullcalendar-timegrid/main.min.js')}}"></script>
<script src="{{url('/assets/plugins/fullcalendar-interaction/main.min.js')}}"></script>
<script src="{{url('/assets/plugins/fullcalendar-bootstrap/main.min.js')}}"></script>



<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  })
</script>



<script>
  $(document).ready(function() {
    // body...
    $('#summernote').summernote();
  });
</script>


<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>

</body>
</html>
