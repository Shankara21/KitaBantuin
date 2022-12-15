<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\SubCategoryController as AdminSubCategoryController;
use App\Http\Controllers\Admin\AdminAdminController as AdminController;
use App\Http\Controllers\Admin\AdminPaymentController;
use App\Http\Controllers\Admin\AdminSkillController;
use App\Http\Controllers\Admin\TestimoniController as AdminTestimoniController;
use App\Http\Controllers\Admin\AdminWorkerController as AdminWorkerController;
use App\Http\Controllers\Admin\AdminUserController as AdminUserController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BankUserController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LandingPageProject;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectResultController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\TestimoniController;

use App\Http\Controllers\WorkerController;
use App\Http\Controllers\WorkerDetailController;
use App\Http\Livewire\Features;
use App\Http\Livewire\Homepage;
use App\Models\Project_result;

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

Route::controller(PasswordController::class)->group(function () {
    Route::get('/change-password', 'index')->name('index')->middleware('auth');
    Route::post('/change-password', 'store')->name('store')->middleware('auth');
});

Route::controller(LandingPageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/service', 'service')->name('service');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/list-worker', 'worker')->name('worker');
    Route::get('/list-project', 'project')->name('list-project');
    Route::get('/profile', 'profile')->name('profile');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
    Route::put('/profile-worker/{id}', [ProfileController::class, 'updateWorker'])->name('profile.updateWorker')->middleware('auth');
    Route::get('/profile-worker', 'profileWorker')->name('profileWorker');
    Route::get('/detail-project/{id}', 'detailProject')->name('detailProject');
    Route::get('/create-project', 'createProject')->name('create-project')->middleware(['isUser', 'auth']);
    Route::get('/myBid', 'myBid')->middleware('isWorker')->name('myBid');
    Route::get('/details-worker/{user}', 'detailWorker')->name('detailWorker');
    Route::get('/myProject', 'listProject')->name('myProject')->middleware('isUser');
    Route::get('/detail-myProject/{id}', 'detailMyProject')->middleware('isUser')->name('detail-myProject')->middleware('isUser');
    Route::get('/submitWorker', 'submitWorker')->name('submitWorker')->middleware(['auth', 'isUser']);
    Route::post('/submitWorker', 'processWorker')->name('processWorker')->middleware(['auth', 'isUser']);
    Route::get('/bid-details/{id}', 'bidDetails')->name('bidDetails')->middleware(['auth']);
    Route::post('/rating', 'rating')->name('rating')->middleware('auth');
    Route::get('/getPayment/{id}', 'getPayment')->name('getPayment')->middleware('auth');
    Route::get('/search', 'search')->name('search');
    Route::get('/video-conference', 'videoConference')->name('video-conference');
});

//TODO Routing untuk project
Route::controller(LandingPageProject::class)->group(function () {
    Route::post('/create-project', 'createProject')->name('createProject');
    Route::post('/create-bid', 'createBid')->name('createBid');
    Route::post('/accept-bid/{id}', 'acceptBid')->name('acceptBid');
    Route::post('/submit-project', 'submitProject')->name('submitProject');
    Route::post('/submit-payment', 'submitPayment')->name('submitPayment');
    Route::post('/submit-testimoni', 'submitTestimoni')->name('submitTestimoni');
});


Route::controller(SkillController::class)->group(function () {
    Route::get('/create-skill', 'create')->name('create');
    Route::post('/create-skill', 'store')->name('store');
    Route::get('/edit-skill/{id}/edit', 'edit')->name('edit');
    Route::put('/edit-skill/{id}', 'update')->name('update');
});

Route::controller(PortofolioController::class)->group(function () {
    Route::get('/create-portofolio', 'create')->name('create');
    Route::post('/create-portofolio', 'store')->name('store');
    Route::get('/edit-portofolio/{id}', 'edit')->name('edit');
    Route::post('/edit-portofilo', 'update')->name('update');
});

// ! Admin Routing
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index']);
    Route::get('/categories/checkSlug', [AdminCategoryController::class, 'checkSlug']);
    Route::get('/subCategories/checkSlug', [AdminSubCategoryController::class, 'checkSlug']);
    Route::get('/skill/checkSlug', [AdminSkillController::class, 'checkSlug']);
    Route::get('/bank/checkSlug', [BankController::class, 'checkSlug']);
    Route::get('/bank-user/checkSlug', [BankUserController::class, 'checkSlug']);
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/subCategories', AdminSubCategoryController::class);
    Route::resource('/user', AdminUserController::class);
    Route::resource('/admin', AdminController::class);
    Route::resource('/workers', AdminWorkerController::class);
    Route::resource('/skill', AdminSkillController::class);
    Route::resource('/worker-details', WorkerDetailController::class);
    Route::resource('/testimoni', AdminTestimoniController::class);
    Route::resource('/project', ProjectController::class);
    Route::resource('/result', ProjectResultController::class);
    Route::resource('/bank', BankController::class);
    Route::resource('/bank-user', BankUserController::class);
    Route::resource('/payment', PaymentController::class);
    Route::resource('/balance', BalanceController::class);
    Route::resource('/admin-payment', AdminPaymentController::class);
});
