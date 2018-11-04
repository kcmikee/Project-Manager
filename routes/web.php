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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::redirect('/home', 'profile');

//middleware
Route::middleware(['auth'])->group(function () {

  Route::resource('companies', 'CompaniesController');
  Route::get('projects/create/{company_id?}', 'ProjectsController@create');
  Route::post('projects/adduser', 'ProjectsController@adduser')->name('projects.adduser');
  Route::resource('projects', 'ProjectsController');
  Route::resource('roles', 'RolesController');
  Route::resource('tasks', 'TasksController');

  Route::get('tasks/create/{project_id?}', 'TasksController@create');
  Route::post('task/adduser', 'TasksController@adduser')->name('tasks.adduser');

  Route::resource('users', 'UsersController');
  Route::resource('comments', 'commentsController');

  Route::get('profile', 'UsersController@profile')->name('profile');
  Route::post('profile', 'UsersController@update_avatar');

  Route::resource('users', 'UsersController');

});



// Route::get('/posts/index', 'PostController@index');
// Route::get('/posts/about', 'PostController@about');
// Route::get('/posts/contact', 'PostController@contact');
// Route::get('/posts/login', 'PostController@login');
// Route::get('/posts/register', 'PostController@register');
//
// Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');
