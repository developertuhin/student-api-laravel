<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;


Route::get('students',[StudentController::class, 'index']);
Route::post('student/add',[StudentController::class , 'store']);
Route::get('students/{id}/show',[StudentController::class, 'show']);
Route::put('student/{id}/update',[StudentController::class, 'update']);
Route::delete('student/{id}/delete',[StudentController::class, 'delete']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware'=>'api', 'prefix'=>'auth'],function($router){
	Route::post('/register',[AuthController::class, 'register']);
	Route::post('/login',[AuthController::class, 'login']);
});
