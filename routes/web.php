<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
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

Route::get('/', function () {
    return view('welcome'); // Đảm bảo view 'welcome' tồn tại trong resources/views
});
Route::middleware(['auth'])->group(function () {
    // Dashboard route cho user thường
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Admin routes
    Route::prefix('admin')->name('admin.')->middleware(['role:admin'])->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('users', UserController::class);
        Route::resource('products', ProductController::class); // Thêm route cho products
    
    });
    
});
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
// Đổi từ products thành shop
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/{product}', [ShopController::class, 'show'])->name('shop.show');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('admin.dashboard');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login.custom');
Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegistrationForm'])->name('register-user');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register.custom');
// Route logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/auth/{provider}', [SocialAuthController::class, 'redirectToProvider'])->name('social.login');
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'handleProviderCallback']);
