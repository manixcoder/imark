<div class="content">
   <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row">
         <div class="col-sm-12">
            <h4 class="pull-left page-title">Manage Products </h4>
            <ol class="breadcrumb pull-right">
               <li><a href="{{ URL::to('home') }}">Home</a></li>
               <li class="active">Manage Products </li>
            </ol>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                 <!--  <div class="row">
                     <div class="col-sm-6">
                        <div class="m-b-30">
                           <button type="button" class="btn btn-primary waves-effect waves-light" onclick="addRecords()" > Add <i class="md md-add-circle-outline"></i></button>
                        </div>
                     </div>
                  </div> -->
                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                     <thead>
                        <tr>
                           <th>Serial number</th>
                           <th>Category name</th>
                           <th>Product name</th>
                           <th>Inventory</th>
                           <th>Price</th>
                           <th>Image</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($productdata as $key => $data)

                        <?php 
                              $image = explode(",",$data->image);
                        ?>

                        <tr class="gradeX">
                           <td>{{ $key+1 }}</td>
                           <td>{{ $data->category_name }}</td>
                           <td>{{ $data->product_name }}</td>
                           <td>{{ $data->inventory }}</td>
                           <td><span>&#8377;</span> {{ $data->product_price }}</td>
                           <td>
                               <img src="{{asset('public/product_image/').'/'.$image[0]}}" alt="category image" height="50" width="50">
                           </td>
                           @if($data->status == 0)
                           <td>
                              <p class="mb-0">
                                 <span class="badge badge-success">Active</span>
                              </p>
                           </td>
                           @else
                           <td>
                              <p class="mb-0">
                                 <span class="badge badge-danger">Inactive</span>
                              </p>
                           </td>
                           @endif
                           <td class="actions">
                              <a href="{{ URL::to('product-edit',$data->id) }}" class="on-default edit-row"  onclick="editRecords({{ $data->id }})" data-toggle="tooltip" data-modal="modal-12" data-placement="top" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a> 
                              &nbsp;&nbsp;&nbsp;
                              <a href="{{ URL::to('product-detele',$data->id) }}" class="on-default remove-row" onclick="return confirm('Are you sure you want to delete this item?');" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fas fa-trash"></i></a>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
               <!-- end card-body -->
            </div>
         </div>
         <!-- container -->
      </div>
   </div>
</div>
<!-- content -->
