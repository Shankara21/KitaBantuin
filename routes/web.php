<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\SubCategoryController as AdminSubCategoryController;

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

Route::resource('/categories', CategoryController::class);



Auth::routes();


// Route::middleware(['auth', 'isAdmin'])->group(function () {
//     Route::get('/', [HomeController::class, 'index'])->name('index');
// });
Route::get('/', [HomeController::class, 'index'])->middleware('auth');

Route::resource('/categories', AdminCategoryController::class);
Route::resource('/subCategories', AdminSubCategoryController::class);
