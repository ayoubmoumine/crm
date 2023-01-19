<?php

use App\Http\Controllers\Backoffice\AdminController;
use App\Http\Controllers\Backoffice\AuthController;
use App\Http\Controllers\Backoffice\CompanyController;
use App\Http\Controllers\Backoffice\InvitationController;
use App\Http\Controllers\Backoffice\UserController;
use App\Http\Controllers\Frontoffice\CompanyController as FrontofficeCompanyController;
use App\Http\Controllers\Frontoffice\UserController as FrontofficeUserController;
use App\Http\Controllers\Frontoffice\AuthController as UserAuthController;
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

Route::domain('www.crm.com')->name('user.')->middleware('prevent.back.history')->group(function(){
    Route::middleware(['guest:web'])->group(function(){
        Route::get('/login', [UserAuthController::class, 'login'])->name('login');
        Route::get('/register', [UserAuthController::class, 'showRegisterForm'])->name('register');
        Route::post('/register', [UserAuthController::class, "register"])->name('create');
        Route::post('/login', [UserAuthController::class, "authenticate"])->name('authenticate');
    });
    
    Route::middleware(['auth:web', 'is.profil.complete'])->group(function(){
        Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout')->withoutMiddleware('is.profil.complete');
        Route::get('/company', [FrontofficeCompanyController::class, 'show'])->name('company');
        Route::get('/profile', [FrontofficeUserController::class, 'show'])->name('profile')->withoutMiddleware('is.profil.complete');
        Route::resource('/', FrontofficeUserController::class)
            ->only(['edit', 'update'])
            ->parameters([''=> 'user'])
            ->withoutMiddleware('is.profil.complete');
        Route::get('/', [FrontofficeUserController::class, 'index'])->name('index');
    });
});

Route::domain('admin.crm.com')->prefix('admin')->name('admin.')->middleware('prevent.back.history')->group(function(){
    Route::middleware(['guest:admin'])->group(function(){
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/login', [AuthController::class, "authenticate"])->name('authenticate');
    });
    
    Route::middleware('auth:admin')->group(function(){
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::resource('/manage', AdminController::class)->parameters(['manage'=> 'admin']);
        Route::resource('/company', CompanyController::class);
        Route::get('/employees', [UserController::class, 'index'])->name('employees.index');
        Route::post('/invitations/{invitation}/cancel', [InvitationController::class, 'cancel'])->name('invitations.cancel');
        Route::resource('/invitations', InvitationController::class);
    });
});
