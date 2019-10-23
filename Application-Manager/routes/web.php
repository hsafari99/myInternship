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

// Invite Management
Route::get('/applications/invites/manage', 'InviteManagementController@index');

// Event Management
Route::get('/events/manage', 'EventManagementController@index');

// Event Form
Route::get('/event/form/{id}/{lang}', 'EventFormController@index');

// Invitational Form
Route::get('/invite/form/{id}/{lang}', 'InviteFormController@index');
