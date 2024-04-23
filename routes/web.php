<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::post('/importexcel ', [UserController::class, 'importexcel'])->name('import.excel');
    Route::resource('absen', AbsenController::class);
    Route::resource('data', DataController::class);
    Route::resource('profiles', ProfileController::class);
    Route::resource('user', UserController::class);
    // Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/user/destroy/{id}', [UserController::class, 'delete']);
    Route::post('update-profile', [ProfileController::class, 'updateData'])->name('profile.updateData');
    // Route::get('/user', function () {
    //     return view('user', [
    //         'user' => User::get(),
    //     ]);
    // });
});
