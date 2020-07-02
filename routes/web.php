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



Auth::routes();

Route::group([ 'middleware' => ['auth']], function() {
    Route::get('/', 'HomeController@index')->name('home');
});



//user admin will add info and package
    Route::GET('/request_account', 'AccountController@request_account')->name('request_account');
    Route::POST('/save_request_account', 'AccountController@save_request_account')->name('save_request_account');


    Route::GET('/apply_leave', 'LeaveController@apply_leave')->name('apply_leave');
    Route::GET('/request_leave', 'LeaveController@request_leave')->name('request_leave');
    Route::POST('/save_apply_leave', 'LeaveController@save_apply_leave')->name('save_apply_leave');
    Route::GET('/update_leave_status', 'LeaveController@update_leave_status')->name('update_leave_status');

    Route::GET('/calender', 'CalenderController@index')->name('calender');
    Route::GET('/employee_scheduling', 'CalenderController@employee_scheduling')->name('employee_scheduling');
    Route::POST('/save_employee_scheduling', 'CalenderController@save_employee_scheduling')->name('save_employee_scheduling');

Route::group(['prefix' => "SuperAdmin", 'middleware' => ['role:SuperAdmin']], function() {

//admin will accept the request approval
    Route::GET('/account_request', 'AccountController@account_request')->name('account_request');
    Route::GET('/update_status', 'AccountController@update_status')->name('update_status');



});

Route::group(['prefix' => \App\Http\Controllers\AccountController::userName(), 'middleware' => ['role:UserAdmin']], function() {


//user admin will add the employee
    Route::GET('/employee', 'AccountController@employee')->name('employee');
    Route::POST('/save_employee', 'AccountController@save_employee')->name('save_employee');

    Route::GET('/manage_employee', 'AccountController@manage_employee')->name('manage_employee');
    Route::GET('/update_employee', 'AccountController@update_employee')->name('update_employee');
    Route::POST('/edit_employee', 'AccountController@edit_employee')->name('edit_employee');
    Route::GET('/delete_employee', 'AccountController@delete_employee')->name('delete_employee');

    //admin will add the shift of the employee
    Route::GET('/shift', 'ShiftController@index')->name('shift');
    Route::POST('/save_shift', 'ShiftController@save_shift')->name('save_shift');
    Route::GET('/update_shift', 'ShiftController@update_shift')->name('update_shift');
    Route::POST('/edit_shift', 'ShiftController@edit_shift')->name('edit_shift');
    Route::GET('/delete_shift', 'ShiftController@delete_shift')->name('delete_shift');

    //admin will add the shift of the employee
    Route::GET('/leave', 'LeaveController@index')->name('leave');
    Route::POST('/save_leave', 'LeaveController@save_leave')->name('save_leave');
    Route::POST('/save_leave_type', 'LeaveController@save_leave_type')->name('save_leave_type');

});