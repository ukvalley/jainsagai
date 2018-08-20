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
use App\Models\EventModel;
use App\Models\EmailTemplateModel;

class EventController extends Controller
{
    public $arr_view_data;
    public $admin_panel_slug;

    public function __construct(UserModel $user_model,
                                TransactionModel $TransactionModel,
                                EventModel $EventModel,
                                EmailTemplateModel $email_template_model)
    {
      $this->UserModel          = $user_model;
      $this->TransactionModel   = $TransactionModel;
      $this->EventModel          = $EventModel;
      $this->EmailTemplateModel = $email_template_model;
      $this->arr_view_data      = [];
      $this->admin_panel_slug   = config('app.project.admin_panel_slug');
      $this->module             = 'Event';

    }

    public function index()
    {
      $this->arr_view_data['admin_panel_slug'] = $this->admin_panel_slug;
      $this->arr_view_data['page_title'] = $this->module;
      
    	return view('admin.event.index',$this->arr_view_data);
    }

    public function event_update(Request $request)
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
          return redirect(config('app.project.admin_panel_slug').'/add_event')
                      ->withErrors($validator)
                      ->withInput($request->all());
      }
      
      if ($request->hasFile('file')) 
      {
          $file = $request->file('file');
          $name = time().rand(11111, 99999).'.'.$file->getClientOriginalExtension();
          $upload_status = $request->file('file')->move(public_path('news'), $name);

          $EventModel              = new EventModel;
          $EventModel->title       = $request->input('title');
          $EventModel->city        = $request->input('city');
          $EventModel->description = $request->input('description');
          $EventModel->date        = $request->input('date');
          $EventModel->image       = $name;
          $EventModel->save();
          Session::flash('success', $this->module.' created successfully');
      }
      else
      {
        Session::flash('error', 'Please upload image.');
      }
      
      return redirect('add_event');
    }

    public function manage_event()
    {
      $arr_data = [];
      $data = $this->EventModel->get();
      if(!empty($data))
      {
        $arr_data = $data->toArray();
      }
      $this->arr_view_data['data'] = $arr_data;
      $this->arr_view_data['admin_panel_slug'] = $this->admin_panel_slug;
      $this->arr_view_data['page_title'] = $this->module;
      
      return view('admin.event.manage_list',$this->arr_view_data);
    }

    public function edit($id)
    {
      $data = $this->EventModel->where(['id'=>$id])->first();

      $this->arr_view_data['data'] = $data;
      $this->arr_view_data['admin_panel_slug'] = $this->admin_panel_slug;
      $this->arr_view_data['page_title'] = $this->module;
      
      return view('admin.event.edit',$this->arr_view_data);
    }

    public function event_edit($id,Request $request)
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

          $EventModel                = [];
          $EventModel['title']       = $request->input('title');
          $EventModel['city']        = $request->input('city');
          $EventModel['description'] = $request->input('description');
          $EventModel['date']        = $request->input('date');
          $EventModel['image']       = $name;

          $this->EventModel->where(['id'=>$id])->update($EventModel);
          Session::flash('success', $this->module.' created successfully');
      }
      else
      {
          $EventModel                = [];
          $EventModel['title']       = $request->input('title');
          $EventModel['city']        = $request->input('city');
          $EventModel['description'] = $request->input('description');
          $EventModel['date']        = $request->input('date');

          $this->EventModel->where(['id'=>$id])->update($EventModel);
          Session::flash('success', $this->module.' updated successfully');
      }
      
      return redirect('/edit_event/'.$id);
    }

    public function view($id)
    {
      $data = $this->EventModel->where(['id'=>$id])->first();

      $this->arr_view_data['data'] = $data;
      $this->arr_view_data['admin_panel_slug'] = $this->admin_panel_slug;
      $this->arr_view_data['page_title'] = $this->module;
      
      return view('admin.news.view',$this->arr_view_data);
    }

    public function delete($id)
    {
      if(!empty($id))
      {
        $this->EventModel->where('id',$id)->delete();;
        Session::flash('success', 'Record deleted successfully');
      }
      else
      {
        
        Session::flash('error', 'Something went wrong! Please try again.');
      }
      return redirect()->back();
    }
}
