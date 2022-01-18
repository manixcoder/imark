<?php 
   $sessionId =  Session::get('gorgID');   
   $users = DB::table('users')->where('id', $sessionId)->first();
   $userrole = Session::get('userRole');

   /*print_r($userrole); die;   */
?>
<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
   <div class="sidebar-inner slimscrollleft">
      <div class="user-details">
      </div>
      <!--- Divider -->
      <div id="sidebar-menu">
         <ul>
            <li><a href="{{ URL::to('dashboard')}}" class="waves-effect"><i class="fa fa-home" style="color:red"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Dashboard</span></a>
            </li>
         </ul>
         
         @if($userrole == 1)
          <ul>
            <li><a href="{{ URL::to('users')}}" class="waves-effect"><i class="fa fa-users"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Executive</span></a>
            </li>
         </ul>
         @endif
         <ul>
            <li><a href="{{URL::to('category')}}" class="waves-effect"><i class="fas fa-sitemap"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Categories</span></a>
            </li>
         </ul>
         <!-- <ul>
            <li><a href="{{URL::to('city_view')}}" class="waves-effect"><i class="fa fa-building"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>City</span></a>
            </li>
         </ul> -->
         
         <ul>
            <li class="has_sub">
               <a href="#" class="waves-effect"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span> Products </span><span class="pull-right"><i class="md md-add"></i></span></a>

               <ul class="list-unstyled">
                  <li><a href="{{ url('add-products') }}" class="waves-effect"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Add Product</span></a>

                  <li><a href="{{ url('product') }}" class="waves-effect"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Manage Product</span></a>                  
               </ul>
            </li>
         </ul>       
         
        <div class="clearfix"></div>
      </div>
      <div class="clearfix"></div>
   </div>
</div>
<div class="content-page">