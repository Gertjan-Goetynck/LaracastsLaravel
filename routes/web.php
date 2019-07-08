<?php
use Illuminate\Filesystem\Filesystem;
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

app(Filesystem::class);

Route::get('/', function () {
    return view('welcome');
});
/*
    GET /projects (index) GET ALL
    POST /projects (store) SAVE NEW PROJECT
    GET /projects/create (get) GO TO CREATE PROJECT FORM
    PUT /projects/{id} (update)
    GET /projects/{id}/edit (edit)
    DELETE /projects/{id} (destroy)
*/

Route::resource('projects','ProjectsController');

Route::put('/tasks/{task}','ProjectTasksController@update');
Route::post('projects/{project}/tasks','ProjectTasksController@store');

// Route::get('/projects','ProjectsController@index');
// Route::get('/projects/{id}','ProjectsController@show');
// Route::get('/projects/create','ProjectsController@create');
// Route::post('/projects','ProjectsController@store');
// Route::get('/projects/{id}/edit','ProjectsController@edit');
// Route::put('/projects/{id}','ProjectsController@update');
// Route::delete('/projects/{id}','ProjectsController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
