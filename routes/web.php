<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminUsersController;

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

Route::middleware('WebGuard')->group(function () {


    // register Route
    Route::get('/register', [RegisterController::class, 'showRegisterationForm'])->name('show-register');
    Route::post('/register', [RegisterController::class, 'processRegisterationForm'])->name('process-register');

    //login route
    Route::get('/login', [LoginController::class, 'showLogin'])->name('show-login');
    Route::post('/login', [LoginController::class, 'processLogin'])->name('process-login');

});





Route::middleware('AuthMid')->group(function () {

  //logout
    Route::get('/logout', [LogoutController::class, 'logout']);

    //dashboard controller
    Route::get('/', [DashboardController::class, 'showDashboardPosts'])->name('show-dashboard-posts');
    Route::get('/users', [DashboardController::class, 'showDashboardUsers'])->name('show-dashboard-users');

    //post operatons
    Route::get('/posts/delete/{id}', [PostController::class, 'deletePost']);
    Route::get('/posts/add', [PostController::class, 'addPost']);
    Route::post('/posts/add', [PostController::class, 'processAddPost']);
    Route::get('/posts/edit/{id}', [PostController::class, 'editPost'])->name('edit-post');
    Route::post('/posts/update/{id}', [PostController::class, 'updatePost'])->name('update-post');

    //user admin only operations
    Route::get('/user/delete/{id}', [AdminUsersController::class, 'deleteUser']);
    Route::get('/user/add', [AdminUsersController::class, 'addUser']);
    Route::post('/user/add', [AdminUsersController::class, 'processAddUser']);
    Route::get('/user/edit/{id}', [AdminUsersController::class, 'editUser'])->name('edit-user');
    Route::post('/user/update/{id}', [AdminUsersController::class, 'updateUser'])->name('update-user');


    
});

