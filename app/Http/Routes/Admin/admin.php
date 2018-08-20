<?php
	
	Route::get('/login',									['as'=>'login',						'uses'=>'Admin\AuthController@login']);

	Route::get('/logout',									['as'=>'logout',					'uses'=>'Admin\AuthController@logout']);
	
	Route::get('/user',										['as'=>'user',						'uses'=>'Admin\NewsController@user']);

	Route::get('/dashboard',								['as'=>'dashboard',					'uses'=>'Admin\AuthController@dashboard']);

	Route::get('/change_password',							['as'=>'change_password',			'uses'=>'Admin\SettingController@change_password']);
	
	Route::post('/process_change_pass',						['as'=>'process_change_pass',		'uses'=>'Admin\SettingController@process_change_pass']);

	Route::get('/video_gallery',							['as'=>'video_gallery',				'uses'=>'Admin\VideogalleryController@index']);

	Route::post('/video_gallery_update',					['as'=>'video_gallery_update',		'uses'=>'Admin\VideogalleryController@video_gallery_update']);

	Route::get('/manage_video_gallery',					['as'=>'manage_video_gallery',			'uses'=>'Admin\VideogalleryController@manage_video_gallery']);

	Route::get('/delete_video_gallery/{id}',				['as'=>'delete_video_gallery',		'uses'=>'Admin\VideogalleryController@delete_video_gallery']);

	Route::get('/rearrenge_video_gallery',				['as'=>'rearrenge_video_gallery',		'uses'=>'Admin\VideogalleryController@rearrenge_video_gallery']);

	Route::get('/gallery',									['as'=>'gallery',					'uses'=>'Admin\GalleryController@index']);

	Route::post('/gallery_update',							['as'=>'gallery_update',			'uses'=>'Admin\GalleryController@gallery_update']);

	Route::get('/manage_gallery',							['as'=>'manage_gallery',			'uses'=>'Admin\GalleryController@manage_gallery']);

	Route::get('/delete_manage_gallery/{id}',				['as'=>'delete_manage_gallery',		'uses'=>'Admin\GalleryController@delete_manage_gallery']);

	Route::get('/banner',									['as'=>'banner',					'uses'=>'Admin\BannerController@index']);

	Route::post('/banner_update',							['as'=>'banner_update',				'uses'=>'Admin\BannerController@banner_update']);

	Route::get('/manage_banner_gallery',					['as'=>'manage_banner',				'uses'=>'Admin\BannerController@manage_banner']);

	Route::get('/delete_manage_banner/{id}',				['as'=>'delete_manage_banner',		'uses'=>'Admin\BannerController@delete_manage_banner']);

	Route::get('/blog',										['as'=>'blog',						'uses'=>'Admin\NewsController@index']);

	Route::post('/news_update',								['as'=>'news_update',				'uses'=>'Admin\NewsController@news_update']);

	Route::post('/location_update',							['as'=>'location_update',			'uses'=>'Admin\NewsController@location_update']);
	
	Route::get('/location',									['as'=>'location',					'uses'=>'Admin\NewsController@location']);

	Route::post('/social_link_update',						['as'=>'social_link_update',		'uses'=>'Admin\NewsController@social_link_update']);
	
	Route::get('/social_link',								['as'=>'social_link',				'uses'=>'Admin\NewsController@social_link']);

	Route::get('/contact',									['as'=>'contact',					'uses'=>'Admin\NewsController@contact']);

	Route::post('/contact_update',							['as'=>'contact_update',			'uses'=>'Admin\NewsController@contact_update']);

	Route::get('/manage_blog',								['as'=>'manage_blog',				'uses'=>'Admin\NewsController@manage_news']);

	Route::get('/edit/{id}',								['as'=>'edit',						'uses'=>'Admin\NewsController@edit']);

	Route::post('news_edit/{id}',							['as'=>'news_edit',					'uses'=>'Admin\NewsController@news_edit']);

	Route::get('/view/{id}',								['as'=>'view',						'uses'=>'Admin\NewsController@view']);

	Route::get('/delete/{id}',								['as'=>'delete',					'uses'=>'Admin\NewsController@delete']);

	Route::get('/event',									['as'=>'event',						'uses'=>'Admin\EventController@index']);

	Route::post('/event_update',							['as'=>'event_update',				'uses'=>'Admin\EventController@event_update']);

	Route::get('/manage_event',								['as'=>'manage_event',				'uses'=>'Admin\EventController@manage_event']);

	Route::get('event/edit/{id}',							['as'=>'edit',						'uses'=>'Admin\EventController@edit']);

	Route::post('/event_edit/{id}',							['as'=>'event_edit',				'uses'=>'Admin\EventController@event_edit']);

	Route::get('event/view/{id}',							['as'=>'view',						'uses'=>'Admin\EventController@view']);

	Route::get('event/delete/{id}',							['as'=>'delete',					'uses'=>'Admin\EventController@delete']);

	Route::get('/urjaaworld',								['as'=>'urjaaworld',				'uses'=>'Admin\UrjaaworldController@index']);

	Route::post('/urjaaworld_update',						['as'=>'urjaaworld_update',			'uses'=>'Admin\UrjaaworldController@urjaaworld_update']);

	Route::get('/manage_urjaaworld',						['as'=>'manage_urjaaworld',			'uses'=>'Admin\UrjaaworldController@manage_urjaaworld']);

	Route::get('urjaaworld/edit/{id}',						['as'=>'edit',						'uses'=>'Admin\UrjaaworldController@edit']);

	Route::post('/urjaaworld_edit/{id}',					['as'=>'urjaaworld_edit',			'uses'=>'Admin\UrjaaworldController@urjaaworld_edit']);

	Route::get('urjaaworld/view/{id}',						['as'=>'view',						'uses'=>'Admin\UrjaaworldController@view']);

	Route::get('urjaaworld/delete/{id}',					['as'=>'delete',					'uses'=>'Admin\EventController@delete']);

	Route::get('/project',									['as'=>'project',					'uses'=>'Admin\ProjectController@index']);

	Route::post('/project_update',							['as'=>'project_update',			'uses'=>'Admin\ProjectController@project_update']);

	Route::get('/manage_project',								['as'=>'manage_project',		'uses'=>'Admin\ProjectController@manage_project']);

	Route::get('project/edit/{id}',							['as'=>'edit',						'uses'=>'Admin\ProjectController@edit']);

	Route::post('/project_edit/{id}',							['as'=>'project_edit',			'uses'=>'Admin\ProjectController@project_edit']);

	Route::get('project/view/{id}',							['as'=>'view',						'uses'=>'Admin\ProjectController@view']);

	Route::get('project/delete/{id}',							['as'=>'delete',				'uses'=>'Admin\ProjectController@delete']);

	Route::get('/social',									['as'=>'social',					'uses'=>'Admin\SocialController@index']);

	Route::post('/social_update',							['as'=>'social_update',				'uses'=>'Admin\SocialController@social_update']);

	Route::get('/manage_social',								['as'=>'manage_social',			'uses'=>'Admin\SocialController@manage_social']);

	Route::get('social/edit/{id}',							['as'=>'edit',						'uses'=>'Admin\SocialController@edit']);

	Route::post('/social_edit/{id}',							['as'=>'social_edit',			'uses'=>'Admin\SocialController@social_edit']);

	Route::get('social/view/{id}',							['as'=>'view',						'uses'=>'Admin\SocialController@view']);

	Route::get('social/delete/{id}',							['as'=>'delete',				'uses'=>'Admin\SocialController@delete']);

	Route::get('/activities',								['as'=>'activities',				'uses'=>'Admin\ActivitiesController@index']);

	Route::post('/activities_update',						['as'=>'activities_update',			'uses'=>'Admin\ActivitiesController@activities_update']);

	Route::get('/manage_activities',						['as'=>'manage_activities',			'uses'=>'Admin\ActivitiesController@manage_activities']);

	Route::get('activities/edit/{id}',						['as'=>'edit',						'uses'=>'Admin\ActivitiesController@edit']);

	Route::post('activities/activities_edit/{id}',			['as'=>'activities_edit',			'uses'=>'Admin\ActivitiesController@activities_edit']);

	Route::get('activities/view/{id}',						['as'=>'view',						'uses'=>'Admin\ActivitiesController@view']);

	Route::get('activities/delete/{id}',					['as'=>'delete',					'uses'=>'Admin\ActivitiesController@delete']);

	Route::get('/meditation',								['as'=>'meditation',				'uses'=>'Admin\MeditationController@index']);

	Route::post('/meditation_update',						['as'=>'meditation_update',			'uses'=>'Admin\MeditationController@meditation_update']);

	Route::get('/manage_meditation',						['as'=>'manage_meditation',			'uses'=>'Admin\MeditationController@manage_meditation']);

	Route::get('meditation/edit/{id}',						['as'=>'edit',						'uses'=>'Admin\MeditationController@edit']);

	Route::post('meditation/meditation_edit/{id}',			['as'=>'meditation_edit',			'uses'=>'Admin\MeditationController@meditation_edit']);

	Route::get('meditation/view/{id}',						['as'=>'view',						'uses'=>'Admin\MeditationController@view']);

	Route::get('meditation/delete/{id}',					['as'=>'delete',					'uses'=>'Admin\MeditationController@delete']);

	Route::get('/song',										['as'=>'song',						'uses'=>'Admin\SongController@index']);

	Route::post('/song_update',								['as'=>'song_update',				'uses'=>'Admin\SongController@song_update']);

	Route::get('/manage_songs',								['as'=>'manage_song',				'uses'=>'Admin\SongController@manage_song']);	

	Route::get('song/view/{id}',							['as'=>'view',						'uses'=>'Admin\SongController@view']);

	Route::get('song/delete/{id}',							['as'=>'delete',					'uses'=>'Admin\SongController@delete']);