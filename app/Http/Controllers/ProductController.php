<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Session;
use Response;
use App\Category;
use App\Brand;
use App\Products;
use App\User;
use DB;
use Hash;
use Auth;

class ProductController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('role');
  } 
  
/* Product Functions start */
  public function add_product(Request $request)
  {/*
    print_r($request->all()); die;*/
    if ($request->hasFile('image')) 
    {
        foreach ($request->image as $item)
        {
            $var = date_create();
            $time = date_format($var, 'YmdHis');
            $imageName = $time . '-' . $item->getClientOriginalName();
            $item->move(public_path() . '/product_image', $imageName);
            $arr[] = $imageName;
        }
        $image = implode(",", $arr);
    }
    $data = array(
        'product_name' => $request->product_name,
        'product_price' => $request->product_price,
        'category_id' => $request->category_id,
        'inventory' => $request->inventory,
        'status' => $request->status,
        'image' => $image ?? '',
      );

    if($request->ids != '')
    {
      Session::flash('success','Updated successfully..!');
      $updateData = DB::table('products')->where('id', $request->ids)->update($data);
      return redirect('product');
    }
    else
    {
      Session::flash('success','Inserted successfully..!');
      $insertData = DB::table('products')->insert($data);
      return redirect('product');
    }
  }

  public function view_product()
  {
    $productdata = DB::table('products')
      ->join('category', 'category.id', '=', 'products.category_id')
      ->select('products.*', 'category.category_name')
      ->get();

    $data['content'] = 'admin.product.manage_product';
    return view('layouts.content', compact('data'))->with(['productdata' => $productdata ]);
  }

  public function product_edit($id)
  {
    $editdata = DB::table('products')->where('id', $id)->first();

    $data['content'] = 'admin.product.edit_products';
    return view('layouts.content', compact('data'))->with(['editdata' => $editdata ]);
  }

  public function delete_product($id)
  {
    $productimage = DB::table('products')->where('id', $id)->first();
    /*print_r($productimage); die;*/
    $imgdata = explode(',', $productimage->image); 
      if(sizeof($imgdata) > 0) 
      {
        /*echo "if"; die;*/
        foreach ($imgdata as $key => $value) 
        {
          if(\File::exists(public_path('product_image/').'/'.$value))
          {
            \File::delete(public_path(('product_image/').'/'.$value));
            $deleteimagee = DB::table('products')->where('id', $id)->delete();
          }
        }
        session()->flash('error', 'Deleted Successfully..!');
        return redirect()->back();
      }else{
        echo "else"; die;
        $delete = DB::table('products')->where('id', $id)->delete();
        session()->flash('error', 'Deleted Successfully..!');
        return redirect()->back();
      }
  }

  public function useremail($y)
  {
    $data = User::where('email', $y)->first();

    if($data!=''){
          return Response::json($data);
      }
  }

    
/* Product Functions End */
}
