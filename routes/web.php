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