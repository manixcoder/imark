<?php 
   $sessionId =  Session::get('gorgID');
   $users = DB::table('users')->where('id', $sessionId)->first();
?>

<link href="{{ asset('public/assets/css/page_css/home.css') }}" rel="stylesheet" type="text/css" />
<!-- Start content -->
<div class="content">
   <div class="container-fluid">
      <div class="">
         <div class="">
            <!-- Page-Title -->
            <div class="row">
               <div class="col-sm-12">
                  <h4 class="pull-left page-title">Welcome, {{ $users->name }}!</h4>
                  <ol class="breadcrumb pull-right">
                     <li><a href="#">Admin</a></li>
                     <li class="active">Dashboard</li>
                  </ol>
               </div>
            </div>
            <div class="row">
               @if(Session::get('userRole') == 1)
               <div class="col-md-6 col-xl-4">
                  <a href="{{url::to('users')}}">
                     <div class="mini-stat clearfix bg-primary bx-shadow">
                        <span class="mini-stat-icon"><i class="fa fa-users"></i></span>
                        <div class="mini-stat-info text-right">
                           <span class="counter">{{ $usredata }}</span>
                           Total Executive
                        </div>
                        <div class="tiles-progress">
                           <div class="m-t-20">
                              <h5 class="text-uppercase text-white m-0">Executive <span class="pull-right">View</span></h5>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>
               @endif

               <div class="col-md-6 col-xl-4">
                  <a href="{{url::to('category')}}">
                     <div class="mini-stat clearfix bg-warning bx-shadow">
                        <span class="mini-stat-icon"><i class="fas fa-sitemap"></i></span>
                        <div class="mini-stat-info text-right">
                           <span class="counter"></span>
                           Total Categories
                        </div>
                        <div class="tiles-progress">
                           <div class="m-t-20">
                              <h5 class="text-uppercase text-white m-0">Categories <span class="pull-right">View</span></h5>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>

               <div class="col-md-6 col-xl-4">
                  <a href="{{url::to('product')}}">
                     <div class="mini-stat clearfix bg-success bx-shadow">
                        <span class="mini-stat-icon"><i class="fa fa-shopping-cart"></i></span>
                        <div class="mini-stat-info text-right">
                           <span class="counter">546</span>
                           Total Products
                        </div>
                        <div class="tiles-progress">
                           <div class="m-t-20">
                              <h5 class="text-uppercase text-white m-0">Products <span class="pull-right">View</span></h5>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
