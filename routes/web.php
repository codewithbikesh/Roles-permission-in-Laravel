<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::group(['middleware' => 'auth'],function(){

// Route For Permissions
Route::resource('permissions', PermissionController::class);
Route::get('permissions/{permissionId}/delete', [PermissionController::class,'destroy']);

// Route For Roles 
Route::resource('roles', RoleController::class);
Route::get('roles/{roleId}/delete', [RoleController::class,'destroy']);
Route::get('roles/{roleId}/give-permissions', [RoleController::class,'addPermissionToRole']);
Route::put('roles/{roleId}/give-permissions', [RoleController::class,'givePermissionToRole']);

// Route For Users 
Route::resource('users', UserController::class);
Route::get('users/{userId}/delete', [UserController::class,'destroy']);

// });