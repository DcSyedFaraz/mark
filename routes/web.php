<?php

// Admin Dashboard
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DirectoryController;
use App\Http\Controllers\Admin\InfraStructureController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PhotoController;
// Admin modules
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\GeneralFilesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\nonvoting\DashboardController as NonVotingDashboardController;
use App\Http\Controllers\PollController;
// users Dashboard
use App\Http\Controllers\voting\DashboardController as VotingDashboardController;
use App\Http\Controllers\voting\PostController as VotingPostController;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Controllers\LfmController;

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

Route::get('/done', function () {
    Artisan::call('optimize:clear');

    return 'done';
});

Route::get('/signup', [RegisterController::class, 'register_form'])->name('signup');
// Route::get('/signup', [RegisterController::class, 'create'])->name('registers');
Route::get('logout', [LoginController::class, 'logout']);
Route::get('account/verify/{token}', [LoginController::class, 'verifyAccount'])->name('user.verify');

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/logins', [HomeController::class, 'login'])->name('logins');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/event/calendar', [EventsController::class, 'calendar'])->name('events.calendar');
Route::get('/lfmm', [LfmController::class, 'show']);
Route::get('/event/calendar/show/{id}', [EventsController::class, 'calendarShow'])->name('calendar.show');
Route::get('/search', [DirectoryController::class, 'search'])->name('search');
// Profile

Route::group(['middleware' => ['auth', 'role:Admin|board_member|member', 'checkAccess', 'non_voting']], function () {

    // General Info Routes
    Route::get('/general/AssocMeeting', [GeneralFilesController::class, 'Asm'])->name('general.asm');
    Route::post('/file', [GeneralFilesController::class, 'file'])->name('file');

    Route::get('/general/abl', [GeneralFilesController::class, 'abl'])->name('general.abl');
    Route::get('/general/wtr', [GeneralFilesController::class, 'wtr'])->name('general.wtr');
    Route::get('/general/abl', [GeneralFilesController::class, 'abl'])->name('general.abl');

    Route::get('/general/br', [GeneralFilesController::class, 'br'])->name('general.br');

    Route::get('/general/bml', [GeneralFilesController::class, 'bml'])->name('general.bml');

    Route::get('/general/ci', [GeneralFilesController::class, 'ci'])->name('general.ci');

    Route::get('/general/smd', [GeneralFilesController::class, 'sm'])->name('general.sm');

    Route::get('/general/ccr', [GeneralFilesController::class, 'ccr'])->name('general.ccr');

    Route::get('/general/aoi', [GeneralFilesController::class, 'aoi'])->name('general.aoi');

    // Poll
    Route::resource('polls', PollController::class);
    Route::post('polls/{poll}/vote', [PollController::class, 'vote'])->name('polls.vote');
    Route::get('generate-pdf/{id}', [PollController::class, 'generatePDF'])->name('polls.pdf');
    // Comments
    Route::resource('comments', CommentController::class)->only(['store']);

});




Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:Admin|board_member']], function () {
    //Directory
    Route::resource('directory', DirectoryController::class);

    Route::resource('events', EventsController::class);


    Route::get('/voting-details', [PollController::class, 'details'])->name('polls.details');





    Route::controller(DirectoryController::class)->group(function () {
        Route::get('bussiness', 'bussiness')->name('bussiness');
        // Route::get('bussinessss', 'bussiness')->name('verification.notice');
        Route::post('bussiness/store', 'bussinessStore')->name('business.store');
        Route::put('bussiness/update/{id}', 'bussinessUpdate')->name('business.update');
        Route::delete('/business/delete/{id}', 'bussinessDelete')->name('bussinessDelete');
    });
    //Structure
    Route::resource('structure', InfraStructureController::class);
    Route::get('/delete/{id}', [InfraStructureController::class, 'delete'])->name('structure.delete');

    //Plant_Info
    Route::get('/plantInfo', [InfraStructureController::class, 'plantInfo'])->name('plant.index');
    Route::post('/plantInfo/store', [InfraStructureController::class, 'plantStore'])->name('plant.store');
    Route::get('/plantInfo/{id}', [InfraStructureController::class, 'plantDelete'])->name('plant.delete');

    //Gallery
    Route::resource('photo', PhotoController::class);

    Route::get('/request/accept/{id}', [DashboardController::class, 'accept'])->name('users.accept');
    Route::post('/request/decline/{id}', [DashboardController::class, 'decline'])->name('users.decline');

    // Route::get('/gallery', [PhotoController::class, 'gallery'])->name('photo.index');
    // Route::get('/gallery', [InfraStructureController::class, 'gallery'])->name('photo.index');
    // Route::get('/gallery/delete/{id}', [InfraStructureController::class, 'PhotoDelete'])->name('photo.delete');



    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('users', UserController::class);

    // Storage
    Route::get('/document', [DashboardController::class, 'document'])->name('document');
    Route::get('/signature', [DashboardController::class, 'signature'])->name('signature');



});
Auth::routes();
Route::group(['prefix' => 'member', 'middleware' => ['auth', 'role:member', 'checkAccess']], function () {

    Route::get('/change_password', [VotingDashboardController::class, 'change_password'])->name('change_password');
    Route::post('/store_change_passwords', [VotingDashboardController::class, 'store_change_passwords'])->name('store_change_passwords');
    Route::get('/dashboard', [VotingDashboardController::class, 'index'])->name('voting.dashboard');

    //Directory
    Route::resource('directories', DirectoryController::class);

    Route::resource('event', EventsController::class);

    Route::controller(VotingDashboardController::class)->group(function () {
        Route::get('directories', 'directorys')->name('directorys.new');
        Route::get('plantInfo', 'plantInfo')->name('plant.new')->middleware('non_voting');
        Route::get('structure', 'structure')->name('structure.new')->middleware('non_voting');
        // Route::get('bussinessss', 'bussiness')->name('verification.notice');

    });
    Route::controller(DirectoryController::class)->group(function () {
        Route::get('bussiness', 'bussiness')->name('bussinesss');
        Route::post('bussiness/store', 'bussinessStore')->name('businesss.store');

        Route::put('bussiness/update/{id}', 'bussinessUpdate')->name('businesss.update');
        Route::delete('/business/delete/{id}', 'bussinessDelete')->name('bussinesssDelete');
        // Route::get('bussinessss', 'bussiness')->name('verification.notice');

    });
    //Gallery
    Route::resource('photos', PhotoController::class);










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

Route::group(['prefix' => 'manage', 'middleware' => ['auth']], function () {

    Route::get('/change_password', [DashboardController::class, 'change_password'])->name('change_password');
    Route::post('/store_change_password', [DashboardController::class, 'store_change_password'])->name('store_change_password');
    Route::get('/dashboard', [NonVotingDashboardController::class, 'index'])->name('nonvoting.dashboard');

    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile.index');
    Route::post('profile/update', [DashboardController::class, 'update'])->name('profile.update');



});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
