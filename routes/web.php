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
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LandingPageProject;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Features;
use App\Http\Livewire\Homepage;

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

// Route::get('/', function () {
//     return view('landingPage.home');
// });
// Route::controller(OrderController::class)->group(function () {
//     Route::get('/orders/{id}', 'show');
//     Route::post('/orders', 'store');
// });
Route::controller(LandingPageController::class)->group(function () {
    Route::get('/', 'home');
    Route::get('/service', 'service');
    Route::get('/about', 'about');
    Route::get('/contact', 'contact');
    Route::get('/list-worker', 'worker');
    Route::get('/list-project', 'project')->name('list-project');
    Route::get('/profile', 'profile');
    Route::put('/profile/{id}', [ProfileController::class, 'update']);
    Route::get('/profile-worker', 'profileWorker');
    Route::get('/detail-project/{id}', 'detailProject');
    Route::get('/create-project', 'createProject');
    Route::get('/myBid', 'myBid');
    Route::get('/details-worker/{id}', 'detailWorker');
});
Route::controller(LandingPageProject::class)->group(function () {
    Route::post('/create-project', 'createProject');
    Route::post('/create-bid', 'createBid');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index']);
    Route::get('/categories/checkSlug', [AdminController::class, 'checkSlug']);
    Route::get('/subCategories/checkSlug', [AdminSubCategoryController::class, 'checkSlug']);
    Route::get('/skill/checkSlug', [AdminSkillController::class, 'checkSlug']);
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/subCategories', AdminSubCategoryController::class);
    Route::resource('/user', AdminUserController::class);
    Route::resource('/admin', AdminController::class);
    Route::resource('/worker', AdminWorkerController::class);
    Route::resource('/skill', AdminSkillController::class);
});
