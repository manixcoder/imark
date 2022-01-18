<style type="text/css">
   .colerclass{
      color: #317eeb;
   }
   .menustyle{
      margin: 10px;
   }
</style>
<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <h4 class="pull-left page-title">View Product</h4>
            <ol class="breadcrumb pull-right">
               <li><a href="{{ URL::to('home') }}">Home</a></li>
               <li class="active">View Product</li>
            </ol>
         </div>
      </div>
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
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <?php $brand = DB::table('brand')->where('id', $editdata->brand_id)->first(); ?>
                              <label class="control-label">Brand : </label>
                              <input class="form-control" type="text" name="" value="{{ $brand->brand_name }}" readonly="">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <?php $category = DB::table('category')->where('id', $editdata->category_id)->first(); ?>
                              <label class="control-label">Category : </label>
                              <input class="form-control" type="text" name="" value="{{ $category->category_name }}" readonly="">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <?php $color = DB::table('color')->where('id', $editdata->color_id)->first(); ?>
                              <label class="control-label">Color : </label>
                              <input class="form-control" type="text" name="" value="{{ $color->color_name }}" readonly="">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <?php $size = DB::table('size')->where('id', $editdata->size_id)->first(); ?>
                              <label class="control-label">Size : </label>
                              <input class="form-control" type="text" name="" value="{{ $size->size_name }}" readonly="">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">  
                              <label class="control-label">Product Name : <font color="red">*</font></label>
                              <input  type="text" id="product_name" name="product_name" class="form-control" required="" value="{{ $editdata->product_name ?? '' }}" aria-required="true" readonly=""> 
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">  
                              <label class="control-label">Product Price : <font color="red">*</font></label>
                              <input  type="text" class="form-control" value="{{ $editdata->product_price ?? ''}}" aria-required="true" readonly=""> 
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">  
                              <label class="control-label">Product code : <font color="red">*</font></label>
                              <input  type="text" class="form-control" required="" value="{{ $editdata->product_code ?? ''}}" aria-required="true" readonly=""> 
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">  
                              <label class="control-label">SKU : <font color="red">*</font></label>
                              <input  type="text" class="form-control" value="{{ $editdata->sku ?? ''}}" readonly=""> 
                           </div>
                        </div>                   
                        <div class="col-md-6">
                           <div class="form-group">  
                              <label class="control-label">Inventory <font color="red">*</font></label>
                              <input type="text" class="form-control" value="{{ $editdata->inventory ?? ''}}" readonly=""> 
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
                     <?php $imgdata = explode(',', $editdata->image); ?>
                     <div class="row">
                     @foreach($imgdata as $img)
                        <div class="col-md-3">
                           <div class="form-group"> 
                              <img src="http://localhost/imark_admin/public/product_image/{{ $img }}" alt="Product image" width="70" height="70">
                           </div>
                        </div>
                     @endforeach
                     </div> 
                  </div><!-- End card-body -->
               </div> <!-- End card -->
            </form><!-- Form End -->
         </div><!-- container -->
      </div>
