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

Route::redirect('/', '/home');

// Login
Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::post('/logout', 'LoginController@logout');

// Home
Route::get('/home', 'HomeController@index');

// User Management
Route::get('/users/manage', 'UserManagementController@index');
Route::post('/users/manage/add', 'UserManagementController@add');
Route::post('/users/manage/edit/{id}', 'UserManagementController@edit');

// Team Management
Route::get('/teams/manage', 'TeamManagementController@index');

// New Application
Route::get('/applications/new', 'NewApplicationController@index');
Route::post('/applications/new', 'NewApplicationController@add');

// Application Profile
Route::get('/applications/profile/{id}', 'ApplicationProfileController@index');
Route::post('/getApplicationInfo', 'ApplicationProfileController@getInfoById');

// Application Search
Route::get('/applications/search', 'ApplicationSearchController@index');
Route::post('/searchByApplicant', 'ApplicationSearchController@getApplicationByApplicantInfo');
Route::post('/searchByStatus', 'ApplicationSearchController@getApplicationByStatus');
Route::post('/searchByEvent', 'ApplicationSearchController@getApplicationByEvent'); 
Route::post('/getEventStatusList', 'ApplicationSearchController@getEventStatusList');

// Invite Management
Route::get('/applications/invites/manage', 'InviteManagementController@index');

// Event Management
Route::get('/events/manage', 'EventManagementController@index');
Route::get('/events/new', 'EventManagementController@add');
Route::post('/events/manage', 'EventManagementController@recordEvent');
Route::get('/events/getAllEvents', 'EventManagementController@getAllEvents');
Route::get('storage/{filename}', function ($filename){
    $path = storage_path('public/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

// Event Form
Route::get('/event/form/{id}/{lang}', 'EventFormController@index');

// Invitational Form
Route::get('/invite/form/{id}/{lang}', 'InviteFormController@index');


// Application List
Route::get('/application/list', 'ApplicationListController@index');
Route::post('/getApplications', 'ApplicationListController@getApplications');
Route::post('/totalResults', 'ApplicationListController@totalResults');
