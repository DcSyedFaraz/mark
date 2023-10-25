<?php

use Illuminate\Support\Facades\Route;
// Admin Dashboard
use App\Http\Controllers\Admin\DashboardController;
// users Dashboard
use App\Http\Controllers\voting\DashboardController as VotingDashboardController;
use App\Http\Controllers\nonvoting\DashboardController as NonVotingDashboardController;
// users panel modules
use App\Http\Controllers\users\DepositWalletController;
use App\Http\Controllers\users\DepositController;
use App\Http\Controllers\users\RedeemController;
use App\Http\Controllers\users\GiftCardController;
use App\Http\Controllers\users\LinkGameController;
use App\Http\Controllers\users\RequestController;
use App\Http\Controllers\users\TransactionsController;
use App\Http\Controllers\users\WithdrawController;
// Admin modules
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\TransactionsController as AdminTransactionsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\GamesController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\voting\PostController as VotingPostController;
use App\Http\Controllers\nonvoting\PostController as NonVotingPostController;
use App\Http\Controllers\GeneralSettingController;
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
Route::get('/signup', [RegisterController::class, 'register_form'])->name('signup');
Route::get('logout', [LoginController::class, 'logout']);
Route::get('account/verify/{token}', [LoginController::class, 'verifyAccount'])->name('user.verify');

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/', [HomeController::class,'login']);

Route::get('/', [HomeController::class,'index']);


Route::group(['prefix' => 'admin','middleware'=> ['auth']], function(){
    //Directory
    Route::resource('directory', PermissionController::class);

    Route::get('/change_password', [DashboardController::class, 'change_password'])->name('change_password');
    Route::post('/store_change_password', [DashboardController::class, 'store_change_password'])->name('store_change_password');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('users', UserController::class);
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile.index');
   // Storage
   Route::get('/document', [DashboardController::class, 'document'])->name('document');
   Route::get('/signature', [DashboardController::class, 'signature'])->name('signature');

    Route::post('profile/update', [DashboardController::class, 'update'])->name('profile.update');


});
Auth::routes();
Route::group(['prefix' => 'member','middleware'=> ['auth']], function(){

    Route::get('/change_password', [VotingDashboardController::class, 'change_password'])->name('change_password');
    Route::post('/store_change_password', [VotingDashboardController::class, 'store_change_password'])->name('store_change_password');
    Route::get('/dashboard', [VotingDashboardController::class, 'index'])->name('voting.dashboard');

    //post
    Route::get('/blogs', [VotingPostController::class, 'index'])->name('voting.blogs');
    Route::get('/voting/blogs', [VotingPostController::class, 'create'])->name('voting.blogs.create');
    Route::post('/voting/blogs/create', [VotingPostController::class, 'store'])->name('voting.blogs.store');
    Route::get('/voting/blogs/{blog}', [VotingPostController::class, 'show'])->name('voting.blogs.show');
    Route::get('/voting/blogs/{blog}/edit', [VotingPostController::class, 'edit'])->name('voting.blogs.edit');
    Route::put('/voting/{blog}', [VotingPostController::class, 'update'])->name('voting.blogs.update');
    Route::delete('/voting/{blog}', [VotingPostController::class, 'destroy'])->name('voting.blogs.destroy');

    //user Profile
    Route::get('/profile', [VotingDashboardController::class, 'profile'])->name('voting.profile');
    Route::post('/update/profile', [VotingDashboardController::class, 'UserProfileUpdate'])->name('voting.profile.update');
    Route::post('/edit/profile', [VotingDashboardController::class, 'UserEditProfile'])->name('voting.edit.profile');
    Route::post('/bank/detail', [VotingDashboardController::class, 'UserBankDetail'])->name('voting.bank.detail');


});

Route::group(['prefix' => 'nonvoting','middleware'=> ['auth']], function(){

    Route::get('/change_password', [NonVotingDashboardController::class, 'change_password'])->name('change_password');
    Route::post('/store_change_password', [NonVotingDashboardController::class, 'store_change_password'])->name('store_change_password');
    Route::get('/dashboard', [NonVotingDashboardController::class, 'index'])->name('nonvoting.dashboard');


     //post
     Route::get('/blogs', [NonVotingPostController::class, 'index'])->name('nonvoting.blogs');
     Route::get('/nonvoting/blogs', [NonVotingPostController::class, 'create'])->name('nonvoting.blogs.create');
     Route::post('/nonvoting/blogs/create', [NonVotingPostController::class, 'store'])->name('nonvoting.blogs.store');
     Route::get('/nonvoting/blogs/{blog}', [NonVotingPostController::class, 'show'])->name('nonvoting.blogs.show');
     Route::get('/nonvoting/blogs/{blog}/edit', [NonVotingPostController::class, 'edit'])->name('nonvoting.blogs.edit');
     Route::put('/nonvoting/{blog}', [NonVotingPostController::class, 'update'])->name('nonvoting.blogs.update');
     Route::delete('/nonvoting/{blog}', [NonVotingPostController::class, 'destroy'])->name('nonvoting.blogs.destroy');


    //user Profile
    Route::get('/profile', [NonVotingDashboardController::class, 'profile'])->name('nonvoting.profile');
    Route::post('/update/profile', [NonVotingDashboardController::class, 'UserProfileUpdate'])->name('nonvoting.profile.update');
    Route::post('/edit/profile', [NonVotingDashboardController::class, 'UserEditProfile'])->name('nonvoting.edit.profile');
    Route::post('/bank/detail', [NonVotingDashboardController::class, 'UserBankDetail'])->name('nonvoting.bank.detail');


});

