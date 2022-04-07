<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mynewAPI;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's for authentication
    Route::get('list',[mynewAPI::class,'mylist']);
});
Route::get('data',[mynewAPI::class,'get_Data']);
// Route::get('list',[mynewAPI::class,'mylist']);
Route::get('list/{id}',[mynewAPI::class,'mydatalist']);
Route::post('add',[mynewAPI::class,'add']);
Route::put('update',[mynewAPI::class,'update_data']);
Route::get('search/{name}',[mynewAPI::class,'search_data']);
Route::delete('delete/{id}',[mynewAPI::class,'delete_rec']);

Route::get('upload',[mynewAPI::class,'upload_image']);
Route::post('upload',[mynewAPI::class,'uploadimg']);
Route::post('validate',[mynewAPI::class,'validate_data']);

// Route::post("login",[UserController::class,'index']);

//passport authentication
Route::post("register",[UserController::class,'reg_auth']);
Route::post("login",[UserController::class,'login_auth']);
Route::get("login",[UserController::class,'login_auth'])->name('login');

Route::middleware('auth:api')->get('/details',[UserController::class,'userlist'] );