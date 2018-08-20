<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use URL;
use Mail;
use Session;
use Sentinel;
use Validator;
use App\Models\UserModel;
use App\Models\TransactionModel;
use App\Models\NewsModel;
use App\Models\EmailTemplateModel;

class NewsController extends Controller
{
    public $arr_view_data;
    public $admin_panel_slug;

    public function __construct(UserModel $user_model,
                                TransactionModel $TransactionModel,
                                NewsModel $NewsModel,
                                EmailTemplateModel $email_template_model)
    {
      $this->UserModel          = $user_model;
      $this->TransactionModel   = $TransactionModel;
      $this->NewsModel          = $NewsModel;
      $this->EmailTemplateModel = $email_template_model;
      $this->arr_view_data      = [];
      $this->admin_panel_slug   = config('app.project.admin_panel_slug');
      $this->module             = 'News';

    }

    public function index()
    {
      $this->arr_view_data['admin_panel_slug'] = $this->admin_panel_slug;
      $this->arr_view_data['page_title'] = $this->module;
      
    	return view('admin.news.index',$this->arr_view_data);
    }
    
    public function manage_user()
    {
      $this->arr_view_data['data'] = \DB::table('users')->get();
      $this->arr_view_data['admin_panel_slug'] = $this->admin_panel_slug;
      $this->arr_view_data['page_title'] = $this->module;
      
    	return view('admin.news.manage_user',$this->arr_view_data);
    }
    
    public function user_status($id)
    {
      
        $status = \DB::table('users')->select('active_status')->where(['id'=>$id])->first();
        //dd($status->active_status);
        if($status->active_status)
        {
             $status = \DB::table('users')->where(['id'=>$id])->update(['active_status'=>0]);
        }
        else
        {
            $status = \DB::table('users')->where(['id'=>$id])->update(['active_status'=>1]);
        }
        return Redirect()->back();
    }

    public function news_update(Request $request)
    {
      $validator = Validator::make($request->all(), [
            'file'             => 'required',
            'title'            => 'required',
            'city'             => 'required',
            'date'             => 'required',
            'description'      => 'required',
        ]);

      if ($validator->fails()) 
      {
          return redirect(config('app.project.admin_panel_slug').'/add_news')
                      ->withErrors($validator)
                      ->withInput($request->all());
      }
      
      if ($request->hasFile('file')) 
      {
          $file = $request->file('file');
          $name = time().rand(11111, 99999).'.'.$file->getClientOriginalExtension();
          $upload_status = $request->file('file')->move(public_path('news'), $name);

          $NewsModel              = new NewsModel;
          $NewsModel->title       = $request->input('title');
          $NewsModel->city        = $request->input('city');
          $NewsModel->description = $request->input('description');
          $NewsModel->date        = $request->input('date');
          $NewsModel->image       = $name;
          $NewsModel->save();
          Session::flash('success', $this->module.' created successfully');
      }
      else
      {
        Session::flash('error', 'Please upload image.');
      }
      
      return redirect('admin/news');
    }

    public function manage_news()
    {
      $arr_data = [];
      $data = $this->NewsModel->get();
      if(!empty($data))
      {
        $arr_data = $data->toArray();
      }
      $this->arr_view_data['data'] = $arr_data;
      $this->arr_view_data['admin_panel_slug'] = $this->admin_panel_slug;
      $this->arr_view_data['page_title'] = $this->module;
      
      return view('admin.news.manage_list',$this->arr_view_data);
    }

    public function edit($id)
    {
      $data = $this->NewsModel->where(['id'=>$id])->first();

      $this->arr_view_data['data'] = $data;
      $this->arr_view_data['admin_panel_slug'] = $this->admin_panel_slug;
      $this->arr_view_data['page_title'] = $this->module;
      
      return view('admin.news.edit',$this->arr_view_data);
    }

    public function news_edit($id,Request $request)
    {
      $validator = Validator::make($request->all(), [
            'title'            => 'required',
            'city'             => 'required',
            'date'             => 'required',
            'description'      => 'required',
        ]);

      if ($validator->fails()) 
      {
          return redirect(config('app.project.admin_panel_slug').'/edit/'.$id)
                      ->withErrors($validator)
                      ->withInput($request->all());
      }
      
      if ($request->hasFile('file')) 
      {
          $file = $request->file('file');
          $name = time().rand(11111, 99999).'.'.$file->getClientOriginalExtension();
          $upload_status = $request->file('file')->move(public_path('news'), $name);

          $NewsModel                = [];
          $NewsModel['title']       = $request->input('title');
          $NewsModel['city']        = $request->input('city');
          $NewsModel['description'] = $request->input('description');
          $NewsModel['date']        = $request->input('date');
          $NewsModel['image']       = $name;

          $this->NewsModel->where(['id'=>$id])->update($NewsModel);
          Session::flash('success', $this->module.' created successfully');
      }
      else
      {
          $NewsModel                = [];
          $NewsModel['title']       = $request->input('title');
          $NewsModel['city']        = $request->input('city');
          $NewsModel['description'] = $request->input('description');
          $NewsModel['date']        = $request->input('date');

          $this->NewsModel->where(['id'=>$id])->update($NewsModel);
          Session::flash('success', $this->module.' updated successfully');
      }
      
      return redirect('/edit_news/'.$id);
    }

    public function view($id)
    {
      $data = $this->NewsModel->where(['id'=>$id])->first();

      $this->arr_view_data['data'] = $data;
      $this->arr_view_data['admin_panel_slug'] = $this->admin_panel_slug;
      $this->arr_view_data['page_title'] = $this->module;
      
      return view('admin.news.view',$this->arr_view_data);
    }

    public function delete($id)
    {
      if(!empty($id))
      {
        $this->NewsModel->where('id',$id)->delete();;
        Session::flash('success', 'Record deleted successfully');
      }
      else
      {
        
        Session::flash('error', 'Something went wrong! Please try again.');
      }
      return redirect()->back();
    }
}
