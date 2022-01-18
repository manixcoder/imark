<div class="content">
   <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row">
         <div class="col-sm-12">
            <h4 class="pull-left page-title">Manage Category </h4>
            <ol class="breadcrumb pull-right">
               <li><a href="{{ URL::to('home') }}">Home</a></li>
               <li class="active">Manage Category </li>
            </ol>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="m-b-30">
                           <button type="button" class="btn btn-primary waves-effect waves-light" onclick="addRecords()" > Add <i class="md md-add-circle-outline"></i></button>
                        </div>
                     </div>
                  </div>
                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                     <thead>
                        <tr>
                           <th>Serial number</th>
                           <th>Category name</th>
                           <th>Image</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($categorydata as $key => $data)
                        <tr class="gradeX">
                           <td>{{ $key+1 }}</td>
                           <td>{{ $data->category_name }}</td>
                           <td>
                              <img src="{{asset('public/category_image/').'/'.$data->image}}" alt="category image" height="50" width="50">
                           </td>
                           
                           @if($data->status == 1)
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
                              <a href="javascript::void(0)" class="on-default edit-row"  onclick="editRecords({{ $data->id }})" data-toggle="tooltip" data-modal="modal-12" data-placement="top" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a> 
                              &nbsp;&nbsp;&nbsp;
                              <a href="{{ URL::to('category-detele',$data->id)}}" class="on-default remove-row" onclick="return confirm('Are you sure you want to delete this item?');" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="fas fa-trash"></i></a>
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
<!--- MODEL CALL--->
<div id="unique-model" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title mt-0">Category Define</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form  action="{{ url('add-category') }}" method="POST" id="FormValidation" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="ids" id="ids">
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <p class="control-label"><b>Category Name:</b> <font color="red">*</font></p>
                        <input  type="text" id="category" name="category" class="form-control" required="" aria-required="true" placeholder=""> 
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="control-label">Image <font color="red">*</font></label>
                        <input  type="file" id="image" name="image" class="form-control" required="" aria-required="true" onchange="preview_image();" accept="image/*">
                        <div id="image_preview" style="width: 25%;" ></div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <p class="control-label"><b>Status</b> <font color="red">*</font></p>
                        <div class="radio radio-info form-check-inline">
                           <input type="radio" id="active" value="1" name="status" checked="">
                           <label for="inlineRadio1"> Active </label>
                        </div>
                        <div class="radio radio-info form-check-inline">
                           <input type="radio" id="inactive" value="0" name="status">
                           <label for="inlineRadio1"> Inactive </label>
                        </div>
                     </div>
                  </div>
                  
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" id="submitbtn" class="btn btn-primary">Submit</button> 
               <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button> 
            </div>
         </form>
      </div>
   </div>
</div>
<!-- /.modal eND -->
<script type="text/javascript">
   function editRecords(id) 
   
   { 
   
      $.ajaxSetup({
   
        headers: {
   
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   
        }
   
   });
   
      $.ajax({
   
         url:"{{url('category-edit/')}}"+'/'+id,  
   
         method:"POST", 
   
         contentType : 'application/json',
   
         success: function( data ) 
   
         {
   
            $('#unique-model').modal('show');
   
            document.getElementById("ids").value = data.id;
   
            document.getElementById("category").value = data.category_name;
   
            var val = data.status;
   
            if( val == 1)
   
            {
   
               $('input[name=status][value=' + val + ']').prop('checked',true);
   
            }else
   
            {
   
               $('input[name=status][value=' + val + ']').prop('checked',true);
   
            }
   
               document.getElementById("submitbtn").innerText ='UPDATE';
   
         }
   
      });
   
   }
   
   
   
   function addRecords() 
   
   { 
   
      document.getElementById("FormValidation").reset();
   
      document.getElementById("submitbtn").innerText ='Save';
   
      $('#unique-model').modal('show');
   
   }
   
</script>