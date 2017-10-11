<?php


use App\User;
use App\RequestCertificate;
use App\Roles;
use App\Status;	



	Route::get('/', [
		'as'=> 'main',
		'uses'=> 'auth\AuthController@main'
	]);

	Route::get('/about', [
		'as'=> 'about',
		'uses'=> 'auth\AuthController@about'
	]);

	Route::group(['prefix'=> 'auth'], function(){

		Route::get('/login', [
			'as'=> 'login',
			'uses'=> 'auth\AuthController@login'
		]);

		Route::post('/login',[
			'as'=> 'login_check',
			'uses'=> 'auth\AuthController@login_check'
		]);

	});



Route::group(['prefix'=> 'user'], function(){

		Route::get('/main', [
			'as'=> 'user_main',
			'uses'=> 'user\UserController@main'
		]);

		Route::get('/logout', [
			'as'=> 'user_logout',
			'uses'=> 'user\UserController@logout'
		]);

		Route::get('/about', [
			'as'=> 'user_about',
			'uses'=> 'user\UserController@about'
		]);

		Route::get('/request', [
			'as'=> 'user_request',
			'uses'=> 'user\UserController@request'
		]);

		Route::get('/request-create', [
			'as'=> 'user_request_create',
			'uses'=> 'user\UserController@user_request_create'
		]);

			Route::post('/request-create/{request_id}', [
				'as'=> 'user_request_create_check',
				'uses'=> 'user\UserController@user_request_create_check'
			]);

			Route::post('/request-construction-permit/{request_id}', [
				'as'=> 'user_request_construction_permit',
				'uses'=> 'user\UserController@user_request_construction_permit'
			]);

			Route::post('/request-business-closure/{request_id}', [
				'as'=> 'user_request_business_closure',
				'uses'=> 'user\UserController@user_request_business_closure'
			]);

			Route::post('/request-good-moral/{request_id}', [
				'as'=> 'user_request_good_moral',
				'uses'=> 'user\UserController@user_request_good_moral'
			]);

			Route::post('/request-indingency/{request_id}', [
				'as'=> 'user_request_indingency',
				'uses'=> 'user\UserController@user_request_indingency'
			]);


		Route::get('/blotter', [
			'as'=> 'user_blotter',
			'uses'=> 'user\UserController@blotter'
		]);

			Route::get('/blotter-create', [
				'as'=> 'user_blotter_create',
				'uses'=> 'user\UserController@user_blotter_create'
			]);

			Route::post('/blotter-create', [
				'as'=> 'user_blotter_create_check',
				'uses'=> 'user\UserController@user_blotter_create_check'
			]);

			Route::get('/blotter-yes/{id}', [
				'as'=> 'user_blotter_yes',
				'uses'=> 'user\UserController@user_blotter_yes'
			]);

			Route::get('/blotter-no/{id}', [
				'as'=> 'user_blotter_no',
				'uses'=> 'user\UserController@user_blotter_no'
			]);





		Route::get('/missing', [
			'as'=> 'user_missing',
			'uses'=> 'user\UserController@missing'
		]);

			Route::get('/missing-create', [
				'as'=> 'user_missing_create',
				'uses'=> 'user\UserController@user_missing_create'
			]);

			Route::post('/missing-create-check', [
				'as'=> 'user_missing_check',
				'uses'=> 'user\UserController@user_missing_check'
			]);


		Route::get('/announcement-{id}-view', [
			'as'=> 'user_announce_view',
			'uses'=> 'user\UserController@user_announce_view'
		]);		

		Route::post('/profile-update', [
			'as'=> 'user_update_profile',
			'uses'=> 'user\UserController@user_update_profile'
		]);	

		

		Route::get('/settings', [
			'as'=> 'user_settings',
			'uses'=> 'user\UserController@user_settings'
		]);

		Route::post('/settings', [
			'as'=>'user_settings_check',
			'uses'=> 'user\UserController@user_settings_check'
		]);
});

Route::group(['prefix'=> 'admin'], function(){

		Route::get('/missing/{id}-view', [
			'as'=> 'admin_missing_view',
			'uses'=> 'admin\AdminController@admin_missing_view'
		]);


		Route::get('/main', [
			'as'=> 'admin_main',
			'uses'=> 'admin\AdminController@main'
		]);

		Route::get('/home', [
			'as'=> 'admin_home',
			'uses'=> 'admin\AdminController@admin_home'
		]);

		Route::get('/logout', [
			'as'=> 'admin_logout',
			'uses'=> 'admin\AdminController@logout'
		]);

		Route::get('/userlist', [
			'as'=> 'admin_user_list',
			'uses'=> 'admin\AdminController@admin_user_list'
		]);

			Route::post('/userlist-new', [
				'as'=> 'admin_user_list_new',
				'uses'=> 'admin\AdminController@admin_user_list_new'
			]);

			Route::get('/userlist-new', [
				'as'=> 'admin_user_list_create',
				'uses'=> 'admin\AdminController@admin_user_list_create'
			]);

			Route::get('/userlist-delete/{id}', [
				'as'=> 'admin_user_list_delete',
				'uses'=> 'admin\AdminController@admin_user_list_delete'
			]);

			Route::get('/request', [
				'as'=> 'admin_request',
				'uses'=> 'admin\AdminController@admin_request'
			]);

			Route::get('/request-construction-permit', [
				'as'=> 'admin_request_contruction_permit',
				'uses'=> 'admin\AdminController@admin_request_contruction_permit'
			]);

			Route::get('/request-business-closure', [
				'as'=> 'admin_request_business_closure',
				'uses'=> 'admin\AdminController@admin_request_business_closure'
			]);

			Route::get('/request-good-moral', [
				'as'=> 'admin_request_good_moral',
				'uses'=> 'admin\AdminController@admin_request_good_moral'
			]);

			Route::get('/request-indingency', [
				'as'=> 'admin_request_indingency',
				'uses'=> 'admin\AdminController@admin_request_indingency'
			]);

			Route::get('/admin-request-approve/{id}', [
				'as' => 'admin_request_approve',
				'uses'=> 'admin\AdminController@admin_request_approve'
			]);

			Route::get('/admin-request-decline/{id}', [
				'as'=> 'admin_request_decline',
				'uses'=> 'admin\AdminController@admin_request_decline'
			]);

			Route::get('/admin-request-paid/{id}', [
				'as'=> 'admin_request_paid',
				'uses'=> 'admin\AdminController@admin_request_paid'
			]);

		Route::get('/blotter', [
			'as'=> 'admin_blotter',
			'uses'=> 'admin\AdminController@admin_blotter'
		]);	

			Route::get('/blotter/record', [
				'as'=> 'admin_blotter_record',
				'uses'=> 'admin\AdminController@admin_blotter_record'
			]);

			Route::get('/blotter-delete/{id}', [
				'as'=> 'admin_blotter_delete',
				'uses'=> 'admin\AdminController@admin_blotter_delete'
			]);

			Route::get('/blotter-approve/{id}', [
				'as'=> 'admin_blotter_approve',
				'uses'=> 'admin\AdminController@admin_blotter_approve'
			]);

			Route::get('/blotter-search/',[
				'as'=> 'admin_blotter_search',
				'uses'=> 'admin\AdminController@admin_blotter_search'
			]);

		Route::get('/missing', [
			'as'=> 'admin_missing',
			'uses'=> 'admin\AdminController@admin_missing'
		]);
			Route::get('/missing-decline/{id}', [
				'as'=> 'admin_missing_decline',
				'uses'=> 'admin\AdminController@admin_missing_decline'
			]);

			Route::get('/missing-aprove/{id}', [
				'as'=> 'admin_missing_approve',
				'uses'=> 'admin\AdminController@admin_missing_approve'
			]);

			Route::get('/missing-found/{id}', [
				'as'=> 'admin_missing_found_check',
				'uses'=> 'admin\AdminController@admin_missing_found_check'
			]);

			Route::post('/announcement',[
				'as'=> 'admin_new_announcement',
				'uses'=> 'admin\AdminController@admin_new_announcement'
			]);

			Route::get('/missing-create', [
				'as'=> 'admin_missing_create',
				'uses'=> 'admin\AdminController@admin_missing_create'
			]);

			Route::post('/missing-create-check',[
				'as'=> 'admin_missing_create_check',
				'uses'=> 'admin\AdminController@admin_missing_create_check'
			]);

			Route::get('/missing-found',[
				'as'=> 'admin_missing_found',
				'uses'=> 'admin\AdminController@admin_missing_found'
			]);

	Route::get('/settings', [
		'as'=> 'admin_setting',
		'uses'=> 'admin\AdminController@admin_setting'
	]);
		Route::post('/settings', [
			'as'=> 'admin_setting_check',
			'uses'=> 'admin\AdminController@admin_setting_check'
		]);

	Route::get('/profile', [
		'as'=> 'admin_profile',
		'uses'=> 'admin\AdminController@admin_profile'
	]);	

		Route::post('/profile', [
			'as'=> 'admin_profile_check',
			'uses'=> 'admin\AdminController@admin_profile_check'
		]);	

	Route::get('/patawag', [
		'as'=> 'admin_patawag',
		'uses'=> 'admin\AdminController@admin_patawag'
	]);	

		Route::get('/patawag-decline/{id}', [
			'as'=> 'admin_decline',
			'uses'=> 'admin\AdminController@admin_decline'
		]);

		Route::get('/patawag-approve/{id}', [
			'as'=> 'admin_approve',
			'uses'=> 'admin\AdminController@admin_approve'
		]);

});

// Route::get('/addUSer', function(){
// 	$user = new User;
// 	$user->fname = 'Irish';
// 	$user->lname = 'Cayasan';
// 	$user->mname = 'May';
// 	$user->gender = 'Female';
// 	$user->dob = '10-11-1994';
// 	$user->civil_status = 'Single';
// 	$user->contact = '09069541280';
// 	$user->address = 'Quezon City';
// 	$user->email = 'user234@yahoo.com';
// 	$user->password = bcrypt('admin123');
// 	$user->username = '123123123';
// 	$user->image = 'profile.jpg';
// 	$user->role_id = 2;
// 	$user->status_id = 1;
// 	$user->save();
// });

Route::get('/addRequest', function(){
	$req = new RequestCertificate;
	$req->request_name = 'CERTIFICATE OF INDIGENCY';
	$req->save();
});

// Route::get('/addRole', function(){
// 	$role = new Roles;
// 	$role->role_name = 'Subscriber';
// 	$role->save();

// });

// Route::get('/addStatus', function(){
// 	$status = new Status;
// 	$status->status_name = 'Approved';
// 	$status->save();

// });