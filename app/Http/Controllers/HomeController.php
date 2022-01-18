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
use App\User;
use DB;
use Hash;
use Auth;

class HomeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('role');
  } 

  public function UpdateProfile(Request $request)
  {
        if($request->password){
            $this->validate($request, [
                'password'     => 'required',
                'new_password'     => 'required|min:8',
            ]);
            
            $data = $request->all();

            if(!\Hash::check($data['password'], auth()->user()->password)){
                  Session::flash('error', 'Please Enter valid Current password');
                  return back();
              }else{
                if($request->u_ids != '') {
                  $udata['username'] = $request->username;
                  $udata['password'] = Hash::make($request->new_password);
                  User::where('id', $request->u_ids)->update($udata);
                }
                Session::flash('success', 'Profile updated successfully');
              return back();
            }
        }else{
                $data = $request->all();
                $udata['username'] = $request->username;
                 
                  User::where('id', $request->u_ids)->update($udata);
                
                Session::flash('success', 'Profile updated successfully');
              return back();
        }
  }


  public function UserProfile(Request $request)
  {
    $companydata = User::where('id', Session::get('gorgID'))->first();
    $profileData = Auth()->user();

    $data['content'] = 'admin.user.user-profile';
    return view('layouts.content', compact('data'))->with(['companydata' => $companydata]);
  }

  public function Dashboard(Request $request)
  {
    $userRole = Session::get('userRole');
    $id = Session::get('gorgID');
    $OrgData = DB::table('users')->where('id', $id)->first();

    if($userRole == '1')
    {
      $usredata = DB::table('users')->count();
      $productdata = DB::table('products')->count();
      $categorydata = DB::table('category')->count();
      
      $data['content'] = 'admin.home';
      return view('layouts.content', compact('data'))->with(['usredata' => $usredata, 'productdata' => $productdata, 'categorydata' => $categorydata ]);
    }
    if($userRole == '2'){

      $usredata = DB::table('users')->count();
      
      $data['content'] = 'admin.home';
      return view('layouts.content', compact('data'))->with(['usredata' => $usredata ]);
    }
  }

  public function index()
  {
    Session::flash('success', 'login Successfully..!');
    return Redirect::action('HomeController@Dashboard');
  }

/* User routr Start */
  public function total_users(Request $request)
  {
    $total_users = User::all();

    $data['content'] = 'admin.user';
    return view('layouts.content', compact('data'))->with(['usredata' => $usredata ]);
  }

  public function user_view()
  {
    $usredata = User::where('users_role', 2)->get();

    $data['content'] = 'admin.user.user';
    return view('layouts.content', compact('data'))->with(['usredata' => $usredata ]);
  }

  public function add_user(Request $request)
  {/*
    print_r($request->all()); die;*/
    if($files = $request->image)
      {
          $destinationPath = public_path('/profile_image/');
          $profileImage = date('YmdHis') . "-" . $files->getClientOriginalName();
          $path =  $files->move($destinationPath, $profileImage);
          $image = $insert['photo'] = "$profileImage";
      }
      $data = array(
        'name' => $request->name,  
        'email' => $request->email, 
        'phone' => $request->phone, 
        'password' => Hash::make($request->password), 
        'profile_image' =>  $image, 
        'status' => $request->status, 
        'created_at' => date('Y-m-d H:i:s'),
        'users_role' => 2,
      );  

      if($request->ids != '')
      {
        Session::flash('success','Updated Successfully..!');
        $updateData = DB::table('category')->where('id', $request->ids)->update($data);
        return back();
      }
      else
      {
        Session::flash('success','Inserted Successfully..!');
        $insertData = DB::table('users')->insert($data);
        return back();
      } 
  }

  public function user_delete($id)
  {
    $customerdata_delete = User::where('id', $id)->delete();
    Session::flash('error', 'User delete Successfully.!');
    return back();
  }
/* User routr End */

/* Customers Route Start */
  public function customer_view()
  {
    $customerdata = User::where('users_role', 3)->get();

    $data['content'] = 'admin.customer.manage_customer';
    return view('layouts.content', compact('data'))->with(['customerdata' => $customerdata ]);
  }

  public function customer_delete($id)
  {
    $customerdata_delete = User::where('id', $id)->delete();
    Session::flash('error', 'Customer delete Successfully.!');
    return back();
  }
/* Customers Route End */

/* Catrgory Routes start */
  public function category_view()
  {
    $categorydata = Category::all();

    $data['content'] = 'admin.category.manage_categoty';
    return view('layouts.content', compact('data'))->with(['categorydata' => $categorydata ]);
  }

  public function category_delete($id)
  {
    $customerdata_delete = Category::where('id', $id)->delete();
    Session::flash('error', 'Category delete Successfully.!');
    return back();
  }

  public function category_edit($id)
  {
    $data = Category::where('id', $id)->first();
    return Response::json($data);
  }

  public function add_category(Request $request)
   {
      if($files = $request->image)
      {
          $destinationPath = public_path('/category_image/');
          $profileImage = date('YmdHis') . "-" . $files->getClientOriginalName();
          $path =  $files->move($destinationPath, $profileImage);
          $image = $insert['photo'] = "$profileImage";
      }

      $data = array(
        'category_name' => $request->category, 
        'image' => $image ?? '', 
        'status' => $request->status, 
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      );  

      if($request->ids != '')
      {
        Session::flash('success','Updated Successfully..!');
        $updateData = DB::table('category')->where('id', $request->ids)->update($data);
        return back();
      }
      else
      {
        Session::flash('success','Inserted Successfully..!');
        $insertData = DB::table('category')->insert($data);
        return back();
      } 
    }
/* Catrgory Routes End */

/* Catrgory Routes start */
  public function brand_view()
  {
    $categorydata = Brand::all();

    $data['content'] = 'admin.brand.manage_brand';
    return view('layouts.content', compact('data'))->with(['categorydata' => $categorydata ]);
  }

  public function brand_delete($id)
  {
    $brand_delete = Brand::where('id', $id)->delete();
    Session::flash('error', 'Brand delete Successfully.!');
    return back();
  }

  public function brand_edit($id)
  {
    $data = Brand::where('id', $id)->first();
    return Response::json($data);
  }

  public function add_brand(Request $request)
   {
     $data = array(
        'brand_name' => $request->brand_name, 
        'status' => $request->status, 
        'created_at' => date('Y-m-d H:i:s'),
      );  

      if($request->ids != '')
      {
        Session::flash('success','Updated Successfully..!');
        $updateData = DB::table('brand')->where('id', $request->ids)->update($data);
        return back();
      }
      else
      {
        Session::flash('success','Inserted Successfully..!');
        $insertData = DB::table('brand')->insert($data);
        return back();
      } 
    }
/* Brand Routes End */

/* Branches Routes Start */
  public function branch_view()
  {
    $branchdata = DB::table('branches')->get();

    $data['content'] = 'admin.branch.manage_branch';
    return view('layouts.content', compact('data'))->with(['branchdata' => $branchdata ]);
  }

  public function add_branch(Request $request)
  {
    $data = array(
      'branch_name' => $request->branch_name, 
      'status' => $request->status, 
      'created_at' => date('Y-m-d H:i:s'),
    );  

    if($request->ids != '')
    {
      Session::flash('success','Updated Successfully..!');
      $updateData = DB::table('branches')->where('id', $request->ids)->update($data);
      return back();
    }
    else
    {
      Session::flash('success','Inserted Successfully..!');
      $insertData = DB::table('branches')->insert($data);
      return back();
    } 
  }
  
  public function branch_edit($id)
  {
    $data = DB::table('branches')->where('id', $id)->first();
    return Response::json($data);
  }

  public function branch_delete($id)
  {
    $data = DB::table('branches')->where('id', $id)->delete();
    Session::flash('error', 'Branch delete Successfully.!');
    return back();
  }
/* Branches Routes End */

/* Basic specification method start */
  public function main_specification_view()
  {
    $mainspeci = DB::table('basic_specification')->get();

    $data['content'] = 'admin.master.manage_basic_specification';
    return view('layouts.content', compact('data'))->with(['mainspeci' => $mainspeci ]);
  }

  public function add_main_specification(Request $request)
  {
      $data = array(
      'main_specification' => $request->main_specification, 
      'status' => $request->status, 
      'created_at' => date('Y-m-d H:i:s'),
    );  

    if($request->ids != '')
    {
      Session::flash('success','Updated Successfully..!');
      $updateData = DB::table('basic_specification')->where('id', $request->ids)->update($data);
      return back();
    }
    else
    {
      Session::flash('success','Inserted Successfully..!');
      $insertData = DB::table('basic_specification')->insert($data);
      return back();
    }
  }

  public function main_specification_edit($id)
  {
    $data = DB::table('basic_specification')->where('id', $id)->first();
    return Response::json($data);
  }

   public function mainspeci_delete($id)
  {
    $data = DB::table('basic_specification')->where('id', $id)->delete();
    Session::flash('error', 'Basic Specification delete Successfully.!');
    return back();
  }
/* Basic specification method End */

/* Engine specification method start */
  public function engine_key_view()
  {
    $engineKey = DB::table('engine')->get();

    $data['content'] = 'admin.master.manage_engine_specification';
    return view('layouts.content', compact('data'))->with(['engineKey' => $engineKey ]);
  }

  public function add_engine_key(Request $request)
  {
      $data = array(
      'engine_key_name' => $request->engine_key_name, 
      'status' => $request->status, 
      'created_at' => date('Y-m-d H:i:s'),
    );  

    if($request->ids != '')
    {
      Session::flash('success','Updated Successfully..!');
      $updateData = DB::table('engine')->where('id', $request->ids)->update($data);
      return back();
    }
    else
    {
      Session::flash('success','Inserted Successfully..!');
      $insertData = DB::table('engine')->insert($data);
      return back();
    }
  }

  public function engine_key_edit($id)
  {
    $data = DB::table('engine')->where('id', $id)->first();
    return Response::json($data);
  }

  public function engine_key_delete($id)
  {
    $data = DB::table('engine')->where('id', $id)->delete();
    Session::flash('error', 'Engine Key delete Successfully.!');
    return back();
  }
/* Engine specification method End */

/* chasis specification method start */
  public function chasis_key_view()
  {
    $chasisKey = DB::table('chasis')->get();

    $data['content'] = 'admin.master.manage_chasis_specification';
    return view('layouts.content', compact('data'))->with(['chasisKey' => $chasisKey ]);
  }

  public function add_chasis_key(Request $request)
  {
      $data = array(
      'chasis_key_name' => $request->chasis_key_name, 
      'status' => $request->status, 
      'created_at' => date('Y-m-d H:i:s'),
    );  

    if($request->ids != '')
    {
      Session::flash('success','Updated Successfully..!');
      $updateData = DB::table('chasis')->where('id', $request->ids)->update($data);
      return back();
    }
    else
    {
      Session::flash('success','Inserted Successfully..!');
      $insertData = DB::table('chasis')->insert($data);
      return back();
    }
  }

  public function chasis_key_edit($id)
  {
    $data = DB::table('chasis')->where('id', $id)->first();
    return Response::json($data);
  }

  public function chasis_key_delete($id)
  {
    $data = DB::table('chasis')->where('id', $id)->delete();
    Session::flash('error', 'Chasis Key delete Successfully.!');
    return back();
  }
/* Chasis specification method End */

/* Super Confortable method start */
  public function supe_confort_key_view()
  {
    $superconfortKey = DB::table('super_comfortable')->get();

    $data['content'] = 'admin.master.manage_super_confortable';
    return view('layouts.content', compact('data'))->with(['superconfortKey' => $superconfortKey ]);
  }

  public function add_supe_confort_key(Request $request)
  {
      $data = array(
      'main_specification' => $request->main_specification, 
      'status' => $request->status, 
      'created_at' => date('Y-m-d H:i:s'),
    ); 

    if($request->ids != '')
    {
      Session::flash('success','Updated Successfully..!');
      $updateData = DB::table('super_comfortable')->where('id', $request->ids)->update($data);
      return back();
    }
    else
    {
      Session::flash('success','Inserted Successfully..!');
      $insertData = DB::table('super_comfortable')->insert($data);
      return back();
    }
  }

  public function supe_confort_edit($id)
  {
    $data = DB::table('super_comfortable')->where('id', $id)->first();
    return Response::json($data);
  }

  public function supe_confort_delete($id)
  {
    $data = DB::table('super_comfortable')->where('id', $id)->delete();
    Session::flash('error', 'Super Confortable Key delete Successfully.!');
    return back();
  }
/* Super Conftable specification method End */

/* Super Confortable method start */
  public function mlt_secuarity_key_view()
  {
    $multisecuarityKey = DB::table('multidimensional_security')->get();

    $data['content'] = 'admin.master.manage_mlt_secuarity';
    return view('layouts.content', compact('data'))->with(['multisecuarityKey' => $multisecuarityKey ]);
  }

  public function add_mlt_secuarity_key(Request $request)
  {
      $data = array(
      'main_specification' => $request->main_specification, 
      'status' => $request->status, 
      'created_at' => date('Y-m-d H:i:s'),
    ); 

    if($request->ids != '')
    {
      Session::flash('success','Updated Successfully..!');
      $updateData = DB::table('multidimensional_security')->where('id', $request->ids)->update($data);
      return back();
    }
    else
    {
      Session::flash('success','Inserted Successfully..!');
      $insertData = DB::table('multidimensional_security')->insert($data);
      return back();
    }
  }

  public function mlt_secuarity_edit($id)
  {
    $data = DB::table('multidimensional_security')->where('id', $id)->first();
    return Response::json($data);
  }

  public function mlt_secuarity_delete($id)
  {
    $data = DB::table('multidimensional_security')->where('id', $id)->delete();
    Session::flash('error', 'Multidimensional Security Key delete Successfully.!');
    return back();
  }
/* Super Conftable specification method End */

/* Super Confortable method start */
  public function entertainment_view()
  {
    $entertainmentKey = DB::table('entertainment')->get();

    $data['content'] = 'admin.master.manage_entertainment';
    return view('layouts.content', compact('data'))->with(['entertainmentKey' => $entertainmentKey ]);
  }

  public function add_entertainment_key(Request $request)
  {
      $data = array(
      'main_specification' => $request->main_specification, 
      'status' => $request->status, 
      'created_at' => date('Y-m-d H:i:s'),
    ); 

    if($request->ids != '')
    {
      Session::flash('success','Updated Successfully..!');
      $updateData = DB::table('entertainment')->where('id', $request->ids)->update($data);
      return back();
    }
    else
    {
      Session::flash('success','Inserted Successfully..!');
      $insertData = DB::table('entertainment')->insert($data);
      return back();
    }
  }

  public function entertainment_edit($id)
  {
    $data = DB::table('entertainment')->where('id', $id)->first();
    return Response::json($data);
  }

  public function entertainment_delete($id)
  {
    $data = DB::table('entertainment')->where('id', $id)->delete();
    Session::flash('error', 'Entertainment Key delete Successfully.!');
    return back();
  }
/* Super Conftable specification method End */

/* City method Start */
  public function city_view()
  {
      $city = DB::table('city')->get();

      $data['content'] = 'admin.city.manage_city';
      return view('layouts.content', compact('data'))->with(['city' => $city]);
  }

  public function add_city(Request $request)
  {
      if($files = $request->image)
      {
          $destinationPath = public_path('/city_image/');
          $profileImage = date('YmdHis') . "-" . $files->getClientOriginalName();
          $path =  $files->move($destinationPath, $profileImage);
          $image = $insert['photo'] = "$profileImage";
      }

      $data = array(
        'city_name' => $request->city_name, 
        'image' => $image ?? '', 
      );  
     

    if($request->ids != '')
    {
      Session::flash('success','Updated Successfully..!');
      $updateData = DB::table('city')->where('id', $request->ids)->update($data);
      return back();
    }
    else
    {
      Session::flash('success','Inserted Successfully..!');
      $insertData = DB::table('city')->insert($data);
      return back();
    }
  }
  public function city_delete($id)
  {
    $data = DB::table('city')->where('id', $id)->delete();
    Session::flash('error', 'City delete Successfully.!');
    return back();
  }
/* City method End */
}
