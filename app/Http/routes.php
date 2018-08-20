<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware'=>['api']],function()
{
	/*------------------------------------------------------------------------------------------
										Api Route starts Here
	-------------------------------------------------------------------------------------------*/

	Route::post('/register',						['as'=>'register',	    'uses'=>'ApiController@register']);
	
	Route::post('/login',							['as'=>'login',		    'uses'=>'ApiController@login']);

	Route::get('/user_list',						['as'=>'user_list',		'uses'=>'ApiController@user_list']);

	Route::get('/edit',						['as'=>'edit',			'uses'=>'ApiController@edit']);

	Route::get('/edit_store/{id}',					['as'=>'edit_store',	'uses'=>'ApiController@edit_store']);

	Route::get('/delete/{id}',						['as'=>'delete',		'uses'=>'ApiController@delete']);
	
	Route::post('/news_store',						['as'=>'news_store',    'uses'=>'ApiController@news_store']);
	
	Route::get('/news',				                ['as'=>'news',          'uses'=>'ApiController@news']);
	
	Route::get('/singlenews',				        ['as'=>'singlenews',          'uses'=>'ApiController@singlenews']);
	
	Route::get('/event',				                ['as'=>'event',          'uses'=>'ApiController@event']);
	
	Route::get('/singleevent',				        ['as'=>'singleevent',          'uses'=>'ApiController@singleevent']);
	
	
	Route::get('/getpersonaldetail',				['as'=>'getpersonaldetail',                 'uses'=>'ApiController@getpersonaldetail']);
	
	Route::get('/getcontactdetail',				['as'=>'getcontactdetail',                      'uses'=>'ApiController@getcontactdetail']);
	
	Route::get('/getbankdetail',				['as'=>'getbankdetail',                         'uses'=>'ApiController@getbankdetail']);
	
	Route::get('/getuserstatus',				['as'=>'getuserstatus',                         'uses'=>'ApiController@getuserstatus']);
	
	Route::get('/child_count',				['as'=>'child_count',                         'uses'=>'ApiController@child_count']);
	
	
	
	Route::get('/edit_personal/{email}',					['as'=>'edit_personal',	            'uses'=>'ApiController@edit_personal']);
	
	Route::get('/edit_contact/{email}',					['as'=>'edit_contact',	                'uses'=>'ApiController@edit_contact']);
	
	Route::get('/edit_bank/{email}',					['as'=>'edit_bank',	                    'uses'=>'ApiController@edit_bank']);
	
	
	
		Route::post('/video_upload',					['as'=>'video_upload',	            'uses'=>'ApiController@video_upload']);
	
	Route::post('/pan_image_upload',					['as'=>'pan_image_upload',	            'uses'=>'ApiController@pan_image_upload']);
	
	Route::post('/adhar_image_upload',					['as'=>'adhar_image_upload',	        'uses'=>'ApiController@adhar_image_upload']);

	Route::post('/profile_image_upload',					['as'=>'profile_image_upload',	    'uses'=>'ApiController@profile_image_upload']);
	
	Route::get('/payment_store',						    ['as'=>'payment_store',             'uses'=>'ApiController@payment_store']);
	
	//News
	Route::get('/add_news',							    	['as'=>'blog',						'uses'=>'Admin\NewsController@index']);

	Route::post('/news_update',								['as'=>'news_update',				'uses'=>'Admin\NewsController@news_update']);

	Route::post('/location_update',							['as'=>'location_update',			'uses'=>'Admin\NewsController@location_update']);
	
	Route::get('/location',									['as'=>'location',					'uses'=>'Admin\NewsController@location']);

	Route::post('/social_link_update',						['as'=>'social_link_update',		'uses'=>'Admin\NewsController@social_link_update']);
	
	Route::get('/social_link',								['as'=>'social_link',				'uses'=>'Admin\NewsController@social_link']);

	Route::get('/contact',									['as'=>'contact',					'uses'=>'Admin\NewsController@contact']);

	Route::post('/contact_update',							['as'=>'contact_update',			'uses'=>'Admin\NewsController@contact_update']);

	Route::get('/manage_news',								['as'=>'manage_news',				'uses'=>'Admin\NewsController@manage_news']);

	Route::get('/edit_news/{id}',							['as'=>'edit_news',				'uses'=>'Admin\NewsController@edit']);

	Route::post('news_edit/{id}',							['as'=>'news_edit',					'uses'=>'Admin\NewsController@news_edit']);

	Route::get('/view/{id}',								['as'=>'view',						'uses'=>'Admin\NewsController@view']);

	Route::get('/delete/{id}',								['as'=>'delete',					'uses'=>'Admin\NewsController@delete']);
	
	
	Route::get('/manage_user/',							    ['as'=>'manage_user',				'uses'=>'Admin\NewsController@manage_user']);
	
	Route::get('/user_status/{id}',							    ['as'=>'user_status',				'uses'=>'Admin\NewsController@user_status']);
		
	Route::get('/add_event',							    ['as'=>'blog',						'uses'=>'Admin\EventController@index']);

	Route::post('/event_update',							['as'=>'event_update',				'uses'=>'Admin\EventController@event_update']);
	
	Route::get('/manage_event',								['as'=>'manage_event',				'uses'=>'Admin\EventController@manage_event']);

	Route::get('/edit_event/{id}',							['as'=>'edit_event',					'uses'=>'Admin\EventController@edit']);

	Route::post('event_edit/{id}',							['as'=>'event_edit',					'uses'=>'Admin\EventController@event_edit']);

	Route::get('/viewevent/{id}',							['as'=>'view',						'uses'=>'Admin\EventController@view']);

	Route::get('/deleteevent/{id}',							['as'=>'delete',					'uses'=>'Admin\EventController@delete']);


});