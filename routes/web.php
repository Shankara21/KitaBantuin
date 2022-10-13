<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\SubCategoryController as AdminSubCategoryController;
use App\Http\Controllers\Admin\AdminAdminController as AdminController;
use App\Http\Controllers\Admin\AdminSkillController;
use App\Http\Controllers\Admin\AdminWorkerController as AdminWorkerController;
use App\Http\Controllers\Admin\AdminUserController as AdminUserController;

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

// Route::get('/', function () {
//     return view('auth.login');
// });


Auth::routes();


// Route::middleware(['auth', 'isAdmin'])->group(function () {
//     Route::get('/', [HomeController::class, 'index'])->name('index');
// });
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/subCategories', AdminSubCategoryController::class);
    Route::resource('/user', AdminUserController::class);
    Route::resource('/admin', AdminController::class);
    Route::resource('/worker', AdminWorkerController::class);
    Route::resource('/skill', AdminSkillController::class);
});
