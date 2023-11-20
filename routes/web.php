<?php

use App\Http\Controllers\Admin\EmployeeController;
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
    return view('welcome');
});

Route::get('add-employee',[EmployeeController::class,'add']);
Route::post('insert-employee',[EmployeeController::class,'insert']);
Route::get('list-employee',[EmployeeController::class,'index']);
Route::get('edit-employee/{id}',[EmployeeController::class,'editemployee']);
Route::put('update-employee/{id}',[EmployeeController::class,'updateemployee']);
Route::get('delete-employee/{id}',[EmployeeController::class,'deleteemployee']);