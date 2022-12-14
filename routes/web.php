<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\Admin\AdminRegisterController;
use App\Http\Controllers\Auth\Admin\AdminLogoutController;
use App\Http\Controllers\Auth\Admin\AdminLoginController;

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
    return view('index');
    // return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

/* 管理者ユーザーの登録画面 */
Route::get('/admin/register', function () {
    return view('auth.admin.admin-register');
});

// 管理者ユーザーの登録処理
Route::post('/admin/register', [AdminRegisterController::class, 'create']);

// 管理者ユーザーのログアウト処理
Route::post('/admin/logout', [AdminLogoutController::class, 'adminLogout']);

// 管理者ユーザーのログイン画面
Route::get('/admin/login', function () {
    return view('auth.admin.admin-login');
});

// 管理者ユーザーのログイン処理
Route::post('/admin/login', [AdminLoginController::class, 'adminLogin']);