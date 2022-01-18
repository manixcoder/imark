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
            <h4 class="pull-left page-title">Add Product</h4>
            <ol class="breadcrumb pull-right">
               <li><a href="{{ URL::to('home') }}">Home</a></li>
               <li class="active">Add Product</li>
            </ol>
         </div>
      </div>
      <form  action="{{ URL::to('add/product')}}" method="POST" id="FormValidation" enctype="multipart/form-data">
         @csrf
         <div class="row" id="example-basic">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-body">
                     <input type="hidden" name="ids" id="ids">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <?php $category = DB::table('category')->get(); ?>
                              <label class="control-label">Category : <font color="red">*</font></label>
                              <select class="form-control" id="category_id" name="category_id" required="">
                                 <option value="">Choose category</option>
                                 @foreach($category as $value)
                                 <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">  
                              <label class="control-label">Product name : <font color="red">*</font></label>
                              <input  type="text" id="product_name" name="product_name" class="form-control" required="" aria-required="true" placeholder="" autocomplete="off"> 
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">  
                              <label class="control-label">Product price : <font color="red">*</font></label>
                              <input  type="text" id="product_price" name="product_price" class="form-control" required="" aria-required="true" placeholder="&#8377;" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" maxlength="5" title="price in rupee"> 
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">  
                              <label class="control-label">Inventory : <font color="red">*</font></label>
                              <input type="text" id="inventory" name="inventory" class="form-control" required="" aria-required="true" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" maxlength="5" title="price in rupee"> 
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">Image : <font color="red">*</font></label>
                              <input  type="file" id="image" name="image[]" class="form-control" required="" aria-required="true" accept="image/x-png,image/gif,image/jpeg"  multiple>
                              <div id="image_preview" style="width: 25%;"></div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <p class="control-label"><b>Status : </b> <font color="red">*</font></p>
                              <div class="radio radio-info form-check-inline">
                                 <input type="radio" id="active" value="0" name="status" checked="">
                                 <label for="inlineRadio1"> Active </label>
                              </div>
                              <div class="radio radio-info form-check-inline">
                                 <input type="radio" id="inactive" value="1" name="status">
                                 <label for="inlineRadio1"> Inactive </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="submit" id="submitbtn" class="btn btn-primary">Submit</button>
                     </div>
                  </div>
                  <!-- End card-body -->
               </div>
               <!-- End card -->
            </div>
            <!-- end col -->
         </div>
         <!-- End row -->
      </form>
      <!-- Form End -->
   </div>
   <!-- container -->
</div>