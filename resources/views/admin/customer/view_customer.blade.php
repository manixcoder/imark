<style type="text/css">
   .colerclass{
      color: #317eeb;
   }
   .menustyle{
      margin: 10px;
   }
</style>
<!-- Start content -->
<div class="content">
   <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row">
         <div class="col-sm-12">
            <h4 class="pull-left page-title">View Customer</h4>
            <ol class="breadcrumb pull-right">
               <li><a href="{{ URL::to('home') }}">Home</a></li>
               <li class="active">View Customer</li>
            </ol>
         </div>
      </div>
      <form  action="{{ URL::to('add-user')}}" method="POST" id="FormValidation" enctype="multipart/form-data">
         @csrf
         <div class="row" id="example-basic">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="m-b-30">
                              <button type="button" class="btn btn-primary waves-effect waves-light" onclick="window.history.go(-1); return false;"><i class="fa fa-arrow-left"></i>  Go Back </button>
                           </div>
                        </div>
                     </div>
                     <hr>
                      <div class="row" style="text-align: center;">
                        <div class="col-md-12">
                           <div class="form-group"> 
                              <img src="http://localhost/imark_admin/public/profile_image/{{ $editdata->profile_image }}" alt="Product image" width="100" height="100">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <input type="hidden" name="ids" id="ids" value="{{ $editdata->id ?? '' }}">
                        <div class="col-md-6">
                           <div class="form-group">  
                              <label class="control-label">User name : <font color="red">*</font></label>
                              <input  type="text" id="name" name="name" class="form-control" required="" value="{{ $editdata->name ?? '' }}" aria-required="true" placeholder="" autocomplete="off" readonly=""> 
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">  
                              <label class="control-label">User email : <font color="red">*</font></label>
                              <input  type="email" id="email" name="email" class="form-control" required="" value="{{ $editdata->email ?? ''}}" aria-required="true" readonly=""> 
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">  
                              <label class="control-label">User phone : <font color="red">*</font></label>
                              <input  type="text" id="phone" name="phone" class="form-control" required="" value="{{ $editdata->phone ?? ''}}" > 
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">  
                              <label class="control-label">Status : <font color="red">*</font></label>
                              @if($editdata->status == 0)
                              <input  type="text"  class="form-control" placeholder="Active" readonly="">
                              @else 
                              <input  type="text"  class="form-control" placeholder="Inactive" readonly="">
                              @endif
                           </div>
                        </div>
                     </div>
               </div><!-- End card-body -->
            </div> <!-- End card -->
         </form><!-- Form End -->
      </div><!-- container -->
   </div>
