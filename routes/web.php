<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

           
//Home
Route::get('/home', 'HomeController@index');
            Route::post('getMenu', 'HomeController@getMenu')->name('getMenu');
//Profiles
Route::group(['namespace' => 'Profiles', 'prefix' => '/profiles', 'middleware' => ['auth']], function(){
            Route::get('/my_profile', [
                'middleware' => 'userauth:/profiles/my_profile',
                'uses' => 'MyProfileController@my_profile',
            ]);

            Route::get('/my_account',[
                'middleware' => 'userauth:/profiles/my_account',
                'uses' => 'MyProfileAccountController@my_account'
            ])->name('/my_account');
            Route::post('/update_personal_info', 'MyProfileAccountController@update_personal_info')->name('update_personal_info');
            Route::post('/check_change_password', 'MyProfileAccountController@check_change_password')->name('check_change_password');
            Route::post('/photo_upload', 'MyProfileAccountController@photo_upload')->name('photo_upload');
            Route::get('/my_calendar', [
                'middleware' => 'userauth:/profiles/my_calendar',
                'uses' => 'MyCalendarController@my_calendar'
            ]);

            Route::get('/my_inbox', [
                'middleware' => 'userauth:/profiles/my_inbox',
                'uses' => 'MyInboxController@my_inbox'
            ]);
            Route::post('/getSysUser', 'MyInboxController@getSysUser');
            Route::post('/postMessage', 'MyInboxController@postMessage');
            Route::post('/getChatData', 'MyInboxController@getChatData');
            Route::post('/getNewMessage', 'MyInboxController@getNewMessage');

            
            Route::get('/my_tasks', [
                'middleware' => 'userauth:/profiles/my_tasks',
                'uses' => 'MyTaskController@my_tasks'
            ]);

            Route::get('/bid_edit', [
                'middleware' => 'userauth:/profiles/bid_edit',
                'uses' => 'BidManageController@index'
            ]);
            Route::post('/add_new_bid', 'BidManageController@add_new_bid');
            Route::get('/delete_bid/{id}', 'BidManageController@delete_bid');
            Route::post('/update_bid', 'BidManageController@update_bid');

            Route::get('/session', 'SessionController@index');
            Route::post('/session_store', 'SessionController@session_store')->name('session_store');

            Route::get('/my_profile', [
                'middleware' => 'userauth:/profiles/my_profile',
                'uses' => 'MyProfileController@my_profile',
            ]);

            Route::get('/stripe', [
                'middleware' => 'userauth:/profiles/stripe',
                'uses' => 'StripeController@stripe',
            ]);
            Route::post('/stripe', 'StripeController@stripePost')->name('profiles.stripe');            
});
Route::group(['namespace' => 'System', 'prefix' => '/system', 'middleware' => ['auth']], function(){
            Route::get('/lock_screen', [
                'middleware' => 'userauth:/system/lock_screen',
                'uses' => 'LockScreenController@lock_screen'
            ]);
            Route::get('/password', [
                'middleware' => 'userauth:/system/password', 
                'uses' => 'PasswordController@password'
            ]);
});
         
//ElecLibrary
Route::group(['namespace' => 'ElecLibrary', 'prefix' => '/library_manage', 'middleware' => ['auth']], function(){
            Route::get('/book_manage', [
                'middleware' => 'userauth:/library_manage/book_manage',
                'uses' => 'ElecLibraryController@book_manage'
            ]);  
            Route::post('/book_register','ElecLibraryController@book_register')->name('book_register');
            Route::post('/book_delete','ElecLibraryController@book_delete')->name('book_delete');
            Route::post('/book_update','ElecLibraryController@book_update')->name('book_update');  
});


//UserManage
Route::group(['namespace' => 'UserManage', 'prefix' => '/user_manage', 'middleware' => ['auth']], function(){

            /////////////Role Manage
            Route::get('/role_manage', [
                'middleware' => 'userauth:/user_manage/role_manage',
                'uses' => 'UserRoleController@userrole_manage'
            ]);
            Route::post('/add_parent_menu', 'UserRoleController@add_parent_menu')->name('add_parent_menu');
            Route::post('/role_register', 'UserRoleController@role_register')->name('role_register');
            Route::post('/get_parent_name', 'UserRoleController@get_parent_name')->name('get_parent_name');
            Route::post('/role_update', 'UserRoleController@role_update')->name('role_update');
            Route::post('/role_delete', 'UserRoleController@role_delete')->name('role_delete');

            /////////////Role Assign
            Route::get('/role_assign', [
                'middleware' => 'userauth:/user_manage/role_assign',
                'uses' => 'RoleAssignController@role_assign'
            ]); 
            /////////////Personal Role Assign
            Route::get('/role_assign_user/{id}', [
                'middleware' => 'userauth:/user_manage/role_assign_user',
                'uses' => 'RoleAssignController@role_assign_user'
            ]);           
            Route::post('/personal_role_check', 'RoleAssignController@personal_role_check')->name('personal_role_check');

            /////////////Sys User Manage
            Route::get('/sys_users', [
                'middleware' => 'userauth:/user_manage/sys_users',
                'uses' => 'SysUserController@sys_users'
            ])->name('sys_users');
            Route::post('/user_status_change', [
                'middleware' => 'userauth:/user_manage/sys_users',
                'uses' => 'SysUserController@user_status_change'
            ])->name('user_status_change');
});
Route::get('/image-upload',['as'=>'image.upload','uses'=>'ImageUploadController@imageUpload']);

Route::post('/image-upload',['as'=>'image.upload.post','uses'=>'ImageUploadController@imageUploadPost']);

Route::get('/file_upload', function () {  
    return view('form');  
});  
Route::get('forms_store', 'FormController@store')->name('forms_store');

Route::get('/image_upload_with_validation',['as'=>'getimage','uses'=>'ImageController@getImage']);
Route::post('image-upload-with-validation',['as'=>'postimage','uses'=>'ImageController@postImage']);

Route::get('system/download', 'System\DownloadController@index')->name('download');










































