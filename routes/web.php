<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// User is assigned and logged in
Route::middleware(['user-access'])->group(function () {

    // Accessible by all assigned users
    // Route::middleware(['role:customer|company_user|company_admin'])->group(function () {
        Route::get('/home', fn() => view('pages.public.home'))->name('home');
    // });

   // Company routes
    Route::middleware(['role:company_user|company_admin'])->group(function () {
        Route::get('/dashboard', fn() => view('pages.admin.dashboard'))->name('dashboard');

        Route::get('/products', [ProductController::class, 'index'])->name('products');

        Route::get('/product/create', [ProductController::class, 'viewCreate'])->name('view-create');
        Route::post('/product/create', [ProductController::class, 'create']);

        Route::get('/product/{id}', [ProductController::class, 'show']);
    });
});


Route::middleware(['auth', 'verified', 'no-role'])->group(function () {
    Route::get('/choose', fn() => view('pages.public.choose'))->name('choose');

    Route::get('/choose/user', [UserController::class, 'chooseUser'])->name('user.choose');
    Route::post('/choose/user/register', [UserController::class, 'completeRegistration']);

    Route::get('/choose/company', fn() => view('pages.public.company-choose'))->name('choose');
    Route::get('/choose/company/create', [CompanyController::class, 'createCompany'])->name('company.create');
    Route::get('/choose/company/join', [CompanyController::class, 'joinCompany'])->name('company.join');
    Route::post('/choose/company/create', [CompanyController::class, 'registerCompany']);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
