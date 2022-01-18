@guest
<script>
   <?php Session::flash('warning', 'Your Session had been Expired..!'); ?>
   window.location = "{{ url('/') }}";
</script>
@if (Route::has('register'))
<script>
   <?php Session::flash('warning', 'Your Session had been Expired..!'); ?>
   window.location = "{{url('/')}}";
</script>
@endif
@else
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8" />
      <title>imark</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="shortcut icon" href="{{ asset('public/assets/images/favicon_1.ico')}}">
      <link href="{{asset('public/assets/plugins/sweetalert2/sweetalert2.css') }}" rel="stylesheet" type="text/css">
      <!-- Fontawasom -->
      <link href="{{ asset('public/assets/fontawesome/css/all.min.css')}}" rel="stylesheet">
      <!-- Plugins css -->
      <link href="{{asset('public/assets/plugins/modal-effect/css/component.css')}}" rel="stylesheet">
      <!--Form Wizard-->
      <link rel="stylesheet" type="text/css" href="{{asset('public/assets/plugins/jquery-steps/jquery.steps.css')}}">
      <!--calendar css-->
      <link href="{{asset('public/assets/plugins/fullcalendar/dist/fullcalendar.css')}}" rel="stylesheet">
      <link href="{{asset('public/assets/plugins/select2/dist/css/select2.css')}}" rel="stylesheet" type="text/css">
      <!-- Custom Files -->
      <link href="{{ asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('public/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
      <script src="{{ asset('public/assets/js/modernizr.min.js') }}"></script>
      <!-- Date And TimePicker -->
      <link href="{{ asset('public/assets/plugins/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
      <link href="{{ asset('public/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
      <!-- DataTables -->
      <link href="{{ asset('public/assets/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('public/assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('public/assets/plugins/datatables/fixedHeader.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('public/assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('public/assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('public/assets/plugins/datatables/scroller.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
      <!-- Alert -->
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
      <script src="{{ asset('public/assets/js/calendar.js') }}"></script>
      <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />

      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
      <script src="choosen.js"></script>
      <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script> <!-- Editor script -->
      <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
   </head>
   <body class="fixed-left">
      
      <!-- Begin page -->
      <div id="wrapper">
      <!-- Top Bar Start -->
      <div class="topbar">
         <!-- LOGO -->
         <div class="topbar-left">
            <div class="text-center">
               <a href="{{ URL::to('dashboard') }}" class="logo"><i class="md md-terrain"></i> <span> imark</span></a>
            </div>
         </div>
         <!-- Button mobile view to collapse sidebar menu -->
         <nav class="navbar navbar-default">
            <div class="container-fluid">
               <ul class="list-inline menu-left mb-0">
                  <li class="float-left">
                     <a href="#" class="button-menu-mobile open-left">
                     <i class="fa fa-bars"></i>
                     </a>
                  </li>
               </ul>
               <ul class="nav navbar-right float-right list-inline">
                  
                  <li class="d-none d-sm-block">
                     <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                  </li>
                 
                  <li class="dropdown open">
                     <a href="#" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">
                    
                     <img src="http://localhost/wmc_admin/public/images/avatar-5.jpg" alt="user-img" class="rounded-circle"> 
                     
                     </a>
                     <ul class="dropdown-menu">
                        <li><a href="{{url('user-profile')}}" class="dropdown-item"><i class="md md-face-unlock mr-2"></i> Profile</a></li>
                       
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();" class="dropdown-item"><i class="md md-settings-power mr-2"></i> {{ __('Logout') }}</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           @csrf
                        </form>
                     </ul>
                  </li>
               </ul>
            </div>
         </nav>
      </div>
      <!-- Top Bar End -->
      <!-- Left Menu Panel -->
      @include('layouts.menubar')
      @endguest