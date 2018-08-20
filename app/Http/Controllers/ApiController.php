<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use URL;
use Mail;
use Session;
use Sentinel;
use Validator;
use App\Models\UserModel;


class ApiController extends Controller
{
    public $arr_view_data;
    public $admin_panel_slug;

    public function __construct(UserModel $user_model)
    {
      $this->UserModel          = $user_model;
      $this->arr_view_data      = [];
    }

    public function register(Request $request)
    {
      $validator = Validator::make($request->all(), [
            'user_name'       => 'required',
            'mobile'         => 'required',
            'email'          => 'required',
            'city'           => 'required',
            'education'      => 'required',
            'profession'     => 'required',
            'brandname'      => 'required',
            'city1'           => 'required',
            'password'       => 'required',
        ]);

    /*  if ($validator->fails()) 
      {
            $arr = [];
            $arr['status']  = 'Error'; 
            $arr['message'] = "Validation Error!"; 
            $arr['data']    = []; 
          return $arr;
      }
      */
      $count = \DB::table('users')->where('email','=',$request->input('email'))->count();
      if($count>0)
      {
            $arr['status'] = 'error'; 
            $arr['message'] = "Email already exist!"; 
            $arr['details'] = []; 
            return json_encode($arr);
      }
      $count1 = \DB::table('users')->where('mobile','=',$request->input('mobile'))->count();
      if($count1>0)
      {
            $arr['status'] = 'error'; 
            $arr['message'] = "Mobile no. already exist!"; 
            $arr['details'] = []; 
            return json_encode($arr);
      }

      $arr_data               = [];
      $arr_data['user_name']  = $request->input('user_name');
      $arr_data['mobile']     = $request->input('mobile');
      $arr_data['email']      = $request->input('email');
      $arr_data['city']       = $request->input('city');
      $arr_data['education']  = $request->input('education');
      $arr_data['adharno']  = $request->input('adharno');
      $arr_data['profession'] = $request->input('profession');
      $arr_data['brandname']  = $request->input('brandname');
      $arr_data['dream']       = $request->input('dream');
      $arr_data['dob']       = $request->input('dob');
       $arr_data['parent_id']       = $request->input('parent_id');
      $arr_data['password']   = $request->input('password');
      $arr_data['anniversary_date']   = $request->input('anniversary_date');
      
      $user_status            = Sentinel::registerAndActivate($arr_data);

      if(isset($user_status->id) && !empty($user_status->id))
      {
        $arr_user_data               = [];
        $arr_user_data['user_name']   = $request->input('user_name');
        $arr_user_data['mobile']     = $request->input('mobile');
        $arr_user_data['email']      = $request->input('email');
        $arr_user_data['city']       = $request->input('city');
        $arr_user_data['education']  = $request->input('education');
        $arr_user_data['profession'] = $request->input('profession');
        $arr_user_data['brandname']  = $request->input('brandname');
        $arr_user_data['dream']       = $request->input('dream');
        $arr_user_data['adharno']       = $request->input('adharno');
        $arr_user_data['dob']       = $request->input('dob');
         $arr_user_data['parent_id']       = $request->input('parent_id');
         $arr_user_data['anniversary_date']       = $request->input('anniversary_date');
        $arr_user_data['password']   = password_hash($request->input('password'), PASSWORD_DEFAULT);

        $status = $this->UserModel->where(['id'=>$user_status->id])->update($arr_user_data);
      }

        if($status)
        {
            $arr['status'] = 'success'; 
            $arr['message'] = "User Registred successfully"; 
            $arr['details'] = []; 
        }
        else
        {
            $arr['status'] = 'error'; 
            $arr['message'] = "Something went wrong! Please try again"; 
            $arr['details'] = []; 
        }
      
  
      return json_encode($arr);
    }

   public function user_list()
    {
      $pagination = $data               = \DB::table('users')->paginate(10);
     
      $arr                = $temp = [];
      foreach ($data as $key => $value) 
      {
        $temp[$key]['user_name']  = $value->user_name;
        $temp[$key]['mobile']     = $value->mobile;
        $temp[$key]['email']      = $value->email;
        $temp[$key]['city']       = $value->city;
        $temp[$key]['education']  = $value->education;
        $temp[$key]['profession'] = $value->profession;
        $temp[$key]['brandname']  = $value->brandname;
        $temp[$key]['city1']       = $value->city;
      }
      
      $arr['status']  = 'success';
      $arr['message'] = "User Data";
      $arr['data']    = $temp;
      $arr['pagination']    = $pagination;
      return json_encode($arr);
    }
    
    
    
    
    public function news()
    {
      $pagination = $data               = \DB::table('news')->paginate(10);
     
      $arr                = $temp = [];
      foreach ($data as $key => $value) 
      {
        $temp[$key]['title']  = $value->title;
        $temp[$key]['city']     = $value->city;
        $temp[$key]['description']      = $value->description;
        $temp[$key]['date']       = $value->date;
        $temp[$key]['image']  = $value->image;
      }
      
      $arr['status']  = 'success';
      $arr['message'] = "News Data";
      $arr['data']    = $temp;
      $arr['pagination']    = $pagination;
      return json_encode($arr);
    }
    
    
    public function event()
    {
      $pagination = $data               = \DB::table('event')->paginate(10);
     
      $arr                = $temp = [];
      foreach ($data as $key => $value) 
      {
        $temp[$key]['title']  = $value->title;
        $temp[$key]['city']     = $value->city;
        $temp[$key]['description']      = $value->description;
        $temp[$key]['date']       = $value->date;
        $temp[$key]['image']  = $value->image;
      }
      
      $arr['status']  = 'success';
      $arr['message'] = "News Data";
      $arr['data']    = $temp;
      $arr['pagination']    = $pagination;
      return json_encode($arr);
    }

    public function edit(Request $request)
    {
        $email      = $request->input('email');
      $data = \DB::table('users')->where(['email'=>$email])->first();
      $arr = $temp = [];
      $temp['user_name']  = $data->user_name;
      $temp['mobile']     = $data->mobile;
      $temp['email']      = $data->email;
      $temp['city']       = $data->city;
      $temp['education']  = $data->education;
      $temp['profession'] = $data->profession;
      $temp['brandname']  = $data->brandname;
      $temp['profile_image'] = $data->profile_image;
    
      
      $arr['status'] = 'success'; 
      $arr['message'] = "User Data"; 
      $arr['data']     = $temp;
      return json_encode($arr);
    }
    
    
     public function child_count(Request $request)
    {
        $email      = $request->input('email');
     
      $count= \DB::table('users')->where(['parent_id'=>$email])->count();
      $arr = $temp = [];
      $temp['count']  = $count;
     
    
      
      $arr['status'] = 'success'; 
      $arr['message'] = "User Data"; 
      $arr['data']     = $temp;
      return json_encode($arr);
    }
    
    
     public function getpersonaldetail(Request $request)
    {
        $email      = $request->input('email');
      $data = \DB::table('users')->where(['email'=>$email])->first();
      $arr = $temp = [];
     
      $temp['dob']     = $data->dob;
      $temp['distributo_id']      = $data->distributo_id;
      $temp['co_distributor_tilte']       = $data->co_distributor_tilte;
      $temp['co_distributor_name']  = $data->co_distributor_name;
      $temp['co_distributor_dob'] = $data->co_distributor_dob;
      $temp['upline']  = $data->upline;
      $temp['designation']       = $data->designation;
      $temp['user_name']       = $data->user_name;
       $temp['anniversary_date']       = $data->anniversary_date;
      
      $arr['status'] = 'success';
      $arr['message'] = "User Data";
      $arr['data']     = $temp;
      return json_encode($arr);
    }
    
    
    
    
    
     public function getcontactdetail(Request $request)
    {
        $email      = $request->input('email');
      $data = \DB::table('users')->where(['email'=>$email])->first();
      $arr = $temp = [];
      $temp['email']  = $data->email;
      $temp['mobile']     = $data->mobile;
      $temp['address']      = $data->address;
      $temp['city']       = $data->city;
      $temp['country']  = $data->country;
      $temp['pincode'] = $data->pincode;
      
      $arr['status'] = 'success'; 
      $arr['message'] = "User Data"; 
      $arr['data']     = $temp;
      return json_encode($arr);
    }
    
    
      public function getbankdetail(Request $request)
    {
        $email      = $request->input('email');
      $data = \DB::table('users')->where(['email'=>$email])->first();
      $arr = $temp = [];
      $temp['pannumber']  = $data->pannumber;
      $temp['panimage']     = $data->panimage;
      $temp['ifsccode']      = $data->ifsccode;
      $temp['bankname']       = $data->bankname;
      $temp['branchname']  = $data->branchname;
      $temp['accountnum'] = $data->accountnum;
      $temp['adharimage'] = $data->adharimage;
      $temp['adharno'] = $data->adharno;
      
      $arr['status'] = 'success'; 
      $arr['message'] = "User Data"; 
      $arr['data']     = $temp;
      return json_encode($arr);
    }
    
    
    
      public function getuserstatus(Request $request)
    {
        $email      = $request->input('email');
      $data = \DB::table('users')->where(['email'=>$email])->first();
      $arr = $temp = [];
      $temp['active_status']  = $data->active_status;
      
      $arr['status'] = 'success'; 
      $arr['message'] = "User Data"; 
      $arr['data']     = $temp;
      return json_encode($arr);
    }
    
    
    
     public function singlenews(Request $request)
    {
        $id      = $request->input('id');
      $data = \DB::table('news')->where(['id'=>$id])->first();
      $arr = $temp = [];
      
      
       $temp['title']  = $data->title;
        $temp['city']     = $data->city;
        $temp['description']      = $data->description;
        $temp['date']       = $data->date;
        $temp['image']  = $data->image;
      
      $arr['status'] = 'success'; 
      $arr['message'] = "User Data"; 
      $arr['data']     = $temp;
      return json_encode($arr);
    }
    
    public function singleevent(Request $request)
    {
        $id      = $request->input('id');
      $data = \DB::table('event')->where(['id'=>$id])->first();
      $arr = $temp = [];
      
      
       $temp['title']  = $data->title;
        $temp['city']     = $data->city;
        $temp['description']      = $data->description;
        $temp['date']       = $data->date;
        $temp['image']  = $data->image;
      
      $arr['status'] = 'success'; 
      $arr['message'] = "User Data"; 
      $arr['data']     = $temp;
      return json_encode($arr);
    }

    public function edit_store($email,Request $request)
    {
      $validator = Validator::make($request->all(), [
            'user_name'       => 'required',
            'mobile'         => 'required',
            'email'          => 'required',
            'city'           => 'required',
            'education'      => 'required',
            'profession'     => 'required',
            'brandname'      => 'required',
            'city1'           => 'required',
            'password'       => 'required',
        ]);

        $arr_user_data               = [];
        $arr_user_data['user_name']   = $request->input('user_name');
        $arr_user_data['mobile']     = $request->input('mobile');
        $arr_user_data['email']      = $request->input('email');
        $arr_user_data['city']       = $request->input('city');
        $arr_user_data['education']  = $request->input('education');
        $arr_user_data['profession'] = $request->input('profession');
        $arr_user_data['brandname']  = $request->input('brandname');
        $arr_user_data['city']       = $request->input('city');
         $arr_user_data['password']   = password_hash($request->input('password'), PASSWORD_DEFAULT);

      $this->UserModel->where(['email'=>$email])->update($arr_user_data);
      
      $arr['status'] = 'success'; 
      $arr['message'] = "User Update successfully"; 
      $arr['details'] = []; 
  
      return json_encode($arr);
    }
    
    
    public function edit_personal($email,Request $request)
    {
     /* $validator = Validator::make($request->all(), [
            'user_name'       => 'required',
            'mobile'         => 'required',
            'email'          => 'required',
            'city'           => 'required',
            'education'      => 'required',
            'profession'     => 'required',
            'brandname'      => 'required',
            'city1'           => 'required',
            'password'       => 'required',
        ]);*/

        $arr_user_data               = [];
        $arr_user_data['lastname']   = $request->input('lastname');
        $arr_user_data['dob']     = $request->input('dob');
        $arr_user_data['co_distributor_tilte']      = $request->input('co_distributor_tilte');
        $arr_user_data['co_distributor_name']       = $request->input('co_distributor_name');
        $arr_user_data['co_distributor_dob']  = $request->input('co_distributor_dob');
        $arr_user_data['upline'] = $request->input('upline');
        $arr_user_data['designation']  = $request->input('designation');
         $arr_user_data['firstname']  = $request->input('firstname');
         $arr_user_data['anniversary_date']  = $request->input('anniversary_date');
       /* $arr_user_data['city']       = $request->input('city');
         $arr_user_data['password']   = password_hash($request->input('password'), PASSWORD_DEFAULT);*/

      $this->UserModel->where(['email'=>$email])->update($arr_user_data);
      
      $arr['status'] = 'success'; 
      $arr['message'] = "Details Update successfully"; 
      $arr['details'] = []; 
  
      return json_encode($arr);
    }
    
    public function edit_bank($email,Request $request)
    {
     /* $validator = Validator::make($request->all(), [
            'user_name'       => 'required',
            'mobile'         => 'required',
            'email'          => 'required',
            'city'           => 'required',
            'education'      => 'required',
            'profession'     => 'required',
            'brandname'      => 'required',
            'city1'           => 'required',
            'password'       => 'required',
        ]);*/

        $arr_user_data               = [];
        $arr_user_data['pannumber']   = $request->input('pannumber');
        $arr_user_data['ifsccode']     = $request->input('ifsccode');
        $arr_user_data['bankname']      = $request->input('bankname');
        $arr_user_data['branchname']       = $request->input('branchname');
        $arr_user_data['accountnum']  = $request->input('accountnum');
        $arr_user_data['adharno']  = $request->input('adharno');
       /* $arr_user_data['profession'] = $request->input('profession');
        $arr_user_data['brandname']  = $request->input('brandname');
        $arr_user_data['city']       = $request->input('city');
         $arr_user_data['password']   = password_hash($request->input('password'), PASSWORD_DEFAULT);*/

      $this->UserModel->where(['email'=>$email])->update($arr_user_data);
      
      $arr['status'] = 'success'; 
      $arr['message'] = "Details Update successfully"; 
      $arr['details'] = []; 
  
      return json_encode($arr);
    }
    
     
    public function edit_contact($email,Request $request)
    {
     /* $validator = Validator::make($request->all(), [
            'user_name'       => 'required',
            'mobile'         => 'required',
            'email'          => 'required',
            'city'           => 'required',
            'education'      => 'required',
            'profession'     => 'required',
            'brandname'      => 'required',
            'city1'           => 'required',
            'password'       => 'required',
        ]);*/

        $arr_user_data               = [];
        $arr_user_data['mobile']   = $request->input('mobile');
        $arr_user_data['city']     = $request->input('city');
        $arr_user_data['address']      = $request->input('address');
        $arr_user_data['country']       = $request->input('country');
        $arr_user_data['pincode']  = $request->input('pincode');
        /*$arr_user_data['profession'] = $request->input('profession');
        $arr_user_data['brandname']  = $request->input('brandname');
        $arr_user_data['city']       = $request->input('city');
         $arr_user_data['password']   = password_hash($request->input('password'), PASSWORD_DEFAULT);*/

      $this->UserModel->where(['email'=>$email])->update($arr_user_data);
      
      $arr['status'] = 'success'; 
      $arr['message'] = "Details Update successfully"; 
      $arr['details'] = []; 
  
      return json_encode($arr);
    }
    
    
    public function payment_store($id,Request $request)
    {
      $validator = Validator::make($request->all(), [
            'status'       => 'required',
            'orderid'         => 'required',
            'txnid'          => 'required',
            'payment'          => 'required',
            'token'           => 'required',
            'responce'      => 'required',
        ]);

        $arr_user_data               = [];
        $arr_user_data['status']   = $request->input('status');
        $arr_user_data['orderid']     = $request->input('orderid');
        $arr_user_data['txnid']      = $request->input('txnid');
        $arr_user_data['payment']       = $request->input('payment');
        $arr_user_data['token']  = $request->input('token');
        $arr_user_data['responce'] = $request->input('responce');
      
      $status = DB::table('transaction')->insert($arr_user_data);
      
      $arr['status'] = 'success'; 
      $arr['message'] = "Payment data update successfully"; 
      $arr['details'] = []; 
  
      return json_encode($arr);
    }

    public function delete($id)
    {
      $data          = \DB::table('users')->where(['id'=>$id])->delete();
      $temp           = [];
      $arr['status']  = 'success';
      $arr['message'] = "User deleted successfully";
      $arr['data']    = $temp;
      return json_encode($arr);
    }

    public function payment($id)
    {
      $data          = \DB::table('users')->where(['id'=>$id])->delete();
      $temp           = [];
      $arr['status']  = 'error';
      $arr['message'] = "User deleted successfully";
      $arr['data']    = $temp;
      return json_encode($arr);
    }
    
    public function login(Request $request)
    {
        $arr   = [];
        $validator = Validator::make($request->all(), [
            'email'  => 'required|max:255',
            'password'  => 'required',
        ]);

        if ($validator->fails()) 
        {
          $arr['status']  = 'error';
          $arr['message'] = "Validation Error!";
          return json_encode($arr);
        }
        
        $credentials = [
            'email'    => $request->input('email'),
            'password' =>$request->input('password'), PASSWORD_DEFAULT,
        ];

        $check_authentication = Sentinel::authenticate($credentials);

        if($check_authentication)
        {
          $arr['status'] = 'success'; 
          $arr['message'] = "Login successfully"; 
          //$arr['data']     = $check_authentication;
          return json_encode($arr);
        }
        else
        {
          $arr['status']  = 'error';
          $arr['message'] = "Invalid Login Credentials.";
          return json_encode($arr);
        } 
    }
    
    
    
    public function pan_image_upload(Request $request)
    {
      
      if ($request->hasFile('panimage')) 
      {
        $file = $request->file('panimage');
        $name = time().rand(11111, 99999).'.'.$file->getClientOriginalExtension();
        $upload_status = $request->file('panimage')->move(public_path('bank'), $name);

        $arr_user_data                   = [];
    
        $arr_user_data['panimage']      = $name;
       
      
      $this->UserModel->where(['email' =>$request->input('email')])->update($arr_user_data);
      
       $arr['status'] = 'success'; 
      $arr['message'] = "Image Uploaded Success"; 
      $arr['details'] = []; 
      }
      else
      {
         $arr['status'] = 'error'; 
        $arr['message'] = "Image not uploded"; 
        $arr['details'] = []; 
      }
  
      return json_encode($arr);
    }
    
    
     public function profile_image_upload(Request $request)
    {
      
      if ($request->hasFile('profile_image')) 
      {
        $file = $request->file('profile_image');
        $name = time().rand(11111, 99999).'.'.$file->getClientOriginalExtension();
        $upload_status = $request->file('profile_image')->move(public_path('profile'), $name);

        $arr_user_data                   = [];
    
        $arr_user_data['profile_image']      = $name;
       
      
      $this->UserModel->where(['email' =>$request->input('email')])->update($arr_user_data);
      
       $arr['status'] = 'success'; 
      $arr['message'] = "Image Uploaded Success"; 
      $arr['details'] = []; 
      }
      else
      {
         $arr['status'] = 'error'; 
        $arr['message'] = "Image not uploded"; 
        $arr['details'] = []; 
      }
  
      return json_encode($arr);
    }
    
    
    public function adhar_image_upload(Request $request)
    {
      
      if ($request->hasFile('adharimage')) 
      {
        $file = $request->file('adharimage');
        $name = time().rand(11111, 99999).'.'.$file->getClientOriginalExtension();
        $upload_status = $request->file('adharimage')->move(public_path('bank'), $name);

        $arr_user_data                   = [];
    
        $arr_user_data['adharimage']      = $name;
       
      
      $this->UserModel->where(['email' =>$request->input('email')])->update($arr_user_data);
      
       $arr['status'] = 'success'; 
      $arr['message'] = "Image Uploaded Success"; 
      $arr['details'] = []; 
      }
      else
      {
         $arr['status'] = 'error'; 
        $arr['message'] = "Image not uploded"; 
        $arr['details'] = []; 
      }
  
      return json_encode($arr);
    }
    
     public function video_upload(Request $request)
    {
      
      if ($request->hasFile('video')) 
      {
        $file = $request->file('video');
        $name = time().rand(11111, 99999).'.'.$file->getClientOriginalExtension();
        $upload_status = $request->file('video')->move(public_path('video'), $name);

        $arr_user_data                   = [];
    
        $arr_user_data['video']      = $name;
        $arr_user_data['eventid']   =   $request->input('eventid');
       
       $status = \DB::table('video')->insert($arr_user_data);
      
      
      $arr['status'] = 'success'; 
      $arr['message'] = "Image Uploaded Success"; 
      $arr['details'] = [];
      }
      else
      {
         
         $arr['status'] = 'error'; 
        $arr['message'] = "Upload Video Less than two MB"; 
        $arr['details'] = []; 
      }
  
      return json_encode($arr);
    }
    
}
