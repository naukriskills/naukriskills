<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubscribeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

Route::get('/', [FrontController::class, 'index']); 
Route::post('subscribe', [ SubscribeController::class, 'store'])->name('subscribe'); 

Route::get('/page/terms-condition', function () {
    return view('page/terms-condition');
});
Route::get('page/about-us', function () {
    return view('page/about-us');
});
Route::get('page/contact-us', function () {
    return view('page/contact-us');
});
Route::get('page/privacy-policy', function () {
    return view('page/privacy-policy');
});
Route::get('page/how-it-works', function () {
    return view('page/how-it-works');
});

Auth::routes();

/*--------------- All User Routes List---------------*/
Route::middleware(['auth','useraccess:User'])->group(function(){
    Route::get('/user/dashboard', [HomeController::class, 'index'])->name('user/dashboard');
    Route::get('/user/manage-jobs-post', [UserController::class, 'manageJobsPost'])->name('user/manage-jobs-post');
    Route::get('/user/manage-jobs', [UserController::class, 'manageJobs'])->name('user/manage-jobs');
    Route::get('/user/manage-resume', [UserController::class, 'manageResume'])->name('user/manage-resume');
    Route::get('/user/bookmarks-jobs', [UserController::class, 'bookmarksJobs'])->name('user/bookmarks-jobs');
    Route::get('/user/reviews', [UserController::class, 'Reviews'])->name('user/reviews');
    Route::get('/user/my-profile', [UserController::class, 'myProfile'])->name('user/my-profile');
});

/*--------------- All Admin Routes List---------------*/
Route::group(['middleware' => ['auth','useraccess:Admin']],function(){

    Route::group(['prefix' => 'admin'], function() {
    Route::get('dashboard', [HomeController::class, 'adminIndex'])->name('admin/dashboard');
    Route::get('category', [CategoryController::class,'index'])->name('admin.category');
    Route::post('category/edit',[CategoryController::class,'edit'])->name('admin.category.edit');
    Route::post('category/update', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::post('category/status', [CategoryController::class, 'status'])->name('admin.category.status');
    Route::post('category/destroy', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    Route::post('category/store',[CategoryController::class,'store'])->name('admin.category.store');

   //roles Routes
   Route::get('roles', [RoleController::class, 'index'])->name('admin.roles');
   Route::post('roles/store', [RoleController::class, 'store'])->name('admin.roles.store');
   Route::post('roles/edit', [RoleController::class, 'edit'])->name('admin.roles.edit');
   Route::post('roles/grant', [RoleController::class, 'grant'])->name('admin.roles.grant');
   Route::post('roles/grantStore', [RoleController::class, 'grantStore'])->name('admin.roles.grantStore');
   Route::post('roles/update', [RoleController::class, 'update'])->name('admin.roles.update');
   Route::post('roles/destroy', [RoleController::class, 'destroy'])->name('admin.roles.destroy');

   //Permission Routes
   Route::get('permission', [PermissionController::class, 'index'])->name('admin.permission');
   Route::post('permission/store', [PermissionController::class, 'store'])->name('admin.permission.store');
   Route::post('permission/edit', [PermissionController::class, 'edit'])->name('admin.permission.edit');
   Route::post('permission/update', [PermissionController::class, 'update'])->name('admin.permission.update');
   Route::post('permission/status', [PermissionController::class, 'status'])->name('admin.permission.status');
   Route::post('permission/destroy', [PermissionController::class, 'destroy'])->name('admin.permission.destroy');

   // Users display with roles and permission

   Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
   Route::post('users/store', [UserController::class, 'store'])->name('admin.users.store');
   Route::post('users/edit', [UserController::class, 'edit'])->name('admin.users.edit');
   Route::post('users/update', [UserController::class, 'update'])->name('admin.users.update');
   Route::post('users/destroy', [UserController::class, 'destroy'])->name('admin.users.destroy');
   Route::get('users/change-password', [UserController::class, 'changePassword'])->name('admin.users.changePassword');
   Route::post('users/change-password', [UserController::class, 'updatePassword'])->name('admin.users.updatePassword');

    });
});

/*--------------- All Superadmin Routes List---------------*/
Route::middleware(['auth', 'useraccess:Superadmin'])->group(function () {
  
    Route::get('/superadmin/dashboard', [HomeController::class, 'superadminIndex'])->name('superadmin/dashboard');
});

/*--------------- All Superadmin Routes List---------------*/
Route::middleware(['auth', 'useraccess:Company'])->group(function () {
  
    Route::get('/company/dashboard', [HomeController::class, 'companyIndex'])->name('company/dashboard');
});

/*--------------- All Superadmin Routes List---------------*/
Route::middleware(['auth', 'useraccess:Partner'])->group(function () {
  
    Route::get('/partner/dashboard', [HomeController::class, 'partnerHome'])->name('partner/dashboard');
});



