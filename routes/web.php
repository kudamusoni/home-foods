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
    Route::get('/home', [ProductController::class, 'home'])->name('home');
    Route::get('/product/{product}', [ProductController::class, 'show']);

   // Company routes
    Route::middleware(['role:company_user|company_admin'])->group(function () {
        Route::get('/admin/dashboard', fn() => view('pages.admin.dashboard'))->name('dashboard');

        Route::get('/admin/products', [ProductController::class, 'index'])->name('products');

        Route::get('/admin/product/create', [ProductController::class, 'viewCreate'])->name('product-create');
        Route::post('/admin/product/create', [ProductController::class, 'create']);

        Route::get('/admin/product/edit/{product}', [ProductController::class, 'viewEdit'])->name('product-edit');
        Route::put('/admin/product/edit/{product}', [ProductController::class, 'edit']);

        Route::get('/admin/users', [UserController::class, 'index'])->name('users');
        Route::get('/admin/users/invite', [UserController::class, 'viewInvite'])->name('users');

        Route::get('/admin/user/edit/{user}', [UserController::class, 'viewEdit'])->name('user-edit');
        Route::put('/admin/user/edit/{user}', [UserController::class, 'edit']);
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
