<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoneController;
use App\Http\Controllers\TodoController;
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

/**
 * 1- صفحة تسجيل دخول كعضو جديد وصفحة تسجيل دخول عادية
 * 2- هعمل صفحة رئيسية فيها قايمتين  القايمة الاولي بالحاجات الي خلص والتانية بالي لسه هتتعمل 
 */

Route::get('/', function () {
    return view('index');
})->middleware('auth');

// Create a register Route
Route::get('register', [AuthController::class, 'registerForm'])->middleware('guest');
Route::post('register', [AuthController::class, 'register'])->middleware('guest');

// Create a login route
Route::get('login', [AuthController::class, 'loginForm'])->middleware('guest');
Route::post('login', [AuthController::class, 'login'])->middleware('guest');

// Logout Route
Route::get('lgout', [AuthController::class, 'logout'])->middleware('auth');

// Add task Route
Route::get('add/task', [TodoController::class, 'addTaskForm']);
Route::post('add/task', [TodoController::class, 'addTask']);

// Edit task
Route::get('todo/edit/{id}', [TodoController::class, 'editPage']);
Route::post('todo/edit/{id}', [TodoController::class, 'edit']);
Route::get('todo/delete/{id}', [TodoController::class, 'delete']);

// Mark as done route
Route::post('todo/done/{id}', [TodoController::class, 'moveToDoneList']);

// Done List
Route::get('done-list', [DoneController::class, 'display']);

// Clear specific task
Route::get('clear-task/{id}', [DoneController::class, 'clearTask']);

// Clear All Tasks
Route::get('clear-all-tasks', [DoneController::class, 'clearAll']);
