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

Route::get('/', 'DashboardController@index');

Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
  Route::get('/admin', function() {
    return redirect('admin/employees');
  });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/admin-users',                            'Admin\AdminUsersController@index');
    Route::get('/admin/admin-users/create',                     'Admin\AdminUsersController@create');
    Route::post('/admin/admin-users',                           'Admin\AdminUsersController@store');
    Route::get('/admin/admin-users/{adminUser}/edit',           'Admin\AdminUsersController@edit')->name('admin/admin-users/edit');
    Route::post('/admin/admin-users/{adminUser}',               'Admin\AdminUsersController@update')->name('admin/admin-users/update');
    Route::delete('/admin/admin-users/{adminUser}',             'Admin\AdminUsersController@destroy')->name('admin/admin-users/destroy');
    Route::get('/admin/admin-users/{adminUser}/resend-activation','Admin\AdminUsersController@resendActivationEmail')->name('admin/admin-users/resendActivationEmail');
});

/* Auto-generated profile routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/profile',                                'Admin\ProfileController@editProfile');
    Route::post('/admin/profile',                               'Admin\ProfileController@updateProfile');
    Route::get('/admin/password',                               'Admin\ProfileController@editPassword');
    Route::post('/admin/password',                              'Admin\ProfileController@updatePassword');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/employees',                              'Admin\EmployeesController@index')->name('admin/employees');;
    Route::get('/admin/employees/create',                       'Admin\EmployeesController@create');
    Route::post('/admin/employees',                             'Admin\EmployeesController@store');
    Route::get('/admin/employees/{employee}/edit',              'Admin\EmployeesController@edit')->name('admin/employees/edit');
    Route::post('/admin/employees/{employee}',                  'Admin\EmployeesController@update')->name('admin/employees/update');
    Route::delete('/admin/employees/{employee}',                'Admin\EmployeesController@destroy')->name('admin/employees/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/devices',                                'Admin\DevicesController@index');
    Route::get('/admin/devices/create',                         'Admin\DevicesController@create');
    Route::post('/admin/devices',                               'Admin\DevicesController@store');
    Route::get('/admin/devices/{device}/edit',                  'Admin\DevicesController@edit')->name('admin/devices/edit');
    Route::post('/admin/devices/{device}',                      'Admin\DevicesController@update')->name('admin/devices/update');
    Route::delete('/admin/devices/{device}',                    'Admin\DevicesController@destroy')->name('admin/devices/destroy');
});