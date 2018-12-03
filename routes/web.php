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
   return view('auth.login');
});

Route::get('/login', function () {
   return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile');
Route::get('/update/profile', 'HomeController@update_profile');
Route::post('/update/profile/{id}/{tid}/{cid}/{employee_id}', 'HomeController@profile_updated');

Route::get('logActivity', 'HomeController@logActivity');
Route::post('deleteLog', 'HomeController@delete_log');

Route::get('/calendar', 'SalaryController@getCalendar');
Route::post('/calendar', 'SalaryController@saveCalendarDetails');
Route::post('/updatecalendar', 'SalaryController@updateCalendarDetails');
Route::get('/salary', 'SalaryController@getSalView');
Route::post('/salary', 'SalaryController@storeSalDetails');
Route::get('/edit_salary', 'SalaryController@editSalView');
Route::post('/edit_salary', 'SalaryController@editSalDetails');
Route::get('/api/details', 'SalaryController@getDetails');
Route::get('/api/getSalary', 'SalaryController@getSalary');
Route::get('/api/salaryDetails', 'SalaryController@getSalaryDetails');
Route::get('/api/getMonthDetails', 'SalaryController@getMonthDetails');
Route::get('/api/getEmpMonthDetails', 'SalaryController@getEmpMonthDetails');
Route::get('/super_calculation', 'SalaryController@getSuperCalView');
Route::post('/super_calculation', 'SalaryController@storeSuperCalView');
Route::get('/report', 'SalaryController@getReport');

Route::get('/users', 'UserController@index');
Route::get('/users/new', 'UserController@create');
Route::post('/users/new', 'UserController@store');
Route::get('/users/edit/{id}', 'UserController@edit');
Route::post('/users/edit/{id}', 'UserController@update');
Route::post('users/delete', 'UserController@delete');

Route::get('/customers', 'CustomerController@index');
Route::get('/customers/new', 'CustomerController@create');
Route::post('/customers/new', 'CustomerController@store');
Route::get('/customers/edit/{cust_id}', 'CustomerController@edit');
Route::post('/customers/edit/{cust_id}', 'CustomerController@update');
Route::post('customers/delete', 'CustomerController@delete');

Route::get('/products', 'ProductController@index');
Route::get('/products/new', 'ProductController@create');
Route::post('/products/new', 'ProductController@store');
Route::get('/products/edit/{prod_id}', 'ProductController@edit');
Route::post('/products/edit/{prod_id}', 'ProductController@update');
Route::delete('/products/delete/{prod_id}', 'ProductController@delete');

Route::get('/invoice',array('as'=>'autocomplete.search','uses'=>'ProductController@invoice'));
Route::get('autocomplete-ajax',array('as'=>'autocomplete.ajax','uses'=>'ProductController@autoComplete'));
Route::get('autocomplete-name',array('as'=>'autocomplete.name','uses'=>'ProductController@autoCompleteName'));
Route::post('/invoice', 'ProductController@generateInvoice');
Route::post('/searchinvoice', 'ProductController@getInvoice');
Route::get('/printinvoice/{id}', 'ProductController@printInvoice');
Route::get('/sendemail/{email}/{id}', 'ProductController@sendEmail');
Route::get('/generate-pdf', 'ProductController@pdfview')->name('generate-pdf');
Route::get('/customerData', 'ProductController@customerdata');
Route::get('/productData', 'ProductController@productdata');

Route::get('/companies', 'CompanyController@index');
Route::get('/companies/new', 'CompanyController@create');
Route::post('/companies/new', 'CompanyController@store');
Route::get('/companies/edit/{cid}/{id}', 'CompanyController@edit');
Route::post('/companies/edit/{cid}/{id}', 'CompanyController@update');
Route::post('companies/delete', 'CompanyController@delete');

Route::get('/teams', 'TeamController@index');
Route::get('/teams/new', 'TeamController@create');
Route::post('/teams/new', 'TeamController@store');
Route::get('/teams/edit/{tid}/{id}', 'TeamController@edit');
Route::post('/teams/edit/{tid}/{id}', 'TeamController@update');
Route::post('teams/delete', 'TeamController@delete');
Route::get('/company_details', 'TeamController@company_details');
Route::post('/change/company', 'TeamController@company_update');

Route::get('/employees', 'EmployeeController@index');
Route::get('/employee_detail/{id}', 'EmployeeController@detail');
Route::get('/employees/new', 'EmployeeController@create');
Route::get('api/dropdown', 'EmployeeController@teams');
Route::post('/employees/new', 'EmployeeController@store');
Route::get('/employees/edit/{emp_id}', 'EmployeeController@edit');
Route::post('/employees/edit/{emp_id}', 'EmployeeController@update');
Route::get('employees/delete/{emp_id}', 'EmployeeController@delete');
Route::get('/uploadCV', 'EmployeeController@getCV');
Route::post('/uploadCV/{id}', 'EmployeeController@uploadDocument');

Route::get('notify/index', 'NotificationController@index');
Route::get('/notifications/{id}', 'NotificationController@notificationMarked');
Route::get('/getNotification', 'NotificationController@getNotification');
Route::get('/refreshNotification', 'NotificationController@refresh');
Route::get('/markAllNotifications', 'NotificationController@changeReadAt');
Route::get('/showAllNotifications', 'NotificationController@showNotificationsView');
Route::get('/singleNotification/{id}', 'NotificationController@singleNotification');
Route::get('/unreadNotification/{id}', 'NotificationController@unreadNotification');
Route::post('/deleteNotification', 'NotificationController@deleteNotification');
Route::post('/deleteAllNotifications', 'NotificationController@deleteAllNotifications');
Route::post('/replyEmailNotification/flag={flag}/{id}', 'NotificationController@replyEmailNotification');
Route::post('/forwardThisMail/flag={flag}/{id}', 'NotificationController@forwardThisMail');

Route::get('/login/{social}','Auth\LoginController@socialLogin')->where('social','facebook|google|github');
Route::get('/login/{social}/callback','Auth\LoginController@handleProviderCallback')->where('social','facebook|google|github');

Route::group(array('middleware' => 'auth'), function() {
    Route::get('/home', 'HomeController@index');
});

//Route::get('auth/github', 'Auth\LoginController@redirectToProvider');
//Route::get('auth/github/callback', 'Auth\LoginController@handleProviderCallback');
//
//Route::get('auth/google-plus', 'Auth\LoginController@redirect');
//Route::get('auth/google-plus/callback', 'Auth\LoginController@callback');