<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
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
//GetData
Route::post('users',[loginController::class,'get_Data']);
Route::view("login","login");
// Route::post('insert',[loginController::class,'insert']);
// Route::post('insert', [loginController::class,'insertform']);
Route::get('disp',[loginController::class,'index']);