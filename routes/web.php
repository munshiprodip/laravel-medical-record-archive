<?php

use Illuminate\Support\Facades\Route;

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

    return redirect()->route('dashboard');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', function () {
	    return view('backend.dashboard');
	})->name('dashboard');


//=====Admin sections=====
//==================Bloodgroups===================
    Route::get('/bloodgroup', 'Backend\BloodgroupController@index')->name('bloodgroup');
    Route::get('/api.bloodgroup', 'Backend\BloodgroupController@apiBlodgroup')->name('api.bloodgroup');
    Route::post('/bloodgroup/create', 'Backend\BloodgroupController@create')->name('create.bloodgroup');
    Route::get('/bloodgroup/{id}/edit', 'Backend\BloodgroupController@edit')->name('edit.bloodgroup');
    Route::patch('/bloodgroup/{id}', 'Backend\BloodgroupController@update')->name('update.bloodgroup');
    Route::delete('/bloodgroup/{id}/delete', 'Backend\BloodgroupController@destroy')->name('delete.bloodgroup');
    Route::get('/bloodgroup/status/change/{id}', 'Backend\BloodgroupController@changeStatus');



//==================Religion===================
    Route::get('/religion', 'Backend\ReligionController@index')->name('religion');
    Route::get('/api.religion', 'Backend\ReligionController@apiReligion')->name('api.religion');
    Route::post('/religion/create', 'Backend\ReligionController@create')->name('create.religion');
    Route::get('/religion/{id}/edit', 'Backend\ReligionController@edit')->name('edit.religion');
    Route::patch('/religion/{id}', 'Backend\ReligionController@update')->name('update.religion');
    Route::delete('/religion/{id}/delete', 'Backend\ReligionController@destroy')->name('delete.religion');

//==================Gender===================
    Route::get('/gender', 'Backend\GenderController@index')->name('gender');
    Route::get('/api.gender', 'Backend\GenderController@apiGender')->name('api.gender');
    Route::post('/gender/create', 'Backend\GenderController@create')->name('create.gender');
    Route::get('/gender/{id}/edit', 'Backend\GenderController@edit')->name('edit.gender');
    Route::patch('/gender/{id}', 'Backend\GenderController@update')->name('update.gender');
    Route::delete('/gender/{id}/delete', 'Backend\GenderController@destroy')->name('delete.gender');

//==================Role===================
    Route::get('/role', 'Backend\RoleController@index')->name('role');
    Route::get('/api.role', 'Backend\RoleController@apiRole')->name('api.role');
    Route::post('/role/create', 'Backend\RoleController@create')->name('create.role');
    Route::get('/role/{id}/edit', 'Backend\RoleController@edit')->name('edit.role');
    Route::patch('/role/{id}', 'Backend\RoleController@update')->name('update.role');
    Route::delete('/role/{id}/delete', 'Backend\RoleController@destroy')->name('delete.role');


//==================Permission===================
    Route::get('/permission', 'Backend\PermissionController@index')->name('permission');
    Route::get('/api.permission', 'Backend\PermissionController@apiPermission')->name('api.permission');
    Route::post('/permission/create', 'Backend\PermissionController@create')->name('create.permission');
    Route::get('/permission/{id}/edit', 'Backend\PermissionController@edit')->name('edit.permission');
    Route::patch('/permission/{id}', 'Backend\PermissionController@update')->name('update.permission');
    Route::delete('/permission/{id}/delete', 'Backend\PermissionController@destroy')->name('delete.permission');

    Route::get('/role/permission/{id}', 'Backend\PermissionController@assignRolePermission');
    Route::patch('/role/permission/assign/{id}', 'Backend\PermissionController@assignRolePermissionSubmit')->name('assignRoleUpdate');

//==================User===================
    Route::get('/user', 'Backend\UserController@index')->name('user');
    Route::get('/api.user', 'Backend\UserController@apiUser')->name('api.user');
    Route::post('/user/create', 'Backend\UserController@create')->name('create.user');
    Route::get('/user/{id}/edit', 'Backend\UserController@edit')->name('edit.user');
    Route::patch('/user/{id}', 'Backend\UserController@update')->name('update.user');
    Route::delete('/user/{id}/delete', 'Backend\UserController@destroy')->name('delete.user');
    Route::get('/user/status/change/{id}', 'Backend\UserController@changeStatus');

    Route::get('/user/role/{id}', 'Backend\UserController@assignRoleUser')->name('assignRoleUser');
    Route::patch('/user/role/assign/{id}', 'Backend\UserController@assignRoleUserSubmit')->name('assignRoleUserSubmit');



//=====Archive sections=====
//=====Rack route=====
    Route::get('/rack', 'Backend\RackController@index')->name('rack');
    Route::get('/api.rack', 'Backend\RackController@apiRack')->name('api.rack');
    Route::post('/rack/store', 'Backend\RackController@store')->name('store.rack');
    Route::get('/rack/{id}/edit', 'Backend\RackController@edit')->name('edit.rack');
    Route::patch('/rack/{id}', 'Backend\RackController@update')->name('update.rack');
    Route::delete('/rack/{id}/delete', 'Backend\RackController@destroy')->name('delete.rack');

//=====Locker route=====
    Route::get('/locker', 'Backend\LockerController@index')->name('locker');
    Route::get('/api.locker', 'Backend\LockerController@apiLocker')->name('api.locker');
    Route::post('/locker/store', 'Backend\LockerController@store')->name('store.locker');
    Route::get('/locker/{id}/edit', 'Backend\LockerController@edit')->name('edit.locker');
    Route::patch('/locker/{id}', 'Backend\LockerController@update')->name('update.locker');
    Route::delete('/locker/{id}/delete', 'Backend\LockerController@destroy')->name('delete.locker');




    //=====Department route=====
    Route::get('/department', 'Backend\DepartmentController@index')->name('department');
    Route::get('/api.department', 'Backend\DepartmentController@apiDepartment')->name('api.department');
    Route::post('/department/store', 'Backend\DepartmentController@store')->name('store.department');
    Route::get('/department/{id}/edit', 'Backend\DepartmentController@edit')->name('edit.department');
    Route::patch('/department/{id}', 'Backend\DepartmentController@update')->name('update.department');
    Route::delete('/department/{id}/delete', 'Backend\DepartmentController@destroy')->name('delete.department');

    //=====Speciality route=====
    Route::get('/speciality', 'Backend\SpecialityController@index')->name('speciality');
    Route::get('/api.speciality', 'Backend\SpecialityController@apiSpeciality')->name('api.speciality');
    Route::post('/speciality/store', 'Backend\SpecialityController@store')->name('store.speciality');
    Route::get('/speciality/{id}/edit', 'Backend\SpecialityController@edit')->name('edit.speciality');
    Route::patch('/speciality/{id}', 'Backend\SpecialityController@update')->name('update.speciality');
    Route::delete('/speciality/{id}/delete', 'Backend\SpecialityController@destroy')->name('delete.speciality');

    //=====Doctor route=====
    Route::get('/doctor', 'Backend\DoctorController@index')->name('doctor');
    Route::get('/api.doctor', 'Backend\DoctorController@apiDoctor')->name('api.doctor');
    Route::post('/doctor/store', 'Backend\DoctorController@store')->name('store.doctor');
    Route::get('/doctor/{id}/edit', 'Backend\DoctorController@edit')->name('edit.doctor');
    Route::patch('/doctor/{id}', 'Backend\DoctorController@update')->name('update.doctor');
    Route::delete('/doctor/{id}/delete', 'Backend\DoctorController@destroy')->name('delete.doctor');

    //=====Ward route=====
    Route::get('/ward', 'Backend\WardController@index')->name('ward');
    Route::get('/api.ward', 'Backend\WardController@apiWard')->name('api.ward');
    Route::post('/ward/store', 'Backend\WardController@store')->name('store.ward');
    Route::get('/ward/{id}/edit', 'Backend\WardController@edit')->name('edit.ward');
    Route::patch('/ward/{id}', 'Backend\WardController@update')->name('update.ward');
    Route::delete('/ward/{id}/delete', 'Backend\WardController@destroy')->name('delete.ward');


    Route::resource('files', 'Backend\PtFilesController');
    Route::resource('issued-files', 'Backend\IssuedFileController');

    Route::get('/file/in-archive', 'Backend\PtFilesController@inArchive')->name('files.present');
    Route::get('/file/issued', 'Backend\PtFilesController@issued')->name('files.issued');
    Route::get('/file/death', 'Backend\PtFilesController@death')->name('files.death');



    Route::get('/report', 'Backend\ReportController@index')->name('report.index');
    Route::post('/report/generate', 'Backend\ReportController@generate')->name('report.generate');



});



