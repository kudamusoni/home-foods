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
    Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');

    // Route::get('/admin/user/edit/{user}', [UserController::class, 'viewEdit'])->name('user-edit');
    // Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // });

   // Company routes
    Route::middleware(['role:company_user|company_admin'])->group(function () {
        Route::get('/admin/dashboard', fn() => view('pages.admin.dashboard'))->name('dashboard');

        Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products');
        Route::get('/admin/product/create', [ProductController::class, 'viewCreate'])->name('admin.product-create');
        Route::post('/admin/product/create', [ProductController::class, 'create']);

        Route::get('/admin/product/edit/{product}', [ProductController::class, 'viewEdit'])->name('admin.product-edit');
        Route::put('/admin/product/edit/{product}', [ProductController::class, 'edit']);

        Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
        Route::get('/admin/users/invite', [CompanyController::class, 'viewInvite'])->name('admin.view-invite');

        Route::get('/admin/user/edit/{user}', [UserController::class, 'viewEdit'])->name('admin.user-edit');
        Route::put('/admin/user/edit/{user}', [UserController::class, 'edit']);
    });
});


Route::middleware(['auth', 'verified', 'no-role'])->group(function () {
    Route::get('/choose', fn() => view('pages.public.choose'))->name('choose');

    Route::get('/choose/user', [UserController::class, 'chooseUser'])->name('user.choose');
    Route::post('/choose/user/register', [UserController::class, 'completeRegistration']);

    Route::get('/choose/company', fn() => view('pages.public.company-choose'))->name('company.choose');
    Route::get('/choose/company/create', [CompanyController::class, 'createCompany'])->name('company.create');
    Route::get('/choose/company/join', [CompanyController::class, 'viewCompanyJoin'])->name('company.join');
    Route::post('/choose/company/join', [CompanyController::class, 'joinCompany']);
    Route::post('/choose/company/create', [CompanyController::class, 'registerCompany']);

});


require __DIR__.'/auth.php';
