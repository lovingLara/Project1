<?php
Route::get('/', 'UsersController@index');

Route::get('/Register', array(
	'uses' => 'UsersController@register',
	'as' => 'register'
	));

Route::post('/Register', array(
	'uses' => 'UsersController@newUser',
	'as' => 'newUser'
	));

Route::get('/login', array(
	'uses' => 'UsersController@login',
	'as' => 'login'
	));

Route::post('/login', array(
	'uses' => 'UsersController@loginUser',
	'as' => 'loginUser'
	));

Route::get('viewPost{id}',array(
    'uses' => 'UsersController@view_post',
    'as' => 'view_post'
    ));

Route::get('/howtoSubmit', array(
    'uses' => 'UsersController@howto',
    'as' => 'howto'
));

Route::get('/Videos', array(
    'uses' => 'UsersController@video',
    'as' => 'video'

));

Route::group(array('before' => 'auth'), function()
	{

		Route::get('/user', array(
			'uses' => 'LoginUsersController@profile',
			'as' => 'profile'
			));

        Route::get('/Profiler/edit{id}', array(
            'uses' => 'LoginUsersController@viewUpdater',
            'as' => 'viewUpdater'
            ));

        Route::post('/Profile/edit{id}', array(
            'uses' => 'LoginUsersController@updateUser',
            'as' => 'updateUser'
            ));

        Route::get('/Profile/editPost{id}', array(
        	'uses' => 'LoginUsersController@editPost',
        	'as' => 'editPost'
        	));

        Route::post('/editPost{id}', array(
        	'uses' => 'LoginUsersController@editPosts',
        	'as' => 'editPosts'
        	));

        Route::get('howtosubmit', array(
            'uses' => 'LoginUsersController@viewHow',
            'as' => 'viewHow'
        ));

		Route::get('/Newpost', array(
			'uses' => 'LoginUsersController@newPost',
			'as' => 'newPost'
			));

		Route::post('/Newpost', array(
			'uses' => 'LoginUsersController@createPost',
			'as' => 'createPost'
			));

		Route::get('/logout', array(
			'uses' => 'LoginUsersController@logout',
			'as' => 'logout'
			));

		Route::get('/Viewpost/{id}', array(
			'uses' => 'LoginUsersController@viewPost',
			'as' => 'viewPost'
			));

		Route::get('/UpdatePost{id}', array(
			'uses' => 'LoginUsersController@viewUpdate',
			'as' => 'viewUpdate'
			));

		Route::post('/UpdatePost{id}', array(
			'uses' => 'LoginUsersController@update',
			'as' => 'update'
			));

		Route::get('/deletePost{id}', array(
			'uses' => 'LoginUsersController@delete_post',
			'as' => 'delete_post'
			));

		Route::get('/Dashboard', array(
			'uses' => 'LoginUsersController@dashboard',
			'as' => 'dashboard'
			));

		Route::post('/Viewpost{id}', array(
			'uses' => 'LoginUsersController@createComment',
			'as' => 'createComment'
			));

		Route::post('/profile{id}', array(
			'uses' => 'LoginUsersController@updateUser',
			'as' => 'updateUser'
			));

		Route::get('like{id}', array(
			'uses' => 'LoginUsersController@like',
			'as' => 'like'
			));

        Route::get('Videoes{fname}',array(
            'uses' => 'LoginUsersController@video',
            'as' => 'video'
            ));
	});


Route::group(array('before' => 'Auth'), function()
	{
		Route::get('/admin', array(
			'uses' => 'AdminController@index',
			'as' => 'index'
			));

        Route::post('admin/search', array(
            'uses' => 'AdminController@search_keyword',
            'as' => 'search_keyword'
             ));

		Route::get('admin/view', array(
			'uses' => 'AdminController@view',
			'as' => 'view'
			));

		Route::get('admin/permit{id}', array(
			'uses' => 'AdminController@permit',
			'as' => 'permit'
			));

		Route::get('admin/post{id}', array(
			'uses' => 'AdminController@view_post',
			'as' => 'view_post'
			));

		Route::get('admin/delete{id}', array(
			'uses' => 'AdminController@delete',
			'as' => 'delete'
			));

		Route::get('admin/ViewUser', array(
			'uses' => 'AdminController@view_User',
			'as' => 'view_User'
			));

		Route::get('admin/block{id}', array(
			'uses' => 'AdminController@block',
			'as' => 'block'
			));

		Route::get('admin/unblock{id}', array(
			'uses' => 'AdminController@unblock',
			'as' => 'unblock'
			));

		Route::get('admin/email', array(
			'uses' => 'AdminController@email',
			'as' => 'email'
			));

		Route::post('admin/send', array(
			'uses' => 'AdminController@email_submit',
			'as' => 'email_submit'
			));

		Route::get('admin/mailpost{id}', array(
			'uses' => 'AdminController@mailPost',
			'as' => 'mailPost'
			));

        Route::get('admin/headlines', array(
            'uses' => 'AdminController@headlines',
            'as' => 'headlines'
        ));

        Route::post('admin/Submit', array(
            'uses' => 'AdminController@hlsubmit',
            'as' => 'hlsubmit'
        ));

        Route::post('admin/headlines', array(
            'uses' => 'AdminController@recieve',
            'as' => 'recieve'
        ));

        Route::get('admin/deleteUser{id}',array(
            'uses' => 'AdminController@userdelete',
            'as' => 'userdelete'
        ));

        Route::get('admin/userProfile{id}', array(
           'uses' => 'AdminController@userprofile',
            'as' => 'userprofile'
        ));

        Route::get('admin/pending', array(
           'uses' => 'AdminController@pending',
            'as' => 'pending'
        ));
		
});