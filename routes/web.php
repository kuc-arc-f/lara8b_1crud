<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/tasks/test1', 'TasksController@test1');
//Route::get('/tasks/test', 'TasksController@test');
Route::resource('tasks', App\Http\Controllers\TasksController::class);
/**************************************
 * API
 **************************************/
Route::prefix('api')->group(function(){
  //tasks
  Route::post('/tasks/delete', [App\Http\Controllers\api\ApiTasksController::class, 'delete']);
  Route::post('/tasks/update', [App\Http\Controllers\api\ApiTasksController::class, 'update']);
  Route::get( '/tasks/show', [App\Http\Controllers\api\ApiTasksController::class, 'show']);
  Route::get('/tasks/list', [App\Http\Controllers\api\ApiTasksController::class, 'list']);
  Route::post('/tasks/create', [App\Http\Controllers\api\ApiTasksController::class, 'create']);
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
