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
            <h4 class="pull-left page-title">Edit Product</h4>
            <ol class="breadcrumb pull-right">
               <li><a href="{{ URL::to('home') }}">Home</a></li>
               <li class="active">Edit Product</li>
            </ol>
         </div>
      </div>
      <form  action="{{ URL::to('add/product')}}" method="POST" id="FormValidation" enctype="multipart/form-data">
         @csrf
         <div class="row" id="example-basic">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-body">
                     <input type="hidden" name="ids" id="ids" value="{{ $editdata->id ?? '' }}">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">  
                              <label class="control-label">Product Name : <font color="red">*</font></label>
                              <input  type="text" id="product_name" name="product_name" class="form-control" required="" value="{{ $editdata->product_name ?? '' }}" aria-required="true" placeholder="" autocomplete="off"> 
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">  
                              <label class="control-label">Product Price : <font color="red">*</font></label>
                              <input  type="text" id="product_price" name="product_price" class="form-control" required="" value="{{ $editdata->product_price ?? ''}}" aria-required="true" placeholder="" maxlength="9"> 
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <?php $category = DB::table('category')->get(); ?>
                              <label class="control-label">Category : <font color="red">*</font></label>
                              <select class="form-control" id="category_id" name="category_id" required="">
                                 <option value=""> Choose Category</option>
                                 @foreach($category as $value)
                                 <option value="{{ $value->id }}" {{ ($value->id == $editdata->category_id) ? "selected" : "" }}>{{ $value->category_name }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">  
                              <label class="control-label">Inventory <font color="red">*</font></label>
                              <input type="text" id="inventory" name="inventory" class="form-control" required="" aria-required="true" value="{{ $editdata->inventory ?? ''}}" placeholder=""> 
                           </div>
                        </div>
                        <?php $imgdata = explode(',', $editdata->image); ?>
                        @foreach($imgdata as $img)
                           <div class="col-md-3">
                              <div class="form-group"> 
                                 <img src="http://localhost/imark_admin/public/product_image/{{ $img }}" alt="Product image" width="70" height="70">
                                 <input type="file" name="image[]" value="{{ $img }}">
                              </div>
                           </div>
                        @endforeach
                     </div>                                                               
                     <div class="modal-footer">
                        <button type="submit" id="submitbtn" class="btn btn-primary">Submit</button>
                     </div>
                  </div><!-- End card-body -->
               </div> <!-- End card -->
            </form><!-- Form End -->
         </div><!-- container -->
      </div>
