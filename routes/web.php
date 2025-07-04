<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\WebController;
use GPBMetadata\Google\Api\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {
    Route::prefix('')->controller(WebController::class)->group(function () {
        Route::get('/', 'homePage')->name('index');
        Route::get('/login', 'login')->name('login');
        Route::get('/register', 'register')->name('register');
        Route::get('/terms-and-conditions', 'terms')->name('terms');
        Route::get('/switch/country', 'switchCountry')->name('switch.country');
        Route::get('/refresh/captcha', 'refreshCaptcha')->name('refresh.captcha');
    });
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('verifyEmail', [ProfileController::class, 'verifyEmail'])->name('verify.email');

    Route::get('featured/category', function () {
        return view('property.category');
    })->name('featured.category');
});

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout')->middleware('auth');
Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware('throttle:6,1')
    ->name('verification.send');


Route::middleware(['web', 'auth', 'email'])->group(function () {
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    Route::prefix('user')->controller(WebController::class)->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('choose/category', function () {
        return view('property.choose_category');
    })->name('choose.category');

    Route::prefix('')->controller(PropertyController::class)->group(function () {
        Route::get('/add/property', 'create')->name('add.property');
        Route::post('/add/property', 'store')->name('property.store');
        Route::post('/add/property/assets', 'storeAssets')->name('property.store.assets');
        Route::get('/add/property/success/{pnumber}', 'success')->name('property.store.assets.success');
    });

    Route::prefix('user')->controller(RegisteredUserController::class)->group(function () {
        Route::get('wishlist', 'wishlist')->name('user.wishlist');
        Route::get('listing', 'listing')->name('user.listing');
        Route::get('profile', 'profile')->name('user.profile');
        Route::get('settings', 'settings')->name('user.settings');
    });
});

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';*/
