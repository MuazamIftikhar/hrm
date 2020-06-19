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

Route::get('/home', 'HomeController@index')->name('home');

//user admin will add info and package
Route::GET('/request_account', 'AcoountController@request_account')->name('request_account');
Route::POST('/save_request_account', 'AcoountController@save_request_account')->name('save_request_account');

//admin will accept the request approval
Route::GET('/account_request', 'AcoountController@account_request')->name('account_request');
Route::GET('/update_status', 'AcoountController@update_status')->name('update_status');

//user admin will add the employee
Route::GET('/employee', 'AcoountController@employee')->name('employee');
Route::POST('/save_employee', 'AcoountController@save_employee')->name('save_employee');

Route::GET('/manage_employee', 'AcoountController@manage_employee')->name('manage_employee');
Route::GET('/update_employee', 'AcoountController@update_employee')->name('update_employee');
Route::POST('/edit_employee', 'AcoountController@edit_employee')->name('edit_employee');
Route::GET('/delete_employee', 'AcoountController@delete_employee')->name('delete_employee');

//admin will add the shift of the employee
Route::GET('/shift', 'ShiftController@index')->name('shift');
Route::POST('/save_shift', 'ShiftController@save_shift')->name('save_shift');
Route::GET('/update_shift', 'ShiftController@update_shift')->name('update_shift');
Route::POST('/edit_shift', 'ShiftController@edit_shift')->name('edit_shift');
Route::GET('/delete_shift', 'ShiftController@delete_shift')->name('delete_shift');